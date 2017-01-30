<?php

	session_start();
	include 'dbconnect.php';

	if(isset($_POST['updatecheckout'])){
		$updateprice=$_POST['updateprice'];
		$updatequantity=$_POST['updateqty'];
		$ID=$_SESSION['updateID'];


		$newquantity= $updatequantity + $_SESSION['updateqty'];
		$newprice=$_POST['updateprice'];
			
		$query="select * from menu where ID='$ID'";
		$result=$dbcnx->query($query);

		if($result->num_rows>0){
			$row=$result->fetch_assoc();
			$query2="update menu set quantity='$newquantity', menu_price='$newprice' where ID='$ID'";
			$dbcnx->query($query2);
		}
	}
	unset($_SESSION['updateID']);
	unset($_SESSION['updateqty']);
	unset($_SESSION['updateprice']);
	header("Location: adminorderpage.php");


?>