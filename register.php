<?php
include "db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Chat Keskustelu foorumi</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<style type="text/css">
		hr{
			height: 2px;
		}
	</style>
</head>
<body style="background-color: #F0EEEE">
	<div class="container">
		<div class="row">
			<h3  align="center"><font color="#E32F75">Keskustelu foorumi</font></h3>
				<hr color="#E32F75">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<div class="panel panel-success">
						<div class="panel-heading" align="center">
							Rekisteröinti lomake
						</div>
						<div class="panel-body">
							<form method="POST" action="register.php">
								<label>Käyttäjätunnus</label>
								<input type="text" name="name" placeholder="User Name" class="form-control">
								<label>Sähköposti</label>
								<input type="text" name="email" placeholder="User Email" class="form-control">
								<label>Asuinvaltio</label>
								<select name="country" class="form-control">
									<option disabled selected >Valitse asuinvaltio</option>
									<option value="Suomi">Suomi</option>
									<option value="Ruotsi">Ruotsi</option>
									<option value="Saksa">Saksa</option>
									<option value="Englanti">Englanti</option>
                                    <option value="Ranska">Ranska</option>
									<option value="Venäjä">Venäjä</option>
									<option value="Japani">Japani</option>
									<option value="USA">USA</option>
                                    <option value="Kiina">Kiina</option>
									<option value="Intia">Intia</option>
									<option value="Norja">Norja</option>
									<option value="Hollanti">Hollanti</option>
								</select>
								<label>Sukupuoli</label>
								<span style="margin-left: 40px; margin-right: 5px"> Mies </span> <input type="radio" name="gender" value="male"  style="margin-right: 15px;">
								Nainen <input type="radio" name="gender" value="female" style="margin-left: 5px;"><br>
								<label>Salasana</label>
								<input type="password" name="password" placeholder="Password" class="form-control">
						</div>
						<div class="panel-footer">
							<button type="submit" class="btn btn-success" name="Submit"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Rekisteröidy </button>
							<button type="reset" class="btn btn-danger" style="float: right;"> <span class="glyphicon glyphicon-refresh"></span>&nbsp;&nbsp;Nollaa</button>
						</div>
						<div class="panel-footer">
							<div align="center">
								Oletko jo rekisteröitunyt ? <a href="login.php"><font color="green"><b>Kirjaudu tästä sisään</b></font></a>
							</div>
						</div>
					  </form>
					</div>
				</div>
				<div class="col-sm-4"></div>
		</div>
	</div>

</body>
</html>

<?php

if (isset($_POST['Submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$country = $_POST['country'];
	$gender = $_POST['gender'];
	$password = $_POST['password'];

	$query = "INSERT INTO user SET name='$name', email='$email', country='$country', gender='$gender', password='$password', status='0' ";
	$run = mysqli_query($con, $query);
	if ($run) {
		header('location: login.php');
	}
	else{
		echo "Error Occured";
	}
}