<?php
class Usuario extends Seguranca {
        private $id="0";
	private $senha="";
	private $nome;
	private $status="";
        private $grupo;
        private $usuario="";


    function __construct() {
        $this->grupo = new Grupo();

    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getGrupo() {
        return $this->grupo;
    }

    public function setGrupo($grupo) {
        $this->grupo = $grupo;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }





    
public function getForm($form){
 $this->id = $form['id']; 
 $this->nome      = $form['nome']; 
 $this->usuario   = $form['usuario'];

 if(isset($form['senha'])){
    $this->senha     = $form['senha'];
 }
 $this->status    = $form['status'];
 $this->grupo->setId($form['grupo']);
}    

public function  salvar(){
   
if($this->id !="0"){

return $this->atualizar();
}else{

return $this->inserir();
}
}

    function inserir(){
        $sql = "SELECT * FROM usuarios WHERE usuario = '$this->usuario' ";
        $result = mysql_query($sql);
        $linhas =  mysql_numrows($result);
        if($linhas > 0){
            echo "<script>alert('USU�RIO J� EXISTE NO SISTEMA, N�O FOI POSS�VEL INSERIR UM NOVO REGISTRO.')</script>";
            return false;
        }else {
            $insere = "INSERT INTO usuarios(senha,nome,grupo_id,status,usuario)VALUES('".md5($this->senha)."','$this->nome','".parent::decrypt($this->grupo->getId())."','$this->status','$this->usuario')";
            mysql_query($insere) or die ("N�O FOI POSSIVEL GRAVAR NA TABELA USUARIOS");
           if(mysql_error()){
               return false;
           }else{
               return true;
           }
        }
    }
    function atualizar(){
        $update = "UPDATE usuarios SET usuario = '$this->usuario',grupo_id='".parent::decrypt($this->grupo->getId())."',status='$this->status',nome='$this->nome' WHERE id =". parent::decrypt($this->id);
        echo $update;
        mysql_query($update);
        if(mysql_error()){
            return false;
        }else{
            return true;
        }
    }
    
public function getSelected($status){
  if ($status == $this->status){
      return "SELECTED";
  }else{
      return "";
  }

}    

     function excluir($id){
        $delete = "DELETE FROM usuarios WHERE id =" . parent::decrypt(($id));
        mysql_query($delete) or die ("<script language= 'JavaScript'> location.href='../painelControle/gerenciarUsuarios.php?msg=erro'</script>");
    }

    function selecionarPorId($id){
        $id = parent::antiInjection($id);
        $sql = "SELECT * FROM usuarios WHERE id =". parent::decrypt($id);
        $this->selecao($sql);
    }
    function selecionarPorUsuario($valor){
        $valor = parent::antiInjection($valor);
        $sql = "SELECT * FROM usuarios WHERE usuario ='". $valor."'";
        self::selecao($sql);
    }
    function selecionarPorUserSenha($user,$senha){
        $sql = "SELECT * FROM usuarios WHERE usuario ='$user' and senha = '$senha'";
        $this->selecao($sql);
    }
    function selecionarPorUserSenhaAtivo($user,$senha){
        $sql = "SELECT * FROM usuarios WHERE status =1 and usuario ='$user' and senha = '$senha'";
        $this->selecao($sql);
    }

   public function selecionarTodos(){
           $sql = "SELECT * FROM usuarios";
           return $this->lista($sql);
   }

   private function selecionarCliente($valor){
       $cliente = new Pessoa();
       $cliente->selecionarPorId($valor);
       return $cliente;
   }
   public function alterarSenha($novaSenha,$senhaAntiga){

           if(md5($senhaAntiga) == $this->senha){
              $this->senha =  $novaSenha;
              $this->atualizar();
              return true;
           }else{
              return false;
           }
       }   

private function selecao($sql){
        $result = mysql_query($sql);
        $campos = mysql_fetch_array($result,MYSQL_ASSOC);
        $this->id           =  parent::encrypt($campos['id']);
        $this->usuario      =  $campos['usuario'];
        $this->senha        =  $campos['senha'];
        $this->grupo->selecionarPorId(parent::encrypt($campos['grupo_id']));
        $this->status       =  $campos['status'];
        $this->nome         =  $campos['nome'];
    }
    function selecionarGrupo($id){
        $grupo = new Grupo();
        $grupo->selecionarPorId($id);
        return $grupo;
    }

    function lista($sql){
         $result = mysql_query($sql);
         $lista = Array();
         $i = 0;
        while($campos = mysql_fetch_array($result,MYSQL_ASSOC)){
            $lista[$i] = new Usuario();
            $lista[$i]->setId($this->encrypt($campos['id']));
            $lista[$i]->setSenha($campos['senha']);
            $lista[$i]->setUsuario($campos['usuario']);
            $lista[$i]->setStatus($campos['status']);
            $lista[$i]->setGrupo($this->selecionarGrupo(parent::encrypt($campos['grupo_id'])));
            $lista[$i]->setNome($campos['nome']);
            $i++;
        }
        return $lista;
    }
    function verificaExistencia(){
    return false;
    }
}
?>
