<?php
include 'superior.php';
$usuario = new Usuario();

if(isset($_POST['enviar'])){
    $usuario->getForm($_POST);
    if ($usuario->salvar()== true){
        echo "<script>alert('CADASTRO REALIZADO COM SUCESSO.')</script>";
        echo "<script>window.location='../gerenciarUsuarios.php'</script>";
    }else{
        echo "<script>alert('NÃO FOI POSSÍVEL REALIZAR CADASTRO, VERIFIQUE SE TODOS OS DADOS ESTÃO CORRETOS.')</script>";
        echo "<script>window.location='../gerenciarUsuarios.php'</script>";
    }
}
if(isset($_GET['id'])){
    $usuario->selecionarPorId($_GET['id']);
}
echo "teste";
//$grupo = new Grupo();
//$listaGrupo = $grupo->selecionarTodos();
echo "teste2";
?>
    <h2>Inserir/Alterar Cadastro de Atividade</h2>
    Campos com <em>*</em> são Obrigatórios<br><br>
<form name='Form'  method='POST' action='usuario.php'>
    <input type='hidden' name='id' value='<?php echo $usuario->getId()?>'>
    <input type='hidden' name='enviar' value='true'>
    <div class="campo">
    <label>*Nome Completo:</label>
    <input type='text' name='nome' value="<?php echo $usuario->getNome()?>" size="70" >
    </div>
    <div class="campo">
    <label>*Usuário:</label>
    <input type='text' name='usuario' value="<?php echo $usuario->getUsuario()?>" size="70" >
    </div>
    <div class="campo">
    <label>*Status:</label>
            <select name="status">
                <option value="1">Ativado<option>
                <option value="2">Desativado<option>
            </select>
    </div>
<?php
if(! (isset($_GET['id']))){
?>
    <div class="campo">
    <label>*Senha:</label>
    <input type='password' name='senha' value="<?php echo $usuario->getSenha()?>" size="70" >
    </div>
<?php
}
?>

    
    <a href="../gerenciarUsuarios.php" class="botao">Cancelar</a>
    <button type='submit' name='botao' class="botao">Enviar</button>


</form>
<?php
include '../inferior.php';
?>