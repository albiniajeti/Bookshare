<?php include "includes/header.php"; ?>
<?php include "includes/menu.php"; ?>  

<?php 

    if(isset($_GET['bookId'])){

        $id = $_GET['bookId'];

        $query = "select * from books where id = '{$id}'";
        $results = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($results)){
                $id = $row['id'];
                $title = $row['book_name'];
                $owner = $row['book_owner'];
                $image = $row['book_image'];
                $description = $row['book_description'];
                $author = $row['book_author'];
                $available = $row['available'];
            }
    }

?>


  
<br>
    <div class="container">

      <!-- Portfolio Item Heading -->
      <h1 class="my-4"><?= $title; ?>
        <small>by <?= $author; ?></small>
      </h1>

      <!-- Portfolio Item Row -->
      <div class="row">

        <div class="col-md-8">
          <img class="img-fluid" src="images/<?= $image; ?>" alt="">
        </div>

        <div class="col-md-4" style="position: relative;">
          <h3 class="my-3">Book Description</h3>
          <p><?= $description; ?></p>
            <div style="position: absolute; bottom: 0;">
                <form action="" method="post">
                    <input type="hidden" value="<?= $id; ?>">
                    <?php if($available){?>
                        <button class="btn btn-success btn-block">Request Book</button>
                    <?php
                    }else{?>
                        <button class="btn btn-secondary btn-block" disabled>Unavailable</button>
                    <?php
                    }
                    ?>
                </form>
            </div>
        </div>

      </div>
      <!-- /.row -->

      <!-- Related Projects Row -->
      <h3 class="my-4">Other books you might like</h3>
        
      <div class="row">
        <?php
            $query2 = "SELECT * FROM books ORDER BY id DESC LIMIT 4";
            $results2 = mysqli_query($connection, $query2);
    
            while($row2 = mysqli_fetch_assoc($results2)){
                $id2 = $row2['id'];
                $title2 = $row2['book_name'];
                $owner2 = $row2['book_owner'];
                $image2 = $row2['book_image'];
                $description2 = $row2['book_description'];
                $author2 = $row2['book_author'];
                $available2 = $row2['available']; ?>
                
                <div class="col-md-3 col-sm-6 mb-4">
                  <a href="book.php?bookId=<?= $id2; ?>">
                    <img class="img-fluid" src="images/<?= $image2?>" alt="">
                  </a>
                </div>
        <?php
            }
        ?>

      </div>
      <!-- /.row -->

    </div>

   <!-- Footer -->
<?php include "includes/footer.php"; ?>
