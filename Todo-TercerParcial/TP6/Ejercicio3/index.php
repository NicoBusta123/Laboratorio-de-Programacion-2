<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LPL - </title>
  <link rel="stylesheet" href="style.css">
  <script type="text/javascript" src="script.js" defer></script>
</head>
<body>
  <header>
    <h1>Busque un producto</h1>
  </header>
  <section>
    <article>
      <label>Busque un producto</label><input id="nombreProducto" type="text">
      <button onclick="buscarProducto()">Buscar</button>
    </article>

    <article>
        <select id="opcionesProductos" onchange="mostrarDetalles()">
        </select>

        <h3 id="precioProducto"></h3>
        <h3 id="stockProducto"></h3>

        <div id="seccionComprar" class="hidden">
          <label>Cantidad a comprar:</label><input id="cantidad" type="number" onchange="mostrarTotal()">
          <h3 id="importeTotal"></h3>


        </div>
       


    </article>
  </section>
  <footer>
    
  </footer>
</body>
</html>