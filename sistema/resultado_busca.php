<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Resultado da Busca</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php require 'nav.php'; ?>

<main>
  <div class="card">
    <h2>🔍 Resultado da Busca <span class="tag vuln">VULNERÁVEL</span></h2>

    <?php
    // ============================================================
    // resultado_busca.php — Processamento e resultado (Controller)
    // Responsabilidade: receber o termo de busca via GET, executar
    // a query e exibir os resultados.
    //
    // PROBLEMA: o termo de busca entra direto no LIKE sem
    // nenhum tratamento, permitindo SQL Injection.
    // ============================================================

    require 'db.php';

    $busca = $_GET['busca'];

    // ⚠️ Vulnerável: input colado diretamente na query
    $sql = "SELECT * FROM usuarios WHERE email LIKE '%$busca%'";
    $res = mysqli_query($conn, $sql);

    if ($res && mysqli_num_rows($res) > 0) {
      $total = mysqli_num_rows($res);
      echo '<div class="result ok">';
      echo '<strong>✅ ' . $total . ' usuário(s) retornado(s) pelo banco:</strong><br><br>';
      while ($row = mysqli_fetch_assoc($res)) {
        echo '👤 ID: <strong>' . $row['id'] . '</strong> — '
           . htmlspecialchars($row['email'])
           . ' / senha: <strong>' . htmlspecialchars($row['senha']) . '</strong><br>';
      }
      echo '</div>';
    } else {
      echo '<div class="result fail">❌ Nenhum usuário encontrado.</div>';
    }
    ?>

    <a href="busca_vulneravel.php" style="display:block;margin-top:18px;color:#38bdf8;font-size:0.85rem;">← Voltar à busca</a>
  </div>
</main>

</body>
</html>
