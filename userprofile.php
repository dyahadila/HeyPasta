<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Amita" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

	<style type="text/css">

		table{
			margin: auto;
			margin-top: 40px;
			margin-bottom: 40px;
			border:0.5px solid;
			border-spacing: 0;
			border-radius: 6px;
			width:35%;
		}
		thead{
			background-color: #34495E;
			width: 100%;
		}
		thead th{
			border-radius: 5px;
			border-bottom-left-radius: 0px;
			border-bottom-right-radius: 0px;
			height:75px;
		}
		thead p{
			vertical-align: middle;
			font-size: 24px;
			color: white;
			float: left;
			padding: 0px;
			margin-left: 20px;
			font-family:"Times New Roman";
		}
		td{
			height: 30px;
			padding-left: 12px;
			padding-right: 9px;
			border:none;
			border-spacing: 0px;
		}
		td h4{
			color: #aaccff;
			padding: 0px;
			margin:15px;
		}


		.input{
			width:100%;
			border-radius: 2.5px;
			height:28px;
			padding: 0px;
			margin-top: 9px;
			margin-bottom: 9px;
			font-size: 13px;
			padding-left: 6px;
			border:0.5px;
			border-style: solid;
		}
		#firstname, #lastname{
			margin-top: 30px;
		}
		#submitform{
			background-color: #34495E;
			margin: auto;
		}
		#delnote{
			margin-bottom: 30px;
		}
		.section{
			border-bottom: 1px solid;
			border-top: 1px solid;
			background-color: #222233;
		}
		#edit a{
			float: right;
			color:#aaccff;
			margin-right: 15px;
		}
		.userinfo {
			position: absolute;
    		left: 570px;
		}
		#editprofile{
			background-color: #34495E;
			margin: auto;
			text-decoration: none;
			font-size: 10px;
		}
		#userprofile{
			font-size: 14px;
		}
		#userprofile p{
			margin-left: 15px;
		}


		label > input{ /* HIDE RADIO */
  			visibility: hidden; /* Makes input not-clickable */
  			position: absolute; /* Remove input from document flow */
		}
		label > input + i,label > input + img{ /* IMAGE STYLES */
  			cursor:pointer;
  			opacity: 0.7;
  			margin-top:30px;
  			margin-bottom: 30px;
		}

		label > input:checked + i, label > input:checked + img{ /* (RADIO CHECKED) IMAGE STYLES */
			 transform: scale(1.1, 1.1);
             -webkit-transform: scale(1.1, 1.1);
             opacity:1.0;
		}
		input+i:hover, input+img:hover{
    		transform: scale(1.1, 1.1);
            -webkit-transform: scale(1.1, 1.1);
            cursor:pointer;
            margin: auto;
		}

		tfoot{
			background-color: #F2F5FA;
		}
		tfoot td{
			height:70px;
			width:100%;
			border-radius: 5px;
			width:100%;
			border-top-right-radius: 0px;
			border-top-left-radius:0px;
			border-top: 0.1px solid;
		}
	</style>
</head>
<body>
	<?php
include 'header.php';
?>


	<div id="form">
			<table border="1" id="userprofile">
			<?php
				include 'dbconnect.php';
				$id = $_SESSION['valid_user'];

				$query1= 'select * from authorized_user '."where ID='$id' ";
				$result1=$dbcnx->query($query1);
				if($result1->num_rows>0){
					$row1=$result1->fetch_assoc();
				}

				$query2= 'select * from user_info '."where ID='$id' ";
				$result2=$dbcnx->query($query2);
				if($result2->num_rows>0){
					$row2=$result2->fetch_assoc();
					$boolean = 'true';
				} else{
					$boolean = 'false';
				}
			?>
				<thead>
					<tr>
						<th colspan="4"><p>My Profile</p></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="4" class="section"><h4>Customer Information </h4></td>
					</tr>
					<tr>
						<td colspan="4"><p>Full Name: <span class="userinfo"><?php echo $row1['fullname']; ?></span></p></td>
					</tr>
					<tr>
						<td colspan="4"><p>Email: <span class="userinfo"><?php echo $row1['username']; ?></span></p></td>
					</tr>
					<tr>
						<td colspan="4"><p>Phone Number: 
							<span class="userinfo">
								<?php
									if($boolean == 'true'){
										echo $row2['phone'];
									} else{
										echo 'No phone number entered.';
									}
								?>	
							</span></p> </td>
					</tr>
					<tr>
						<td colspan="4"><p>Address: 
							<span class="userinfo">
								<?php
									if($boolean == 'true'){
										echo $row2['address'];
									} else{
										echo 'No address entered.';
									}
								?>
						</span></p></td>
					</tr>
					<tr>
						<td colspan="4"><p>State/Region: 
							<span class="userinfo">
								<?php
									if($boolean == 'true'){
										echo $row2['region'];
									} else{
										echo 'No state/region entered.';
									}
								?>
							</span></p></td>
					</tr>
					<tr>
						<td colspan="4"><p>Postal Code: 
							<span class="userinfo">
								<?php
									if($boolean == 'true'){
										echo $row2['zipcode'];
									} else{
										echo 'No zip code entered.';
									}
								?>
							</span></p></td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="4"><a href="edituserprofile.php" class="sign" id="editprofile">Edit Profile</a></td>
					</tr>
				</tfoot>
			</table>
	</div>


	<footer>
		<p> Copyright &copy; 2016 HeyPasta Singapore Pte Ltd</p>
		<nav id="navbottom">
			<ul>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Contact Us</a></li>
				<li><a href="#">Feedback</a></li>
			</ul>
		</nav>
	</footer>
</body>
</html>