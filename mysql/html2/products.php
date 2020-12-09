<?php
/**
 * Template File Doc Comment
 * 
 * PHP version 7
 *
 * @category Template_Class
 * @package  Template_Class
 * @author   Author <author@domain.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
require 'header.php';
    require 'config.php';
    session_start();
?>
<?php  
$html ="<div id='main'><div id='products'>";
foreach ( $products as $key => $value ) { 
        $html.="<form  method='POST'><div class='product'>
		    <img src='".$value['image']."'/>
			<h3 class='title'><a name='t1' href='#'>".$value['name']."</a></h3>
			<span>Price: $".$value['price']."</span>
            <input type='submit' name='".$value['id']."' class='add-to-cart' 
            value='Add To Cart'/>
			</div></form>";
}
echo $html."</div></div>";

foreach ( $products as $key => $value) {
    $price1 = $value['price'];
    if (isset($_POST[$value['id']])) {
        foreach ($_SESSION as $key => $values) {
            if ($value['id'] == $values ['id'] ) {
                $id = $values['id'];
                $name = $values['name'];
                $img = $values['image'];
                $price = $values['price'];
                $quant = $values['quantity'] + 1;
                        $prod = array(
                            "id"=> $id,
                            "name"=> $name,
                            "image"=> $img,
                            "price"=> $price1 * $quant,
                            "quantity"=> $quant
                        );
                        $_SESSION['cart'.$id] = $prod; 
                        dis();
                        return;
            } 
        }

            $id = $value['id'];
            $name = $value['name'];
            $price = $value['price'];
            $image = $value['image'];
            $quantity = $value['quantity'];
            $prod = array(
                        "id"=> $id,
                        "name"=> $name,
                        "image"=> $image,
                        "price"=> $price,
                        "quantity"=> $quantity
                    );
            $_SESSION['cart'.$id] = $prod;
            dis();
    }
}
/**
 * Render the build template 
 *
 * @return void
 **/
function dis()
{

    $html2 ="";
    $html2 .="<tr><th>ID</th><th>Name</th><th>Image</th><th>Price</th>
    <th>Quantity</th><th></th><th>Delete</th></tr>";
    foreach ( $_SESSION as $key => $values) {
            $html2.="<form method='POST'><tr><td>".$values['id']."</td>
			<td>".$values['name']."</td>
			<td><img src='".$values['image']."'></td><td>".$values['price']."</td>
			<td><input type='number' name='Qty' value='".$values['quantity']."' /></td>
			<td><input type='submit' name='".$key."' value='Update' style='display:none;'/>
			</td>
			<td><input type='submit' name='".$key."' value='Remove'/></td></tr></form>";
    }
    echo "<table cellpadding='4' cellspacing='50'>".$html2."</table>
    <p class='p1'>Grand Total:".addTotal()."</p>";
}
//session_destroy();
/**
 * Render the build template 
 *
 * @return void
 **/
function addTotal()
{
    $total=0;
    foreach ($_SESSION as $key => $values) {
        $total =$values['price']+$total;
    }
    return $total;
}
foreach ($_SESSION as $key => $values) {
    $clicks = 0;
    /**
    * If the template file is not accessible 
    **/
    if (isset($_POST[$key])) {
        $id=$values['id'];
        switch($_POST[$key])
        {
        case "Remove":
            unset($_SESSION['cart'.$id]);
            dis();
            break;
        case "Update":
            $temp = $_POST['Qty'];
            $id = $values['id'];
            $name = $values['name'];
            $img = $values['image'];
            $price = $values['price'];
            $quantity = $values['quantity'];
            foreach ( $products as $key=> $value ) {
                if ($values['id'] == $value['id'] ) {
                    $price1 = $value['price'];
                    $prod = array(
                        "id"=> $id,
                        "name"=> $name,
                        "image"=> $img,
                        "price"=> $price1 * $temp,
                        "quantity"=> $temp
                    );$_SESSION['cart'.$id] = $prod; 
                } 
            }dis();
        }
    }
}
?>
<?php require 'footer.php';?>