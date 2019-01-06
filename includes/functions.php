<?php
include "db.php";
session_start();
$user = $_SESSION['userId'];

if(isset($_POST['newBook'])){
    
    $author = $_POST['author'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $available = $_POST['available'];
    
//    if(isset($_FILES['image'])){
//        echo $_FILES['image']['tmp_name'];
//    }
    
    $image = uniqid().time().$_FILES['image']['name'];
    $imageTemp = $_FILES['image']['tmp_name'];
    
    move_uploaded_file($imageTemp, "../images/$image");
    
    $author = mysqli_real_escape_string($connection, $author);
    $title = mysqli_real_escape_string($connection, $title);
    $description = mysqli_real_escape_string($connection, $description);
    
    $query = "insert into books(book_name, book_owner, book_image, book_description, book_author, available) values('{$title}', '{$user}', '{$image}', '{$description}', '{$author}', '{$available}')";
    $addBook = mysqli_query($connection, $query);
    
    if($addBook){
        header("Location: ../index.php");
    }else{
        header("Location: ../index.php");
    }
}


if(isset($_POST['requestBook'])){
    
    $book = $_POST['book'];
    $asker = $_SESSION['userId'];
    $giver = $_POST['owner'];
    $status = "pending";
    
    $query = "insert into requests(book, asker, giver, status) values('{$book}', '{$asker}', '{$giver}', '{$status}')";
    $result = mysqli_query($connection, $query);
    
    if($result){
        header("Location: ../index.php?message=success");
    }else{
        header("Location: ../index.php?message=failure"); 
    }
}


if(isset($_POST['deleteBook'])){
    
  $book = $_POST['bookToDelete']; 
    
    $query = "delete from books where id = '{$book}'";
    $result = mysqli_query($connection, $query);
    
    header("Location: ../myBooks.php");
}

if(isset($_POST['changeAvailability'])){
   
    $book = $_POST['bookToDelete']; 
    $bookStatus = $_POST['bookStatus'];
    
    if($bookStatus == 1){
        $query = "update books set available = '0' where id = '{$book}'";
    }else{
        $query = "update books set available = '1' where id = '{$book}'";
    }

    $result = mysqli_query($connection, $query);   
    header("Location: ../myBooks.php");
}
















?>