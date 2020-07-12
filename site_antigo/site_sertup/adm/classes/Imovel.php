<?php
class Imovel extends Seguranca{
 private $id = "0";
 private $descricao;
 private $pre_descricao;
 private $titulo;
 private $valor;
 private $categoria;
 private $destaque;
 private $tipo;
 private $status;
 private $acao;
 private $cidade;
 private $uf;
 private $endereco;
 private $bairro;
 private $quartos;
 private $banheiros;
 private $garagem;
 private $tamanho_imovel;
 private $tamanho_terreno;
 private $area_servico;
 private $suites;
 private $codigo;
 private $foto;


function __construct() {
    $this->categoria = new Categoria();
    $this->cidade = new Cidade();
    $this->uf = new Uf();
    $this->foto = new Imagem();
}

public function getCodigo() {
    return $this->codigo;
}
public function getFoto() {
    return $this->foto;
}

public function setFoto($foto) {
    $this->foto = $foto;
}


public function getAcao() {
    return $this->acao;
}

public function setAcao($acao) {
    $this->acao = $acao;
}

public function setCodigo($codigo) {
    $this->codigo = $codigo;
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

public function getPre_descricao() {
 return $this->pre_descricao;
}

public function setPre_descricao($pre_descricao) {
 $this->pre_descricao=$pre_descricao;
}

public function getTitulo() {
 return $this->titulo;
}

public function setTitulo($titulo) {
 $this->titulo=$titulo;
}

public function getValor() {
 return $this->valor;
}

public function setValor($valor) {
 $this->valor=$valor;
}

public function getCategoria() {
 return $this->categoria;
}

public function setCategoria($categoria) {
 $this->categoria=$categoria;
}

public function getDestaque() {
 return $this->destaque;
}

public function setDestaque($destaque) {
 $this->destaque=$destaque;
}

public function getTipo() {
 return $this->tipo;
}

public function setTipo($tipo) {
 $this->tipo=$tipo;
}

public function getStatus() {
 return $this->status;
}

public function setStatus($status) {
 $this->status=$status;
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

public function getEndereco() {
 return $this->endereco;
}

public function setEndereco($endereco) {
 $this->endereco=$endereco;
}

public function getBairro() {
 return $this->bairro;
}

public function setBairro($bairro) {
 $this->bairro=$bairro;
}

public function getQuartos() {
 return $this->quartos;
}

public function setQuartos($quartos) {
 $this->quartos=$quartos;
}

public function getBanheiros() {
 return $this->banheiros;
}

public function setBanheiros($banheiros) {
 $this->banheiros=$banheiros;
}

public function getGaragem() {
 return $this->garagem;
}

public function setGaragem($garagem) {
 $this->garagem=$garagem;
}

public function getTamanho_imovel() {
 return $this->tamanho_imovel;
}

public function setTamanho_imovel($tamanho_imovel) {
 $this->tamanho_imovel=$tamanho_imovel;
}

public function getTamanho_terreno() {
 return $this->tamanho_terreno;
}

public function setTamanho_terreno($tamanho_terreno) {
 $this->tamanho_terreno=$tamanho_terreno;
}

public function getArea_servico() {
 return $this->area_servico;
}

public function setArea_servico($area_servico) {
 $this->area_servico=$area_servico;
}

public function getSuites() {
 return $this->suites;
}

public function setSuites($suites) {
 $this->suites=$suites;
}



public function getForm($form){
 $this->id= $form['id']; 
 $this->descricao= $form['descricao']; 
 $this->pre_descricao= $form['pre_descricao']; 
 $this->titulo= $form['titulo']; 
 $this->valor= str_replace(',','.',str_replace('.','', $form['valor'])); 
 $this->destaque= $form['destaque']; 
 $this->tipo= $form['tipo']; 
 $this->status= $form['status']; 
 $this->categoria->setId($form['categoria']); 
 $this->cidade->setId($form['cidade']); 
 $this->uf->setId($form['uf']); 
 $this->endereco= $form['endereco']; 
 $this->bairro= $form['bairro']; 
 $this->quartos= $form['quartos']; 
 $this->banheiros= $form['banheiros']; 
 $this->garagem= $form['garagem']; 
 $this->tamanho_imovel= $form['tamanho_imovel']; 
 $this->tamanho_terreno= $form['tamanho_terreno']; 
 $this->area_servico= $form['area_servico']; 
 $this->suites= $form['suites']; 
 $this->acao= $form['acao'];
 
}


private function selecioanarCidade($id){
    $cidade = new Cidade();
    $cidade->selecionarPorId($id);
    return $cidade;
}

public function selecionarCidades(){

    $sql ="SELECT cidades.id FROM imoveis inner join cidades on imoveis.id_cidade = cidades.id group by cidades.id";
    $result = mysql_query($sql);
    $lista = array();
    $i = 0;
    while($campos = mysql_fetch_array($result)){
        $lista[$i] = new Cidade();
        $lista[$i] = $this->selecioanarCidade(parent::encrypt($campos['id']));
        $i++;
    }
    return $lista;
    
}

public function getBusca($str){
    $sql = "SELECT titulo,id FROM  imoveis WHERE  titulo LIKE  '%$str%' or id LIKE '%$str%'  order by id";
    $result = mysql_query($sql);
    $lista=  array();
    if(mysql_num_rows($result) > 0){
        while ($row = mysql_fetch_array($result)) {
            $lista[$row['id']]= "[ ".$row['id']." ] - ".$row['titulo'];
        }
    }
    return $lista;

}

public function mostraTipo(){
    switch ($this->tipo){
        case 0: return "Locação";
        case 1: return "Venda";
    }
}

public function mostraAcao(){
    switch ($this->acao){
        case 0: return "DISPONÍVEL";
        case 1: return "VENDIDO";
        case 2: return "ALUGADO";
    }
}
public function  salvar(){
if($this->id !="0"){
return $this->atualizar();
}else{
return $this->inserir();
}
}

private function  inserir(){
    $sql = "INSERT INTO imoveis(acao,descricao,pre_descricao,titulo,valor,id_categoria,destaque,tipo,status,id_cidade,id_uf,endereco,bairro,quartos,banheiros,garagem,tamanho_imovel,tamanho_terreno,area_servico,suites) VALUES ('$this->acao','$this->descricao','$this->pre_descricao','$this->titulo','$this->valor','".parent::decrypt($this->categoria->getId())."','$this->destaque','$this->tipo','$this->status','".parent::decrypt($this->cidade->getId())."','".parent::decrypt($this->uf->getId())."','$this->endereco','$this->bairro','$this->quartos','$this->banheiros','$this->garagem','$this->tamanho_imovel','$this->tamanho_terreno','$this->area_servico','$this->suites')";
    
    if(mysql_query($sql)) {
        $this->id = parent::encrypt(mysql_insert_id());
    return true;
    }else{
    return false;
    }
}

public function atualizar(){
 $sql = " UPDATE imoveis SET descricao = '$this->descricao ',acao = '$this->acao',pre_descricao = '$this->pre_descricao ',titulo = '$this->titulo ',valor = '$this->valor ',id_categoria = '".parent::decrypt($this->categoria->getId())."',destaque = '$this->destaque ',tipo = '$this->tipo ',status = '$this->status ',id_cidade = '".parent::decrypt($this->cidade->getId())."',id_uf = '".parent::decrypt($this->uf->getId())." ',endereco = '$this->endereco ',bairro = '$this->bairro ',quartos = '$this->quartos ',banheiros = '$this->banheiros ',garagem = '$this->garagem ',tamanho_imovel = '$this->tamanho_imovel ',tamanho_terreno = '$this->tamanho_terreno ',area_servico = '$this->area_servico ',suites = '$this->suites ' WHERE id= ".parent::decrypt($this->id);
if(mysql_query($sql)) {
return true;
}else{
return false;
}
}

public function excluir($id){
 $id = parent::antiInjection($id);
 $id = parent::decrypt($id);

 $sql = " DELETE FROM imoveis WHERE id = '$id'";
if(mysql_query($sql)) {
return true;
}else{
return false;
}
}

public function selecionarPorId($id){
 $id = parent::antiInjection($id);
 $id = parent::decrypt($id);
$sql = "SELECT * FROM imoveis WHERE id = '$id'";
$this->selecao($sql);
}

private function selecao($sql){
$result = mysql_query($sql) or die ("NÃƒO FOI POSSÃVEL SELECIONAR NA TABELA imoveis");
$resultado = mysql_fetch_array($result,MYSQL_ASSOC);
 $this->id= parent::encrypt($resultado['id']); 
 $this->codigo = str_pad($resultado['id'],6,'0', STR_PAD_LEFT);
 $this->descricao= $resultado['descricao']; 
 $this->pre_descricao= $resultado['pre_descricao']; 
 $this->titulo= $resultado['titulo']; 
 $this->valor= $resultado['valor']; 
 $this->categoria->selecionarPorId(parent::encrypt($resultado['id_categoria'])); 
 $this->destaque= $resultado['destaque']; 
 $this->tipo= $resultado['tipo']; 
 $this->status= $resultado['status']; 
 $this->cidade->selecionarPorId(parent::encrypt($resultado['id_cidade'])); 
 $this->uf->selecionarPorId(parent::encrypt($resultado['id_uf'])); 
 $this->endereco= $resultado['endereco']; 
 $this->bairro= $resultado['bairro']; 
 $this->quartos= $resultado['quartos']; 
 $this->banheiros= $resultado['banheiros']; 
 $this->garagem= $resultado['garagem']; 
 $this->tamanho_imovel= $resultado['tamanho_imovel']; 
 $this->tamanho_terreno= $resultado['tamanho_terreno']; 
 $this->area_servico= $resultado['area_servico']; 
 $this->suites= $resultado['suites']; 
 $this->acao= $resultado['acao'];
 $this->foto->selecionarPorPadrao($this->id);
}

public function selecionarTodos(){
$sql = "SELECT * FROM imoveis ";
return $this->listar($sql);
}

public function selecionarPorTipoIndex($tipo){
$sql = "SELECT * FROM imoveis where status='1' and tipo = $tipo order by RAND() limit 5 ";
return $this->listar($sql);
}

public function selecionarTodosPorTipo($tipo){
$sql = "SELECT * FROM imoveis where status='1' and tipo = $tipo order by valor ";
return $this->listar($sql);
}

public function selecionarBusca($tipo,$categoria,$cidade){
$sql = "SELECT * FROM imoveis where status='1' and tipo = '$tipo' and id_categoria = '".  parent::decrypt($categoria)."' and id_cidade = '". parent::decrypt($cidade)."' order by valor ";

return $this->listar($sql);
}

private function selecionarCategoria($id){
    $obj = new Categoria();
    $obj->selecionarPorId($id);
    return $obj;
}

private function selecionarUf($id){
    $obj = new Uf();
    $obj->selecionarPorId($id);
    return $obj;
}

private function selecionarCidade($id){
    $obj = new Cidade();
    $obj->selecionarPorId($id);
    return $obj;
}

private function selecionarFoto($imovel){
    $imagem = new Imagem();
    $imagem->selecionarPorPadrao($imovel);
    return  $imagem;
}

public function listar($sql){
$res = mysql_query($sql);
$lista = Array();
$i = 0;
while($resultado = mysql_fetch_array($res,MYSQL_ASSOC)){
$i++;
$lista[$i] = new Imovel();
 $lista[$i]->setId(parent::encrypt($resultado['id'])); 
 $lista[$i]->setCodigo(str_pad($resultado['id'],6,'0', STR_PAD_LEFT)); 
 $lista[$i]->setDescricao($resultado['descricao']); 
 $lista[$i]->setPre_descricao($resultado['pre_descricao']); 
 $lista[$i]->setTitulo($resultado['titulo']); 
 $lista[$i]->setValor($resultado['valor']); 
 $lista[$i]->setCategoria($this->selecionarCategoria(parent::encrypt($resultado['id_categoria']))); 
 $lista[$i]->setDestaque($resultado['destaque']); 
 $lista[$i]->setTipo($resultado['tipo']); 
 $lista[$i]->setStatus($resultado['status']); 
 $lista[$i]->setCidade($this->selecionarCidade(parent::encrypt($resultado['id_cidade']))); 
 $lista[$i]->setUf($this->selecionarUf(parent::encrypt($resultado['id_uf']))); 
 $lista[$i]->setEndereco($resultado['endereco']); 
 $lista[$i]->setBairro($resultado['bairro']); 
 $lista[$i]->setQuartos($resultado['quartos']); 
 $lista[$i]->setBanheiros($resultado['banheiros']); 
 $lista[$i]->setGaragem($resultado['garagem']); 
 $lista[$i]->setTamanho_imovel($resultado['tamanho_imovel']); 
 $lista[$i]->setTamanho_terreno($resultado['tamanho_terreno']); 
 $lista[$i]->setArea_servico($resultado['area_servico']); 
 $lista[$i]->setSuites($resultado['suites']); 
 $lista[$i]->setAcao($resultado['acao']); 
 $lista[$i]->setFoto($this->selecionarFoto(parent::encrypt($resultado['id'])));

}
return $lista;
}

}
?>