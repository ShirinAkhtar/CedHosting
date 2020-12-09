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
require 'config.php';
require 'header3.php';
    $error  = array();
    $message = '';

if (isset($_POST['submit'])) {
        $name = isset($_POST['name'])?$_POST['name']:'';
        $image = isset($_POST['image'])?$_POST['image']:'';
        $price = isset($_POST['price'])?$_POST['price']:'';


    if (empty($_POST['name']) || empty($_POST['image']) || empty($_POST['price'])) {
        $error[] = array('input'=>'username', 'msg'=>'Please Fill Out all the fields! ');
    }

    if (sizeof($error)==0) {
        $sql = 'INSERT INTO addproduct (`name`, `image`,`price`) 
        VALUES("'.$name.'" , "'.$image.'", "'.$price.'")';
   
        if ($conn->query($sql) === true) {
             echo "New record created successfully";
        } else {
            $error[] = array('input'=>'form','msg'=>$conn->error);
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}


?>
<html>
    <head>
        <title>PHP Add Product form </title>
        <link type = "text/css" rel = "stylesheet" href = "style.css">
    </head>
    <body>
        <div id="message">
            <?php echo $message; ?>
        </div>
        <div id = "error">
            <?php if (sizeof($error)>0 ) : ?>
                <ul>
                    <?php foreach($error as $error1): ?>
                        <li> <?php echo $error1['msg']; ?> </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif;?>
           
        </div>
        <h1 class="header">Add Product Form</h1>
       
        <form id="SignUp Form" action = "addproduct.php" method = "POST">
        <label for="name">Product Name<input type="text" name="name" >
        </label><br>
        <label>File: </label><br><input type="file" name="image" /><br>
        <br>
        <label for="price">Price<input type="number" name="price" >
        </label><br>
        <p><input type="submit" name="submit" value="Add Product"></p>
        </form>
        <p class="p2">View Your Add Products</p><br>
        <a href="manageProduct.php" class="a2" role="button" aria-pressed="true">View Product</a>
    </body>

</html>



