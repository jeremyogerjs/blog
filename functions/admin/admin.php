<?php 
$dbh = pdo_connect_mysql();

// request to verify login and password
if(isset($_POST['verify'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = 'SELECT * FROM users WHERE (username = :username)';

	$values = [':username' => $username];

try {
		$res = $dbh->prepare($query);
		$res->execute($values);

		$row = $res->fetch();

		$isPasswordCorrect = password_verify($password, $row['password']);

		if($isPasswordCorrect) {

			//start session
			session_start ();

			// on enregistre les paramètres de notre visiteur comme variables de session ($login et $password) 
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['password'] = $_POST['password'];

			header("location:index.php?action=memberarea");
			echo("fhrif");
		}
		else
		{
			echo '<script type="text/javascript">alert("Your login or your password is incorrect!");
			</script>';

			header("location:index.php?action=auth");
		}

	}
catch (PDOException $e)
	{
		echo 'Query error.';
		die();
	}
}
	?>
