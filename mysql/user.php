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
require 'header.php';
    require 'config.php';
    session_start();

    echo '<h1 class="header">Welcome User</h1>
    <p class="header">'.$_SESSION['userdata']['username'].'</p>';
?>
