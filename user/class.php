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
require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$siteurl = "http://localhost/cabride/";
define( 'dbhost', 'localhost');
define( 'dbuser', 'root');
define( 'dbpass', "");
define( 'dbname', 'CedHosting');
session_start();
            
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
            $sql = $this-> conn-> query ( " INSERT INTO tbl_user(`email`,`name`, `mobile`, `sign_up_date`, `password`,`security_question`,`security_answer`)
            VALUES('$email', '$name', '$mobile', NOW(), '$paswd', '$security_question', '$security_answer') " ) ;

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
            
                $mailer->setFrom('shirinakhtar1998@gmail.com', 'Name of sender');
                $mailer->addAddress($email, 'Name of recipient');
            
                $mailer->isHTML(true);
                $mailer->Subject = 'PHPMailer Test';
                $mailer->Body = 'This is a "http://localhost/cedHosting/verify.php?email=' . md5( $email ) . '"';
            
                $mailer->send();
                $mailer->ClearAllRecipients();
                echo "MAIL HAS BEEN SENT SUCCESSFULLY";
            
            } catch (Exception $e) {
                echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
            }
            return "Registration Successful";
        }
    }

    public function regLogin($email, $password)
    {
        $paswd = md5($password);
        //if ($Uname == 'admin'|| $Uname == 'Admin'|| $Uname == 'ADMIN')
        //{
        
        $sql = "SELECT * FROM tbl_user WHERE  email = '" . $email . "' AND password ='" . $paswd . "' ";
        //if (`active` == 1) {
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $_SESSION['userdata'] = array(
                'userid' => $row['id'],
                'username' => $row['email'],
                'dataname' => $row['name'],
                'datamobile' => $row['mobile'],
                'sign_up_date' => $row['sign_up_date'],
                'password' => $row['password'],
                'security_question' => $row['security_question'],
                'security_answer' => $row['security_answer']
                ); 
                
            } 
            return true;
        }
        //} 
    }
}