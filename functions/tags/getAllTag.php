<?php

$sql = "SELECT * FROM tags";

$stmt = pdo_connect_mysql()->prepare($sql);

$stmt->execute();

$tags = $stmt->fetchAll();
