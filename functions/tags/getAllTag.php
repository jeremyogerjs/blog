<?php

$sql = "SELECT * FROM tags";

$result = pdo_connect_mysql() -> prepare($sql);

$result -> execute();

$results = $result ->fetchAll();