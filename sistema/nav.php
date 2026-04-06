<?php
// ============================================================
// nav.php — Navegação reutilizável (parcial de layout)
// Incluído em todas as páginas com: require 'nav.php'
// ============================================================
?>
<header>
  <h1>🧪 Lab SQL Injection</h1>
  <span class="badge">AMBIENTE DE TESTES</span>
</header>

<nav>
  <a class="vulneravel" href="login_vulneravel.php">🔓 Login Vulnerável</a>
  <a class="seguro"     href="login_seguro.php">🔒 Login Seguro</a>
  <a class="vulneravel" href="busca_vulneravel.php">🔍 Busca Vulnerável</a>
  <a class="vulneravel" href="delete_vulneravel.php">🗑️ Delete Vulnerável</a>
  <a class="vulneravel" href="update_vulneravel.php">✏️ Update Vulnerável</a>
  <a class="vulneravel" href="cadastro_vulneravel.php">📝 Cadastro Vulnerável</a>
  <a class="guia"       href="guia_ataques.html" target="_blank">📖 Guia de Ataques</a>
</nav>
