<?php
include('superior.php');
?>
<body>


    <div id="tudo">

        <div id="cab">
            
            <a href="index.php"><img src="imagens/cab_r1_c1.jpg"/></a>
                <p>
                    <a href="/sertapimoveis/sair.php">Sair</a></br>
                    Nome:&nbsp;&nbsp;<?php echo $_SESSION['nome'];?></br>
                Usu�rio:&nbsp;&nbsp;<?php echo $_SESSION['usuario'] ?> - <?php echo $_SESSION['nome_grupo'] ?>
                </p>
        </div>


            <table>
                <tr>
                    <td colspan="6">&nbsp;</td>
                </tr>
                <tr>
                    <td><img src="imagens/locacao.png"></td>
                    <td><img src="imagens/estoque.png"></td>
                    <td><img src="imagens/pessoas.png"></td>
                    <td><img src="imagens/financeiro.png"></td>
                    <td><img src="imagens/relatorio.png"></td>
                    <td><img src="imagens/seguranca.png"></td>
                </tr>

                <tr>
                    <td><a href="gerenciarContratos.php">Gerenciar Contratos</a></td>
                    <td><a href="gerenciarImoveis.php">Gerenciar Im�veis</a></td>
                    <td><a href="gerenciarClientes.php">Gerenciar Clientes</a></td>
                    <td><a href="gerenciarCategorias.php">Gerenciar Categorias</a></td>
                    <td><a href="#">&nbsp;</a></td>
                    <td><a href="gerenciarUsuarios.php">Gerenciar Usu�rios</a></td>
                </tr>
                <tr>
                    <td colspan="6">&nbsp;</td>
                </tr>                
        </table>





            
<?php
include('inferior.php');
?>
