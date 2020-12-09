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
session_start();
?>

<!DOCTYPE html>  
 <html>  
    <head>    
    </head>  
    <body>  
        <?php  
            $sql = 'SELECT * FROM addproduct';
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
                    $_SESSION['userdata'] = array('id'=>$row['id'],
                    'name'=>$row['name'],
                    'image'=>$row['image'],
                'price'=>$row['price']);
        ?>  
                
                <form method="post" action="product.php?action=add&id=<?php echo $row["id"]; ?>" >  
                <img src="images/<?php echo $row["image"]; ?>" />  
                <h3 class='title' ><?php echo $row["name"]; ?></h3>  
                <span>$ <?php echo $row["price"]; ?></span>  
                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                <a href="update1.php" class="edit_btn" >Edit</a>
                <a  href="delete1.php" 
                onClick="return confirm('Are you sure you want to delete?')" 
                class="del_btn">Delete</a> 
                 
				</form> 
				
                <?php  
                     }  
				}
				 
                ?> 
                <p class="p2">Want to Add?</p><br>
            <a href="addproduct.php" class="a2" role="button" aria-pressed="true">Add Product</a>
                </body>  
            </html>
        