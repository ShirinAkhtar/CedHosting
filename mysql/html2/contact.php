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
 require 'header.php'; ?>
    <div id="main">
        <div id="contact-form">
            <form action="" method="">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control">
                <label for="email">Email:</label>
                <input type="text" name="email" class="form-control">
                <label for="message">Message:</label>
                <textarea name="message" cols="45" rows="6" class="form-control">
                </textarea>
                <p class="submit">
                <input type="submit" name="submit" value="Submit">
                </p>
            </form>
        </div>
    </div>
<?php require 'footer.php'; ?>