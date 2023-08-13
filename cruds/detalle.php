<?php include("../inicio/head.php"); ?>
<?php   

$iddetalleproducto=(isset($_POST['iddetalleproducto']))?$_POST['iddetalleproducto']:"";
$idpedido=(isset($_POST['idpedido']))?$_POST['idpedido']:"";
$idproducto=(isset($_POST['idproducto']))?$_POST['idproducto']:"";
$cantidad=(isset($_POST['cantidad']))?$_POST['cantidad']:"";
$precio=(isset($_POST['precio']))?$_POST['precio']:"";
$action=(isset($_POST['action']))?$_POST['action']:"";



include("../base_datos/conexion.php");

switch($action){
        case "Crear":
            $sentenciaSQL= $conexion->prepare("INSERT INTO detalle de pedido (idpedido,idproducto,cantidad,precio) 
            VALUES (:idpedido,:idproducto,:cantidad,:precio);");

            $sentenciaSQL->bindParam(':idpedido',$idpedido);
            $sentenciaSQL->bindParam(':idproducto',$idproducto);
            $sentenciaSQL->bindParam(':cantidad',$cantidad);
            $sentenciaSQL->bindParam(':precio',$precio);
            $sentenciaSQL->execute();

            header("location:detalle.php");
            break;

        case "Actualizar":

            $sentenciaSQL= $conexion->prepare("UPDATE detalle de pedido SET idpedido=:idpedido,idproducto=:idproducto,cantidad=:cantidad,precio=:precio WHERE iddetalleproducto=:iddetalleproducto");
            $sentenciaSQL->bindParam(':idpedido',$idpedido);
            $sentenciaSQL->bindParam(':idproducto',$idproducto);
            $sentenciaSQL->bindParam(':cantidad',$cantidad);
            $sentenciaSQL->bindParam(':precio',$precio);
            $sentenciaSQL->bindParam(':iddetalleproducto',$iddetalleproducto);
            $sentenciaSQL->execute();

            header("location:detalle.php");
            break;
        
        case "Seleccionar":
            
            $sentenciaSQL= $conexion->prepare("SELECT * FROM detalle de pedido");
            $sentenciaSQL->bindParam(':iddetalleproducto',$iddetalleproducto);
            $sentenciaSQL->execute();
            $detalle=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            $idpedido=$detalle['idpedido'];
            $idproducto=$detalle['idproducto'];
            $cantidad=$detalle['cantidad'];
            $precio=$detalle['precio'];

            // echo "Presionado botón Seleccionar";
            break;

        case "Eliminar":

                $sentenciaSQL= $conexion->prepare("DELETE FROM detalle de pedido WHERE iddetalleproducto=:iddetalleproducto");
                $sentenciaSQL->bindParam('iddetalleproducto',$iddetalleproducto);
                $sentenciaSQL->execute();
                header("location:detalle.php");

            break;


}
$sentenciaSQL= $conexion->prepare("SELECT * FROM `detalle de pedido`;");
$sentenciaSQL->execute(); 
$tabladetalle=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                        Detalle de pedido
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data" >
                                <div class = "form-group">
                                <label for="iddetalleproducto">ID:</label>
                                <input type="number" required readonly class="form-control" value="<?php echo $iddetalleproducto; ?>" name="iddetalleproducto"; id="iddetalleproducto" placeholder="ID">
                                </div>

                                <div class = "form-group">
                                <label for="idpedido">ID del pedido:</label>
                                <input type="number" required class="form-control" value="<?php echo $idpedido; ?>" name="idpedido"; id="idpedido" placeholder="ID">
                                </div>

                                <div class = "form-group">
                                <label for="idproducto">ID del producto:</label>
                                <input type="number" required class="form-control" value="<?php echo $idproducto; ?>" name="idproducto"; id="idproducto" placeholder="ID">
                                </div>

                                <div class = "form-group">
                                <label for="cantidad">Cantidad:</label>
                                <input type="text" required class="form-control"  value="<?php echo $cantidad; ?>" name="cantidad"; id="cantidad" maxlength="5" placeholder="Cantidad">
                                </div>

                                <div class = "form-group">
                                <label for="precio">Precio:</label>
                                <input type="text" required class="form-control"  value="<?php echo $precio; ?>" name="precio"; id="precio" maxlength="12" placeholder="Precio">
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
                                <th>ID del pedido</th>
                                <th>ID del producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        
                        tbody>
                            <?php foreach ($tabladetalle as $detalle) { ?> 
                            <tr>
                                <td><?php echo $detalle['iddetalleproducto']; ?></td>
                                <td><?php echo $detalle['idpedido']; ?></td>
                                <td><?php echo $detalle['idproducto']; ?></td>
                                <td><?php echo $detalle['cantidad']; ?></td>
                                <td><?php echo $detalle['precio']; ?></td>

                                
                                <td>            
                                    <form method="post">     
                                    <input type="hidden" name="iddetalleproducto" id="iddetalleproducto" value="<?php echo $detalle['iddetalleproducto']; ?>" >
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