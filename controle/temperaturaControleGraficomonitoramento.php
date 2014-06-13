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
        
        $connDB  = conexaoPDO::getConnection();
        
    $dadostemp = array();
    $datetime = array();
    
    
    // The callback that converts timestamp to minutes and seconds
    function TimeCallback($datetime) {
          return Date('H:i:s',$datetime);
    }
    

     
             $sql = "SELECT * FROM monitoramento WHERE data_monitoramento = CURDATE()";
             $resultsquery = $connDB->query($sql);
             
             while ($row = $resultsquery->fetch(PDO::FETCH_ASSOC)){
                  
                 $dadostemp[] = $row['temperatura'];
                 $datetime[] = $row['hora'];
                 
             }   
    
            $graph = new Graph(600, 400);
            $graph->SetScale("datlin",0, 100);
            $graph->SetMarginColor('khaki2@0.6');

            $line = new LinePlot($dadostemp);
            $line->SetLegend("Temperatura º");
            $line->SetWeight( 2 );
                 
            $line->value->Show();
            $line->value->SetColor("blue");
            
            // Set the fill color partly transparent
             $line->SetFillColor("blue@0.4");
            $line->value->SetFont(FF_FONT1, FS_BOLD);
                
           
                    
            $graph->Add($line);

            
            $graph->img->SetMargin(40,40,40,100);

            $graph->title->Set("Relatório: grafico temperatura");
            $graph->subtitle->Set('(Data: '.date('j M Y)'));
            $graph->subtitle->SetFont(FF_ARIAL,FS_ITALIC,11);
            
            $graph->xaxis->title->Set("hora");
            $graph->xaxis->SetLabelAngle(90);
            $graph->xaxis->SetTickLabels($datetime);
            $graph->xaxis->SetLabelFormatCallback('TimeCallback');
            //$graph->xaxis->SetTextLabelIntervall(3);
            $graph->yaxis->title->Set("temperatura");
             $graph -> SetClipping(true);
             
             $graph->yaxis->title->SetFont( FF_FONT1 , FS_BOLD );
            $graph->xaxis->title->SetFont( FF_FONT1 , FS_BOLD );

             // Enable antialias
            $graph->img->SetAntiAliasing();
            
            $graph->Stroke(); 
              
              ?>