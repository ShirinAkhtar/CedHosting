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
        $role = isset($_POST['role'])?$_POST['role']:'';
        $password = isset($_POST['password'])?$_POST['password']:'';

        

    if (sizeof($error)==0) {
        $sql = 'SELECT * FROM user_signup WHERE
        `username` = "'.$username.'" AND `role` = "'.$role.'"  AND `password` = "'.$password.'" ';
        $result = $conn->query($sql);
   
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $_SESSION['userdata'] = array('userid'=>$row['id'],
                    'username'=>$row['username'],
                    'role'=>$row['role'],
                'email'=>$row['email']);
                if ($row['role'] == 'admin'|| $row['role'] == 'Admin') {
                    header('Location: admin1.php');
                }
                if ($row['role'] == 'user'|| $row['role'] == 'User') {
                    header('Location: user1.php');
                }
            }
        } else {
            $error[] = array('input' => 'form',
            'msg' => 'Invalid login details');
        }
        $conn->close();
    }
}


?>
<html>
    <head>
        <title>PHP Login form </title>
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
        <h1 class="header">Login</h1>
        <form id="SignUp Form" action = "login.php" method = "POST">
        <label for="username">Username<input type="text" name="username" required>
        </label><br>
        <label for="role">Role<input type="text" name="role" placeholder="Admin Or User" required>
        </label><br>
        <label for="password">Password<input type="text" name="password" required>
        </label><br>
        <p><input type="submit" name="submit" value="Login"></p>
        </form>
        <p class="p2">Want to Register?</p><br>
        <a href="signup.php" class="a2" role="button" aria-pressed="true">Sign Up</a>
    </body>

</html>



