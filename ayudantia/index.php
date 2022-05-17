<?php 
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ayudantia";
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


if(mysqli_connect_errno()){
    echo "Error al conectar a la base de datos";
}

$gato = $_POST["lista"];
$idImagen = $gato;
$Consulta = $con->query("SELECT url FROM Imagenes where id = $idImagen");
$dato = $Consulta->fetch_assoc();
$Imagen = $dato["url"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad Listar</title>
</head>
<body style="display:flex;justify-content:center;align-items:center; background:#008;flex-direction:column;  margin:0">
    <h1 style="color: white; margin:5px 0 0 0">Actividad Listar</h1>
    

    <div class =" article center-h rounded-0 ">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>URL</th>
            </tr>
        </thead>
        <?php
        foreach($con->query('SELECT * FROM Imagenes') as $row){?>
            <tr>
                <td><?php echo $row ['id'] ?></td>
                <td><?php echo $row ['url']?></td>
            </tr>
            <?php
        }
        ?>
    </table>

     </div>
     <form name= "Imglist" method = "post" action= "">
         <br>
         ID
         <select name= "lista">
            <?php
                foreach($con->query('SELECT id FROM Imagenes') as $row){ ?>
                <option value="<?php echo $row['id']?>"><?php echo $row['id']?></option>
                    <?php   
                }
                ?>                
                </select>
                <button class="btn btn-success btn-sm" type="submit" value="Submit" name="ver">Boton</button>
            </form>
            
            <img src="<?php echo $Imagen?>">

</body>

</html>
