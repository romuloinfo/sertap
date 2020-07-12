<?php
/**
 * Conexão Mysql
 */
$conn = mysql_connect('localhost', 'root', '');
$db   = mysql_select_db('colegiopremio');

$id = $_POST['id'];
$caption = addslashes($_POST['caption']);

if (!empty($caption))
{
	$query = "UPDATE albums_photos SET caption = '$caption' WHERE id = $id";

	if (mysql_query($query))
		die($caption);
}

die("Erro");
?>
