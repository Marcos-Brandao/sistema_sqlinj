<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Update — Resultado</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php require 'nav.php'; ?>

<main>
  <div class="card">
    <h2>✏️ Atualizar Usuário <span class="tag vuln">VULNERÁVEL</span> — Resultado</h2>

    <?php
    // ============================================================
    // processa_update.php — Processamento (Controller)
    // Responsabilidade: receber os dados do formulário e executar
    // o UPDATE no banco.
    //
    // PROBLEMA: o campo email entra diretamente na query.
    // Com o payload certo, o atacante pode injetar campos extras
    // no SET e alterar, por exemplo, a senha de um usuário.
    // ============================================================

    require 'db.php';

    $id    = $_POST['id'];
    $email = $_POST['email'];

    // ⚠️ Vulnerável: valores colados diretamente na query
    $sql = "UPDATE usuarios SET email = '$email' WHERE id = $id";
    mysqli_query($conn, $sql);
    $affected = mysqli_affected_rows($conn);

    if ($affected > 0) {
      // Busca o estado atual do registro após o update
      $res = mysqli_query($conn, "SELECT * FROM usuarios WHERE id = $id");
      $row = mysqli_fetch_assoc($res);

      echo '<div class="result ok">';
      echo '✅ <strong>' . $affected . ' registro(s) atualizado(s).</strong><br><br>';
      echo '📋 Estado atual do registro no banco:<br>';
      echo '&nbsp;&nbsp;ID: <strong>' . $row['id'] . '</strong><br>';
      echo '&nbsp;&nbsp;Email: <strong>' . htmlspecialchars($row['email']) . '</strong><br>';
      echo '&nbsp;&nbsp;Senha: <strong>' . htmlspecialchars($row['senha']) . '</strong>';
      echo '</div>';
    } else {
      echo '<div class="result fail">⚠️ Nenhum registro afetado. Verifique o ID.</div>';
    }
    ?>

    <a href="update_vulneravel.php" style="display:block;margin-top:18px;color:#38bdf8;font-size:0.85rem;">← Voltar ao formulário</a>
  </div>
</main>

</body>
</html>
