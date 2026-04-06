<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login Seguro — Resultado</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php require 'nav.php'; ?>

<main>
  <div class="card">
    <h2>🔒 Login <span class="tag safe">SEGURO</span> — Resultado</h2>

    <?php
    // ============================================================
    // processa_login_seguro.php — Processamento (Controller)
    // Responsabilidade: receber os dados do formulário e verificar
    // o login usando Prepared Statements (PDO).
    //
    // SOLUÇÃO: os parâmetros :email e :senha são enviados
    // separados da query. O banco nunca os interpreta como código.
    // ============================================================

    require 'db.php';

    $sql  = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
    $stmt = $pdo->prepare($sql);
    var_dump($stmt);
    $stmt->execute([
      ':email' => $_POST['email'],
      ':senha' => $_POST['senha'],
    ]);

    if ($stmt->rowCount() > 0) {
      $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
      echo '<div class="result ok">';
      echo '<strong>✅ Login realizado! Usuários retornados pelo banco:</strong><br><br>';
      foreach ($usuarios as $row) {
        echo '👤 ID: <strong>' . $row['id'] . '</strong> — ' . htmlspecialchars($row['email']) . '<br>';
      }
      echo '</div>';
      echo '<div class="result info" style="margin-top:8px;font-size:0.8rem;">
              ℹ️ Mesmo com <strong>\' OR 1=1 --</strong> no campo, o PDO trata como texto puro.
              Só retorna quem realmente tem esse email e essa senha cadastrados.
            </div>';
    } else {
      echo '<div class="result fail">❌ Nenhum usuário encontrado. Login negado.</div>';
    }
    ?>

    <a href="login_seguro.php" style="display:block;margin-top:18px;color:#38bdf8;font-size:0.85rem;">← Voltar ao formulário</a>
  </div>
</main>

</body>
</html>
