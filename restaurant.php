<!DOCTYPE html>

<html>
    <head>
        <title>Restaurant Page</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.write').click(function(){
                    var data = new URLSearchParams();
                    data.append("id", this.id);

                    var url = "writeReview.php?" + data.toString();
                    location.href = url;
                });

            })
        </script>
    </head>
    <body>
        <?php
            require('navbar.php');
        ?>
        <?php
        if ($_SERVER['REQUEST_METHOD']=='GET'){
            $id = $_GET['id'];
            require('mysqli_connect.php');

            $query_restaurant_name = "SELECT restaurantId, name FROM Restaurants WHERE restaurantId=$id";
            $run = mysqli_query($db, $query_restaurant_name);

            $count = mysqli_num_rows($run);

            $catDir = 'restaurantCat/';
            $resId = "$id/";
            echo "<div class='container sth'>";

            for ($k=1; $k<=4; $k++){
                echo "<div><img class ='picture' src='${catDir}{$resId}{$k}.jpg'></div>";
            }
            echo "</div>";

            if ($count>0){
                echo "<div class='restaurant-content'>";
                echo "<div class='content-header'>";
                while($details = mysqli_fetch_array($run, MYSQLI_ASSOC)){
                    echo "<p>{$details['name']}</p>";
                }
                echo "<button id='{$id}' class='write'>Write a Review</button>";
                echo "<button class='photo'>Add Photo</button>";
                echo "<button class='photo'>Share</button>";
                echo "<button class='photo'>Save</button>";
                echo "</div>"; //closing of content-header class
                echo "<hr>";
            }

            $query_restaurant_about = "SELECT restaurantId, about FROM Restaurants WHERE restaurantId=$id";
            $run_about = mysqli_query($db, $query_restaurant_about);

            $count_about = mysqli_num_rows($run_about);

            if ($count_about>0){
                echo "<div class='about' >";
                echo "<h4>About the Buisness </h4>";
                while($details_about = mysqli_fetch_array($run_about, MYSQLI_ASSOC)){
                    echo "<p>{$details_about['about']}</p>";
                }
                echo "<button class='read'>Read More</button>";
                echo "</div>";// closing of the about class
                echo "<hr>";
            }

            $query_restaurant_review = "SELECT review, location, reviewerName, restaurantId FROM Review WHERE restaurantId=$id";
            $run_review_query = mysqli_query($db, $query_restaurant_review);

            $count_review = mysqli_num_rows($run_review_query);

            if($count_review>0){
                while($boxes = mysqli_fetch_array($run_review_query, MYSQLI_ASSOC)){
                    echo "<div class='review'>";
                    echo "<img class='dummy' src='dummypng.png' alt='reviews'>";
                    echo "<p>{$boxes['reviewerName']}</p>";
                    echo "<p>{$boxes['location']}</p>";
                    echo "<p>10/5/2020</p>";
                    echo "<p>{$boxes['review']}</p>";
                    echo "</div>"; //closing of the review class
                    echo "<hr>";
                }

            }
            echo "</div>"; //close of restaurant-content class
            //Every div within restaurant-content was specific component of that class
        }

        ?>

    </body>

</html>
