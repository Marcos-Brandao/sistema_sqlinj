<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login Seguro</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php require 'nav.php'; ?>

<main>
  <div class="card">
    <h2>🔒 Login <span class="tag safe">SEGURO</span></h2>

    <!--
      FORMULÁRIO (View)
      Responsabilidade: apenas exibir o formulário e enviar os dados.
      O processamento acontece em: processa_login_seguro.php
    -->
    <form method="POST" action="processa_login_seguro.php">
      <label>Email</label>
      <input type="text" name="email" placeholder="Tente ' OR 1=1 -- aqui também">

      <label>Senha</label>
      <input type="password" name="senha" placeholder="qualquer coisa">

      <button type="submit">Entrar</button>
    </form>
  </div>
</main>

</body>
</html>
