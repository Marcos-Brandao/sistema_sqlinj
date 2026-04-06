<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Delete — Resultado</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php require 'nav.php'; ?>

<main>
  <div class="card">
    <h2>🗑️ Deletar Usuário <span class="tag vuln">VULNERÁVEL</span> — Resultado</h2>

    <?php
    // ============================================================
    // processa_delete.php — Processamento (Controller)
    // Responsabilidade: receber o ID via GET e executar o DELETE.
    //
    // PROBLEMA: o ID entra direto na query sem validação.
    // Com "1 OR 1=1", a condição WHERE sempre é verdadeira
    // e TODOS os registros são apagados.
    // ============================================================

    require 'db.php';

    $id = $_GET['id'];

    // Snapshot antes do delete
    $antes = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM usuarios"));

    // ⚠️ Vulnerável: ID colado direto na query
    $sql = "DELETE FROM usuarios WHERE id = $id";
    mysqli_query($conn, $sql);
    $affected = mysqli_affected_rows($conn);

    // Snapshot depois do delete
    $res_depois = mysqli_query($conn, "SELECT * FROM usuarios");
    $depois     = mysqli_num_rows($res_depois);

    if ($affected > 0) {
      echo '<div class="result ok">';
      echo '🗑️ <strong>' . $affected . ' registro(s) deletado(s).</strong><br><br>';
      echo 'Registros antes: <strong>' . $antes . '</strong> &nbsp;→&nbsp; Registros restantes: <strong>' . $depois . '</strong><br><br>';

      if ($depois > 0) {
        echo '📋 O que sobrou na tabela:<br>';
        while ($row = mysqli_fetch_assoc($res_depois)) {
          echo '👤 ID: <strong>' . $row['id'] . '</strong> — ' . htmlspecialchars($row['email']) . '<br>';
        }
      } else {
        echo '⚠️ <strong>A tabela está vazia. Todos os registros foram apagados.</strong>';
      }
      echo '</div>';
    } else {
      echo '<div class="result fail">⚠️ Nenhum registro afetado.</div>';
    }
    ?>

    <a href="delete_vulneravel.php" style="display:block;margin-top:18px;color:#38bdf8;font-size:0.85rem;">← Voltar ao formulário</a>
  </div>
</main>

</body>
</html>
