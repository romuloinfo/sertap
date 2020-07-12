<?php
if(isset($_GET['excluir']) and isset($_GET['id']) ){

    if($obj->excluir($_GET['id'])){
        
        echo "<script>alert('REGISTRO EXCLUIDO COM SUCESSO.')</script>";
    }else{
        echo "<script>alert('NÃO FOI POSSÍVEL EXCLUIR O REGISTRO.')</script>";
    }
}
?>
<body>


    <div id="tudo">

        <div id="cab">
            <a href="index.php"><img src="imagens/cab_r1_c1.jpg"/></a>
                <p>
                    <a href="/sertapimoveis/sair.php">Sair</a></br>
                    Nome:&nbsp;&nbsp;<?php echo $_SESSION['nome'];?></br>
                Usuário:&nbsp;&nbsp;<?php echo $_SESSION['usuario'] ?> - <?php echo $_SESSION['nome_grupo'] ?>
                
                </p>
        </div>
        <div id="conteudo">