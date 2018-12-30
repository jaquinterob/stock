<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <title>Stock</title>
  </head>
  <body>
    <!-- Modal Structure -->
    <div id="modal_agregar_articulo_" class="modal">
      <div class="modal-content">
        <h5 style="text-align:center">Nuevo Artículo</h5 style="text-align:center">
        <div class="row center-align">
          <form id="form_agregar_articulo">
            <div class="input-field col s10  offset-s1">
              <input id="nombre_articulo" name="nombre_articulo" type="text" class="validate" autofocus>
              <label for="nombre_articulo">Nombre artículo</label>
            </div>
            <div class="input-field col s6 offset-s1">
              <input id="cantidad_inicial" name="cantidad_inicial" type="number" class="validate">
              <label for="cantidad_inicial">Cantidad inical</label>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <a  class="modal-close waves-effect waves-green btn-flat">cancelar</a>
        <a onclick="agregar_articulo()" class="waves-effect waves-green btn-flat">Agregar</a>
      </div>
    </div>

    <div class="row" id="contenedor_articulos">

    </div>
  </body>
  <script src="js/stock.js" charset="utf-8"></script>
</html>
