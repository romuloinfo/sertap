<?php
include 'superior.php';
$categoria = new Categoria();

if(isset($_POST['enviar'])){
    $categoria->getForm($_POST);
    if ($categoria->salvar()== true){
        echo "<script>alert('CADASTRO REALIZADO COM SUCESSO.')</script>";
        echo "<script>window.location='../gerenciarCategorias.php'</script>";
    }else{
        echo "<script>alert('NÃO FOI POSSÍVEL REALIZAR CADASTRO, VERIFIQUE SE TODOS OS DADOS ESTÃO CORRETOS.')</script>";
        echo "<script>window.location='../gerenciarCategorias.php'</script>";
    }
}
if(isset($_GET['id'])){    
    $categoria->selecionarPorId($_GET['id']);
}
?>
    <div class="col8" >
        <div class="float_right margin_right_10 margin_botton10"><a href="../gerenciarCategorias.php"><img src="../imagens/voltar.jpg"></a></div>
    </div>
    <h2>Inserir/Alterar Cadastro de Categoria</h2>
    Campos com <em>*</em> são Obrigatórios<br><br>
<form name='Form'  method='POST' action='categoria.php'>
    <input type='hidden' name='id' value='<?php echo $categoria->getId()?>'>
    <input type='hidden' name='enviar' value='true'>
    <fieldset>
        <legend>Descrição Atividade</legend>
            <div class="campo">
            <label>*Descrição:</label>
            <input type='text' name='descricao' value="<?php echo $categoria->getDescricao()?>" size="70" >
    </div>
        
    </fieldset>
       
    <button type='submit' name='botao' class="botao">Enviar</button>
    

</form>
    <div class="col8" >
        <div class="float_right margin_right_10 margin_botton10"><a href="../gerenciarCategorias.php"><img src="../imagens/voltar.jpg"></a></div>
    </div>    
<?php
include '../inferior.php';
?>