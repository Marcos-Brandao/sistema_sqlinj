<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro Vulnerável</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php require 'nav.php'; ?>

<main>
  <div class="card">
    <h2>📝 Cadastro <span class="tag vuln">VULNERÁVEL</span></h2>

    <!--
      FORMULÁRIO (View)
      Responsabilidade: apenas exibir o formulário de cadastro.
      O processamento acontece em: processa_cadastro.php
    -->
    <form method="POST" action="processa_cadastro.php">
      <label>Email</label>
      <input type="email" name="email" placeholder="Tente: x@x.com'>-- ">

      <label>Senha</label>
      <input type="password" name="senha" placeholder="Senha">

      <button type="submit">Cadastrar</button>
    </form>
  </div>
</main>

</body>
</html>
