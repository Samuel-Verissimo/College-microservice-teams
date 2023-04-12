<?php 

// Configurações do banco de dados
$dsn = 'mysql:host=mysql;dbname=ludus_service_team';
$username = 'user_faculdade';
$password = 'password_faculdade';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

// Conecta ao banco de dados
$dbh = new PDO($dsn, $username, $password, $options);

?>