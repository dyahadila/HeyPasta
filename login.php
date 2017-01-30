<?php

	session_start();
	include 'dbconnect.php';
	if(isset($_POST['login'])){
		if(isset($_POST['email'])&&isset($_POST['password'])){
			$email=$_POST['email'];
			$password=$_POST['password'];
			$url=$_SESSION['url'];
			$query= 'select * from authorized_user '."where username='$email' "." and password='$password'";

			$result=$dbcnx->query($query);
			
			if($result->num_rows>0){
				$row=$result->fetch_assoc();
				$_SESSION['valid_user']=$row['ID'];
			} else{
				$_SESSION['boolean2'] = 'false';
			}

			if($row['ID']==1)
				header("Location: adminorderpage.php");
			else
				header("Location: ".$url);
		}
	}
?>