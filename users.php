<?php
include_once "./php/auto-logout.php";
?>


<?php
include_once "header.php"; 
?>
<body> 
    
<div class="wrapper wrapper2">
<!-- <section class="form">
		<header><span>TChatApp</span></header>
</section> -->
	<section class="users">
	<div class="app">TChatApp</div>
		<header>
			<?php
				include_once "./php/dbconn.php";
				$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
				if(mysqli_num_rows($sql) > 0){
					$row = mysqli_fetch_assoc($sql);
				}
			?>

			<div class="content">
				<img src="./php/images/<?php echo $row['img']?>" alt="Dp">
				<div class="details">
					
					<span><?php echo $row['firstname']. " ". $row['lastname'];?></span>
					<p><?php echo $row['status']?></p>
				</div>
			</div>
			<a href="php/logout.php?logout_id=<?php echo $row['unique_id'] ?>" class="logout">Logout</a>
		</header>
		<div class="search"> 
			<span class="text">Select a user to chat</span>
			<input type="text" placeholder="Enter name to search...">
			<button><i class="fas fa-search"></i></button>
		</div>
		<div class="online-users">

		<!-- here online users appears -->
			<!-- <a href="#">
				<div class="online-u"> 
					<img class="online-img" src="a.jpg" alt="">
				</div>
				<div class="online-dot">
					<i class="fas fa-circle"></i>
				</div>
			</a> -->


		</div>
		<div class="users-list">
			<!-- here the user list sows by running the script -->
			
		</div>

		
	</section>
	
</div>


<script src="javascript/user-search.js"></script>

<!-- <script src="javascript/users.js"></script> -->

</body>
</html>