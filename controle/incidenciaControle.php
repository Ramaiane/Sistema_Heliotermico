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
    
        // $queryData = "2014-06-09";
        $data = $_POST["data"];
        $datetime = date("Y-m-d", strtotime($data));
    
        //dados
        $dadosincid = array();
        $hora = array();
        
        //função callback
         function TimeCallback($hora) {
          return Date('H:i:s',$hora);
        }
        
        //consulta no banvo
        $sql = "SELECT * FROM monitoramento WHERE data_monitoramento = '$datetime'";
        $resultsquery = $connDB->query($sql);
             
        while ($row = $resultsquery->fetch(PDO::FETCH_ASSOC)){
                  
                 $dadosincid[] = $row['sensor_L1'];
                 $dadosincidL2[] = $row['sensor_L2'];
                 $dadosincidL3[] = $row['sensor_L3'];
                 $hora[] = $row['hora'];
             }  

             //cria grafico
            $graph = new Graph(600, 400);
            $graph->SetScale("datlin",0, 100);
            $graph->SetMarginColor('khaki2@0.6');

            //cria primeira linha
            $line = new LinePlot($dadosincid);
            $line->SetLegend("Sensor L1");
            $line->SetWeight( 2 );
            $line->value->Show();
            $line->value->SetColor("blue");
            $graph->Add($line);
            
            //cria segunda linha
            $line2 = new LinePlot($dadosincidL2);
            $line2->SetLegend("Sensor L2");
            $line2->SetWeight( 2 );
            $line2->value->Show();
            $line2->value->SetColor("red");
            $graph->Add($line2);
            
             //cria terceira linha
            $line3 = new LinePlot($dadosincidL2);
            $line3->SetLegend("Sensor L3");
            $line3->SetWeight( 2 );
            $line3->value->Show();
            $line3->value->SetColor("green");
            $graph->Add($line3);
            
            // Set the fill color partly transparent
           // $line->SetFillColor("blue@0.4");
           // $line->value->SetFont(FF_FONT1, FS_BOLD);
               

            

            $graph->img->SetMargin(40,40,40,100);

            $graph->title->Set("Incidencia Solar - sensor L1");          
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