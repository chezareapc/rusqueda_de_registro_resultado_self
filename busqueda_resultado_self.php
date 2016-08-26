<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>bases de daots</title>
    <?php
    function ejecutar_laconsulta($labusqueda){

      //$busqueda=$_GET["buscar"];
      require("datosConexionBD.php");

      $conexion=mysqli_connect($db_host,$db_usuario,$db_contra);

      if (mysqli_connect_errno()) {
        echo "Error al conectar con la bases de datos";

        exit();
      }
      mysqli_select_db($conexion,$db_nombre) or die ("no se encuentra");

      mysqli_set_charset($conexion, "utf8");

      $query="SELECT * FROM PRODUCTOS WHERE NOMBREARTICULO LIKE '%$labusqueda%'";

      $resultado=mysqli_query($conexion,$query);

      //ARRAY ASOCIATIVO

      while ($fila=mysqli_fetch_array($resultado, MYSQL_ASSOC)) {



        echo "<table><tr><td>";
        echo $fila["CODIGOARTICULO"] . " </td><td> ";
        echo $fila["NOMBREARTICULO"] . " </td><td> ";
        echo $fila["SECCION"]        . " </td><td> ";
        echo $fila["IMPORTADO"]      . " </td><td> ";
        echo $fila["PRECIO"]         . " </td><td> ";
        echo $fila["PAÍSDEORIGEN"]   . " </td>    </table>";
        echo "<br />";
        echo "<br />";
      }
      mysqli_close($conexion);
    }
      ?>
  </head>
  <body>
<?php
  $mibusqueda=$_GET["buscar"];
  $mipag=$_SERVER["PHP_SELF"];

        if ($mibusqueda!=NULL){

          ejecutar_laconsulta($mibusqueda);

        }else
        {
          echo ("<form action=' ". $mipag ." ' method='get'>

          <label>Buscar: <input type='text' name='buscar'></label>

          <input type='submit' name='enviando' value='dale'>
          </form>");
              }


 ?>
</body>
</html>
