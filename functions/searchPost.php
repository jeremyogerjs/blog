<?php
require('./helper/db-connect.php');

$sql = "SELECT p.id,p.title,p.content,p.author,p.createdDate,p.idCategory FROM posts as p INNER JOIN categories as c ON p.idCategory = c.id WHERE p.title LIKE '%$query%' OR p.author LIKE '%$query%'";

$result = pdo_connect_mysql() -> prepare($sql);

$result -> execute();

$results = $result -> fetchAll();