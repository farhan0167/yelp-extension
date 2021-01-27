<!DOCTYPE html>

<html>
    <head>
        <title>Project Test</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="reviews.css"> <!--sherpa's css-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.box').click(function(event){
                    var data = new URLSearchParams();
                    data.append("id", this.id);

                    var url = "restaurant.php?" + data.toString();
                    location.href = url;
                });

            })

        </script>
    </head>
    <body>
        <?php
            require('navbar.php');
        ?>
        <div class='content-box'>
            <div class='main-function'>
            <p class= 'top'>The Best Restaurants Near You</p>

        <?php

        require('mysqli_connect.php');

        $query = "SELECT restaurantId, name, about, resType FROM Restaurants"; //to include res_type, open hours
        $run = mysqli_query($db, $query);

        $count = mysqli_num_rows($run);
        $imgDir = 'imges/';

        if ($count>0){

            while($boxes = mysqli_fetch_array($run, MYSQLI_ASSOC)){
                echo "<div id='{$boxes['restaurantId']}' class='container box'>";
                echo "<img class ='picture' src='${imgDir}{$boxes['restaurantId']}/img.jpg' alt=Maxican  restaurant' width='250px' >";

                echo "<div class='container-content'>";
                echo "<p>{$boxes['name']}</p>";
                echo "<p> Deliver Takeout  Dine-in </p>";
                echo "<p>{$boxes['resType']}</p>";
                echo "<p>Open 10:00am-11:00pm</p>";
                echo "</div>";
                echo "</div>";
            }
        echo "</div>"; //close main-function class

        }
        ?>
            <div class="map">
                <img id="map" src="map.png"/>
            </div>

        </div>

    </body>


</html>
