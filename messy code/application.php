<?php

//calling of files
include 'db_connection.php';
include 'ManageUser.php';

$ManageUser = new ManageUser($conn);

$userData = [
    'userID' => 1,
    'userName' => 'John Doe',
    'userEmail' => 'john@example.com',
    'userRole' => 'admin'
];

//call functions from the application level
$ManageUser->addUser($userData);
$ManageUser->updateUser($userData);
$ManageUser->deleteUser($userData['userID']);
$ManageUser->listUsers();
?>
