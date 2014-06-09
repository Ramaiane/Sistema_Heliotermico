<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>RelatórioTemperatura</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="js/datetimepicker.js">

//Date Time Picker script- by TengYong Ng of http://www.rainforestnet.com
//Script featured on JavaScript Kit (http://www.javascriptkit.com)
//For this script, visit http://www.javascriptkit.com 
//Translate to portuguese by Francisco Carlao francisco@signed.pt


</script>
<script type="text/javascript" src="js/ajax.js"></script>
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
        <li><a href="relatorios.html" class="active"><span>Relatórios</span></a></li>
        <li><a href="monitoramento.html"><span>Monitoramento</span></a></li>
        <li><a href="sobre.html"><span>Sobre nós</span></a></li>
       <!-- <li><a href="contact.html"><span>Contato</span></a></li>-->
      </ul>
    </div>
    <div class="clr"></div>
  </div>
  <div class="slider_bg">
    <div class="slider_t">
      <div class="slider_b small">
        <div class="title_text">
          <h2>Relatório de Temperatura</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="body">
    <div class="left">
      <div class="box no_margin">
        <div class="box_t">
          <div class="box_b">
            <h2>Relatório de Temperatura</h2>
            <ul>
                <li><a href="../controle/temperaturaControleRelatorio.php" class="active">Gerar Relatório PDF </a></li>
              <!--<li><a href="#"> Gráfico de temperatura</a></li>
             <li><a href="#"> Sub Navigation 3</a></li>
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
      <h2>Temperatura</h2>
      <p class="spec">Gráfico gerado da temperatura gerada pelo sistema heliotérmico</p>
     <form id="form1" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
      <table width="700" cellspacing=0 border="0" cellpadding="0" align="center" summary="">
	  <tr>
	  	<td>
	  		<div class="subtitle">Data</div>	
	  	
	  	</td>
	  </tr>
	  <tr>
	  	<td>
                    <input type="Text" id="data" name="data" maxlength="25" size="25">
                            <a href="javascript:NewCal('data','ddmmyyyy')"><img src="images/cal.gif" width="16" height="16" border="0" alt="Escolha Data"></a>
	  		<span class="descriptions">Escolha a data</span>
                      <!--  <p><a href="javascript:mostrar()"><img src="images/but_subscribe.gif" alt="picture" width="91" height="23" border="0" /></a></p>
                         <button href="javascript:mostrar()">Mostrar Grafico</button>
                       <form id="form1" action="js/ajax.js" method="post">
                            <a href="javascript:mostrar()">Mostrar Grafico</a>
                            <input type="submit" id="enviar" value="enviar" />
                        </form>-->
                        <input type="submit" id="enviar" value="enviar" />
                             
	  	</td>
	  </tr>
        </table> 
        </form>
       <?php
        if(isset($_POST['submit'])) // Se existir o array post, pq ele não retorna undefined index.
       { ?>
        <p><img src="../controle/temperaturaControleGrafico.php" title="temperatura" /></p>    
        <?php  }?>
      <p>&nbsp;</p>
    </div>
    <div class="clr"></div>
  </div>
</div>
<div class="footer">
  <div class="FBG">
    <div class="footer_resize">
      <p class="leftt">© Copyright Heliotérmico - Sensoriamento Remoto.  Dot Com. All Rights Reserved <br />
        <a href="#">Home</a> | <a href="#">Contact</a> | <a href="#">RSS</a> </p>
      <p class="rightt"><a href="http://dreamtemplate.com/"> Design by DreamTemplate </a></p>
      <div class="clr"></div>
    </div>
  </div>
</div>
</body>
</html>