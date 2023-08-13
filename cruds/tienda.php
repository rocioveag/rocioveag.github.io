<?php include("../inicio/head.php"); ?>
<?php   

$idtienda =(isset($_POST['idtienda ']))?$_POST['idtienda ']:"";
$nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
$direccion=(isset($_POST['direccion']))?$_POST['direccion']:"";
$telefono=(isset($_POST['telefono']))?$_POST['telefono']:"";
$cliente=(isset($_POST['cliente']))?$_POST['cliente']:"";
$action=(isset($_POST['action']))?$_POST['action']:"";



include("../base_datos/conexion.php");

switch($action){
        case "Crear":
            $sentenciaSQL= $conexion->prepare("INSERT INTO tienda de chocolates (nombre,direccion,telefono,cliente) 
            VALUES (:nombre,:direccion,:telefono,:cliente);");

            $sentenciaSQL->bindParam(':nombre',$nombre);
            $sentenciaSQL->bindParam(':direccion',$direccion);
            $sentenciaSQL->bindParam(':telefono',$telefono);
            $sentenciaSQL->bindParam(':cliente',$cliente);
            $sentenciaSQL->execute();

            header("location:tienda.php");
            break;

        case "Actualizar":

            $sentenciaSQL= $conexion->prepare("UPDATE tienda de chocolates SET nombre=:nombre,direccion=:direccion,telefono=:telefono,cliente=:cliente WHERE idtienda=:idtienda");
            $sentenciaSQL->bindParam(':nombre',$nombre);
            $sentenciaSQL->bindParam(':direccion',$direccion);
            $sentenciaSQL->bindParam(':telefono',$telefono);
            $sentenciaSQL->bindParam(':cliente',$cliente);
            $sentenciaSQL->execute();

            header("location:tienda.php");
            break;
        
        case "Seleccionar":
            
            $sentenciaSQL= $conexion->prepare("SELECT * FROM tienda de chocolates");
            $sentenciaSQL->bindParam(':idtienda',$idtienda);
            $sentenciaSQL->execute();
            $tienda=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            $nombre=$tienda['nombre'];
            $direccion=$tienda['direccion'];
            $telefono=$tienda['telefono'];
            $cliente=$tienda['cliente'];

            // echo "Presionado botón Seleccionar";
            break;

        case "Eliminar":

                $sentenciaSQL= $conexion->prepare("DELETE FROM tienda de chocolates WHERE idtienda=:idtienda");
                $sentenciaSQL->bindParam('idtienda',$idtienda);
                $sentenciaSQL->execute();
                header("location:tienda.php");

            break;


}
$sentenciaSQL= $conexion->prepare("SELECT * FROM `tienda de chocolates`;");
$sentenciaSQL->execute(); 
$tablatienda=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                        Tienda
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data" >
                                <div class = "form-group">
                                <label for="idtienda">idtienda:</label>
                                <input type="number" required readonly class="form-control" value="<?php echo $idtienda; ?>" name="idtienda"; id="idtienda" placeholder="ID">
                                </div>

                                <div class = "form-group">
                                <label for="idpedido">nombre:</label>
                                <input type="number" required class="form-control" value="<?php echo $idpedido; ?>" name="idpedido"; id="idpedido" id="cantidad" maxlength="20" >
                                </div>

                                <div class = "form-group">
                                <label for="idproducto">direccion:</label>
                                <input type="number" required class="form-control" value="<?php echo $idproducto; ?>" name="idproducto"; id="idproducto" id="cantidad" maxlength="120">
                                </div>

                                <div class = "form-group">
                                <label for="cantidad">telefono:</label>
                                <input type="text" required class="form-control"  value="<?php echo $cantidad; ?>" name="cantidad"; id="cantidad" maxlength="12" placeholder="Cantidad">
                                </div>

                                <div class = "form-group">
                                <label for="precio">cliente:</label>
                                <input type="text" required class="form-control"  value="<?php echo $precio; ?>" name="precio"; id="precio" maxlength="35" placeholder="Precio">
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
                            <?php foreach ($tablatienda as $tienda) { ?> 
                            <tr>
                                <td><?php echo $tienda['idtienda']; ?></td>
                                <td><?php echo $tienda['idpedido']; ?></td>
                                <td><?php echo $tienda['idproducto']; ?></td>
                                <td><?php echo $tienda['cantidad']; ?></td>
                                <td><?php echo $tienda['precio']; ?></td>

                                
                                <td>            
                                    <form method="post">     
                                    <input type="hidden" name="idtienda" id="idtienda" value="<?php echo $tienda['idtienda']; ?>" >
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