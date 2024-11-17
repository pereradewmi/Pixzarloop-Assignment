<?php

//created a class which handles the functions of users
class ManageUser
{
    private $connection;

    public function __construct($dbConn)
    {
        $this->connection = $dbConn;
    }
// create seperate function for each operation and use meaningful variable names inorder to understand
    public function addUser($userData)
    {
        $query = "INSERT INTO users (userName, userEmail, userRole) VALUES (?, ?, ?)";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("sss", $userData['userName'], $userData['userEmail'], $userData['userRole']);

//Meaningful outputs to the client
        if ($statement->execute()) {
            echo "User Added Successfully";
        } else {
            echo "Error Adding User: " . $this->connection->error;
        }
    }

    public function updateUser($userData)
    {
        $query = "UPDATE users SET userName = ?, userEmail = ?, userRole = ? WHERE userID = ?";
        $statement = $this->connection->prepare($query);
// gives a layer of security in data handling
        $statement->bind_param("sssi", $userData['userName'], $userData['userEmail'], $userData['userRole'], $userData['userID']);

        if ($statement->execute()) {
            echo "User Updated Successfully";
        } else {
            echo "Error Updating User: " . $this->connection->error;
        }
    }

    public function deleteUser($userId)
    {
        $query = "DELETE FROM users WHERE userID = ?";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $userId);

        if ($statement->execute()) {
            echo "User Deleted Successfully";
        } else {
            echo "Error Deleting User: " . $this->connection->error;
        }
    }

    public function listUsers()
    {
        $query = "SELECT * FROM users";
        $result = $this->connection->query($query);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "ID: " . $row["userID"] . " - Name: " . $row["userName"] . " - Email: " . $row["userEmail"] . " - Role: " . $row["userRole"] . "<br>";
            }
        } else {
            echo "No Users Found";
        }
    }
}
?>
