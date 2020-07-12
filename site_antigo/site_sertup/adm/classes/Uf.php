<?php
class  Uf extends Seguranca{
 private $id;
 private $descricao;
 private $sigla;


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

public function getSigla() {
 return $this->sigla;
}

public function setSigla($sigla) {
 $this->sigla=$sigla;
}

public function getForm($form){
 $this->id= $form['id']; 
 $this->descricao= $form['descricao']; 
 $this->sigla= $form['sigla']; 
}

public function  salvar(){
if($this->id !=0){
return $this->atualizar();
}else{
return $this->inserir();
}
}

private function  inserir(){
$sql = "INSERT INTO uf(descricao,sigla) VALUES ('$this->descricao','$this->sigla')";
if(mysql_query($sql)) {
return true;
}else{
return false;
}
}

public function atualizar(){
 $sql = " UPDATE uf SET descricao = '$this->descricao ',sigla = '$this->sigla ' WHERE id= $this->id ";
if(mysql_query($sql)) {
return true;
}else{
return false;
}
}

public function excluir($id){
 $id = parent::antiInjection($id);
 $id = parent::decrypt($id);

 $sql = " DELETE FROM uf WHERE id = '$id'";
if(mysql_query($sql)) {
return true;
}else{
return false;
}
}

public function selecionarPorId($id){
 $id = parent::antiInjection($id);
 $id = parent::decrypt($id);
 $sql = "SELECT * FROM uf WHERE id = '$id'";
 $this->selecao($sql);
 return $this;
}

public function selected($estado){
    if($estado == $this->id){
        return " SELECTED ";
    }else{
        return "";
    }
}

private function selecao($sql){
$result = mysql_query($sql) or die ("NÃO FOI POSSÍVEL SELECIONAR NA TABELA endereco_uf");
$resultado = mysql_fetch_array($result,MYSQL_ASSOC);
 $this->id= parent::encrypt($resultado['id']);
 $this->descricao= strtoupper($resultado['descricao']); 
 $this->sigla= strtoupper($resultado['sigla']);
}

public function selecionarTodos(){
$sql = "SELECT * FROM uf ";
return $this->listar($sql);
}

public function listar($sql){
$res = mysql_query($sql);
$lista = Array();
$i = 0;
while($resultado = mysql_fetch_array($res,MYSQL_ASSOC)){
$i++;
$lista[$i] = new Uf();
 $lista[$i]->setId(parent::encrypt($resultado['id']));
 $lista[$i]->setDescricao(strtoupper($resultado['descricao'])); 
 $lista[$i]->setSigla(strtoupper($resultado['sigla'])); 


}
return $lista;
}

}
?>