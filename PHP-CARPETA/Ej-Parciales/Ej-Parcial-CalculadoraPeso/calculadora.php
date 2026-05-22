<?php
session_start();


if (isset($_POST['btnCerrarSesion'])){
    session_destroy();
    header("Location: inicio.php");
    exit;
}





?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora!</title>
  <link rel="stylesheet" href="style.css">
  
</head>
<body>

  <header>
    <h1 class="titulo">Calculadora!</h1>
  </header>

  <main>
    <section>
      <article>
        <form name="formCalculadora" method="post" action="calculadora.php">
            <span>Ingresar el nombre</span>
            <input type="text" required name="nombre">
            <br><br>


            <span>Ingrese su estatura en METROS</span>
            <input type="number" name="estatura" required step="0.01">
            <br><br>

            <span>Ingrese su peso en KG</span>
            <input type="number" name="peso" required>
            <br><br>

            <button name="btnCalcular" type="submit">Calcular</button>
            <button name="btnCerrarSesion" type="submit">Cerrar sesion</button>


        </form>
      </article>

      <article>
        <h3>Resultados de los usuarios ingresados</h3>
                <table>
                    
                        <th>Nombre</th>
                        <th>Resultado</th>
                    
                    
                        <?php

                        if (isset($_POST['btnCalcular'])){
                            
                                $peso = $_POST['peso'];

                                $estatura = $_POST['estatura'];

                                $indiceMasa = $peso / ($estatura * $estatura);
                                $resultado = "";

                                switch ($indiceMasa){
                                                case $indiceMasa<18.5:
                                                $resultado = "Bajo peso";

                                                break;

                                            case $indiceMasa>18.50 && $indiceMasa<24.89:
                                                $resultado = "Peso normal";

                                                break;

                                            case $indiceMasa>24.90 && $indiceMasa<29.89:
                                                $resultado = "Sobreso";

                                                break;

                                            case $indiceMasa>29.90:
                                                $resultado = "Obesidad";
                                                break;


                                }

                                $usuarioIndice = [
                                    "usuarioIngresado" => $_POST['nombre'],
                                    "indice" => $indiceMasa,
                                    "resultado" => $resultado
                                ];

                                

                                $_SESSION['usuarioIngresados'][] = $usuarioIndice;

                                 foreach ($_SESSION['usuarioIngresados'] as $usuario) {
                                echo "<tr>";
                                echo "<td>".$usuario['usuarioIngresado']."</td>";
                                echo "<td>".$usuario['resultado']."</td>";
                                echo "</tr>";
                            }


                        

                    }                       
                        ?>

                    
                </table>
        


      </article>
    </section>
  </main>

  <footer>
    <p>Nicolas Bustamante</p>
  </footer>

</body>
</html>

