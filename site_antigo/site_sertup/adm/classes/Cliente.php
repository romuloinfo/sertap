<?php
class Cliente extends Seguranca{
 private $id="0";
 private $nome;
 private $endereco;
 private $cpf_cnpj;
 private $bairro;
 private $telefone;
 private $celular;
 private $email;
 private $cidade;
 private $uf;


function __construct() {
    $this->cidade = new Cidade();
    $this->uf = new Uf();
}

public function getId() {
 return $this->id;
}

public function setId($id) {
 $this->id=$id;
}

public function getNome() {
 return $this->nome;
}

public function setNome($nome) {
 $this->nome=$nome;
}

public function getEndereco() {
 return $this->endereco;
}

public function setEndereco($endereco) {
 $this->endereco=$endereco;
}

public function getCpf_cnpj() {
 return $this->cpf_cnpj;
}

public function setCpf_cnpj($cpf_cnpj) {
 $this->cpf_cnpj=$cpf_cnpj;
}

public function getBairro() {
 return $this->bairro;
}

public function setBairro($bairro) {
 $this->bairro=$bairro;
}

public function getTelefone() {
 return $this->telefone;
}

public function setTelefone($telefone) {
 $this->telefone=$telefone;
}

public function getCelular() {
 return $this->celular;
}

public function setCelular($celular) {
 $this->celular=$celular;
}

public function getEmail() {
 return $this->email;
}

public function setEmail($email) {
 $this->email=$email;
}

public function getCidade() {
 return $this->cidade;
}

public function setCidade($cidade) {
 $this->cidade=$cidade;
}

public function getUf() {
 return $this->uf;
}

public function setUf($uf) {
 $this->uf=$uf;
}

public function getForm($form){
 $this->id= $form['id']; 
 $this->nome= $form['nome']; 
 $this->endereco= $form['endereco']; 
 $this->cpf_cnpj= $form['cpf_cnpj']; 
 $this->bairro= $form['bairro']; 
 $this->telefone= $form['telefone']; 
 $this->celular= $form['celular']; 
 $this->email= $form['email']; 
 $this->cidade->selecionarPorId($form['cidade']); 
 $this->uf->selecionarPorId($form['uf']); 
}


public function getBusca($str){
    $sql = "SELECT nome,id FROM  clientes WHERE  nome LIKE  '%$str%' order by nome";
    $result = mysql_query($sql);
    $lista=  array();
    if(mysql_num_rows($result) > 0){
        while ($row = mysql_fetch_array($result)) {
            $lista[$row['id']]= $row['nome'];
        }
    }
    return $lista;

}

public function  salvar(){
if($this->id !="0"){
return $this->atualizar();
}else{
return $this->inserir();
}
}

private function  inserir(){
$sql = "INSERT INTO clientes(nome,endereco,cpf_cnpj,bairro,telefone,celular,email,id_cidade,id_uf) VALUES ('$this->nome','$this->endereco','$this->cpf_cnpj','$this->bairro','$this->telefone','$this->celular','$this->email','".parent::decrypt($this->cidade->getId())."','".parent::decrypt($this->uf->getId())."')";
if(mysql_query($sql)) {
return true;
}else{
return false;
}
}

public function atualizar(){
 $sql = " UPDATE clientes SET nome = '$this->nome ',endereco = '$this->endereco ',cpf_cnpj = '$this->cpf_cnpj ',bairro = '$this->bairro ',telefone = '$this->telefone ',celular = '$this->celular ',email = '$this->email ',id_cidade = '".parent::decrypt($this->cidade->getId())."',id_uf = '".parent::decrypt($this->uf->getId())."' WHERE id=".  parent::decrypt($this->id);
if(mysql_query($sql)) {
return true;
}else{
return false;
}
}

public function excluir($id){
 $id = parent::antiInjection($id);
 $id = parent::decrypt($id);

 $sql = " DELETE FROM clientes WHERE id = '$id'";
if(mysql_query($sql)) {
return true;
}else{
return false;
}
}

public function selecionarPorId($id){
 $id = parent::antiInjection($id);
 $id = parent::decrypt($id);
$sql = "SELECT * FROM clientes WHERE id = '$id'";
$this->selecao($sql);
}

private function selecao($sql){
$result = mysql_query($sql) or die ("NÃO FOI POSSÍVEL SELECIONAR NA TABELA clientes");
$resultado = mysql_fetch_array($result,MYSQL_ASSOC);
 $this->id= parent::encrypt($resultado['id']); 
 $this->nome= $resultado['nome']; 
 $this->endereco= $resultado['endereco']; 
 $this->cpf_cnpj= $resultado['cpf_cnpj']; 
 $this->bairro= $resultado['bairro']; 
 $this->telefone= $resultado['telefone']; 
 $this->celular= $resultado['celular']; 
 $this->email= $resultado['email']; 
 $this->cidade->selecionarPorId(parent::encrypt($resultado['id_cidade'])); 
 $this->uf->selecionarPorId(parent::encrypt($resultado['id_uf'])); 
}

public function selecionarTodos(){
$sql = "SELECT * FROM clientes ";
return $this->listar($sql);
}
private function selecionarCidade($id){
    $cidade = new Cidade();
    $cidade->selecionarPorId($id);
    return $cidade;
}

private function selecionarUf($id){
    $uf = new Uf();
    $uf->selecionarPorId($id);
    return $uf;
}


public function listar($sql){
$res = mysql_query($sql);
$lista = Array();
$i = 0;
while($resultado = mysql_fetch_array($res,MYSQL_ASSOC)){
$i++;
$lista[$i] = new Cliente();
 $lista[$i]->setId(parent::encrypt($resultado['id'])); 
 $lista[$i]->setNome($resultado['nome']); 
 $lista[$i]->setEndereco($resultado['endereco']); 
 $lista[$i]->setCpf_cnpj($resultado['cpf_cnpj']); 
 $lista[$i]->setBairro($resultado['bairro']); 
 $lista[$i]->setTelefone($resultado['telefone']); 
 $lista[$i]->setCelular($resultado['celular']); 
 $lista[$i]->setEmail($resultado['email']); 
 $lista[$i]->setCidade($this->selecionarCidade(parent::encrypt($resultado['id_cidade']))); 
 $lista[$i]->setUf($this->selecionarCidade(parent::encrypt($resultado['id_uf']))); 


}
return $lista;
}

}
?>