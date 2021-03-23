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
                $amazon = file_get_contents("https://www.amazon.com/s?k=$product_name");
                for ($i=0; $i < strlen($amazon); $i++) {
                    if ($amazon[$i-1] == ' ' && $amazon[$i] == 'P' && $amazon[$i+1] == 'r' && $amazon[$i+2] == 'i' && $amazon[$i+3] == 'c' && $amazon[$i+4] == 'e' && $amazon[$i+5] == ' ')  {
                        echo "The price on amazon is " . $amazon[$i+6] . $amazon[$i+7] . $amazon[$i+8] . $amazon[$i+9] . $amazon[$i+10];
                        break;
                    }
                }


            ?> 
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