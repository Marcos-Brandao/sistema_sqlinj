<?php
// ============================================================
// db.php — Conexão com o banco de dados
// Responsabilidade: apenas conectar. Nada mais.
// ============================================================

$conn = mysqli_connect('localhost', 'root', 'MeuBanco@2025', 'teste');

$pdo  = new PDO("mysql:host=localhost;dbname=teste", "root", "MeuBanco@2025");
