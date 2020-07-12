<?php
class Cidade  extends Seguranca{
 private $id="0";
 private $descricao;
 private $uf;


function __construct() {
    $this->uf = new Uf();
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

public function getUf() {
 return $this->uf;
}

public function setUf($uf) {
 $this->uf = $uf;
}

public function getForm($form){
 $this->id = $form['id'];
 $this->descricao = $form['descricao'];
 $this->uf->setId($form['uf']);
}

public function  salvar(){
    if($this->id != "0"){
        return $this->atualizar();
    }else{
    
        return $this->inserir();
    }
}


public function selected($id){
    if($id == $this->id){
        return " SELECTED ";
    }
        return "";
}
public function  inserir(){
    $sql = "INSERT INTO  cidades(descricao,uf_id) VALUES ('$this->descricao','".parent::decrypt($this->uf->getId())."')";
    if(mysql_query($sql)) {
        $this->id = parent::encrypt(mysql_insert_id());
        return true;
    }else{
        return false;
    }
    }

public function atualizar(){
    $sql = " UPDATE  cidades SET descricao = '$this->descricao', uf_id = '".parent::decrypt($this->uf->getId())."' WHERE id= ".parent::decrypt($this->id);
    if(mysql_query($sql)) {
        return true;
    }else{
        return false;
    }
}

public function excluir($id){
 $id = parent::antiInjection($id);
 $id = parent::decrypt($id);

 $sql = " DELETE FROM cidades WHERE id = '$id'";
if(mysql_query($sql)) {
    return true;
}else{
    return false;
}
}

public function selecionarPorId($id){
 $id = parent::antiInjection($id);
 $id = parent::decrypt($id);
$sql = "SELECT * FROM cidades WHERE id = '$id'";
$this->selecao($sql);
}
public function selecionarPorNome($nome){
$sql = "SELECT * FROM cidades WHERE nome = '$nome'";
$this->selecao($sql);
}

public function selecionarPorUf($id){
$sql = "SELECT * FROM cidades WHERE uf_id = '".parent::decrypt($id)."' order by descricao asc";
return $this->listar($sql);
}

private function selecao($sql){
$result = mysql_query($sql) or die ("NÃO FOI POSSÍVEL SELECIONAR NA TABELA ENDERECO");
$resultado = mysql_fetch_array($result,MYSQL_ASSOC);
 $this->id= parent::encrypt($resultado['id']);
 $this->descricao= strtoupper($resultado['descricao']); 
 $this->uf->selecionarPorId(parent::encrypt($resultado['uf_id']));
}




public function selecionarTodos(){
$sql = "SELECT * FROM cidades order by descricao desc ";
return $this->listar($sql);
}
private function selecionarUf($id){
    $estado = new Uf();
    $estado->selecionarPorId($id);
    return $estado;
}
public function listar($sql){
$res = mysql_query($sql);
$lista = Array();
$i = 0;
while($resultado = mysql_fetch_array($res,MYSQL_ASSOC)){
$i++;
$lista[$i] = new Cidade();
 $lista[$i]->setId(parent::encrypt($resultado['id']));
 $lista[$i]->setDescricao(strtoupper($resultado['descricao']));
 $lista[$i]->setUf($this->selecionarUf(parent::encrypt($resultado['uf_id'])));


}
return $lista;
}

}
?>