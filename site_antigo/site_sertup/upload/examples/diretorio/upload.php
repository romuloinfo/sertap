<?php
/**
 * Script PHP de Upload
 *
 * @author Carlos Rogério Velozo de Medeiros <carlosvelozo at gmail dot com>
 * @date 27/08/2009
 * 
 * Salva o arquivo em uma pasta
 * Caso a pasta não exista o script cria
 */

$file  = $_FILES['Filedata'];
$pasta = "../../uploads/".$_POST['Pasta'];

$path = $file['tmp_name'];

if (!is_dir($pasta))
	mkdir($pasta);

$new_path = $pasta."/".$file['name'];

move_uploaded_file($path, $new_path);

echo "1";
?>
