	<?php
	session_start();
	$_SESSION['url']=$_SERVER['REQUEST_URI'];

		echo "<header>";
		
		if(isset($_SESSION['valid_user'])){
	?>
		<form action="logout.php" id="logout" >
			<button id="signOutButton" class="sign" form="logout">Sign Out</button>
			<label id="helloUser"><a href="<?php
			if($_SESSION['valid_user']==1){
				echo '#"'.">";
				echo "Hello, Admin ";
			}else{
				echo 'userprofile.php"'.">";
				echo "My Profile ";
			}
			?><i class="fa fa-user" aria-hidden="true"></i></a></label>
		</form>

	<?php
		}
		else{
			echo '<button id="signUpButton" class="sign">Sign Up</button>';
			echo '<button id="signInButton" class="sign">Sign In</button>';
		}
	?>
		<div id="heypasta"><a href="#">HeyPasta!
			<img src="pasta.png" width="90" height="65" style="vertical-align:middle"></a>
		</div>
		<nav>
			<ul>
				<ul>
				<li><a href="index.php">Home <i class="fa fa-home" aria-hidden="true"></i></a></li>
				<li id="ordernow"><a href="
<?php
if (isset($_SESSION['valid_user'])&&($_SESSION['valid_user']==1)){
	echo "adminorderpage.php";}
else{
	echo "ordernow.php";
}
?>">Order Now <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
			</ul>
			</ul>
		</nav>
		<div id="loginModal" class="modal">
			<div class="modalContent">
				<div class="modalHeader">
					<i class="fa fa-times" aria-hidden="true"></i>
					<h3>Login</h3>
				</div>
				<div class="modalBody">
					<form action="login.php" method="post">
						<i class="fa fa-envelope" aria-hidden="true"></i>
						<input type="text" name="email" placeholder="Email" class="input-field">
  						<br>
  						<i class="fa fa-lock" aria-hidden="true"></i>
  						<input type="password" name="password" placeholder="Password" class="input-field">
 						<br><br>
 						<input type="submit" name="login" value="Sign In" class="input-button">
					</form>
					<?php
					if(isset($_SESSION['boolean2'])){
						if($_SESSION['boolean2'] == 'false'){
							?>
							<script type="text/javascript">
							var modal = document.getElementById("loginModal");
							modal.style.display = "block";
							</script>
							<?php
							echo '<p style="font-size:12px; color:red;">Invalid Email or Password.</p>';
							unset($_SESSION['boolean2']);
						}
					}
					?>
				</div>	
				<div class = "modalFooter">
					<p id="question">Not a User?&nbsp</p>
					<p id="signUp">Sign Up!</p>
				</div>
			</div>
		</div>
		<div id="signupModal" class="modal">
			<div class="modalContent">
				<div class="modalHeader">
					<i class="fa fa-times" aria-hidden="true" id="closeSignUp"></i>
					<h3>Sign Up</h3>
				</div>
				<div class="modalBody">
					<form method="post" action="signup.php">
						<i class="fa fa-user" aria-hidden="true"></i>
						<input type="text" name="fullname" placeholder="Full Name" class="input-field">
						<br>
						<i class="fa fa-envelope" aria-hidden="true"></i>
						<input type="text" name="email" placeholder="Email" class="input-field" id="email">
  						<br>
  						<i class="fa fa-lock" aria-hidden="true"></i>
  						<input type="password" name="password" placeholder="Password" class="input-field" id="password">
 						<br><br>
 						<input type="submit" value="Sign Up!" class="input-button" id="signUpModalButton" name="signup">
					</form>
					<?php
					if(isset($_SESSION['boolean'])){
						if($_SESSION['boolean'] == 'false'){
							?>
							<script type="text/javascript">
							var modalSignUp = document.getElementById("signupModal");
							modalSignUp.style.display = "block";
							</script>
							<?php
							echo '<p style="font-size:12px; color:red;">Email has been used by another user.</p>';
							unset($_SESSION['boolean']);
						}
						if($_SESSION['boolean'] == 'boom'){?>
							<script type="text/javascript">
							var modalSignUp = document.getElementById("signupModal");
							modalSignUp.style.display = "block";
							</script>
							<?php
							echo '<p style="font-size:12px; color:red;">Please fill all fields according to the format.</p>';
							unset($_SESSION['boolean']);
						}
					}
					?>
				</div>
			</div>
		</div>
	</header>