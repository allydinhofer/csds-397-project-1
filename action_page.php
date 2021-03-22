<!DOCTYPE html>
<html>
<head>
     <style>
        .all-stores {
          margin: 0;
          padding: 5px;
          background-color: lightgray;
        }
        
        .all-stores > h1, .store {
          margin: 10px;
          padding: 5px;
        }
        
        .store {
          background: white;
        }
        
        .store > h2, p {
          margin: 4px;
          font-size: 90%;
        }
        </style>
        </head>
    <h1 style="color: darkblue;"> Here are your results: </h1>
<body style="background-color:lightgray;">
    <?php $product_name = $_GET["search"]; ?>
        <!-- creating the containers for the results -->
        <article class="All Stores">
            <!-- amazon section -->
            <article class="store"> <?php
                /* Grab the content of the HTML web page */
                $amazon = file_get_contents("https://www.amazon.com/s?k=$product_name");
                $regex = "price is";
                $a_arr =preg_split($regex,$amazon);
                echo $a_arr;

            ?> </article>

            <!-- target section -->
            <article class="store"> <?php
                $target = file_get_contents("https://www.target.com/s?searchTerm=$product_name");
            ?> </article> 

            <!-- walmart section -->
            <article class="store"> <?php
                $walmart = file_get_contents("https://www.walmart.com/search/?query=$product_name");
            ?> </article>
      
        </article>
</body>
</html>