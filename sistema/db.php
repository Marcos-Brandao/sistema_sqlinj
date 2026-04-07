<?php
// ============================================================
// db.php — Conexão com o banco de dados
// Responsabilidade: apenas conectar. Nada mais.
// ============================================================

require_once './sistema/constantes.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$pdo  = new PDO("mysql:host=localhost;dbname=teste", DB_USER, DB_PASS);
