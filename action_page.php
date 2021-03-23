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
                        echo "The price on Amazon is " . $amazon[$i+6] . $amazon[$i+7] . $amazon[$i+8] . $amazon[$i+9] . $amazon[$i+10];
                        break;
                    }
                }
            ?> 
            </article>
            <!-- target section -->
            <article class="store"> <?php
                $target = file_get_contents("https://www.target.com/s?searchTerm=$product_name");
                for ($i=0; $i < strlen($target); $i++) {
                    if ($target[$i] == '$') { //} && $target[$i] == 'P' && $target[$i+1] == 'r' && $target[$i+2] == 'i' && $target[$i+3] == 'c' && $target[$i+4] == 'e' && $target[$i+5] == ' ')  {
                       // echo "The price on Target is " . $target[$i+2] . $target[$i+3] . $target[$i+4] . $target[$i+5] . $target[$i+6];
                       echo found;
                        break;
                    }
                }
               // echo "The item is out of stock on Target";
            ?>
            </article> 

            <!-- walmart section -->
            <article class="store"> <?php
                $walmart = file_get_contents("https://www.walmart.com/search/?query=$product_name");
                for ($i=0; $i < strlen($walmart); $i++) {
                    if ($walmart[$i] == '$') { //  && $walmart[$i+1] == 'r' && $walmart[$i+2] == 'i' && $walmart[$i+2] == 'c' && $walmart[$i+2] == 'e') {
                        echo "found";
                      //  echo "The price on Walmart is " . $walmart[$i] . $walmart[$i+1] . $walmart[$i+2] . $walmart[$i+3] . $walmart[$i+4];
                    //    break;
                    }
                }
            ?>
            </article>
      
        </article>
</body>
</html>