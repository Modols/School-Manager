<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand">School Manager</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active"  href="{{ route('promotions.index') }}">Promotions Manager</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('modules.index') }}">Module Manager</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('students.index') }}">Student Manager</a>
          </li>
        </ul>
        <form class="d-flex" style="margin-top: 10px">
          <input class="form-control me-2" name='search' type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>