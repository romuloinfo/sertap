<?php
class Contrato extends Seguranca{
 private $id="0";
 private $data;
 private $cliente;
 private $contrato;
 private $imovel;
 private $data_inicio;
 private $data_fim;
 private $status;
 private $acao;


function __construct() {
    $this->cliente = new Cliente();
    $this->imovel = new Imovel();
}
public function getData() {
    return $this->data;
}

public function setData($data) {
    $this->data = $data;
}
public function getAcao() {
    return $this->acao;
}

public function setAcao($acao) {
    $this->acao = $acao;
}


public function getImovel() {
    return $this->imovel;
}

public function setImovel($imovel) {
    $this->imovel = $imovel;
}


public function getId() {
 return $this->id;
}

public function setId($id) {
 $this->id=$id;
}

public function getCliente() {
 return $this->cliente;
}

public function setCliente($cliente) {
 $this->cliente=$cliente;
}

public function getContrato() {
 return $this->contrato;
}

public function setContrato($contrato) {
 $this->contrato=$contrato;
}

public function getData_inicio() {
 return $this->data_inicio;
}

public function setData_inicio($data_inicio) {
 $this->data_inicio=$data_inicio;
}

public function getData_fim() {
 return $this->data_fim;
}

public function setData_fim($data_fim) {
 $this->data_fim=$data_fim;
}

public function getStatus() {
 return $this->status;
}

public function setStatus($status) {
 $this->status=$status;
}

public function getForm($form){
 $this->id= $form['id']; 
 $this->cliente->setId($form['id_cliente']); 
 $this->imovel->setId($form['id_imovel']); 
 $this->contrato= str_pad(ereg_replace('[^0-9]', '',$form['id_contrato']), 6, '0', STR_PAD_LEFT);
 $this->data_inicio= $form['data_inicio']; 
 $this->data_fim = $form['data_fim']; 
 $this->status= $form['status']; 
 $this->acao= $form['acao'];
}

public function  salvar(){
if($this->id !="0"){
return $this->atualizar();
}else{
return $this->inserir();
}
}

private function  inserir(){
$sql = "INSERT INTO contratos(id_cliente,id_contrato,data_inicio,data_fim,status,id_imovel,acao) VALUES ('".$this->cliente->getId()."','$this->contrato','".parent::dataISO($this->data_inicio)."','".parent::dataISO($this->data_fim)."','$this->status','".$this->imovel->getId()."','$this->acao')";
echo $sql;
if(mysql_query($sql)) {
return true;
}else{
return false;
}
}

public function atualizar(){
 $sql = " UPDATE contratos SET id_cliente = '".parent::decrypt($this->cliente->getId())."',id_contrato = '$this->contrato ',data_inicio = '".parent::dataISO($this->data_inicio)."',data_fim = '".parent::dataISO($this->data_fim)."',status = '$this->status ',acao = '$this->acao ' WHERE id=".  parent::decrypt($this->id);
if(mysql_query($sql)) {
return true;
}else{
return false;
}
}

public function excluir($id){
 $id = parent::antiInjection($id);
 $id = parent::decrypt($id);
 $sql = " DELETE FROM contratos WHERE id_contrato = '$id'";
 if(mysql_query($sql)) {
    return true;
 }else{
   return false;
 }
}

public function selecionarPorId($id){
 $id = parent::antiInjection($id);
 $id = parent::decrypt($id);
$sql = "SELECT * FROM contratos WHERE id_contrato = '$id'";
$this->selecao($sql);
}

private function selecao($sql){
$result = mysql_query($sql) or die ("NÃO FOI POSSÍVEL SELECIONAR NA TABELA contratos");
$resultado = mysql_fetch_array($result,MYSQL_ASSOC);
 $this->id= parent::encrypt($resultado['id']); 
 $this->cliente->selecionarPorId(parent::encrypt($resultado['id_cliente'])); 
 $this->imovel->selecionarPorId(parent::encrypt($resultado['id_imovel'])); 
 $this->contrato    = $resultado['id_contrato']; 
 $this->data_inicio = parent::dataBR($resultado['data_inicio']); 
 $this->data_fim    = parent::dataBR($resultado['data_fim']); 
 $this->status      = $resultado['status']; 
 $this->acao      = $resultado['acao']; 
}

public function selecionarTodos(){
$sql = "SELECT * FROM contratos ";
return $this->listar($sql);
}
private function selecioanarCliente($id){
    $cliente = new Cliente();
    $cliente->selecionarPorId($id);
    return $cliente;
}

private function selecioanarImovel($id){
    $imovel = new Imovel();
    $imovel->selecionarPorId($id);
    return $imovel;
}

public function listar($sql){
$res = mysql_query($sql);
$lista = Array();
$i = 0;
while($resultado = mysql_fetch_array($res,MYSQL_ASSOC)){
$i++;
$lista[$i] = new Contratos();
 $lista[$i]->setId(parent::encrypt($resultado['id'])); 
 $lista[$i]->setCliente($this->selecioanarCliente(parent::encrypt($resultado['id_cliente']))); 
 $lista[$i]->setImovel($this->selecioanarImovel(parent::encrypt($resultado['id_imovel']))); 
 $lista[$i]->setId_contrato($resultado['id_contrato']); 
 $lista[$i]->setData_inicio(parent::dataBR($resultado['data_inicio'])); 
 $lista[$i]->setData_fim(parent::dataBR($resultado['data_fim'])); 
 $lista[$i]->setStatus($resultado['status']); 
 $lista[$i]->setAcao($resultado['acao']); 


}
return $lista;
}

}
?>