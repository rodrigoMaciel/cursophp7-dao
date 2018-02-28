<?php 

require_once("config.php");

$sql = new Sql();

/*
$usuarios = $sql->select("SELECT *FROM tb_usuarios");

echo json_encode($usuarios);
*/

//Carrega um usuário pelo ID dele.
/*
$root = new Usuario();
$root->loadById(3);
echo $root;
*/

//Carrega uma lista de usuarios
/*
$lista = Usuario::getList();
echo json_encode($lista);
*/

//Carrega uma lista de usuários buscando pelo login
/*
$login = "Ro";
$search = Usuario::search($login);
echo json_encode($search);
*/

//Carrega um usuário usando o login e a senha
/*
$usuario = new Usuario();
$usuario->login("Rodrigo", "123343");
echo $usuario;
*/

//Criando um novo usuário
/*
$aluno = new Usuario("Paulo", "admin");
$aluno->insert();
echo $aluno;
*/

//Alterar um usuario
/*
$usuario = new Usuario();
$usuario->loadById(10);
$usuario->update("professor", "&*()");
echo $usuario;
*/

$usuario = new Usuario();
$usuario->loadById(10);
$usuario->delete();

echo $usuario;
 ?>