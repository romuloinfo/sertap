<?php
include 'superior.php';
$imagem = new Imagem();

if(isset($_POST['enviar'])){
    $imagem->getForm($_POST);
    if ($imagem->salvar()== true){
        echo "<script>alert('CADASTRO REALIZADO COM SUCESSO.')</script>";
        echo "<script>window.location='../gerenciarFotos.php?id=".$_GET['id_imovel']."'</script>";
    }else{
        echo "<script>alert('NÃO FOI POSSÍVEL REALIZAR CADASTRO, VERIFIQUE SE TODOS OS DADOS ESTÃO CORRETOS.')</script>";
        echo "<script>window.location='../gerenciarFotos.php?id=".$_GET['id_imovel']."'</script>";
    }
}
if(isset($_GET['foto'])){    
    $imagem->selecionarPorId($_GET['foto']);
}
?>
    <div class="col8" >
        <div class="float_right margin_right_10 margin_botton10"><a href="../gerenciarFotos.php?id=<?php echo $_GET['id']?>"><img src="../imagens/voltar.jpg"></a></div>
    </div>
    <h2>Inserir/Alterar Cadastro de Categoria</h2>
    Campos com <em>*</em> são Obrigatórios<br><br>
<form name='Form'  method='POST' action='imagem.php?id_imovel=<?php echo $_GET['id']?>'>
    <input type='hidden' name='id' value='<?php echo $imagem->getId()?>'>
    <input type='hidden' name='enviar' value='true'>
    <fieldset>
        <legend>Descrição Atividade</legend>
            <div class="campo">
            <label>*Foto Principal:</label>
            <select name='padrao'>
                <option <?php if( $imagem->getPadrao() == 1) echo " SELECTED "?> value="1">PRINCIPAL</option>
                <option <?php if( $imagem->getPadrao() == 0) echo " SELECTED "?> value="0">NÃO PADRÃO</option>                
            </select>
            </div> 
        
    </fieldset>
       
    <button type='submit' name='botao' class="botao">Enviar</button>
    

</form>
    <div class="col8" >
        <div class="float_right margin_right_10 margin_botton10"><a href="../gerenciarFotos.php?id=<?php echo $_GET['id']?>"><img src="../imagens/voltar.jpg"></a></div>
    </div>    
<?php
include '../inferior.php';
?>