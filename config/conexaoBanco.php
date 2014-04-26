<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
Class Connect_MySql{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "heliotermico";
    private $con;
    private $sql;
            
    public static function connectDB(){
        if($this->con == NULL){
            $this->con = mysql_connect($this->host, $this->user, $this->pass, $this->db);
        } 
        return $this->con;
    }
    
    function selectDB(){
        $sel = mysql_select_db($this->db) or die ($this->erro(mysql_error()));
        
        if($sel){
            return true;
        }else{
            return FALSE;
        }
    }
    
    function queryDB(){
        $query = mysql_query($this->sql) or die($this->erro(mysql_error()));
        return $query;
    }
    
    
    
}

?>

