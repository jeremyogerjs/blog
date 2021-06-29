<?php

include ('./helper/db-connect.php');

$id = $_GET['id'];

$sql = "DELETE FROM posts WHERE id=$id";
$stmt_del = pdo_connect_mysql()->prepare($sql);
$stmt_del->execute();

if($stmt_del > 0) {

	echo '<script type="text/javascript">alert("livre supprimé");
			window.location.href = "./views/index.php";
		  </script>';

    header ('location: ./index.php');

	// exit();
}
	else {
		echo '<script>alert("there is an error")</script';
	}
