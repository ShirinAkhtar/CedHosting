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
$siteurl = "http://localhost/cabride/";
define('dbhost', 'localhost');
define('dbuser', 'root');
define('dbpass', "");
define('dbname', 'CedHosting');
/** Connection Class  */
class Databases
{
    public $conn;
    public $error;
    public function __construct()
    {
        $this->conn = new mysqli(dbhost, dbuser, dbpass, dbname);
        if (!$this->conn)
        {
            echo '' . mysqli_connect_error($this->conn);
        }
        else
        {
            echo "";
        }

    }
}

class Registration extends Databases
{
    public function reg($email, $name, $mobile, $sign_up_date, $password, $security_question, $security_answer)
    {
        $sql1 = "SELECT * FROM tbl_user WHERE  name='" . $name . "' ";
        $paswd = md5($password);
        $result = $this->conn->query($sql1);
        if ($result->num_rows > 0)
        {
           return "Users name already exists";
        }
        else
        {
            //$paswd = md5($pswd);
            $sql = $this->conn->query("INSERT INTO tbl_user(`email`,`name`, `mobile`, `sign_up_date`, `password`,`security_question`,`security_answer`)
            VALUES('$email', '$name', '$mobile', NOW(),'$paswd','$security_question','$security_answer')");
            return "Registration Successful";
        }
    }

    public function regLogin($email, $password)
    {
        //$paswd = md5($pswd);
        //if ($Uname == 'admin'|| $Uname == 'Admin'|| $Uname == 'ADMIN')
        //{
        $sql = "SELECT * FROM tbl_user WHERE  email = '" . $email . "' AND password ='" . $password . "' ";
    
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
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
    }
}