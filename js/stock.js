var jq = jQuery.noConflict();
jq(document).ready(function() {
    M.AutoInit();
  inicialiaciones();
});

function inicialiaciones(){
  carga_inicial();
}

function carga_inicial(){
  let datosFormulario='carga_inicial=1';
  jq.ajax({
    url:'includes/stock_includes.php',
    type:'POST',
    data:datosFormulario,
    error:function(jq,status,str_error){
      M.toast({html:'error en la petición, intente mas tarde',classes:'red'});
    },
    timeout:10000,
    success:function(data){
      jq("#contenedor_articulos").html(data);
    }
  });
}

function quitar(id){
  var datosFormulario='token_quitar='+id;
  jq.ajax({
    url:'includes/stock_includes.php',
    type:'POST',
    data:datosFormulario,
    error:function(jq,status,str_error){
      M.toast({html:"Error al procesar la solicitud, intente mas tarde, si el problema persiste comuníquelo al equipo de desarrollo"});
    },
    timeout:10000,
    success:function(data){
      data=data.trim();
      var res=data.split('|');
      if (res[0]=='1') {
        carga_inicial();
      } else {
        M.toast({html:res[1],classes:'red'});
      }
    }
  });
}

function poner(id){
  var datosFormulario='token_poner='+id;
  jq.ajax({
    url:'includes/stock_includes.php',
    type:'POST',
    data:datosFormulario,
    error:function(jq,status,str_error){
      M.toast({html:"Error al procesar la solicitud, intente mas tarde, si el problema persiste comuníquelo al equipo de desarrollo"});
    },
    timeout:10000,
    success:function(data){
      data=data.trim();
      var res=data.split('|');
      if (res[0]=='1') {
        carga_inicial();
      } else {
        M.toast({html:res[1],classes:'red'});
      }
    }
  });
}

function agregar_articulo(){
  if ( validar_formulario_agregar_articulo()) {
    let datosFormulario=jq("#form_agregar_articulo").serialize()+'&token_agregar_articulo=1';
    jq.ajax({
      url:'includes/stock_includes.php',
      type:'POST',
      data:datosFormulario,
      error:function(jq,status,str_error){
        M.toast({html:'error en la petición, intente mas tarde',classes:'red'});
      },
      timeout:10000,
      success:function(data){
        data=data.trim();
        res=data.split('|');
        if (res[0]=='1') {
          M.toast({html:res[1],classes:'blue'});
          carga_inicial();
          cerrar_modal("modal_agregar_articulo_");
          jq(".formulario_agregar").val('');
        } else {
          M.toast({html:res[1],classes:'red'});
        }
      }
    });
  } else {
    M.toast({html:'Faltan datos',classes:'red'});
  }
}

function validar_formulario_agregar_articulo(){
  var v=0;
  if (jq("#nombre_articulo").val()=='') {
    v++;
    jq("#nombre_articulo").addClass('invalid');
  }else{
    jq("#nombre_articulo").removeClass('invalid');
  }
  if (jq("#cantidad_inicial").val()=='') {
    v++;
    jq("#cantidad_inicial").addClass('invalid');
  }else{
    jq("#cantidad_inicial").removeClass('invalid');
  }
  if (v==0) {
    return true;
  } else {
    return false;
  }
}

function abrir_modal(id){
  var instance = M.Modal.getInstance(jq("#"+id));
  instance.open();
}

function cerrar_modal(id){
  var instance = M.Modal.getInstance(jq("#"+id));
  instance.close();
}

function mostrar_historial(id){
  M.toast({html:'si funciona el dbclick el id es: '+id,classes:'blue'});
}
