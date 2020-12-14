<?php
require_once '../admin/class.php';
$reg = new Registration();

if (isset($_GET['id']) && $_GET['id'] != "") {
    $id = $_GET['id'];
    $store = $reg-> fetch_distinct($id);
    if ($store != 'error') {
        foreach ($store as $key=>$value) {
            $id = $value['id'];
            $reg-> activate($id);
        }
    }
}
?>