<?php
class Grupo extends Seguranca{
 private $id ="0";
 private $descricao;


function __construct() {
}

public function getId() {
 return $this->id;
}

public function setId($id) {
 $this->id=$id;
}

public function getDescricao() {
 return $this->descricao;
}

public function setDescricao($descricao) {
 $this->descricao=$descricao;
}

public function getForm($form){
 $this->id= $form['id']; 
 $this->descricao= $form['descricao']; 
}

public function  salvar(){
    if($this->id !="0"){
        return $this->atualizar();
    }else{
        return $this->inserir();
    }
}

private function  inserir(){
    $sql = "INSERT INTO usuarios_grupos(descricao) VALUES ('$this->descricao')";
    if(mysql_query($sql)) {
        return true;
    }else{
        return false;
    }
    }

public function atualizar(){
    $sql = " UPDATE usuarios_grupos SET descricao = '$this->descricao ' WHERE id=".parent::decrypt($this->id);
    if(mysql_query($sql)) {
        return true;
    }else{
        return false;
    }
}

public function excluir($id){
 $id = parent::antiInjection($id);
 $id = parent::decrypt($id);

 $sql = " DELETE FROM usuarios_grupos WHERE id = '$id'";
if(mysql_query($sql)) {
    return true;
}else{
    return false;
}
}

public function selecionarPorId($id){
 $id = parent::antiInjection($id);
 $id = parent::decrypt($id);
 $sql = "SELECT * FROM usuarios_grupos WHERE id = '$id'";
 $this->selecao($sql);
 return $this;
}


public function select($id){
    if($id == $this->id){
        return " SELECTED ";
    }else{
        return "";
    }
}

private function selecao($sql){
 $result = mysql_query($sql) or die ("N�O FOI POSS�VEL SELECIONAR NA TABELA USUARIOS_GRUPOS");
 $resultado = mysql_fetch_array($result,MYSQL_ASSOC);
 $this->id= parent::encrypt($resultado['id']);
 $this->descricao= $resultado['descricao']; 
}

public function selecionarTodos(){
$sql = "SELECT * FROM usuarios_grupos  ";
return $this->listar($sql);
}

public function listar($sql){
$res = mysql_query($sql);
$lista = Array();
$i = 0;
while($resultado = mysql_fetch_array($res,MYSQL_ASSOC)){
$i++;
$lista[$i] = new Atividade ();
 $lista[$i]->setId(parent::encrypt($resultado['id']));
 $lista[$i]->setDescricao($resultado['descricao']); 


}
return $lista;
}

}
?>