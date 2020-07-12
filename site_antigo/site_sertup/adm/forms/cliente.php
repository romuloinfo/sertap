<?php
include 'superior.php';
$objeto = new Cliente();
if(isset($_POST['enviar'])){
$objeto->getForm($_POST);
    if ($objeto->salvar()== true){
        echo "<script>alert('CADASTRO REALIZADO COM SUCESSO.')</script>";
        echo "<script>window.location='../gerenciarClientes.php'</script>";        
    }else{
        echo "<script>alert('NÃO FOI POSSÍVEL REALIZAR CADASTRO, VERIFIQUE SE TODOS OS DADOS ESTÃO CORRETOS.')</script>";
                
        }
}

$cidade = new Cidade();
$listaCidade = $cidade->selecionarPorUf("VZlSXRlVOFmYGpEWadEeXZFMaZVVB1TP");

$uf = new Uf();
$listaUf = $uf->selecionarTodos();


if(isset($_GET['id'])){
    $objeto->selecionarPorId($_GET['id']);
    $listaCidade = $cidade->selecionarPorUf($objeto->getCidade()->getUf()->getId());
}
?>

<div class="col8" >
<div class="float_right margin_right_10 margin_botton10"><a href="../gerenciarClientes.php"><img src="../imagens/voltar.jpg"></a></div>
</div>
<h2>Inserir/Alterar Cadastro de Cliente</h2>
Campos com <em>*</em> são Obrigatórios<br><br>
<form name="Form"  method="POST" action='cliente.php'>
<input type="hidden" name="id" value="<?php echo $objeto->getId()?>">
<input type="hidden" name="enviar" value="true">
<fieldset>
<legend>Dados do Cadastro</legend>
<div class="campo">
<label>nome:</label>
<input type='text' name='nome' size="60" maxlength="100" value="<?php echo $objeto->getnome()?>" >
</div>
<div class="campo">
<label>cpf/cnpj</label>
<input type='text' name='cpf_cnpj' size="30" maxlength="20" value="<?php echo $objeto->getcpf_cnpj()?>" >
</div>
<legend>Endereço</legend>
<div class="campo">
<label>uf</label>

<select name="uf" onchange="buscarCidade(this)">
    <option value="VZlSXRlVOFmYGpEWadEeXZFMaZVVB1TP">MINAS GERAIS</option>
    <?php
    foreach ($listaUf as $value){
        echo "<option    ".$value->selected($objeto->getUf()->getId())."  value=".$value->getId().">".$value->getDescricao()."</option>";
    }
    ?>
</select>    


</div>    

<div class="campo">
<label>cidade</label>
<div id="cidade" >
<select name="cidade">
    <option value="AFVxIkVWZ1ShJjToZ1aap2VGB3cVxmTPZlVSh1UsplV">JANAÚBA</option>                        
    <?php
    foreach ($listaCidade as $value){
        echo "<option    ".$value->selected($objeto->getCidade()->getId())."  value=".$value->getId().">".$value->getDescricao()."</option>";
    }
    ?>
</select>
</div>
</div>   
<div class="campo">
<label>endereço</label>
<input type='text' name='endereco' size="60" maxlength="100" value="<?php echo $objeto->getendereco()?>" >
</div>
<div class="campo">
<label>bairro</label>
<input type='text' name='bairro'size="25" maxlength="45"  value="<?php echo $objeto->getbairro()?>" >
</div>
<div class="campo">
<label>telefone</label>
<input type='text' name='telefone' size="15" maxlength="13" value="<?php echo $objeto->gettelefone()?>" >
</div>
<div class="campo">
<label>celular</label>
<input type='text' name='celular' size="15" maxlength="13" value="<?php echo $objeto->getcelular()?>" >
</div>
<div class="campo">
<label>email</label>
<input type='text' name='email' size="60" maxlength="100" value="<?php echo $objeto->getemail()?>" >
</div>
<div class="campo">


</fieldset>
<button type="submit" name="botao" class="botao">Enviar</button>
</form>
<div class="col8" >
<div class="float_right margin_right_10 margin_botton10"><a href="../gerenciarClientes.php"><img src="../imagens/voltar.jpg"></a></div>
</div>
<?php
include 'inferior.php';
?>