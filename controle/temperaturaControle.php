<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
define('FPDF_FONTPATH', 'fpdf/font/');
  
require '../fpdf17/fpdf.php';
include '../modelo/pdo.php';


$fpdf = new FPDF('P', 'cm', 'A4');
$fpdf->Open();
$fpdf->AddPage();

//cabecalho
$fpdf->SetFont('Arial', '', 16);
$fpdf->Cell(0, 0.5, "Relatorio Temperatura", 0,1, 'C');
$fpdf->Cell(0,0.5, "", "B", 1,'C');
$fpdf->Ln(1);

//linhas da tabela
$fpdf->SetFont('Arial','', 11);

 $connDB  = conexaoPDO::getConnection();

    class temperaturaDAO{
 
    public $id, $hora, $data_monitoramento, $temperatura, $sensor_L1, $sensor_L2, $sensor_L3, $entry, $query;

    public function __construct() {
             //$this->db = $connDB;
             $this->temperatura = "{$this->temperatura}";
             $this->hora = "{$this->hora}";
             $this->data_monitoramento = "{$this->data_monitoramento}";
         }
         
     }
            $sql = 'SELECT * FROM monitoramento';
            $resultsquery = $connDB->query($sql);
            $resultsquery->setFetchMode(PDO::FETCH_CLASS, 'temperaturaDAO');
     
            while($row = $resultsquery->fetch()){

                $fpdf->Cell(3, 1, $row->temperatura, 1, 0, 'C');
                $fpdf->Cell(3, 1, $row->hora, 1, 0, 'C');
                $fpdf->Cell(3, 1, $row->data_monitoramento, 1, 1, 'C');
                           
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