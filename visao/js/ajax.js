/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function objetoAjax(){
 var xmlhttp=false;
 try {
  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
 } catch (e) {
  try {
   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (E) {
   xmlhttp = false;
  }
 }
 if (!xmlhttp && typeof XMLHttpRequest!== 'undefined'){
  xmlhttp = new XMLHttpRequest();
 }
 return xmlhttp;
}
function mostrar(){
    var posicion=document.getElementById("data").options.selectedIndex;
    var data=document.getElementById("data").options[posicion].value;
    var url="../../controle/temperaturaControleGrafico.php?data="+data;
    var ventana="dialogTop=100px;dialogLeft=200px; dialogWidth=700px;dialogHeight=700px; center=yes;help=no";
    objwindow=window.showModalDialog(url,ventana);
}
