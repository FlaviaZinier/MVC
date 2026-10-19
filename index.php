<?php
session_start();
require_once __DIR__ . '/controller/ProdutoController.php';

// Porta de entrada: recebe a requisição e aciona o Controller.
$controller = new ProdutoController();
$controller->tratar($_SERVER['REQUEST_METHOD'], $_GET, $_POST);