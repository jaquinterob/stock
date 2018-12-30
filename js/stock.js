var jq = jQuery.noConflict();
jq(document).ready(function() {
  inicialiaciones();
});

function inicialiaciones(){

}

function quitar(){
  jq("#teclado").text((parseInt(jq("#teclado").text())-1));
}

function poner(){
  jq("#teclado").text((parseInt(jq("#teclado").text())+1));
}
