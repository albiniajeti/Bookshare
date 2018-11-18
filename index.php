<?php include "includes/header.php"; ?>

<body>
<?php include "includes/menu.php"; ?>


    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4  text-center">It's a book hub
      </h1>
        
        <?php
    
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = '';
            }

            if($page == '' || $page = 1){
                $page1 = 0;
            }else{
                $page1 = ($page * 8) - 8;
            }

            $selectBooks = "select * from books" ;
            $findCount = mysqli_query($connection, $selectBooks);
            $count = mysqli_num_rows($findCount);

            $count = ceil($count/8);

            $query = "select * from books order by id desc limit $page1, 8";   
            $selectAllBooksQuery = mysqli_query($connection, $query);

             while ($row = mysqli_fetch_assoc($selectAllBooksQuery)){
             $bookId = $row ['id'];
             $bookTitle = $row ['book_name'];
             $bookOwner = $row['book_owner'];
             $bookImage = $row['book_image'];
             $bookDescription = substr($row['book_description'], 0, 200);
        ?>    
        

      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="<?=$bookImage ?>" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="book.php?"><?=$bookTitle ?></a>
              </h4>
              <p class="card-text"><?=$bookDescription ?></p>
            </div>
          </div>
        </div>
      </div>
        
    <?php } ?>
      <!-- /.row -->

      <!-- Pagination -->
<!--
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
-->
        
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <li class="page-item ">
              <a class="page-link" href="index.php?page=<?php echo($page-1); ?>">Previous</a>
            </li>
             <?php
                for($i = 1; $i <= $count; $i++){
                if($i == $page){
                    echo "<li class='page-item'><a class='currentPage page-link' href='puna.php?page={$i}'>{$i}</a></li>";
                }else{
                    echo "<li class='page-item'><a class='page-link' href='puna.php?page={$i}'>{$i}</a></li>";
                }
                }
            ?>
            <li class="page-item">
              <a class="page-link" href="puna.php?page=<?php echo($page+1); ?>">Next</a>
            </li>
          </ul>
        </nav>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>
  </body>

</html>
