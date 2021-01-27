<?php

if ($_SERVER['REQUEST_METHOD']=='POST'){
    require('mysqli_connect.php');
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $errors = array();

    if(empty($_POST['name'])){
        $errors[] = "Please enter your name";
    }
    else{
        $n = mysqli_real_escape_string($db, $_POST['name']);
    }
    if(empty($_POST['location'])){
        $errors[] = "Please enter your location";
    }
    else{
        $l = mysqli_real_escape_string($db, $_POST['location']);
    }
    if(empty($_POST['review'])){
        $errors[] = "Please enter your Review";
    }
    else{
        $r = mysqli_real_escape_string($db, $_POST['review']);
    }

    if(empty($errors)){
        $query = "INSERT INTO Review(review, reviewerName, location, restaurantId) VALUES('$r','$n','$l','$id')";
        $run = mysqli_query($db, $query);

        if($run){
            header("Location:restaurant.php?id={$id}");
        }
        else{
            echo "Opps. Something went wrong, please try again!";
        }
    }
    else{
        echo "Error";
        foreach($errors as $item){
            echo "$item <br>";
        }
        echo "Try again";
    }
    
        mysqli_close($db);
    }



?>
