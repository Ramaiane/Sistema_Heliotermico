<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*function conexao(){
 $host = "localhost";
 $user = "root";
 $pass = "";
 $db = "heliotermico";
 
 
 $con = mysql_connect($host, $user, $pass) or die ('Erro na rotina de conexao: '.  mysql_error());
 mysql_select_db($db) or die ('Erro na rotina de conexao: '.  mysql_error()) ;
 //$sql; 
}
*/
//conexao();
    
 Class Connect_MySql{
     
     
     var $host = "localhost";
     var $user = "root";
     var $pass = "";
     var $db = "sistema_heliotermico";
     var $con = "";
     var $sql;
             

     public function connectDB() {
          $this->con = mysql_connect($this->host, $this->user, $this->pass, $this->db) or die ('Erro na rotina de conexao: '.  mysql_error());
         
     }
    
     function selectDB(){
         $sel = mysql_select_db($this->db) or die ('Erro: '.  mysql_error());
         if($sel)
              return TRUE;
         else
               return FALSE;
     }
     function queryDB($query){
         $resultQuery = mysql_query($this->sql, $query) or die ('Erro na consulta '.mysql_error());
         return $resultQuery;
     }
     
     function set($prop, $value){
         $this->$prop = $value;
     }
     
     function getSQL(){
         return $this->sql;
     }
     
     function closeDB(){
         return mysql_close($this->con);
     }
 }
 
 //$a = new Connect_MySql();
 //$a->connectDB()
         
        
    
?>

