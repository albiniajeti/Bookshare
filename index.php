<?php include "includes/header.php"; ?>

<body>
<?php include "includes/menu.php"; ?>
    
<?php 
    $book = "";
    if(isset($_POST['search'])){
        
        $book = $_POST['search'];
        $book = mysqli_real_escape_string($connection, $book);
    }
?>
        <?php
            if(isset($_GET['message'])){
                if($_GET['message'] == "success"){
                    echo "<p class='alert alert-success text-center'>Book requested.</p>"; 
                }else{
                    echo "<p class='alert alert-danger text-center'>Sorry, something went wrong.</p>";
                }                     
            }
        ?>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
        <h1 class="my-4  text-center">Biggest gallery in the universe</h1>
      <div class="row">
        
        <?php
    
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = '';
            }

            if($page == '' || $page == 1){
                $page1 = 0;
            }else{
                $page1 = ($page * 8) - 8;
            }

            $selectBooks = "select * from books" ;
            $findCount = mysqli_query($connection, $selectBooks);
            $count = mysqli_num_rows($findCount);
          
            if($count < 1) {
            } else{
                $count = ceil($count/8);
                    
                if(empty($book)){
                    if(isset($_SESSION['userId'])){
                        $user = $_SESSION['userId'];
                        $query = "select * from books where book_owner != '{$user}' order by id desc limit $page1, 8";
                    }else{
                        $query = "select * from books order by id desc limit $page1, 8";
                    }
                    $query2 = $query;
                    $query = $query2;
                }else{
                    $query = "select * from books where book_name like '%$book%' order by id desc limit $page1, 8";
                }

                $selectAllBooksQuery = mysqli_query($connection, $query);

                 while ($row = mysqli_fetch_assoc($selectAllBooksQuery)){
                 $bookId = $row ['id'];
                 $bookTitle = $row ['book_name'];
                 $owner = $row['book_owner'];    
                 $bookOwner = $row['book_owner'];
                 $bookImage = $row['book_image'];
                 $bookAuthor = $row['book_author'];
                 $bookDescription = substr($row['book_description'], 0, 200);
            ?>    


            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
              <div class="card h-100">
                <a href="book.php?bookId=<?= $bookId; ?>"><img class="card-img-top" src="images/<?=$bookImage ?>" alt=""></a>
                <div class="card-body">
                  <p class="card-title">
                    <a href="book.php?bookId=<?= $bookId; ?>"><?=$bookTitle ?></a>
                  </p>
                  <p class="card-text"><small>Author:</small> <?=$bookAuthor ?></p>
                </div>
              </div>
            </div>

        <?php }} ?>
      </div>
        
        <nav aria-label="Page navigation example" >
          <ul class="pagination justify-content-center" >
            <li class="page-item ">
              <a class="page-link" href="index.php?page=<?php echo($page-1); ?>">Previous</a>
            </li>
             <?php
                for($i = 1; $i <= $count; $i++){
                    if($i == $page){
                        echo "<li class='page-item'><a class='active_link page-link' href='index.php?page={$i}'>{$i}</a></li>";
                    }else{
                        echo "<li class='page-item'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
                    }
                }
            ?>
            <li class="page-item">
              <a class="page-link" href="index.php?page=<?php echo($page+1); ?>">Next</a>
            </li>
          </ul>
        </nav>

    </div>
    <!-- /.container -->

    <!-- Footer --> 
<?php include "includes/footer.php"; ?>