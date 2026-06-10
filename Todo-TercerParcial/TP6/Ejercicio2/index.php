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
    <h1>Buscador de persona</h1>
  </header>

  <main>
    <section>
      <article>
        
        <label>Ingrese el documento de la persona: </label><input id="nroDocumento" type="number">
        <button onclick="buscarPersona()">Buscar</button>
      </article>

      <article>
        <ul id="listaOperaciones">
        </ul>


      </article>
    </section>
  </main>

  <footer>
    <p>Bustamante Nicolas xd</p>
  </footer>

</body>
</html>