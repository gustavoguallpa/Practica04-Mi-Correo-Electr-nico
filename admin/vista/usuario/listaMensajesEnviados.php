
<!DOCTYPE html> 
<html> 
<head> 
    <meta charset="UTF-8"> 
    <title>Lista de Usuarios </title> 
    <link href="../../../estyles/ct_layout2.css" rel= "stylesheet" />
    <link href="../../../estyles/estilo.css" rel="stylesheet">

</head> 
    <body> 
    <table border = 1 style="width:100%"> 
        <tr> 
            <th>Fecha</th> 
            <th>Destinatario</th> 
            <th>Asunto</th> 
            <th>Mensaje</th> 
            </tr> 
            
<?php 

 //CONEXION A LA BASE DE DATOS
 include '../../../config/conexionBD.php';

 $usuario=$_GET["usuario"];

 $sql = "SELECT * FROM correos where usu_remitente= '$usuario' order by usu_codigo desc "; 
 
 $result = $conn->query($sql); 

 if ($result->num_rows > 0) { 
    
    while($row = $result->fetch_assoc()){ 
        echo "<tr>"; 
        echo " <td>" . $row["usu_fecha"] . "</td>";
        echo " <td>" . $row['usu_destinatario'] . "</td>"; 
        echo " <td>" . $row['usu_asunto'] . "</td>"; 
        echo " <td>" . $row['usu_mensaje'] . "</td>"; 

    } 
} else { 
    echo "<tr>"; 
    echo " <td colspan='7'> NO EXISTEN CORREOS ENVIADOS POR EL USUARIO </td>"; 
    echo "</tr>"; 
} 
        $conn->close(); 

        
       
        ?>

        <div class="button">
            
                <button type="reset" onclick="history.back()" >CANCELAR</button>
                <br>
            </div>

        

        
        
    </table> 
    </body> 
</html>