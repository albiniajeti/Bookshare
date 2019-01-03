<?php


    if(isset($_POST['search'])){
        
        $book = $_POST['search'];
        
        $query = "select * from books where book_name like '%{$book}'%";
        $result = mysqli_query($connection, $query);
        
        
    }













?>