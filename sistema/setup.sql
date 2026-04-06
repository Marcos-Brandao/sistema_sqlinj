-- ============================================================
-- setup.sql — Script de criação e reset do banco de dados
-- Execute no phpMyAdmin ou terminal MySQL
-- ============================================================

CREATE DATABASE IF NOT EXISTS teste;
USE teste;

CREATE TABLE IF NOT EXISTS usuarios (
  id    INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(100),
  senha VARCHAR(100)
);

-- Limpa e repopula (útil após testes destrutivos como OR 1=1 no DELETE)
TRUNCATE TABLE usuarios;

INSERT INTO usuarios (email, senha) VALUES
  ('admin@gmail.com', '123456'),
  ('user@gmail.com',  '123456');
