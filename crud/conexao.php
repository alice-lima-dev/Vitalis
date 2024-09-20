<?php
$host = 'localhost';      // Servidor do banco de dados
$dbname = 'db_vitalis'; // Nome do banco de dados
$user = 'root';         // Nome de usuário do banco de dados
$password = '';       // Senha do banco de dados

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>