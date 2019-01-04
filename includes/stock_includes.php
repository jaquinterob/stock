
<?php
include('../config/conexion.php');
date_default_timezone_set('America/Bogota');
foreach($_POST as $nombre_campo => $valor){
  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";
  eval($asignacion);
}

if (isset($carga_inicial)) {
  $sql="SELECT * FROM inventario.stock ;";
  $res=$connect->query($sql);
  if ($res->num_rows>0) {
    while ($row=$res->fetch_assoc()) {
      echo '    <div class="col s12 m4 l3">
      <div class="card center-align">
      <div class="card-content">
      <span class="card-title">'.$row['nombre_articulo'].'</span>
      <table class="highlight centered">
      <tbody >
      <tr>
      <td><a  onclick="quitar('.$row['id'].')" class="btn-floating btn-medium waves-effect waves-light green"><i class="material-icons">remove</i></a></td>
      <td><span id="teclado" style="font-size:40px;color:grey;">'.$row['cantidad'].'</span></td>
      <td><a  onclick="poner('.$row['id'].')" class="btn-floating btn-medium waves-effect waves-light green"><i class="material-icons">add</i></a></td>
      </tr>
      </tbody>
      </table>
      </div>
      </div>
      </div>';

    }
  }

    echo '<div class="col s12 m4 l3">
        <div class="card center-align">
          <div class="card-content">
            <table class="highlight centered">
              <tbody >
                <tr>
                  <td><a onclick="abrir_modal(\'modal_agregar_articulo_\')" style="font-size:25px" class=" waves-effect waves-light">Nuevo Artículo</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>';
}

if (isset($token_agregar_articulo)) {

  if (nombre_disponible($nombre_articulo)) {
    $sql="INSERT INTO inventario.stock
    (nombre_articulo,cantidad)
    VALUES ('".$nombre_articulo."','".$cantidad_inicial."');";
    if ($connect->query($sql)) {
      echo '1|Se crea el nuevo articulo satisfactoriamente';
    } else {
      echo '0|No se pudo guardar, error sql';
    }
  } else {
    echo "0|Nombre no disponible";
  }
}

if (isset($token_poner)) {
  $cantidad_actual=buscar_cantidad_actual($token_poner);
  $cantidad_nueva=(intval($cantidad_actual)+1);
  if(actualizar_nueva_cantidad($token_poner,$cantidad_nueva)){
    echo "1|".$cantidad_nueva;
  }else{
    echo "0|Error al actualizar, comuníquelo al equipo de desarrollo";
  }
}

if (isset($token_quitar)) {
  $cantidad_actual=buscar_cantidad_actual($token_quitar);
  $cantidad_nueva=(intval($cantidad_actual)-1);
  if(actualizar_nueva_cantidad($token_quitar,$cantidad_nueva)){
    echo "1|".$cantidad_nueva;
  }else{
    echo "0|Error al actualizar, comuníquelo al equipo de desarrollo";
  }
}

function buscar_cantidad_actual($id){
  global $connect;
  $sql="SELECT * FROM inventario.stock WHERE id='".$id."'";
  $res=$connect->query($sql);
  $row=$res->fetch_assoc();
  return $row['cantidad'];
}

function actualizar_nueva_cantidad($id,$cantidad_nueva){
  global $connect;
  $sql="UPDATE inventario.stock SET cantidad='".$cantidad_nueva."' WHERE id='".$id."';";
  if ($connect->query($sql)) {
    return true;
  } else {
    return false;
  }
}

function nombre_disponible($nombre_articulo){
  global $connect;
  $sql="SELECT * FROM inventario.stock WHERE nombre_articulo='".$nombre_articulo."'";
  $res=$connect->query($sql);
  if ($res->num_rows>0) {
    return false;
  } else {
    return true;
  }
}



$connect->close();
 ?>
