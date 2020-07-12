<?php
include('superior.php');
if(isset($_GET['excluir']) and isset($_GET['foto']) ){
    $obj = new Imagem();    
    $obj->selecionarPorId($_GET['foto']);
    if($obj->excluir($_GET['foto'])){
        unlink("../img_pub/".$obj->getImagem());
        unlink("../img_pub/".$obj->getImagem_thub());
        echo "<script>alert('REGISTRO EXCLUIDO COM SUCESSO.')</script>";
        echo "<script>window.location='gerenciarFotos.php?id=".$_GET['id']."'</script>";
        
    }else{
        echo "<script>alert('NÃO FOI POSSÍVEL EXCLUIR O REGISTRO.')</script>";
    }
}

include('inferior.php');
?>
