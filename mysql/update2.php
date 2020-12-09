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
    $username = isset($_POST['username'])?$_POST['username']:'';
    $password = isset($_POST['password'])?$_POST['password']:'';
    $repassword = isset($_POST['repassword'])?$_POST['repassword']:'';
    $email = isset($_POST['email'])?$_POST['email']:'';

    if ($password != $repassword) {
        $error[] = array('input'=>'password', 'msg'=>'password doesnt match');
    }

    if (sizeof($error)==0) {
        $sql = 'SELECT * FROM user_signup WHERE
        `username` = "'.$username.'" AND `password` = "'.$password.'" AND `email` = "'.$email.'" ';
        $result = $conn->query($sql);
   
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if($row['role' == 'User']||$row['user'])
                $_SESSION['userdata'] = array('userid'=>$row['id'],
                    'username'=>$row['username'],
                    'email'=>$row['email']);
            }
        }
    } 

    if (sizeof($error)==0) {
        $id = $_SESSION['userdata']['userid'];
        $sql="UPDATE user_signup SET `username`='".$_POST['username']."', `email`='".$_POST['email']."' WHERE  `id`='".$id."' " ;
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
        <h1 class="header">Update Record</h1>
        <form id="SignUp Form" action = "update.php" method = "POST">
            <label for="username">Username<input type="text" name="username" value="<?php echo $_SESSION['userdata']['username'] ?>" required></label>
            <br>
            <label for="email">Email<input type="text" name="email" value="<?php echo $_SESSION['userdata']['email'] ?>" required></label><br>
            <p><input type="submit" name="submit" value="Update"></p>
        </form>
        <p class="p2">Login Again With Your updated Values</p><br>
        <a href="Login.php" class="a2" role="button" aria-pressed="true">Login</a>
    </body>

</html>
