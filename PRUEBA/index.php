<?php
/* Llamar el archivo , en este caso ya llamamos para que se conecte.*/
include_once 'crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <title>Document</title>
</head>
<body>
<center>
    <br>
    <br>
    <br>
    <div id = "form">
        <form method="post">
            <table width="100%" border="1" cellpadding="15">
            <tr>
                <td>
                    <input type="text" name="fecha" placeholder="Año" value="<?php
                            if(isset($_GET['edit'])) echo $getROW['fecha']; ?>">
                           
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="autor" placeholder="Autor" value="<?php
                            if(isset($_GET['edit'])) echo $getROW['fn']; ?>">
                           
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="titulo" placeholder="Titulo" value="<?php
                            if(isset($_GET['edit'])) echo $getROW['titulo']; ?>">
                           
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="direccion" placeholder="URL" value="<?php
                            if(isset($_GET['edit'])) echo $getROW['direccion']; ?>">
                           
                </td>
            </tr>
            <tr>
                <td>
                <input type="text" name="especialidad" placeholder="Especialidad"  value="<?php
                            if(isset($_GET['edit'])) echo $getROW['especialidad']; ?>">
                </td>
            </tr>
            <tr>
                <td>
                <input type="text" name="editorial" placeholder="Editorial"  value="<?php
                            if(isset($_GET['edit'])) echo $getROW['editorial']; ?>">
                </td>
            </tr>
            <tr>
                <td>
                <input type="text" name="id" placeholder="ID"  value="<?php
                            if(isset($_GET['edit'])) echo $getROW['id']; ?>">
                </td>
            </tr>
                
                
            <tr>
                <td>
                    <?php
                    if (isset($_GET['edit'])) {
                        ?>
                        <button type = "submit" name="update">Editar</button>
                        <?php
                    }else{
                        ?>
                        <button type ="submit" name="save">Registrar</button>

                    <?php
                        
                        
                    }
                    ?>
                </td>
            </tr>
            </table>
        </form>
        <br><br>
        <table width="100%" border="1" cellpadding="15" align="center">
            <?php
            $rae = $MySQLiconn->query("SELECT * FROM libros ");
            /* para poder escribir en la tabla mediante un bucle*/
            ?>
            <header>
                <tr>
                    <td>Titulo</td>
                    <td>Autor</td>
                    <td>Fecha</td>
                    <td>URL</td>
                    <td>Editorial</td>
                    <td>Especialidad</td>
                    <td>ID</td>
                
                </tr>
            </header>
            <?php
                    
            while ($row = $rae->fetch_array()) {
                ?>
             <!--    /*Fila "tr"*/ -->
                <tr> 
            <!--         /*columna "td"*/ -->
                    <td><?php echo $row['titulo']; ?></td>
                    <td><?php echo $row['autor']; ?></td>
                    <td><?php echo $row['fecha']; ?></td>
                    <td><?php echo $row['direccion']; ?></td>
                    <td><?php echo $row['editorial']; ?></td>
                    <td><?php echo $row['especialidad']; ?></td>
                    <td><?php echo $row['id']; ?></td>
            <!--         /*CUANDO SE USA DOBLE COMILLA , se puede pasar el php*/ -->

                    <td><a href="?del=<?php echo $row['id'];?>" 
                    onclick="return confirm('confirmar eliminacion')">Eliminar</a></td>

                    <td><a href="?edit=<?php echo $row['id'];?>" 
                    onclick="return confirm('confirmar edicion')">Editar</td>

                    <td><a href="<?php echo $fila['direccion'];?>" target="_blank">Ver</a></td>

                    

                </tr>
                <?php
            }

            ?>

        </table>

    </div>
</center>
    
</body>
</html>