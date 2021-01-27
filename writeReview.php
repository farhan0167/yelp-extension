<!DOCTYPE html>

<html>
    <head>
        <title>Restaurant Page</title>
        <link rel='stylesheet' type="text/css" href='writeRev.css'>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body>
        <?php
        $id = $_GET['id'];
        
        require("navbar.php");
        
        echo "<div class='review-content'>";
        echo "<p>Write a Review</p>";
        echo "<form action='postReview.php' method='post' id='writeReview'>";
        echo "<input name='id' value='{$id}' type='hidden'>";
        echo "<input type='text' name ='name'id='name' placeholder='Name'>";
        echo "<input type='text' name ='location' id='location' placeholder='Location'><br>";
        echo "</form>";
        echo "<textarea name='review' form='writeReview'></textarea><br>";
        echo "<input type='submit' form='writeReview'>";
        echo "</div>";
        
        ?>
    </body>