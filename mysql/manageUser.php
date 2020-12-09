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
require 'header.php';
session_start();
?>

<!DOCTYPE html>  
 <html>  
    <head>    
    </head>  
    <body>  
        <?php  
            $sql = 'SELECT * FROM user_signup';
            $result = $conn->query($sql);
        if ($result->num_rows > 0) {

            ?>
            <table>
        <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Email Address</th>
                    <th colspan="2">Action</th>
                </tr>
        </thead>
            <?php
            while ($row = $result->fetch_assoc()) {
                if ($row["role"] == "user"||$row["role"] == "User") {
                   
                $_SESSION['userdata'] = array('userid'=>$row['id'],
                    'username'=>$row['username'],
                    'email'=>$row['email']);
                    ?>  
                
        <tr>
            <td> <?php echo $row["id"]; ?></td>
            <td><?php echo $row["username"];?></td>
            <td><?php echo $row["role"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td>
                <a href="update2.php" class="edit_btn" >Edit</a>
            </td>
            <td>
                <a  href="delete.php" 
            onClick="return confirm('Are you sure you want to delete?')" 
                class="del_btn">Delete</a>
            </td>
        </tr>


                <?php  }
            }  
        }?> 
        </table>
    </body>  
</html>
        