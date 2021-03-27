<!DOCTYPE html>
<html>
<head>
    <!-- this page is brought up when you submit the search button -->
     
     <!-- formatting the page -->
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
                // accessing the HTML and intializing the empty variable for the price
                $amazon = file_get_contents("https://www.amazon.com/s?k=$product_name");

                // finding the place in the HTML where the price is (follows "Current price is")
                for ($i=0; $i < strlen($amazon); $i++) {
                    if ($amazon[$i] == 'C' && $amazon[$i+1] == 'u' && $amazon[$i+2] == 'r' && $amazon[$i+3] == 'r' && $amazon[$i+4] == 'e' && $amazon[$i+5] == 'n'
                    && $amazon[$i+6] == 't' && $amazon[$i+7] == ' ' && $amazon[$i+8] == 'p' && $amazon[$i+9] == 'r' && $amazon[$i+10] == 'i'
                    && $amazon[$i+11] == 'c' && $amazon[$i+12] == 'e' && $amazon[$i+13] == ' ' && $amazon[$i+14] == 'i' && $amazon[$i+15] == 's')  {
                        echo "The price at Amazon is " . $amazon[$i+17] . $amazon[$i+18] . $amazon[$i+19] . $amazon[$i+20] . $amazon[$i+22];
                        break;
                    } 
                }
            ?> 
            </article>
            <!-- target section -->
            <article class="store"> <?php
                // accessing the HTML and intializing the empty variable for the price
                $target = file_get_contents("https://www.target.com/s?searchTerm=$product_name");
                $t_price = " ";
                
                // finding the place in the HTML where the price is (follows "$")
                for ($i=0; $i < strlen($target); $i++) {
                    if ($target[$i] == '$' && $target[$i-1] != "*") {
                    $t_price = "The price at Target is $" . $target[$i+1] . "." . $target[$i+2]; 
                       break;   
                    } 
                }

                // returning the price or a note stating the item is out of stock
                if ($t_price == " ") {
                    echo "This item is out of stock at Target.";
                } else {
                    echo $t_price;
                }
            ?>
            </article> 

            <!-- walmart section -->
            <article class="store"> <?php
                // accessing the HTML and intializing the empty variable for the price
                $walmart = file_get_contents("https://www.walmart.com/search/?query=$product_name");
                $w_price = " ";
                
                // finding the place in the HTML where the price is (surrounds ".")
                for ($i=0; $i < strlen($walmart); $i++) {
                    if ($walmart[$i] == '.') {
                        $w_price ="The price at Walmart is $" . $walmart[$i-2] . $walmart[$i-1] . $walmart[$i] . $walmart[$i+1] . $walmart[$i+2];
                        break;
                    } 
                }

                // returning the price or a note stating the item is out of stock
                if ($w_price == " ") {
                    echo "This item is out of stock at Walmart.";
                } else {
                    echo $w_price;
                }
            ?>
            </article>
      
        </article>
</body>
</html>