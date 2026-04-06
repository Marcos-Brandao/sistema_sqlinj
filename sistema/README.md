# 🧪 Lab SQL Injection

Ambiente de demonstração para aulas sobre SQL Injection e Prepared Statements.

---

## ⚙️ Como configurar (XAMPP)

**1. Banco de dados** — Execute o `setup.sql` no phpMyAdmin ou terminal MySQL.

**2. Arquivos** — Coloque a pasta `sistema/` em `C:\xampp\htdocs\sistema\`

**3. Acesse** — `http://localhost/sistema/`

---

## 📁 Estrutura de arquivos

Cada funcionalidade está separada em dois arquivos:
o **formulário** (View) e o **processamento** (Controller).

```
sistema/
│
├── index.php                     ← Página inicial
├── nav.php                       ← Navegação reutilizada em todas as páginas
├── db.php                        ← Conexão com o banco (mysqli + PDO)
├── style.css                     ← Estilos
│
├── login_vulneravel.php          ← [VIEW]       Formulário de login
├── processa_login_vulneravel.php ← [CONTROLLER] Processa o login sem proteção
│
├── login_seguro.php              ← [VIEW]       Formulário de login seguro
├── processa_login_seguro.php     ← [CONTROLLER] Processa com PDO Prepared Statements
│
├── busca_vulneravel.php          ← [VIEW]       Campo de busca
├── resultado_busca.php           ← [CONTROLLER] Executa a busca e exibe resultados
│
├── delete_vulneravel.php         ← [VIEW]       Campo de ID para deletar
├── processa_delete.php           ← [CONTROLLER] Executa o DELETE
│
├── update_vulneravel.php         ← [VIEW]       Formulário de edição
├── processa_update.php           ← [CONTROLLER] Executa o UPDATE
│
├── cadastro_vulneravel.php       ← [VIEW]       Formulário de cadastro
├── processa_cadastro.php         ← [CONTROLLER] Executa o INSERT
│
├── guia_ataques.html             ← Payloads prontos com explicações
└── setup.sql                     ← Cria e popula o banco de dados
```

---

## 🔁 Resetar o banco após testes destrutivos

Execute no phpMyAdmin:

```sql
USE teste;
TRUNCATE TABLE usuarios;
INSERT INTO usuarios (email, senha) VALUES
  ('admin@gmail.com', '123456'),
  ('user@gmail.com',  '123456');
```

---

> ⚠️ **Este sistema é vulnerável por design. Nunca coloque em produção.**
