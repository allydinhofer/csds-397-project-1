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
                // Grab the content of the HTML web page
                $amazon = "https://www.amazon.com/s?k=$product_name";
            ?> 
            <a href=<?php echo $amazon?>>Amazon result for <?php echo $product_name ?> </a>
            </article>
            <!-- target section -->
            <article class="store"> <?php
                $target = "https://www.target.com/s?searchTerm=$product_name";
            ?>
            <a href=<?php echo $target?>>Target result for <?php echo $product_name ?> </a>    
            </article> 

            <!-- walmart section -->
            <article class="store"> <?php
                $walmart = "https://www.walmart.com/search/?query=$product_name";
            ?>
            <a href=<?php echo $walmart?>>Walmart result for <?php echo $product_name ?> </a> 
            </article>
      
        </article>
</body>
</html>