<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'pdo.php';
 

 $connDB  = conexaoPDO::getConnection();
class temperaturaDAO{
 
    public $id, $hora, $data_monitoramento, $temperatura, $sensor_L1, $sensor_L2, $sensor_L3, $entry, $query;
    //public static $db;


    public function __construct() {
             //$this->db = $connDB;
             $this->entry = "{$this->temperatura}|_|{$this->hora} |-| {$this->data_monitoramento}";
         }
         
        //function query(){
          
             
             //return $resultsquery;
       // }   
}
            $sql = 'SELECT * FROM monitoramento';
            $resultsquery = $connDB->query($sql);
            $resultsquery->setFetchMode(PDO::FETCH_CLASS, 'temperaturaDAO');
     
            while($row = $resultsquery->fetch()){
                echo $row->entry, '<br>';
             }

//    $a = temperaturacDAO::query();




?>