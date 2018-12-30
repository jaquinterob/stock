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
    <div class="row" id="contenedor_articulos">

      <div class="col s12 m4 l3">
        <div class="card center-align">
          <div class="card-content">
            <span class="card-title">Teclados malos y raron</span>
            <table class="highlight centered">
              <tbody >
                <tr>
                  <td><a  onclick="quitar()" class="btn-floating btn-medium waves-effect waves-light green"><i class="material-icons">remove</i></a></td>
                  <td><span id="teclado" style="font-size:40px;color:grey;">100</span></td>
                  <td><a  onclick="poner()" class="btn-floating btn-medium waves-effect waves-light green"><i class="material-icons">add</i></a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col s12 m4 l3">
        <div class="card center-align">
          <div class="card-content">
            <table class="highlight centered">
              <tbody >
                <tr>
                  <td><a style="font-size:25px" class=" waves-effect waves-light">Nuevo Artículo</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </body>
<script src="js/stock.js" charset="utf-8"></script>
</html>
