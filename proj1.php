<!DOCTYPE html>

<!-- note to self: run php -S 127.0.0.1:8080 in terminal to start server -->
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
<body>

<!-- setting up the page -->
<body style="background-color:lightgray;"></body>
<h1 style="color: darkblue;"> Price Comparer</h1>
<h2 style="font-size: large;"> Easily compare prices between Amazon, Target, and Walmart. </h2>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Creates the search button -->
<form class="example" action="action_page.php">
    <input type="text" placeholder="Search for your item here" name="search">
    <button type="submit"><i class="fa fa-search"></i></button>
</form>

  <!-- creating the containers for the results -->
    <article class="All Stores">
        <!-- amazon section -->
        <article class="store"> <?php
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