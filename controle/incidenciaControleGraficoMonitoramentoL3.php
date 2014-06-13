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
     
        //conexao com banco 
        $connDB  = conexaoPDO::getConnection();
    
        // $queryData = "2014-05-28";
    
        //dados
        $dadosincid = array();
        $hora = array();
        
        //função callback
         function TimeCallback($hora) {
          return Date('H:i:s',$hora);
        }
        
        //consulta no banvo
        $sql = "SELECT * FROM monitoramento WHERE data_monitoramento = CURDATE()";
        $resultsquery = $connDB->query($sql);
             
        while ($row = $resultsquery->fetch(PDO::FETCH_ASSOC)){
                  
                 $dadosincidL1[] = $row['sensor_L1'];
                 $dadosincidL2[] = $row['sensor_L2'];
                 $dadosincidL3[] = $row['sensor_L3'];
                 $hora[] = $row['hora'];
             }  

             
             
             
 /******************************* grafico L1 *******************************************/
            $graph = new Graph(600, 400);
            $graph->SetScale("datlin",0, 100);
            $graph->SetMarginColor('khaki2@0.6');

            $line = new LinePlot($dadosincidL3);
            $line->SetLegend("Sensor L3");
            $line->SetWeight( 2 );


            $line->value->Show();
            $line->value->SetColor("blue");
    
            // Set the fill color partly transparent
            $line->SetFillColor("blue@0.4");
            $line->value->SetFont(FF_FONT1, FS_BOLD);
               

            $graph->Add($line);

            $graph->img->SetMargin(40,40,40,100);

            $graph->title->Set("Incidencia Solar - sensor L3");          
            $graph->subtitle->Set('(Data: '.date('j M Y)'));
            $graph->subtitle->SetFont(FF_ARIAL,FS_ITALIC,11);
            
            $graph->xaxis->title->Set("Hora");
            $graph->xaxis->SetLabelAngle(90);
            $graph->xaxis->SetTickLabels($hora);
            $graph->xaxis->SetLabelFormatCallback('TimeCallback');
            //$graph->xaxis->SetLabelMargin(0); 
              
            $graph->yaxis->title->Set("Incidencia");
            $graph -> SetClipping(true);
             
             $graph->yaxis->title->SetFont( FF_FONT1 , FS_BOLD );
            $graph->xaxis->title->SetFont( FF_FONT1 , FS_BOLD );

            
            // Enable antialias
            $graph->img->SetAntiAliasing();
            $graph->Stroke();
             
           
?>