<?php
class Conexao {
    private $conn;


    public function getConn() {
        return $this->conn;
    }

    function __construct() {
        $this->conectar();
    }


    function conectar(){
        $this->conn = mysql_connect('localhost', 'root', '');
        if (!$this->conn) {
           # die('NÃO FOI POSS�?VEL CONECTAR A BASE DE DADOS' . mysql_connect_error());
        }
        mysql_select_db('sertapimoveis',$this->conn);
        // TODO: insert your code here.
    }

    function desconectar(){
        mysql_close($this->conn);
    }



   /* Transactions functions */

   function begin(){
      $null = mysql_query("START TRANSACTION", $this->conn);
      return mysql_query("BEGIN", $this->conn);
   }

   function commit(){
      return mysql_query("COMMIT", $this->conn);
   }

   function rollback(){
      return mysql_query("ROLLBACK", $this->conn);
   }

   function transaction($q_array){
         $retval = 1;

      $this->begin();

         foreach($q_array as $qa){
            $result = mysql_query($qa['query'], $this->conn);
            if(mysql_affected_rows() == 0){ $retval = 0; }
         }

      if($retval == 0){
         $this->rollback();
         return false;
      }else{
         $this->commit();
         return true;
      }
   }


}
?>
