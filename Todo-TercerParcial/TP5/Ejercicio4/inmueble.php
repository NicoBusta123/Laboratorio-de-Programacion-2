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
    <h1>Eliminar un inmueble</h1>
  </header>

  <main>
    <section>
      <article>
        <form action="procesar_eliminacion.php" method="post">
            <h3>Eliminar Inmueble</h3>
            <span>Ingrese el ID del inmueble a eliminar:</span>
            <input type="number" name="idInmueble" required>
            <br><br>
            <button type="submit" name="btnEliminar">Eliminar Inmueble</button>
        </form>
      </article>
    </section>
  </main>

  <footer>
    <p>Pie de página</p>
  </footer>

</body>
</html>