<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro — Resultado</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php require 'nav.php'; ?>

<main>
  <div class="card">
    <h2>📝 Cadastro <span class="tag vuln">VULNERÁVEL</span> — Resultado</h2>

    <?php
    // ============================================================
    // processa_cadastro.php — Processamento (Controller)
    // Responsabilidade: receber os dados do formulário e inserir
    // o novo usuário no banco.
    //
    // PROBLEMA: email e senha entram diretamente nos VALUES da
    // query. Com aspas e ponto-e-vírgula, um atacante poderia
    // tentar encerrar o INSERT e executar outra instrução.
    // ============================================================

    require 'db.php';

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // ⚠️ Vulnerável: valores colados diretamente na query

    /* $sql = "INSERT INTO usuarios(email, senha) VALUES(?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    
    mysqli_stmt_bind_param($stmt, "ss", $email, $senha);
    mysqli_stmt_execute($stmt); */
    
    $sql = "INSERT INTO usuarios(email, senha) VALUES('$email','$senha')";
    mysqli_query($conn, $sql);
    $affected = mysqli_affected_rows($conn);

    if ($affected > 0) {
      $novo_id = mysqli_insert_id($conn);
      $res     = mysqli_query($conn, "SELECT * FROM usuarios");
      $total   = mysqli_num_rows($res);

      echo '<div class="result ok">';
      echo '✅ <strong>Usuário inserido com ID ' . $novo_id . '.</strong><br><br>';
      echo '📋 Estado atual da tabela (' . $total . ' registro(s)):<br>';
      while ($row = mysqli_fetch_assoc($res)) {
        $marcador = $row['id'] == $novo_id ? ' ← novo' : '';
        echo '👤 ID: <strong>' . $row['id'] . '</strong> — '
           . htmlspecialchars($row['email'])
           . ' / senha: <strong>' . htmlspecialchars($row['senha']) . '</strong>'
           . '<em style="color:#fbbf24">' . $marcador . '</em><br>';
      }
      echo '</div>';
    } else {
      echo '<div class="result fail">❌ Erro ao cadastrar. A query pode ter falhado silenciosamente.</div>';
    }
    ?>

    <a href="cadastro_vulneravel.php" style="display:block;margin-top:18px;color:#38bdf8;font-size:0.85rem;">← Voltar ao formulário</a>
  </div>
</main>

</body>
</html>
