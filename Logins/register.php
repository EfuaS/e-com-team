


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v4 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<div class="image-holder">
					<img src="images/registration-form-4.jpg" alt="">
				</div>
				<form method="POST" action="registerprocess.php">
					<h3>Sign Up</h3>
					<div class="form-holder active">
						<input type="text" name="name" placeholder="fullname" class="form-control" autocomplete="false">
					</div>
                    <div class="form-holder">
                        <input type="city" name="city" placeholder="city" class="form-control" autocomplete="false">
                    </div> 
					<div class="form-holder">
						<input type="contact" name="contact"  placeholder="contact" class="form-control" autocomplete="false">
					</div>
                    <div class="form-holder">
                        <input type="email" name="email" placeholder="email" class="form-control" autocomplete="false">
                    </div><br>
                    <div class="form-holder">
						<input type="password" name="pass" placeholder="Password" class="form-control" style="font-size: 15px;" autocomplete="false">
					</div><br>
                    <div class="form-holder">
                        <input type="password" name="cpass" placeholder="Confirm Password" class="form-control" style="font-size: 15px;" autocomplete="false">
                    </div><br>  
                    <div class="form-holder">
                        <label for="img"><h4>Select profile photo:</h4></label>
                        <input type="file" id="img" name="img" accept="image/*"></input><br>
                    </div><br>
                   
                    <div class="form-holder">
                        <input type="country" name="country" placeholder="country" class="form-control" style="font-size: 15px;" autocomplete="false">
                    </div><br>  
					<div class="checkbox">
						<label>
							<input type="checkbox" checked> I agree all statement in <a href="#">Terms & Conditions</a>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-login">
						<button type= "submit" name= "submitform">Register</button>
						<p>Already Have account? <a href="login.php">Login</a></p>
					</div>
				</form>
			</div>
		</div>

		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>