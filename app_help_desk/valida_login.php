<?php
	//iniciando sessão
	session_start();

	//variável de autenticação
	$autenticado = false;
	$usuario_id = null;
	$usuario_perfil_id = null;

	$perfis = array(
		1 => 'Administrativo',
		2 => 'Usuário'
	);

	//usuários do sistema
	$usuarios = array(
		array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '1q2w3e4r', 'perfil_id' => 1),
		array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => '123456', 'perfil_id' => 1),
		array('id' => 3, 'email' => 'jose@teste.com.br', 'senha' => '123456', 'perfil_id' => 2),
		array('id' => 4, 'email' => 'maria@teste.com.br', 'senha' => '123456', 'perfil_id' => 2),
	);

	foreach($usuarios as $usuario) {
		if($usuario['email'] == $_POST['email'] && $usuario['senha'] == $_POST['senha']) {
			$autenticado = true;
			$usuario_id = $usuario['id'];
			$usuario_perfil_id = $usuario['perfil_id'];
		}
	}

	if($autenticado == true) {
		$_SESSION['autenticado'] = 'TRUE';
		$_SESSION['id'] = $usuario_id;
		$_SESSION['perfil_id'] = $usuario_perfil_id;
		header('Location: home.php');
	} else {
		$_SESSION['autenticado'] = 'FALSE';
		header('Location: index.php?login=erro');
	}

	/*
	$_GET['email'];
	$_GET['senha'];
	*/
	$_POST['email'];
	$_POST['senha'];
?>