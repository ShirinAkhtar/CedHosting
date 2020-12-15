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
//session_destroy();

require "../user/vendor/autoload.php";
$siteurl = "http://localhost/cedHosting/";
define('dbhost', 'localhost');
define( 'dbuser', 'root');
define( 'dbpass', "");
define( 'dbname', 'CedHosting');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 //session_destroy();           
/** 
 * Connection Class  
 * 
 * @category Template_Class
 * @package  Template_Class
 * @author   Author <author@domain.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/ 
 * */

class Databases
{
    public $conn;
    public $error;
    public function __construct()
    {
        $this->conn = new mysqli(dbhost, dbuser, dbpass, dbname);
        if (!$this->conn) {
            echo '' . mysqli_connect_error($this->conn);
        } else {
            echo "";
        }

    }
}

class Registration extends Databases
{
    public function reg($email, $name, $mobile, $sign_up_date, $password, $security_question, $security_answer )
    {
        $sql1 = "SELECT * FROM tbl_user WHERE  name='" . $name . "' ";
        $paswd = md5($password);
        $result = $this->conn->query($sql1);
        if ($result->num_rows > 0) {
            
           return "Users name already exists";

        } else {
            //$paswd = md5($pswd);
            $sql = $this->conn->query(" INSERT INTO tbl_user(`email`,`name`, `mobile`, `sign_up_date`, `password`,`security_question`,`security_answer`)
            VALUES('$email', '$name', '$mobile', NOW(), '$paswd', '$security_question', '$security_answer') " ) ;

            return "Registration Successful";
        }
    }

    public function regLogin($email, $password)
    {
        $paswd = md5($password);
        $sql = "SELECT * FROM `tbl_user` WHERE  `email` = '" . $email . "' AND  `password` ='" . $paswd . "' ";
        
            //if (`active` == 1) {
        $result = $this->conn->query($sql);
       
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $_SESSION['userdata'] = array(
                    'userid' => $row['id'],
                    'username' => $row['email'],
                    'dataname' => $row['name'] );
                    //'datamobile' => $row['mobile'],
                    //'sign_up_date' => $row['sign_up_date'],
                    //'password' => $row['password'],
                   // 'security_question' => $row['security_question'],
                   // 'security_answer' => $row['security_answer'] );
                if ($row['is_admin'] == 1) {
                    header('Location: http://localhost/cedHosting/admin/index.php');
                } elseif ($row['is_admin'] == 0) {
                    header('Location: http://localhost/cedHosting/user/index.php');
                }
            } 
        }
    }

    public function activate_acc($email)
    {
        $store = array();
        $sql = "SELECT * FROM tbl_user WHERE  email = '" . $email . "'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id =  $row['id'];
            $robo = 'shirinakhtar1998@gmail.com';
            
            
            $developmentMode = true;
            $mailer = new PHPMailer($developmentMode);
            
            try {
                $mailer->SMTPDebug = 2;
                $mailer->isSMTP();
            
                if ($developmentMode) {
                    $mailer->SMTPOptions = [
                        'ssl'=> [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                        ]
                    ];
                }
            
            
                $mailer->Host = 'ssl://smtp.gmail.com';
                $mailer->SMTPAuth = true;
                $mailer->Username = 'shirinakhtar1998@gmail.com';
                $mailer->Password = 'Shirin0808$';
                $mailer->SMTPSecure = 'tls';
                $mailer->Port = 465;
            
                $mailer->setFrom('shirinakhtar1998@gmail.com', 'Shirin Akhtar');
                $mailer->addAddress($email, 'Name of recipient');
            
                $mailer->isHTML(true);
                $mailer->Subject = 'PHPMailer Test';
                $mailer->Body = 'Hey <a href="http://localhost/cedHosting/user/verification.php?id=' . $id .'">Click here to verify';
            
                $mailer->send();
                $mailer->ClearAllRecipients();
                echo "MAIL HAS BEEN SENT SUCCESSFULLY";
            
            } catch (Exception $e) {
                echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
            }
        }
    }

    public function fetch_distinct($id)
    {
        $store = array();
        $sql = "SELECT * FROM tbl_user WHERE  `id` = '" . $id . "'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($store, $row);
            }
            return $store;
        } else {
            return 'error';
        }
    }
    public function activate($id)
    {
        $sql = "UPDATE `tbl_user` SET `email_approved`='1',`active`='1' WHERE `id` = '$id'";
        $result = $this->conn->query($sql);
        echo "<script>alert('Your Account has been verified!')</script>";
        header('refresh:0, url = http://localhost/cedHosting/user/index.php');
    }

}
class Product extends Databases
{
    public function addProduct($Subcategory, $link)
    {
         
        $sql = " INSERT INTO tbl_product(`prod_parent_id`,`prod_name`, `html`, `prod_launch_date`)
        VALUES('1','$Subcategory', '$link', NOW() ) ";
        $result1 = $this->conn->query($sql);

        $sql1 = "SELECT * FROM tbl_product";

        $result = $this->conn->query($sql1);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $_SESSION['product'] = array(
                'pro_id' => $row['id'],
                'prod_parent_id' => $row['prod_parent_id'],
                'prod_name' => $row['prod_name'],
                'link' => $row['html'],
                'prod_available' => $row['prod_available'],
                'prod_launch_date' => $row['prod_launch_date']
                ); 
                
            } 
           
        }
    }

    public function displayProduct() 
    {
        $store = array();
        $sql1 = "SELECT * FROM tbl_product";
        $result = $this->conn->query($sql1);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $_SESSION['product'] = array(
                'pro_id' => $row['id'],
                'prod_parent_id' => $row['prod_parent_id'],
                'prod_name' => $row['prod_name'],
                'link' => $row['html'],
                'prod_available' => $row['prod_available'],
                'prod_launch_date' => $row['prod_launch_date']
                ); 
                array_push($store, $row);
                
            } 
           
        } 
        return $store;
    }

    public function addProduct_descript($category, $Subcategory, $link, $month, $annual, $sku, $description)
    {
        $store = array();
        $sql = " INSERT INTO tbl_product(`prod_parent_id`,`prod_name`, `html`, `prod_launch_date`)
        VALUES('$category','$Subcategory', '$link', NOW() ) ";

        $result = $this->conn->query($sql);
        
        $last_id = $this->conn->insert_id;

        $sql1 = " INSERT INTO tbl_product_description(`prod_id`, `description`, `mon_price`, `annual_price`, sku)
        VALUES('$last_id', '$description','$month', '$annual', '$sku' ) ";
        
        $result1 = $this->conn->query($sql1);
        
    }

    public function deleteCategory($id) 
    {
        //$store = array();
        $sql1 = "DELETE FROM `tbl_product` WHERE `id` = '$id'";
        $result = $this->conn->query($sql1);
        if ($result === true) {
            return "Record deleted successfully";
        } else {
            return "Error deleting record: " . $this->conn->error;
        }
    }

    public function UpdateCategory($id, $prod_name, $link, $prod_available) 
    {
        //$store = array();
        $sql1 = "UPDATE `tbl_product` SET `prod_name`= '$prod_name' , `html` = '$link', `prod_available`= '$prod_available' WHERE `id`='$id' ";
        $result = $this->conn->query($sql1);
        
        return 'Record Updated Succesfully!';
    }

    public function displayProduct_description() 
    {
        $store = array();
        $sql = "SELECT * FROM `tbl_product_description` INNER JOIN `tbl_product` ON tbl_product_description.prod_id = tbl_product.id WHERE NOT `prod_parent_id` = 0";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
              /*  $_SESSION['product'] = array(
                'pro_id' => $row['id'],
                'prod_parent_id' => $row['prod_parent_id'],
                'prod_name' => $row['prod_name'],
                'link' => $row['link'],
                'prod_available' => $row['prod_available'],
                'prod_launch_date' => $row['prod_launch_date']
                ); */
                array_push($store, $row);
                
            } 
           
        } 
        return $store;
    }
    public function displayProduct_Parent($id)
    {
        $store=array();
        $sql = "SELECT prod_name FROM `tbl_product` WHERE `id`='$id'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_array()[0] ?? '';
        return $row;
    }

    public function deleteProduct($id) 
    {
        $sql = "DELETE tbl_product, tbl_product_description FROM `tbl_product_description` INNER JOIN `tbl_product` ON tbl_product_description.prod_id = tbl_product.id WHERE `prod_id`='$id'";
        $result = $this->conn->query($sql);
        //$sql1 = "DELETE FROM `tbl_product_description` WHERE `prod_id` = '$id'";
        //$result = $this->conn->query($sql1);
        // $sql1 = "DELETE FROM `tbl_product` WHERE `id` = '$id'";
        // $result = $this->conn->query($sql1);
        if ($result === true) {
            return "Record deleted successfully";
        } else {
            return "Error deleting record: " . $this->conn->error;
        }
    }

    public function product_descript_update($id, $Subcategory, $link, $month,  $annual, $sku, $description)
    {
        
        $sql = "UPDATE `tbl_product_description` SET  `mon_price`= '$month',`annual_price`= '$annual', `sku` = '$sku', `description` = '$description' WHERE `prod_id`='$id' ";
        $result = $this->conn->query($sql);
        
        $sql1 = "UPDATE `tbl_product` SET  `prod_name` = '$Subcategory', `html` = '$link'  WHERE `id`='$id' ";
        $result = $this->conn->query($sql1);
       
        return 'Record Updated Succesfully!';
    }
}

