<?php

  session_start();

  $usuario_autenticado = false;
  $usuario_id = null;
  $usuario_perfil_id = null;

  $perfis = array(1 => 'Administrativo', 2 => 'Usuário');

  $usuarios_app = array(
    array('id' => 1, 'perfil_id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '123'),
    array('id' => 2, 'perfil_id' => 1, 'email' => 'user@teste.com.br', 'senha' => '123'),
    array('id' => 3, 'perfil_id' => 2, 'email' => 'jose@teste.com.br', 'senha' => '123'),
    array('id' => 4, 'perfil_id' => 2, 'email' => 'maria@teste.com.br', 'senha' => '123')
  );

  foreach($usuarios_app as $user) {
    if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha'] ) {
      $usuario_autenticado = true;
      $usuario_id = $user['id'];
      $usuario_perfil_id = $user['perfil_id'];
    }
  }

  if ($usuario_autenticado) {
    $_SESSION['autenticado'] = 'SIM';
    $_SESSION['usuario_id'] = $usuario_id;
    $_SESSION['usuario_perfil_id'] = $usuario_perfil_id;

    header('Location: home.php');

  } else {
    $_SESSION['autenticado'] = 'NAO';
    header('Location: index.php?login=erro');
  }


?>