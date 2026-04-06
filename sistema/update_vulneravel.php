<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Update Vulnerável</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php require 'nav.php'; ?>

<main>
  <div class="card">
    <h2>✏️ Atualizar Usuário <span class="tag vuln">VULNERÁVEL</span></h2>

    <!--
      FORMULÁRIO (View)
      Responsabilidade: apenas exibir os campos de edição.
      O processamento acontece em: processa_update.php
    -->
    <form method="POST" action="processa_update.php">
      <label>ID do usuário</label>
      <input type="number" name="id" placeholder="Ex: 1">

      <label>Novo email</label>
      <input type="text" name="email" placeholder="Tente: hacker@x.com', senha='abc">

      <button type="submit">Atualizar</button>
    </form>
  </div>
</main>

</body>
</html>
