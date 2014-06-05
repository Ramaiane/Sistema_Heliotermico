<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
define('FPDF_FONTPATH', 'fpdf/font/');
  
require '../fpdf17/fpdf.php';
include '../modelo/pdo.php';

class PDF extends FPDF{
    function Header(){
        //cabecalho do relatorio
        $this->SetFont('Arial', '', 16);
        $this->Cell(0, 0.5, "Relatorio Incidencia solar", 0,1, 'C');
        $this->Cell(0,0.5, "", "B", 1,'C');
        $this->Ln(1);
    }
    
    function Footer() {
        $this->SetY(-1.5);
        
        $this->SetFont('arial','I',9);
         $this->Cell(2.5, 0.5,'Sistema Heliotermico - FGA', 'T', 0, 'L');
         $this->Cell(2.5, 0.5,'',0,0,'L');
         $this->Cell(2.5, 0.5,'Monitoramento Remoto', 'T', 0, 'L');
         $this->Cell(4, 0.5,'',0,0,'L');
         $this->SetFont('arial', '', 7);
         $this->Cell(10,0, 'Pagina'.$this->PageNo().'', 0,1,'C');
    }
    
}


$fpdf = new PDF('P', 'cm', 'A4');
$fpdf->AliasNbPages();
//$fpdf->Open();
$fpdf->AddPage();

//cabecalho da tabela
$fpdf->SetTextColor(0,0,0);
$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(3,1, "Sensor 1", 1,0,'C');
$fpdf->Cell(3,1, "Sensor 2", 1,0,'C');
$fpdf->Cell(3,1, "Sensor 3", 1,0,'C');
$fpdf->Cell(4,1, "Hora Monitoramento", 1,0,'C');
$fpdf->Cell(4,1, "Data Monitoramento", 1,1,'C');
     
//linhas da tabela
$fpdf->SetFont('Arial','', 11);

 $connDB  = conexaoPDO::getConnection();

    class incidenciaDAO{
 
    public $id, $hora, $data_monitoramento, $temperatura, $sensor_L1, $sensor_L2, $sensor_L3, $entry, $query;

    public function __construct() {
             //$this->db = $connDB;
             $this->sensor_L1 = "{$this->sensor_L1}";
             $this->sensor_L2 = "{$this->sensor_L2}";
             $this->sensor_L3 = "{$this->sensor_L3}";
             $this->hora = "{$this->hora}";
             $this->data_monitoramento = "{$this->data_monitoramento}";
         }
         
     }
            $sql = 'SELECT * FROM monitoramento';
            $resultsquery = $connDB->query($sql);
            $resultsquery->setFetchMode(PDO::FETCH_CLASS, 'incidenciaDAO');
     
            while($row = $resultsquery->fetch()){

                $fpdf->Cell(3, 1, $row->sensor_L1, 1, 0, 'C');
                $fpdf->Cell(3, 1, $row->sensor_L2, 1, 0, 'C');
                $fpdf->Cell(3, 1, $row->sensor_L3, 1, 0, 'C');
                $fpdf->Cell(4, 1, $row->hora, 1, 0, 'C');
                $fpdf->Cell(4, 1, $row->data_monitoramento, 1, 1, 'C');
  
                           
             }  
  $fpdf->Output(); 
    
/*
        include '../jpgraph-3.5.0b1/src/jpgraph.php';
        include '../jpgraph-3.5.0b1/src/jpgraph_line.php';

            $teste = array(10,20,30,0,50);

            $graph = new Graph(600, 300);
            $graph->SetScale("textlin");

            $line = new LinePlot($teste);


            //$graph->xaxis->SetTickLabels
            $line->value->Show();
            $line->value->SetColor("blue");
            $line->value->SetFont(FF_FONT1, FS_BOLD);

            $graph->Add($line);

            //$graph->SetTheme($theme_class);
            $graph->img->SetMargin(40,40,40,40);

            $graph->title->Set("TESTE");
            $graph->xaxis->title->Set("data");
            $graph->yaxis->title->Set("temperatura");

            $graph->Stroke(); */
?>