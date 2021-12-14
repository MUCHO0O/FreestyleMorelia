<?php
  $mysql = new mysqli('localhost', 'root','', 'bdda');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Demo de menu desplegable</title>
    <meta charset="utf-8" />
    </head>
    <body>

    <div align="center">
    	<form method="POST" action="select2.php">
    		<p>Seleccione un pais del siguiente menu:</p>
    		<p>Paises:
    			<select name="paises">
    				<option value="0">Seleccione:</option>
    				<?php
    				$query =$mysql -> query ( "SELECT * FROM paises");

    				while ($valores = mysql_fetch_array($query)) {
    					echo '<option value="'.$valores[id].'">'.$valores[paises].'</option>';
    				}
                     </select>
                     <input type="submit" name="submit" value="enviar">
                     </p>
                     </form>
                     </div>

                     </body>
                     </html>