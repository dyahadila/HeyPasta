<?php
session_start();
include 'dbconnect.php';
	if(isset($_POST['signup'])){
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		if(isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['password'])){
			if($_POST['fullname'] != "" && $_POST['email'] != "" && $_POST['password'] != ""){
				$regexemail=preg_match("/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,4}$/", $email);
				if($regexemail){
					$query1= "select * from authorized_user where username='$email'";
					$result1=$dbcnx->query($query1);
					if($result1->num_rows>0){
						$_SESSION['boolean']='false';
					}
					else{
						$query2 = "INSERT INTO authorized_user (fullname,username,password) VALUES ('$fullname','$email','$password')";
						$result2 = $dbcnx->query($query2);
						if($result2) {
							$id = mysqli_insert_id($dbcnx);
							$_SESSION['valid_user']=$id;
						}
					}
				}
				else{
					$_SESSION['boolean']='boom';
				}
			}
			else{
				$_SESSION['boolean']='boom';
			}	
		}	
	}

	header('Location: '.$_SESSION['url']);
?>