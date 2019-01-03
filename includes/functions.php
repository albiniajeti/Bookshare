<?php
include "db.php";
session_start();
$user = $_SESSION['userId'];

if(isset($_POST['newBook'])){
    
    $author = $_POST['author'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    
//    if(isset($_FILES['image'])){
//        echo $_FILES['image']['tmp_name'];
//    }
    
    $image = uniqid().time().$_FILES['image']['name'];
    $imageTemp = $_FILES['image']['tmp_name'];
    
    move_uploaded_file($imageTemp, "../images/$image");
    
    $author = mysqli_real_escape_string($connection, $author);
    $title = mysqli_real_escape_string($connection, $title);
    $description = mysqli_real_escape_string($connection, $description);
    
    $query = "insert into books(book_name, book_owner, book_image, book_description, book_author) values('{$title}', '{$user}', '{$image}', '{$description}', '{$author}')";
    $addBook = mysqli_query($connection, $query);
    
    if($addBook){
        header("Location: ../index.php");
    }else{
        header("Location: ../index.php");
    }
}
























?>