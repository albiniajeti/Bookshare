    <!-- Navigation -->
    <style type="text/css">
      .dropdown:hover>.dropdown-menu{
        display:block;
      }

    </style>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Bookshare</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
<!--
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
-->
            <input class="form-control mr-sm-4" type="search" placeholder="Search" aria-label="Search">
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                </a>
            <div class="dropdown-menu" >
                <a class="dropdown-item" href="addbook.php">Add Book</a>
                <a class="dropdown-item" href="missingbook.php">Reoprt Missing Book</a>
                <a class="dropdown-item" href="bookrequests.php">Book Requests</a>
                <a class="dropdown-item" href="editprofile.php">Edit Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Sign Out</a>
              </div>
      </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>