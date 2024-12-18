<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 100%;height: 100%;">
  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">Library Management System</span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : 'text-white' }}" aria-current="page">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
              Dashboard
          </a>
      </li>
      <li>
          <a href="{{ route('books') }}" class="nav-link {{ Request::is('books') ? 'active' : 'text-white' }}">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
              Books
          </a>
      </li>
      <li>
          <a href="{{ route('authors') }}" class="nav-link {{ Request::is('authors') ? 'active' : 'text-white' }}">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
              Authors
          </a>
      </li>

      <li>
          <a href="{{ route('categories') }}" class="nav-link {{ Request::is('categories') ? 'active' : 'text-white' }}">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
              Categories
          </a>
      </li>
      {{-- <li>
        <a href="{{ route('categories') }}" class="nav-link {{ Request::is('categories') ? 'active' : 'text-white' }}">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
            Members
        </a>
    </li> --}}
    <li>
        <a href="{{ route('activities.all') }}" class="nav-link {{ Request::is('activities-all') ? 'active' : 'text-white' }}">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
            Activity
        </a>
    </li>
    <li>
        <a href="{{ route('activities.borrow') }}" class="nav-link {{ Request::is('activities-borrow') ? 'active' : 'text-white' }}">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
            Borrow Books
        </a>
    </li>
    <li>
        <a href="{{ route('activities.handover') }}" class="nav-link {{ Request::is('activities-handover') ? 'active' : 'text-white' }}">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
            HandOvered
        </a>
    </li>
  </ul>
</div>

