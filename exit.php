<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2015/8/20
 * Time: 14:47
 */
session_start();
session_unset();
session_destroy();
header("location:index.php ");
?>
