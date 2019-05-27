<?php
$conn = mysqli_connect("localhost", "root", "", "chat");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Chat Keskustelu foorumi</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<style type="text/css">
		hr{
			height: 2px;
		}
	</style>

</head>
<body style="background-color: #F0EEEE">

	<div class="container">
		<div class="row" style="margin-top: 50px">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<h3  align="center"><font color="#E32F75">Keskustelu foorumi</font></h3>
				<hr color="#E32F75">
				<form method="post" action="">
					<div class="panel panel-success">
						<div class="panel-heading" align="center"> Kirjautuminen sisään </div>
						<div class="panel-body">
							<div class="form-group">
									<input type="text" name="email" placeholder="Sähköposti" class="form-control">
							</div>
							<div class="form-group">
									<input type="password" name="password" placeholder="Salasana" class="form-control">
							</div>
							<div class="form-group" align="center">
								<button type="submit" class="btn btn-success" name="Submit"> Kirjaudu sisään
                               </button>
							</div>

						</div>
						<div class="panel-footer">
							<?php
            if (isset($_GET['error'])) 
							{
		    echo "<font color='red'><p align='center'><b>".@$_GET['error']. "</b></p>";
							} 
			if (isset($_GET['logout'])) 
							{
		    echo "<font color='green'> <p align='center'><b>".@$_GET['logout']. "</b></p>";
							} 

			if (isset($_POST['Submit'])) {
			    
			    $email = $_POST['email'];
			    $password = $_POST['password'];

				$result = mysqli_query($conn , "SELECT * from user where email='$email' and password='$password'");
					while($row = mysqli_fetch_assoc($result))
					{
						$_SESSION['email'] = $row['email'];
						$_SESSION['password'] = $row['password'];
						$_SESSION['name'] = $row['name'];
					}
					if(mysqli_num_rows($result)>0){			
						$query = mysqli_query($conn, "UPDATE user SET status = '1' WHERE email = '$email' ");
						header('location: index.php');
						}
					else {
						echo "<font color='red'><p align='center'>Sähköposti ja salsana virheellinen</p>";
						}	
                          }

                          ?>
						</div>
						<div class="panel-footer">
							<div align="center">
								Eikä sinulla ole vielä tunnusta? <a href="register.php"><font color="red"><b>rekisteröidy tästä</b></font></a>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>

</body>
</html>
