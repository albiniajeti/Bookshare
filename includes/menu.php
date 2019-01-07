<?php session_start(); ?>
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
            <form action = "" method="post">
                <input class="form-control mr-sm-4" name="search" type="search" placeholder="Search books..." aria-label="Search">
<!--                <input type="button hidden" name="search">-->
<!--
                <div class="input-group">

                    <input type="text" class="form-control" name = "search">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" name = "submit">
                            <span class="glyphicon glyphicon-search"></span>
                    </button>
                    </span>

                </div>
-->
            </form>
            
            <?php
                if(!isset($_SESSION['loggedIn'])){?>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="login.php">Login</a>   
                    </li><?php
                }else{?>
                     <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="">
                        Settings</a>
                        <div class="dropdown-menu" >
                            <a class="dropdown-item" href="addbook.php">Add Book</a>
                            <a class="dropdown-item" href="bookrequests.php">Book Requests</a>
                            <a class="dropdown-item" href="editprofile.php">Edit Profile</a>
                            <a class="dropdown-item" href="mybooks.php">My Books</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">Sign Out</a>
                          </div>
                    </li>                    
        <?php  }
            ?>

          </ul>
        </div>
      </div>
    </nav>