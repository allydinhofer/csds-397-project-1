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
                    if ($amazon[$i] == 'C' && $amazon[$i+1] == 'u' && $amazon[$i+2] == 'r' && $amazon[$i+3] == 'r' && $amazon[$i+4] == 'e' && $amazon[$i+5] == 'n'
                    && $amazon[$i+6] == 't' && $amazon[$i+7] == ' ' && $amazon[$i+8] == 'p' && $amazon[$i+9] == 'r' && $amazon[$i+10] == 'i'
                    && $amazon[$i+11] == 'c' && $amazon[$i+12] == 'e' && $amazon[$i+13] == ' ' && $amazon[$i+14] == 'i' && $amazon[$i+15] == 's')  {
                        echo "The price on amazon is " . $amazon[$i+17] . $amazon[$i+18] . $amazon[$i+19] . $amazon[$i+20] . $amazon[$i+22];
                        break;
                    } 
                }
            ?> 
            </article>
            <!-- target section -->
            <article class="store"> <?php
                $target = file_get_contents("https://www.target.com/s?searchTerm=$product_name");
                for ($i=0; $i < strlen($target); $i++) {
                   if ($target[$i] == '$' && ($target[$i+1] == '.' || $target[$i+2] == '.' )) {
                    // echo "The price on Target is $" . $target[$i+1] . $target[$i+2] . $target[$i+3] . $target[$i+4] . $target[$i+5];
                    // echo $target[$i+1];
                    echo "found";
                    break;   
                    } 
                    // looking for $__.__
                }

            ?>
            </article> 

            <!-- walmart section -->
            <article class="store"> <?php
                $walmart = file_get_contents("https://www.walmart.com/search/?query=$product_name");
                for ($i=0; $i < strlen($walmart); $i++) {
                    if ($walmart[$i] == '.') { // && $walmart[$i+1] == 'i' && $walmart[$i+2] == 'd' && $walmart[$i+3] == 'd' && $walmart[$i+4] == 'e' && $walmart[$i+5] == 'n') {
                        echo "The price on Walmart is $".$walmart[$i-2] . $walmart[$i-1] . $walmart[$i] . $walmart[$i+1] . $walmart[$i+2];
                        break;
                    } 
                }
            ?>
            </article>
      
        </article>
</body>
</html>