<?php

if (isset($_POST['btnIngresar'])) {

    $documento = $_POST['documento'];
    $contrasenia = $_POST['contrasenia'];


    if (isset($_COOKIE[$documento])) {

        
        $datos = json_decode($_COOKIE[$_POST['documento']], true);

        
        if ($datos['contrasenia'] == $contrasenia) {

            
            header("Location: calculadora.php");
            exit();

        } else {

            
            echo "Contraseña incorrecta";
            

        }

    } else {

    
        ?>

        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Registro</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>

        <header>
            <h1 class="titulo">Inicio de Sesion</h1>
        </header>

        <main>
            <section>
                <article class="seccionForm">

                    <form method="post" action="registrar.php">

                        <span>Ingresar su nombre</span>
                        <input type="text" name="nombre" required>
                        <br><br>

                        <span>Ingresar numero de documento</span>
                        <input type="number" name="documento" required>
                        <br><br>

                        <span>Ingresar contrasenia</span>
                        <input type="text" name="contrasenia" required>
                        <br><br>

                        <button name="btnRegistrar" type="submit">
                            Registrar
                        </button>

                    </form>

                </article>
            </section>
        </main>

        <footer>
            <p>Nicolas Bustamante</p>
        </footer>

        </body>
        </html>

        <?php
    }

} else {

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titulo</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <h1 class="titulo">Inicio de Sesion</h1>
</header>

<main>
    <section>

        <article class="seccionForm">

            <form method="post" action="inicio.php">

                <span>Ingresar numero de documento</span>
                <input type="number" name="documento" required>
                <br><br>

                <span>Ingresar contrasenia</span>
                <input type="text" name="contrasenia" required>
                <br><br>

                <button name="btnIngresar" type="submit">
                    Ingresar
                </button>

            </form>

        </article>

    </section>
</main>

<footer>
    <p>Nicolas Bustamante FOOTER</p>
</footer>

</body>
</html>

<?php

}

?>