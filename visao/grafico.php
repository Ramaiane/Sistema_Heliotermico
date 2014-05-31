<?php

include '../jpgraph-3.5.0b1/src/jpgraph.php';
include '../jpgraph-3.5.0b1/src/jpgraph_line.php';

include_once '../modelo/conexaoBanco.php';


$db = new Connect_MySql();
$db->connectDB();

$db->set( 'sql', 'SELECT temperatura FROM monitoramento');
//$sql = "SELECT temperatura FROM monitoramento";
$query = $db->queryDB($sql);
$db->selectDB();
$result = $db->queryDB();
$recupera = mysql_fetch_array($result);


while($row = $recupera){
    $number[] = $row[0];
    $data[] = $row[1];
}

//setup the graph
$graph = new Graph(600, 300);
$graph->SetScale("textlin");

$theme_class = new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(FALSE);
$graph->title->Set("Temperatura do Fluido");
$graph->SetBox(FALSE);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(FALSE);
$graph->yaxis->HideTicks(FALSE, FALSE);
$graph->yaxis->title->Set("Temperatura");


$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels($data);
$graph->xaxis->title->Set("Data");
$graph->xgrid->SetColor('#E3E3E3');

//Create the line
$line = new LinePlot($number);
$graph->Add($line);
$line->SetColor("blue");
$line->SetLegend('variação da temperatura');

//Output Line
$graph->Stroke();

/*
//$teste = array(10,20,30,0,50);

$graph = new Graph(600, 300);
$graph->SetScale("textlin");

$line = new LinePlot($number);


$graph->xaxis->SetTickLabels
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
*/

?>