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
    session_start();
    require 'config.php';
    $error  = array();
    $message = '';


if (isset($_POST['submit'])) {
    $name = isset($_POST['name'])?$_POST['name']:'';
    $image = isset($_POST['image'])?$_POST['image']:'';
    $price = isset($_POST['price'])?$_POST['price']:'';

    if (sizeof($error)==0) {
        $sql = 'SELECT * FROM addproduct WHERE
        `name` = "'.$name.'" AND `image` = "'.$image.'" AND `price` = "'.$price.'" ';
        $result = $conn->query($sql);
   
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $_SESSION['userdata'] = array('id'=>$row['id'],
                    'name'=>$row['name'],
                    'image'=>$row['image'],
                    'price'=>$row['price']);
            }
        }
    } 

    if (sizeof($error)==0) {
        $id = $_SESSION['userdata']['id'];
        $sql="UPDATE addproduct SET `name`='".$_POST['name']."', `image`='".$_POST['image']."',`price`='".$_POST['price']."' WHERE  `id`='".$id."' " ;
        if ($conn->query($sql) === true) {
             echo "Record Updated successfully";
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
        <title>PHP Update Record form </title>
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
                        <li> <?php echo $error1['msg'];?> </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif;?>
           
        </div>
        <h1 class="header">Update Product Record</h1>
        <form id="SignUp Form" action = "update1.php" method = "POST">
            <label for="name">Name<input type="text" name="name" 
            value="<?php echo $_SESSION['userdata']['name'] ?>" required></label>
            <br>
            <label for="image">Username<input type="file" name="image" 
            value="<?php echo $_SESSION['userdata']['image'] ?>" required></label>
            <br>
            <label for="price">Email<input type="number" name="price" 
        value="<?php echo $_SESSION['userdata']['price'] ?>" required></label><br>
            <p><input type="submit" name="submit" value="Update Products"></p>
        </form>
        <p class="p2">Login Again With Your updated Product Values</p><br>
        <a href="manageProduct.php" class="a2" role="button" aria-pressed="true">View Product</a>
    </body>

</html>
