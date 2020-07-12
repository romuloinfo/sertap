<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aplicacao
 *
 * @author Anderson
 */
class Aplicacao extends Seguranca {
    private $id;
    private $descricao;



    function __construct() {

    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    function verificaPermissao($grupo,$acao){
    switch ($acao){



        case "r":$sql="SELECT * FROM  `aplicacoes_grupos` WHERE  `id_grupo` =".parent::decrypt($grupo)." AND  `id_aplicacao` =".  parent::decrypt($this->id)." AND  `select` =1";break;
        case "c":$sql="SELECT * FROM  `aplicacoes_grupos` WHERE  `id_grupo` =".parent::decrypt($grupo)." AND  `id_aplicacao` =".  parent::decrypt($this->id)." AND  `insert` =1";break;
        case "u":$sql="SELECT * FROM  `aplicacoes_grupos` WHERE  `id_grupo` =".parent::decrypt($grupo)." AND  `id_aplicacao` =".  parent::decrypt($this->id)." AND  `update` =1";break;
        case "d":$sql="SELECT * FROM  `aplicacoes_grupos` WHERE  `id_grupo` =".parent::decrypt($grupo)." AND  `id_aplicacao` =".  parent::decrypt($this->id)." AND  `delete` =1";break;
        default : return "";
    }
        echo $sql;
        if(mysql_num_rows(mysql_query($sql)) >0){
            return  " CHECKED ";
        }else{
            return "";
        }

    }

public function selecionarTodos(){
$sql = "SELECT * FROM aplicacoes ";
return $this->listar($sql);
}

public function listar($sql){
$res = mysql_query($sql);
$lista = Array();
$i = 0;
while($resultado = mysql_fetch_array($res,MYSQL_ASSOC)){
$i++;
$lista[$i] = new Aplicacao();
 $lista[$i]->setId(parent::encrypt($resultado['id']));
 $lista[$i]->setDescricao($resultado['descricao']);


}
return $lista;
}


}
?>
