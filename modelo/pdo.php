<?php



class conexaoPDO{

     //protected static $host = "localhost";               //mysql hostname
    // protected static $user = "root";                    //mysql user name
    // protected static $pass = "";                      //mysql password                               
    // protected static $db = "sistema_heliotermico";     //mysql data base name 
     protected static $conn;




     private function __construct(){
         try{
             self::$conn = new PDO( 'mysql:host = "localhost" ;dbname=sistema_heliotermico', 'root', '');
               /** mensagem dizendo se esta conectado **/
         //echo 'Conectado ao Banco de dados';
         } catch (Exception $ex) {
            echo $ex->getMessage();
         }
     }
 
     public static function getConnection(){
         
         if(!self::$conn){
             //nova conexao
             new conexaoPDO();
         }
         
         return self::$conn;
     }
     
     public function disconnect(){
         self::$conn = null;
     }
     }
    // $query = $conn->query('SELECT * FROM monitoramento');
     //$query->setFetchMode(PDO::FETCH_CLASS, 'monitoramento');
     
     //while($row = $query->fetch()){
        //  echo $row->entry, '<br>';
     //}
     
     //class monitoramento{
       //  public $id, $hora, $data_monitoramento, $temperatura, $sensor_L1, $sensor_L2, $sensor_L3, $entry;
                 
         //public function __construct() {
         //    $this->entry = "{$this->temperatura} | {$this->hora}";
         //}
     //}
// $a = conexaoPDO::getConnection();

?>