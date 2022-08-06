<?php

if(isset($_SESSION['unique_id'])){ //if user is loggedin in a browser
	header("location: users.php");	
}
?>


<?php
include_once "header.php";
?>
<body>
    
<div class="wrapper">
	<section class="form login">
		<header><span>TChatApp</span> Login</header>

		<form action="" method="">
			<div class="error-txt"></div>
			
			<div class="field input">
				<label>Email Address</label>
				<input type="text" name="email" placeholder="Enter your email" required>
			</div>
			<div class="field input">
				<label>Password</label>
				<input type="password" name="password" placeholder="Enter password" required>
				<i class="fas fa-eye"></i>
			</div>
			
			<div class="field button">
				<input type="submit" name="" value="Login">
			</div>
		</form>

		<div class="link">Not Registered? <a href="signup.php">Sign Up Now</a></div>
		
	</section>
	
</div>	


<script src="javascript/pass-show-hide.js"></script>
<script src="javascript/login.js"></script>

</body>
</html>