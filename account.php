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
require 'class.php';
require 'header.php';
    $error  = array();
    $Registration = new Registration();

if (isset($_POST['submit'])) {
    $email = isset($_POST['email'])?$_POST['email']:'';
    $name = isset($_POST['name'])?$_POST['name']:'';
    $sign_up_date = isset($_POST['sign_up_date'])?$_POST['sign_up_date']:'';
    $mobile = isset($_POST['mobile'])?$_POST['mobile']:'';
    $password = isset($_POST['password'])?$_POST['password']:'';
    $rpassword = isset($_POST['rpassword'])?$_POST['rpassword']:'';
    $security_question = isset($_POST['security_question'])?$_POST['security_question']:'';
    $security_answer = isset($_POST['security_answer'])?$_POST['security_answer']:'';
    if ($password != $rpassword) {
        $error[] = array('input'=>'password', 'msg'=>'password doesnt match');
    } else {
        $msg= $Registration->reg($email, $name, $mobile, $sign_up_date, $password, $security_question, $security_answer);
        $error[] = array('input'=>'password', 'msg'=>$msg);
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
						<input type="text" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" size="30" name="email"  required> 
					 </div>
					 <div>
						<span>Name<label>*</label></span>
						<input type="text" name="name"  pattern="^[a-zA-Z]+( [a-zA-Z]+)*$" required> 
					 </div>                     
                     <div>
						 <span>Security Questions<label>*</label></span>
						 <input type="text" name="security_question" onkeypress="return /[a-z]/i.test(event.key)" required> 
                     </div>
                     <div>
                         <span>Security Answer<label>*</label></span>
                         
						 <input type="text" pattern="^[a-zA-Z]+( [a-zA-Z]+)*$" name="security_answer" required> 
                     </div>
                     <div>
						 <span>Mobile<label>*</label></span>
						 <input type="text" name="mobile" minlength="10" maxlength="11" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required> 
                     </div>
					 <div class="clearfix"></div>
					   <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
					   </a>
					 </div>
				     <div class="register-bottom-grid">
                        <h3>login information</h3>
                        <div>
                            <span>Password<label>*</label></span>
                            <input type="password" minlength="8" maxlength="16" name="password" required/>
                        </div>
                        <div>
                            <span>Confirm Password<label>*</label></span>
                            <input type="password" minlength="8" maxlength="16" name="rpassword" required/>
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
<!-- login -->
<!---footer--->
<?php require 'footer.php' ?>
<!---footer--->