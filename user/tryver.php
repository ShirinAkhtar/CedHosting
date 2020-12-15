<?php 
require '../admin/class.php';
require 'header.php';
$Registration = new Registration();
if (isset($_POST['email_confirm'])) {
    $email = $_POST['email'];
    $store = $Registration->activate_acc($email);
    echo "<script>
    window.location.href='http://localhost/cedHosting/user/login.php'
    </script>";
}
?>
    <!---header--->
        <!---login--->
            <div class="content">
                <div class="main-1">
                    <div class="container">
                        <div class="login-page">
                            <div class="account_grid">
                            <div class="col-md-6 login-right">
                                    <h3>E-mail Verfication</h3>
                                    <form method="post">
                                      <div>
                                      <span>Enter Your E-Mail<label>*</label></span>
                                      <input type="text" name="email">
                                      </div>
                                      <div class="text-center">
                                        <input type="submit"  name="email_confirm" value="Mail"/>
                                    </div>
                                    </form>
                                </div>	
                                <div class="col-md-6 login-right">
                                <h3>Mobile Verfication</h3>
                                <form method="post">
                                      <div>
                                        <span>Enter Your Mobile<label>*</label></span>
                                        <input type="text" name="mobile"> 
                                      </div>
                                      <div class="text-center">
                                        <input type="submit" name="mobile_confirm" value="Mobile"/>
                                    </div>
                                    </form>
                                </div>	
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- login -->
        <?php require 'footer.php';?>