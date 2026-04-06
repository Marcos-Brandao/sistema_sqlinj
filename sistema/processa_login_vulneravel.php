<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login Vulnerável — Resultado</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php require 'nav.php'; ?>

<main>
  <div class="card">
    <h2>🔓 Login <span class="tag vuln">VULNERÁVEL</span> — Resultado</h2>

    <?php
    // ============================================================
    // processa_login_vulneravel.php — Processamento (Controller)
    // Responsabilidade: receber os dados do formulário, montar
    // a query e verificar o login.
    //
    // PROBLEMA: os dados do usuário são colados diretamente
    // na query, permitindo SQL Injection.
    // ============================================================

    require 'db.php';

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    //  var_dump($_POST);
    // ⚠️ Vulnerável: input do usuário direto na query
    $sql    = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {

      echo '<div class="result ok">';
      echo '<strong>✅ Login realizado! Usuários retornados pelo banco:</strong><br><br>';
      while ($row = mysqli_fetch_assoc($result)) {
        echo '👤 ID: <strong>' . $row['id'] . '</strong> — ' . htmlspecialchars($row['email']) . '<br>';
      }
      echo '</div>';

    } else {
      echo '<div class="result fail">❌ Nenhum usuário encontrado. Login negado.</div>';
    }
    ?>

    <a href="login_vulneravel.php" style="display:block;margin-top:18px;color:#38bdf8;font-size:0.85rem;">← Voltar ao formulário</a>
  </div>
</main>

</body>
</html>
