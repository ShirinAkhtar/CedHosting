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
require '../admin/class.php';
 
$error  = array();
$message = '';
$Registration = new Registration();
if (isset($_POST['submit'])) {
    $email = isset($_POST['email'])?$_POST['email']:'';
    $password = isset($_POST['password'])?$_POST['password']:'';
    $msg = $Registration->regLogin($email, $password);
    if ($msg) {
        header('refresh:0 url= index.php');
    }
    $error[] = array('input'=>'password', 'msg'=>$msg);
}  

if (isset($_SESSION['userdata'])) {
     //header('Location:http://localhost/cedHosting/user/index.php');
}
require 'header.php';
?>
<!---login--->
        <div class="content">
            <div class="main-1">
                <div class="container">
                    <div class="login-page">
                        <div class="account_grid">
                            <div class="col-md-6 login-left">
                                <h3>new customers</h3>
                                <p>By creating an account with our store,
                                you will be able to move through the checkout 
                                process faster, store multiple shipping addresses,
                                view and track your orders in your
                                account and more.</p>
                                <a class="acount-btn" href="account.php">
                                Create an Account</a>
                            </div>
                            <div class="col-md-6 login-right">
                                <h3>registered</h3>
                                <p>If you have an account with us, please log in.</p>
                                <form id="form" action = "login.php" method = "POST">
                                <div>
                                    <span>Email Address<label>*</label></span>
                                    <input type="text" name="email"> 
                                </div>
                                <div>
                                    <span>Password<label>*</label></span>
                                    <input type="password" name="password"> 
                                </div>
                                <a class="forgot" href="#">Forgot Your Password?</a>
                                <input type="submit" name="submit" value="Login">
                                <!--<div id = "error">
                                    <?php //if (sizeof($error)>0 ) : ?>
                                        <ul>
                                            <?php //foreach($error as $error1): ?>
                                          <li><?php //echo $error1['msg']; ?></li>
                                        </ul>
                                    <?php //endif;?>
                                </div>-->
                                </form>
                                </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- login -->
<!---footer--->
<?php require 'footer.php' ?>
<!---footer--->
