<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LPL </title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <header>
    <h1 id="titulo">Alquiler de AUTOS</h1>
  </header>

  <main>
    <section>
      <form name="formulario" action="script.php" method="post" id="idFormulario">
          <span>Seleccionar tipo de Vehiculo</span>
          <select name="vehiculo">
            <option value="Ford Ranger">Ford Ranger</option>
            <option value="Toyota Hilux">Toyota Hilux</option>
            <option value="Chevrolet Fluence">Chevrolet Fluence</option>
       
            
          </select>
          <br><br>
          <span>Importe combustible</span>
          <input type="number" name="importe">

        <input onclick="script.php" type="submit" name="btnEnviar" value="Enviar" >
      </form>
    </section>
  </main>

  <footer>
    <p>Ejercicio 2 Complementario</p>
  </footer>

</body>
    </html>