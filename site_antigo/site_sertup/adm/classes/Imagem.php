<?php
class Imagem extends Seguranca{
 private $id="0";
 private $id_imovel;
 private $imagem;
 private $imagem_thub;
 private $padrao;


function __construct() {
}

public function getId() {
    return $this->id;
}

public function setId($id) {
    $this->id = $id;
}

public function getId_imovel() {
    return $this->id_imovel;
}

public function setId_imovel($id_imovel) {
    $this->id_imovel = $id_imovel;
}

public function getImagem() {
    return $this->imagem;
}

public function setImagem($imagem) {
    $this->imagem = $imagem;
}

public function getImagem_thub() {
    return $this->imagem_thub;
}

public function setImagem_thub($imagem_thub) {
    $this->imagem_thub = $imagem_thub;
}

public function getPadrao() {
    return $this->padrao;
}

public function setPadrao($padrao) {
    $this->padrao = $padrao;
}


public function getForm($form){
 $this->selecionarPorId($form['id']); 
 $this->padrao   = $form['padrao']; 
}

public function  salvar(){
if($this->id !="0"){
return $this->atualizar();
}else{
return $this->inserir();
}
}

private function  inserir(){
$sql = "INSERT INTO imagens(id_imovel,imagem,imagem_thumb) VALUES ('".parent::decrypt($this->id_imovel)."','$this->imagem','$this->imagem_thub')";
if(mysql_query($sql)) {
return $sql;
}else{
return $sql;
}
}

public function atualizar(){
 if($this->padrao == 1){
     $sql = " UPDATE imagens SET padrao = '0' WHERE id_imovel =".  parent::decrypt($this->id_imovel);
     mysql_query($sql);     
     $sql = " UPDATE imagens SET padrao = '1' WHERE id = ".  parent::decrypt($this->id);
     mysql_query($sql);
 }else{
     $sql = " UPDATE imagens SET padrao = '0' WHERE id = ".  parent::decrypt($this->id);
     mysql_query($sql);
 }   
 
if(mysql_query($sql)) {
return true;
}else{
return false;
}
}

public function excluir($id){
 $id = parent::antiInjection($id);
 $id = parent::decrypt($id);

 $sql = " DELETE FROM imagens WHERE id = '$id'";
if(mysql_query($sql)) {
return true;
}else{
return false;
}
}

public function selecionarPorId($id){
 $id = parent::antiInjection($id);
 $id = parent::decrypt($id);
$sql = "SELECT * FROM imagens WHERE id = '$id'";
$this->selecao($sql);
}

public function selecionarPorPadrao($imovel){
$sql = "SELECT * FROM imagens WHERE id_imovel = '".parent::decrypt($imovel)."' order by padrao desc limit 1";
$this->selecao($sql);
}

private function selecao($sql){
$result = mysql_query($sql) or die ("NÃO FOI POSSÍVEL SELECIONAR NA TABELA imagens");
if(mysql_num_rows($result)> 0 ){
$resultado = mysql_fetch_array($result,MYSQL_ASSOC);
 $this->id          = parent::encrypt($resultado['id']); 
 $this->id_imovel   = parent::encrypt($resultado['id_imovel']); 
 $this->imagem      = $resultado['imagem']; 
 $this->padrao      = $resultado['padrao']; 
 $this->imagem_thub = $resultado['imagem_thumb']; 
}else{
 $this->imagem      = "sem-foto.jpg"; 
 $this->imagem_thub = "sem-foto_thumb.jpg";     
}
}

public function selecionarTodos($imovel){
$sql = "SELECT * FROM imagens WHERE id_imovel = ".  parent::decrypt($imovel);
return $this->listar($sql);
}

public function listar($sql){
$res = mysql_query($sql);
$lista = Array();
$i = 0;
while($resultado = mysql_fetch_array($res,MYSQL_ASSOC)){
$i++;
$lista[$i] = new Imagem();
 $lista[$i]->setId(parent::encrypt($resultado['id'])); 
 $lista[$i]->setId_imovel($resultado['id_imovel']); 
 $lista[$i]->setImagem($resultado['imagem']); 
 $lista[$i]->setPadrao($resultado['padrao']); 
 $lista[$i]->setImagem_thub($resultado['imagem_thumb']); 


}
return $lista;
}

}
?>