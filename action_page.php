<?php

$product_name = $_GET(name);


// amazon
$a_html = file_get_contents("http://www.amazon.com/s?k=" + $a_product_name +"&ref=nb_sb_noss");

$a_regex = '/\(Prezzo|Precio|Price|Prix Amazon|Preis):?\<\/b\>([^\<]+)/i';

if (preg_match($a_regex, $a_html, $price)) {
    $price = number_format((float)($price[2]/100), 2, '.', '');
     echo "The price for amazon is $price";
}


?>