<?php
include 'superior.php';
$objeto = new Imovel();

if(isset($_POST['enviar'])){
    $objeto->getForm($_POST);
    if ($objeto->salvar()== true){
        if($_POST['id'] == "0"){
                        echo "<script>window.location='galeria.php?id=".$objeto->getId()."'</script>";        
        }else{
            echo "<script>alert('CADASTRO REALIZADO COM SUCESSO.')</script>";
            echo "<script>window.location='../gerenciarImoveis.php'</script>";        
        }
    }else{
        echo "<script>alert('NÃO FOI POSSÍVEL REALIZAR CADASTRO, VERIFIQUE SE TODOS OS DADOS ESTÃO CORRETOS.')</script>";
                
        }
}


$categoria = new Categoria();
$listaCategoria = $categoria->selecionarTodos();

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
<div class="float_right margin_right_10 margin_botton10"><a href="../gerenciarImoveis.php"><img src="../imagens/voltar.jpg"></a></div>
</div>
<h2>Inserir/Alterar Cadastro de Imóvel</h2>
Campos com <em>*</em> são Obrigatórios<br><br>
<form name="Form"  method="POST" action='imovel.php'>
<input type="hidden" name="id" value="<?php echo $objeto->getId()?>">
<input type="hidden" name="enviar" value="true">
<fieldset>
    <legend>Descrição do Imóvel</legend>   
<div class="campo">
<label>titulo</label>
<input type='text' size="30" maxlength="25" name='titulo' value="<?php echo $objeto->gettitulo()?>" >
</div>
<div class="campo">
<label>Pré Descrição</label>
<input type='text' size="55" maxlength="45" name='pre_descricao' value="<?php echo $objeto->getpre_descricao()?>" >
</div>   
<div class="campo">
<label>Valor</label>
<input type='text' size="15" name='valor' value="<?php echo number_format($objeto->getValor(),2,',','.')?>" >
</div>  
<div class="campo">
<label>Categoria</label>
<select name="categoria">
    <option value="0" SELECTED >ESCOLHA UMA CATEGORIA</option>
    <?php
    $id = $objeto->getCategoria()->getId();
    foreach ($listaCategoria as $value){
        echo "<option    ".$value->selected($id)."  value=".$value->getId().">".$value->getDescricao()."</option>";
    }
    ?>
</select>

</div>    
<div class="campo">        
<label>Descricao</label>
<textarea name="descricao" rows="6" cols="90"><?php echo $objeto->getdescricao()?></textarea>
</div>
</fieldset>
<fieldset>
    <legend>Endereço do Imóvel</legend>    
<div class="campo">
<label>Uf</label>
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
    
        
    
<label>Cidade</label>
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
<label>Endereço</label>
<input type='text' size="70" maxlength="100" name='endereco' value="<?php echo $objeto->getendereco()?>" >
</div>
<div class="campo">
<label>Bairro</label>
<input type='text' size="40" maxlength="50" name='bairro' value="<?php echo $objeto->getbairro()?>" >
</div>    
</fieldset>

<div class="campo">
<label>Destaque</label>
<select name='destaque'>
    <option <?php if( $objeto->getDestaque() == 0) echo " SELECTED "?> value="0">NÃO</option>
    <option <?php if( $objeto->getDestaque() == 1) echo " SELECTED "?> value="1">SIM</option>
</select>
</div>
<div class="campo">
<label>tipo</label>
<select name='tipo'>
    <option <?php if( $objeto->getTipo() == 0) echo " SELECTED "?> value="0">ALUGUEL</option>
    <option <?php if( $objeto->getTipo() == 1) echo " SELECTED "?> value="1">VENDA</option>
</select>
</div>

<div class="campo">
<label>Status Site:</label>
<select name='status'>
    <option <?php if( $objeto->getStatus() == 1) echo " SELECTED "?> value="1">ATIVADO</option>
    <option <?php if( $objeto->getStatus() == 0) echo " SELECTED "?> value="0">DESATIVADO</option>
</select>
</div>
<div class="campo">
<label>Status Contrato:</label>
<select name='acao'>
    <option <?php if( $objeto->getAcao() == 0) echo " SELECTED "?> value="0">DISPONÍVEL</option>
    <option <?php if( $objeto->getAcao() == 1) echo " SELECTED "?> value="1">VENDIDO</option>
    <option <?php if( $objeto->getAcao() == 2) echo " SELECTED "?> value="2">ALUGADO</option>
    
</select>
</div>
<fieldset>
    <legend>Mais detalhe</legend>
<div class="campo">
<label>suites</label>
<input type='text' size="4" maxlength="2" name='suites' value="<?php echo $objeto->getsuites()?>" >
</div>
<div class="campo">
<label>quartos</label>
<input type='text' size="4" maxlength="2" name='quartos' value="<?php echo $objeto->getquartos()?>" >
</div>
<div class="campo">
<label>banheiros</label>
<input type='text' size="4" maxlength="2" name='banheiros' value="<?php echo $objeto->getbanheiros()?>" >
</div>
<div class="campo">
<label>garagem</label>
<select name='garagem'>
    <option <?php if( $objeto->getGaragem() == 0) echo " SELECTED "?> value="0">NÃO</option>
    <option <?php if( $objeto->getGaragem() == 1) echo " SELECTED "?> value="1">SIM</option>
</select>
<div class="campo">
<label>Área Serviço</label>
<select name='area_servico'>
    <option <?php if( $objeto->getarea_servico() == 0) echo " SELECTED "?> value="0">NÃO</option>
    <option <?php if( $objeto->getarea_servico() == 1) echo " SELECTED "?> value="1">SIM</option>
</select>
</div>
</div>
<div class="campo">
<label>Tamanho do imóvel</label>
<input type='text' size="40" maxlength="45" name='tamanho_imovel' value="<?php echo $objeto->gettamanho_imovel()?>" >
</div>
<div class="campo">
<label>Tamanho terreno</label>
<input type='text' size="40" maxlength="45" name='tamanho_terreno' value="<?php echo $objeto->gettamanho_terreno()?>" >
</div>
</fieldset>


<button type="submit" name="botao" class="botao">Enviar</button>
</form>
<div class="col8" >
<div class="float_right margin_right_10 margin_botton10"><a href="../gerenciarImoveis.php"><img src="../imagens/voltar.jpg"></a></div>
</div>
<?php
include 'inferior.php';
?>