<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

        include '../../jpgraph-3.5.0b1/src/jpgraph.php';
        include '../../jpgraph-3.5.0b1/src/jpgraph_line.php';

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

            $graph->Stroke();
?>