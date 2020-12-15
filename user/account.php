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
require_once '../admin/class.php';
require 'header.php';
$error  = array();
$Registration = new Registration();

if (isset($_POST['submit'])) {
    $email = isset($_POST['email'])?$_POST['email']:'';
    $name = isset($_POST['name'])?$_POST['name']:'';
    $sign_up_date = isset($_POST['sign_up_date'])?$_POST['sign_up_date']:'';
    $mobile = isset($_POST['mobile'])?$_POST['mobile']:'';
    $mob = str_split($mobile);
    $password = isset($_POST['password'])?$_POST['password']:'';
    $rpassword = isset($_POST['rpassword'])?$_POST['rpassword']:'';
    $security_question = isset($_POST['security_question'])
    ?$_POST['security_question']:'';
    $security_answer = isset($_POST['security_answer'])?$_POST['security_answer']:'';
    if ($password != $rpassword) {
        $error[] = array('input'=>'password', 'msg'=>'password doesnt match');
    } elseif ($mob[1] == $mob[2] && $mob[2] == $mob[3] && $mob[3] == $mob[4] && $mob[4] == $mob[5]) {
        echo "<script>alert('All Similar number not allowed')</script>";
    } elseif ($security_question == "Choose") {
        echo "<script>alert('Please select the valid security question!')</script>";
    } else {
        $msg= $Registration->reg($email, $name, $mobile, $sign_up_date, $password, $security_question, $security_answer);
        $error[] = array('input'=>'password', 'msg'=>$msg);
        echo "<script>
            window.location.href='http://localhost/cedHosting/user/ver.php'
        </script>";
    }
}
?>
<!---header--->
<!---login--->
<div class="content">
    <!-- registration -->
    <div class="main-1">
        <div class="container">
            <div class="register">
            
            <form id="form" action = "account.php" method = "POST">
                 <div class="register-top-grid">
                    <h3>personal information</h3>
                     <div>
                        <span>Email<label>*</label></span>
                        <input type="text"  
                        pattern="^(?!.*\.{2})[a-zA-Z0-9.]+@[a-zA-Z]+(?:\.[a-zA-Z]+)*$"
                        size="30" name="email"  required> 
                     </div>
                     <div>
                        <span>Name<label>*</label></span>
                        <input type="text" name="name"
                        pattern="^[a-zA-Z]+( [a-zA-Z]+)*$" required> 
                     </div>                     
                     <div>
                         <span>Security Questions<label>*</label></span>
                         <select id="msg2" name="security_question" required>
                            <option selected >Choose</option>
                            <option value="0">
                                What was your childhood nickname?
                            </option>
                            <option value="1">
                                What is the name of your favorite childhood friend? 
                            </option>
                            <option value="2">
                                What is the middle name ?
                            </option>
                            <option value="3">
                                What was the last name of your third grade teacher?
                            </option>
                        </select> 
                     </div>
                     <div>
                        <span>Security Answer<label>*</label></span>
                        <input type="text" pattern="^[a-zA-Z]+( [a-zA-Z]+)*$" 
                        name="security_answer" required> 
                     </div>
                     <div>
                        <span>Mobile<label>*</label></span>
                        <input type="text" name="mobile" 
                        minlength="10" maxlength="11" 
                        oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                        pattern="^(|[0]){0,1}([0-9]{10})$" required> 
                     </div>
                     <div class="clearfix"></div>
                       <a class="news-letter" href="#">
                         <label class="checkbox">
                            <input type="checkbox" name="checkbox" checked="">
                            Sign Up for Newsletter</label>
                       </a>
                     </div>
                     <div class="register-bottom-grid">
                        <h3>login information</h3>
                        <div>
                            <span>Password<label>*</label></span>
                            <input type="password" id="pass"
                             minlength="8" maxlength="16"
                            name="password" 
                            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,10}$"
                            required/>
                            <span style="color: orange">
                            Note: Password Must Contain Uppercase-letter,
                            Lowercase-letter and a special-character</span>
                        </div>
                        <div>
                            <span>Confirm Password<label>*</label></span>
                            <input type="password" minlength="8"
                            maxlength="16" 
                            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,10}$"
                            name="rpassword" required/>
                            <span style="color: orange">
                            Note: Password Must Contain Uppercase-letter,
                            Lowercase-letter and a special-character</span>
                        </div>
                     </div>
                <div class="clearfix"></div>
                <div class="register-but">
                       <input type="submit" name="submit" value="submit">
                       <div class="clearfix"> </div>
                       <div id = "error">
                            <?php if (sizeof($error)>0 ) : ?>
                                <ul>
                                    <?php foreach($error as $error1): ?>
                                        <li><?php echo $error1['msg']; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif;?>
                        </div>
                   </form>
                   
                </div>
           </div>
         </div>
    </div>
<!-- registration -->
</div>
<!---footer--->
<?php require 'footer.php' ?>
