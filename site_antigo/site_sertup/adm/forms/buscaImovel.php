<?php

$q = strtolower($_GET["q"]);
if (!$q) return;
include("../classes.php");
new Conexao();
$imovel = new Imovel();
$items = $imovel->getBusca($q);


foreach ($items as $value =>$key) {
	//if (strpos(strtolower($value), $q) !== false) {
		echo utf8_encode("$key|$value\n");
	//}
}

?>
