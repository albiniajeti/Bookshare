<?php include "includes/header.php"; ?>

<body>
<?php include "includes/menu.php"; ?>  
<head>
      <link rel="stylesheet" href="css/style_book.css">
    
   <?php 
    
        if(isset($_GET['bookId'])){
            
            $id = $_GET['bookId'];
            
            $query = "select * from books where id = '{$id}'";
            $results = mysqli_query($connection, $query);
            
                while($row = mysqli_fetch_assoc($results)){
                    $title = $row['book_name'];
                    $owner = $row['book_owner'];
                    $image = $row['book_image'];
                    $description = $row['book_description'];
                    $author = $row['book_author'];
                }
        }
    
    ?>
  
   </head>
<br>
                     <h3 style="color:#274056; font-size:25px; font-family: sans-serif;"><?= $title; ?></h3>
                     <div class="row">
                       <div class="col-sm-3"></div>
                     <pre>by </pre><p style="color: green; font-family: sans-serif;"><?= $author; ?><p>

                     <div class="row">
                        <div class="col-sm-2"></div>

                        <div class="col-sm-8">
                           <div class="row">
                              <div class="col-sm-4 require" align=center>
                                 <div class="image">
                                    <img src="images/<?= $image ?>" class="img-thumbnail" alt="Picture of a book" style="width:300px; background-color:#eff2f2;">
                                 </div>
                              </div>
                              <br/>
                              <br>
                              <div class="col-sm-8">
                                 <br />
                                 <div id="border_hor" style="border: 1px solid black;"><!-- border --></div>
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <p class="paragraph" style="font-size:15px;margin-top: 5px;font-family: serif;">
                                         <?= $description; ?>
                                       </p>
                                        <a href="#" class="btn btn-default float-right" data-toggle="modal" data-target="#saveModal"id="add_btn">Request book</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- border -->
                           <br />
                           <div id="border_hor" style="border: 1px solid black;"><!-- border --></div>

                           <br />
                           <br />
                         </div>
                     </div>

                  </div>


   <!-- Footer -->
    <?php include "includes/footer.php"; ?>
   </body>
</html>
