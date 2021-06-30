<?php

$id = is_numeric($_GET['id']) ? htmlspecialchars($_GET['id']) : '';

$sql = "DELETE FROM posts WHERE posts.id=$id";
        
$stmt_del = pdo_connect_mysql()->exec($sql);


if($stmt_del > 0) {

	echo '<script type="text/javascript">alert("post supprimé");
			window.location.href = "./index.php";
		  </script>';

    // header ('location:index.php?action=espaceAdmin');
}
else {
	echo '<script>alert("there is an error")</script';
}
