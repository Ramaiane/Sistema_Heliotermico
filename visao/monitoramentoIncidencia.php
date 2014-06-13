

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MonitoramentoIncidencia</title>
<meta http-equiv="refresh" content="5; monitoramentoIncidencia.php" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="main">
  <div class="header">
    <div class="logo"><a href="index.html"><img src="images/logo.gif" width="288" height="55" border="0" alt="logo" /></a></div>
    <div class="search">
      <form id="form_search" name="form_search" method="post" action="">
        <label> <span>
          <input name="search_q" type="text" class="text" id="search_q" value="search" />
          </span>
          <input type="image" name="search_b" id="search_b" src="images/search_but.gif" class="button" />
        </label>
      </form>
    </div>
    <div class="menu">
      <ul>
        <li><a href="index.html"><span>Home</span></a></li>
        <li><a href="relatorios.html"><span>Relatorios</span></a></li>
        <li><a href="monitoramento.html" class="active"><span>Monitoramento</span></a></li>
        <li><a href="sobre.html"><span>Sobre nos</span></a></li>
       <!-- <li><a href="contact.html"><span>Contato</span></a></li>-->
      </ul>
    </div>
    <div class="clr"></div>
  </div>
  <div class="slider_bg">
    <div class="slider_t">
      <div class="slider_b small">
        <div class="title_text">
          <h2>Grafico de Incidencia</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="body">
    <div class="left">
      <div class="box no_margin">
        <div class="box_t">
          <div class="box_b">
            <h2>Graficos de monitoramentos</h2>
            <ul>
              <li><a href="#" class="active">Grafico de Incidencia Solar</a></li>
              <li><a href="#"> Grafico de temperatura</a></li>
            <!--  <li><a href="#"> Sub Navigation 3</a></li>
              <li><a href="#"> Sub Navigation 4</a></li>-->
            </ul>
          </div>
        </div>
      </div>
      <div class="clr"></div>
     <!-- <div class="testi">
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. <br />
          Cum sociis natoque&nbsp;</p>
        <p align="right">— John Doe, President, <strong>Company</strong></p>
      </div>-->
    </div>
    <div class="big_center no_margin">
      <h2>Incidencia Solar</h2>
      <p class="spec">Graficos gerados para monitoramento remoto da incidencia solar captada e temperatura gerada pelo sistema heliotermico. Grafico L1</p>
      <p class="spec">Graficos do sensor L1</p>
      <p><img src="../controle/incidenciaControleGraficoMonitoramento.php" title="temperatura" /></p>
      <p class="spec">Graficos do sensor L2</p>
      <p><img src="../controle/incidenciaControleGraficoMonitoramentoL2.php" title="temperatura" /></p>
      
      <p class="spec">Graficos do sensor L3</p>
      <p><img src="../controle/incidenciaControleGraficoMonitoramentoL3.php" title="temperatura" /></p>
      <p>&nbsp;</p>
    </div>
    <div class="clr"></div>
  </div>
</div>
<div class="footer">
  <div class="FBG">
    <div class="footer_resize">
      <p class="leftt">© Copyright Heliotermico - Sensoriamento Remoto.  Dot Com. All Rights Reserved <br />
        <a href="#">Home</a> | <a href="#">Contact</a> | <a href="#">RSS</a> </p>
      <p class="rightt"><a href="http://dreamtemplate.com/"> Design by DreamTemplate </a></p>
      <div class="clr"></div>
    </div>
  </div>
</div>
</body>
</html>