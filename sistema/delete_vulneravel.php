<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Delete Vulnerável</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php require 'nav.php'; ?>

<main>
  <div class="card">
    <h2>🗑️ Deletar Usuário <span class="tag vuln">VULNERÁVEL</span></h2>

    <!--
      FORMULÁRIO (View)
      Responsabilidade: apenas exibir o campo de ID.
      O processamento acontece em: processa_delete.php
    -->
    <form method="GET" action="processa_delete.php">
      <label>ID do usuário</label>
      <input type="text" name="id" placeholder="Tente: 1 OR 1=1">

      <button class="danger" type="submit">Deletar</button>
    </form>
  </div>
</main>

</body>
</html>
