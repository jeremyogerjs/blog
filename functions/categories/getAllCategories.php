<?php
require('./helper/db-connect.php');
$sql = "SELECT * FROM categories";

$result = pdo_connect_mysql() ->prepare($sql);

$result ->execute();

$results = $result ->fetchAll();