<?php include("../inicio/head.php"); ?>
<?php   

$idpedido=(isset($_POST['idpedido']))?$_POST['idpedido']:"";
$fecha=(isset($_POST['fecha']))?$_POST['fecha']:"";
$idcliente=(isset($_POST['idcliente']))?$_POST['idcliente']:"";
$iddetalledeproducto=(isset($_POST['iddetalledeproducto']))?$_POST['iddetalledeproducto']:"";
$action=(isset($_POST['action']))?$_POST['action']:"";

include("../base_datos/conexion.php");

switch($action){
        case "Crear":
            $sentenciaSQL= $conexion->prepare("INSERT INTO pedido (fecha,idcliente,iddetalledeproducto) 
            VALUES (:fecha,:idcliente,:iddetalledeproducto);");

            $sentenciaSQL->bindParam(':fecha',$fecha);
            $sentenciaSQL->bindParam(':idcliente',$idcliente);
            $sentenciaSQL->bindParam(':iddetalledeproducto',$iddetalledeproducto);
            $sentenciaSQL->execute();

            header("location:pedido.php");
            break;

        case "Actualizar":

            $sentenciaSQL= $conexion->prepare("UPDATE pedido SET fecha=:fecha,idcliente=:idcliente,iddetalledeproducto=:iddetalledeproducto WHERE idpedido=:idpedido");
            $sentenciaSQL->bindParam(':fecha',$fecha);
            $sentenciaSQL->bindParam(':idcliente',$idcliente);
            $sentenciaSQL->bindParam(':iddetalledeproducto',$iddetalledeproducto);
            $sentenciaSQL->bindParam(':idpedido',$idpedido);
            $sentenciaSQL->execute();

            header("location:pedido.php");
            break;
        
        case "Seleccionar":
            
            $sentenciaSQL= $conexion->prepare("SELECT * FROM pedido WHERE idpedido=:idpedido");
            $sentenciaSQL->bindParam(':idpedido',$idpedido);
            $sentenciaSQL->execute();
            $pedido=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            $fecha=$pedido['fecha'];
            $idcliente=$pedido['idcliente'];
            $iddetalledeproducto=$pedido['iddetalledeproducto'];

            // echo "Presionado botón Seleccionar";
            break;

        case "Eliminar":

                $sentenciaSQL= $conexion->prepare("DELETE FROM pedido WHERE idpedido=:idpedido");
                $sentenciaSQL->bindParam('idpedido',$idpedido);
                $sentenciaSQL->execute();
                header("location:pedido.php");

            break;


}

$sentenciaSQL= $conexion->prepare("SELECT * FROM pedido");
$sentenciaSQL->execute();
$tablapedido=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                        Pedido
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data" >
                                <div class = "form-group">
                                <label for="idpedido">ID:</label>
                                <input type="number" required readonly class="form-control" value="<?php echo $idpedido; ?>" name="idpedido"; id="idpedido" placeholder="ID">
                                </div>

                                <div class = "form-group">
                                <label for="fecha">Fecha:</label>
                                <input type="date" required class="form-control"  value="<?php echo $fecha; ?>" name="fecha"; id="fecha" placeholder="Fecha">
                                </div>

                                <div class = "form-group">
                                <label for="idcliente">ID del cliente:</label>
                                <input type="number" required class="form-control" value="<?php echo $idcliente; ?>" name="idcliente"; id="idcliente" placeholder="ID">
                                </div>

                                <div class = "form-group">
                                <label for="iddetalledeproducto">ID detalle del producto:</label>
                                <input type="number" required class="form-control" value="<?php echo $iddetalledeproducto; ?>" name="iddetalledeproducto"; id="iddetalledeproducto" placeholder="ID">
                                </div>
                                

                                <div class="btn-group" role="group" aria-label="">
                                    <button type="submit" name="action" <?php echo($action== "Crear")?"disabled":""; ?> value="Crear" class="btn btn-success">Crear</button>
                                    <button type="submit" name="action" <?php echo($action== "Actualizar")?"disabled":""; ?> value="Actualizar" class="btn btn-warning">Actualizar</button>                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-md-7">   
                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th>ID</th>
                                <th>Fecha</th>
                                <th>ID del cliente</th>
                                <th>ID detalle del producto</th>

                                <th>Acciones</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach ($tablapedido as $pedido) { ?> 
                            <tr>
                                <td><?php echo $pedido['idpedido']; ?></td>
                                <td><?php echo $pedido['fecha']; ?></td>
                                <td><?php echo $pedido['idcliente']; ?></td>
                                <td><?php echo $pedido['iddetalledeproducto']; ?></td>

                                
                                <td>            
                                    <form method="post">     
                                    <input type="hidden" name="idcliente" id="idcliente" value="<?php echo $pedido['idpedido']; ?>" >
                                    <input type="submit" name="action" value="Seleccionar" class="btn btn-primary"/>
                                    <input type="submit" name="action" value="Eliminar" class="btn btn-danger"/>
                                    </form>
                                </td>
                            </tr>

                            <?php  } ?>      
                        </tbody>
                    </table>    
                </div>



<?php include("../inicio/footer.php"); ?>