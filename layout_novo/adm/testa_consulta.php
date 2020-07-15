<?php


    include_once "../includes/conexao.php";
    $sql = "SELECT * from imoveis";

    if ($resultado = $conexao->query($sql) ){
        while($linha = mysqli_fetch_assoc($resultado) ){
        $result[] = $linha;
        }

        print date('Y-m-d H:i');
        print "<br>";
        print "<br>";
        print "<pre>";
        print_r($result);
        print "</pre>";
      }
    else{
      print "Erro no SQL";
    }
 ?>


