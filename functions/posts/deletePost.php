<?php
$id = is_numeric($_GET['id']) ? htmlspecialchars($_GET['id']) : '';

$sql = "DELETE FROM posts WHERE id = $id";
$stmt_del = pdo_connect_mysql()->exec($sql);
if($stmt_del > 0) {

	echo '<script type="text/javascript">alert("livre supprimé");
			window.location.href = "./views/index.php";
		  </script>';

    header ('location:index.php');
}
else {
	echo '<script>alert("there is an error")</script';
}
