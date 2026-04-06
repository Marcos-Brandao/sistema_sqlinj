<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Busca Vulnerável</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php require 'nav.php'; ?>

<main>
  <div class="card">
    <h2>🔍 Busca de Usuário <span class="tag vuln">VULNERÁVEL</span></h2>

    <!--
      FORMULÁRIO (View)
      Responsabilidade: apenas exibir o campo de busca.
      O processamento e os resultados ficam em: resultado_busca.php
    -->
    <form method="GET" action="resultado_busca.php">
      <label>Buscar por email</label>
      <input type="text" name="busca" placeholder="Tente: ' OR 1=1 --">

      <button type="submit">Buscar</button>
    </form>
  </div>
</main>

</body>
</html>
