<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


        include '../jpgraph-3.5.0b1/src/jpgraph.php';
        include '../jpgraph-3.5.0b1/src/jpgraph_line.php';
        include '../jpgraph-3.5.0b1/src/jpgraph_date.php';
        include '../modelo/pdo.php';
        //require_once '../visao/RelatorioTemperatura.php';
        
        $connDB  = conexaoPDO::getConnection();
   
    $data = $_POST["data"];
    $datetime = date("Y-m-d", strtotime($data));
    
    //$queryData = "2014-05-12";
    
    $dadostemp = array();
    //$dadoshora = array();
    // $data = array();

     
             $sql = "SELECT * FROM monitoramento WHERE data_monitoramento = '$datetime' ";
             $resultsquery = $connDB->query($sql);
             
             while ($row = $resultsquery->fetch(PDO::FETCH_ASSOC)){    
                 $dadostemp[] = $row['temperatura'];
             }   
          
            $graph = new Graph(600, 300);
            $graph->SetScale("datlin");

            $line = new LinePlot($dadostemp);
                 
            $line->value->Show();
            $line->value->SetColor("blue");
            $line->value->SetFont(FF_FONT1, FS_BOLD);

            $graph->Add($line);

            
            $graph->img->SetMargin(40,40,40,40);

            $graph->title->Set("Relatório: grafico temperatura");
            $graph->xaxis->title->Set("hora");
            $graph->yaxis->title->Set("temperatura");

            $graph->Stroke(); 
              
              ?>