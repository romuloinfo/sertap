<?php
/**
 * Conexão Mysql
 */
$conn = mysql_connect('localhost', 'root', '');
$db   = mysql_select_db('colegiopremio');

$file = $_FILES['Filedata'];

$album = (int) $_POST['id'];
$filename = $file['name'];

$query = "INSERT INTO albums_photos (album, file) VALUES ('$album', '$filename')";

mysql_query($query);

$path     = $file['tmp_name'];
$new_path = "../../uploads/".$file['name'];

move_uploaded_file($path, $new_path);

// Vamos usar a biblioteca WideImage para o redimensionamento das imagens
require("../../lib/WideImage/WideImage.php");

// Carrega a imagem enviada
$original = WideImage::load($new_path);

// Redimensiona a imagem original para 1024x768 caso ela seja maior que isto e salva
$original->resize(1024, 768, 'inside', 'down')->saveToFile($new_path, null, 90);

// Cria a miniatura
$ext = end(explode(".", $new_path)); // Pega a extensão do arquivo
$thumb = str_replace(".$ext", "_thumb.$ext", $new_path); // Substitui a extensão

$original->resize(100, 75, 'inside', 'down')->saveToFile($thumb, null, 90); // Redimensiona e salva

echo mysql_insert_id(); // Retorna o id da foto
?>
