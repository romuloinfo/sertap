<?php
/**
 * Conexão Mysql
 */
$conn = mysql_connect('localhost', 'root', '');
$db   = mysql_select_db('db');

$title = addslashes($_POST['title']);
$description = addslashes($_POST['description']);

if (!empty($title) && !empty($description))
{
	$query = "INSERT INTO albums (title, description) VALUES ('$title', '$description')";

	if (mysql_query($query))
	{
		$json = array();
		$json["id"] = mysql_insert_id();
		die(json_encode($json));
	}
	else
		error("Não foi possível salvar o álbum.");
}
else
	error("Título ou descrição não preenchida.");

function error($msg)
{
	$json = array();
	$json["id"]  = 0;
	$json["msg"] = "Erro: $msg";
	die(json_encode($json));
}
?>
