<?php 
require_once('connection.php');
if(session_destroy()){
    header("location: login.php");
}
?>
