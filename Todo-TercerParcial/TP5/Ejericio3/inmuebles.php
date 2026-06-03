<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Titulo</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js" defer></script>
</head>
<body>

  <header>
    <h1>Setear un inmueble chupete</h1>
  </header>

  <main>
    <section>
      <article>
        <form action="procesar_edicion.php" method="post">
                ID del inmueble a modificar: <input type="number" name="idInmueble" required><br>
                
                Tipo: <input type="text" name="tipoInmueble"><br>
                Domicilio: <input type="text" name="domicilio"><br>
                Dormitorios: <input type="number" name="cantidadDormitorios"><br>
                Mejoras: <input type="text" name="mejoras"><br>
                Baños: <input type="number" name="cantidadBanios"><br>
                Observación: <input type="text" name="observacion"><br>
            <button type="submit" name="btnModificar">Ingresar Modificaciones</button>
        </form>
      </article>
    </section>
  </main>

  <footer>
    <p>Pie de página</p>
  </footer>

</body>
</html>