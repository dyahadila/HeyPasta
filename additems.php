<?php
	session_start();
	include 'dbconnect.php';
	if(isset($_POST['checkout'])){
		$addpasta=$_POST['addpasta'];
		$addprice=$_POST['addprice'];
		$addimg=$_POST['addimg'];
		$addqty=$_POST['addqty'];
		if(isset($addqty) && isset($addimg) && isset($addprice) && isset($addpasta)){
			$regprice=preg_match("/^[1-9]\d*\.?\d*$/", $addprice);
			$regimg=preg_match("/^[a-zA-z].*\.(jpg|png|gif)$/", $addimg);
			$regqty=preg_match("/^[1-9]\d{0,2}$/", $addqty);
			if($regprice && $regqty && $regimg){
				$addquery="insert into menu values (' ', '".$addpasta."', '".$addprice."', '".$addimg."', '".$addqty."')";
				$dbcnx->query($addquery);
				$_SESSION['boolean3'] = 'true';
			} else {
				$_SESSION['boolean3'] = 'false';
			}
		}
		else{
			$_SESSION['boolean3'] = 'false';
			header("Location: ".$_SESSION['url']);
		}
	}
	unset($_GET['action']);
	header("Location: ".$_SESSION['url']);
?>