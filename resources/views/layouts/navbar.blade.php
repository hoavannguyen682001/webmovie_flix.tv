<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('home') }}">DashBoard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" >
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('category.index') }}">Danh mục phim</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('genre.index') }}">Thể loại</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('country.index') }}">Quốc gia</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('movie.index') }}">Phim</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('episode.index') }}">Tập phim</a>
      </li>

      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li> -->

    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm phim</button>
    </form> -->
  </div>
</nav>
<head>
    <style>
    nav  {
 background: #488cf6;
 border-color: #488cf6;
 box-shadow: 0 0 12px 0 #ccc;
}
nav  a {
    color: #dfe0ed;
}
nav.navbar-custom ul.navbar-nav a {
    color: #dfe0ed;
    border-style: solid;
    border-width: 0 0 2px 0;
    border-color: #fff;
}

nav ul.navbar-nav li.nav-item a:hover,
nav ul.navbar-nav li.nav-item a:visited,
nav ul.navbar-nav li.nav-item a:focus,
nav ul.navbar-nav li.nav-item a:active {
    background: #5CB85C;
}
nav ul.navbar-nav a:hover {
    border-color: #5CB85C;
}
nav.navbar-custom button.navbar-toggle {
    background: #5CB85C;
    border-radius: 2px;
}
nav.navbar-custom button.navbar-toggle:hover {
    background: #999;
}
nav.navbar-custom span.badge {
    background: #5CB85C;
    font-weight: normal;
    font-size: 11px;
     margin: 0 4px;
}

nav.navbar-custom span.badge.new {
    background: rgba(255, 0, 0, 0.8); color: #fff;
}


    </style>
</head>
