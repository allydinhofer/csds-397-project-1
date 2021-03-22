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
                $html = file_get_contents("https://www.amazon.com/s?k=$product_name");
                echo "this is amazon";
            ?> </article>

            <!-- target section -->
            <article class="store"> <?php
                echo "this is target";
            ?> </article> 

            <!-- walmart section -->
            <article class="store"> <?php
                echo "this is walmart";
            ?> </article>
      
        </article>
</body>
</html>