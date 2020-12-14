<?php 
require '../admin/class.php';
require 'header.php';
$Registration = new Registration();
if (isset($_POST['email_confirm'])) {
    $email = $_POST['email'];
    $store = $Registration->activate_acc($email);
    echo "<script>window.location.href='http://localhost/cedHosting/user/login.php'</script>";
}
?>
<form method="post">
    <input type="email" name="email">
    <input type="text" name="mobile">
    <input type="submit" name="email_confirm" value="Mail"/>
    <input type="submit" name="mobile_confirm" value="Mobile"/>
</form>
<?php require 'footer.php';?>
