<?php
	session_start();

	$_POST;

	$arquivo = fopen('arquivo.txt', 'a');

	$titulo = $_POST['titulo'];
	$categoria = $_POST['categoria'];
	$descricao = $_POST['descricao'];

	$texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;

	fwrite($arquivo, $texto);
	fclose($arquivo);
	header('Location: abrir_chamado.php');
?>