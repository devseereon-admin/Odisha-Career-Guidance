<?php
error_reporting(0);
session_start(); 
require_once 'dbcon.php';
if(isset($_SESSION['billid'])){
	
	$billid=$_SESSION['billid'];
}else{
	$_SESSION['billid']=time();
	$billid=$_SESSION['billid'];
}

?>