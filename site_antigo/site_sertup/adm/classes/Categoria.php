<?php
class Categoria extends Seguranca{
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
    $sql = "INSERT INTO categorias(descricao) VALUES ('$this->descricao')";
    if(mysql_query($sql)) {
        return true;
    }else{
        return false;
    }
    }

public function atualizar(){
    $sql = " UPDATE categorias SET descricao = '$this->descricao ' WHERE id= ".  parent::decrypt($this->id);
    if(mysql_query($sql)) {
        return true;
    }else{
        return false;
    }
}

public function excluir($id){
 $id = parent::antiInjection($id);
 $id = parent::decrypt($id);

 $sql = " DELETE FROM categorias WHERE id = '$id'";
if(mysql_query($sql)) {
    return true;
}else{
    return false;
}
}

public function selected($id){
    
    if($id == $this->id){
        return " SELECTED ";
    }
    return "";
}

public function selecionarPorId($id){
 $id = parent::antiInjection($id);
 $id = parent::decrypt($id);
 $sql = "SELECT * FROM categorias WHERE id = '$id'";
 $this->selecao($sql);
}


private function selecao($sql){
 $result = mysql_query($sql) or die ("N?O FOI POSS?VEL SELECIONAR NA TABELA categorias");
 $resultado = mysql_fetch_array($result,MYSQL_ASSOC);
 $this->id= parent::encrypt($resultado['id']);
 $this->descricao= strtoupper($resultado['descricao']); 
}

public function selecionarTodos(){
$sql = "SELECT * FROM categorias order by descricao ";
return $this->listar($sql);
}

public function listar($sql){
$res = mysql_query($sql);
$lista = Array();
$i = 0;
while($resultado = mysql_fetch_array($res,MYSQL_ASSOC)){
$i++;
$lista[$i] = new Categoria();
 $lista[$i]->setId(parent::encrypt($resultado['id']));
 $lista[$i]->setDescricao(strtoupper($resultado['descricao']));


}
return $lista;
}

}
?>