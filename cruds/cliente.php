<?php include("../inicio/head.php"); ?>
<?php   

$idcliente=(isset($_POST['idcliente']))?$_POST['idcliente']:"";
$nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
$direccion=(isset($_POST['direccion']))?$_POST['direccion']:"";
$telefono=(isset($_POST['telefono']))?$_POST['telefono']:"";
$pedido=(isset($_POST['pedido']))?$_POST['pedido']:"";
$action=(isset($_POST['action']))?$_POST['action']:"";



include("../base_datos/conexion.php");

switch($action){
        case "Crear":
            $sentenciaSQL= $conexion->prepare("INSERT INTO cliente (nombre,direccion,telefono,pedido) 
            VALUES (:nombre,:direccion,:telefono,:pedido);");

            $sentenciaSQL->bindParam(':nombre',$nombre);
            $sentenciaSQL->bindParam(':direccion',$direccion);
            $sentenciaSQL->bindParam(':telefono',$telefono);
            $sentenciaSQL->bindParam(':pedido',$pedido);
            $sentenciaSQL->execute();

            header("location:cliente.php");
            break;

        case "Actualizar":

            $sentenciaSQL= $conexion->prepare("UPDATE cliente SET nombre=:nombre,direccion=:direccion,telefono=:telefono,pedido=:pedido WHERE idcliente=:idcliente");
            $sentenciaSQL->bindParam(':nombre',$nombre);
            $sentenciaSQL->bindParam(':direccion',$direccion);
            $sentenciaSQL->bindParam(':telefono',$telefono);
            $sentenciaSQL->bindParam(':pedido',$pedido);
            $sentenciaSQL->bindParam(':idcliente',$idcliente);
            $sentenciaSQL->execute();

            header("location:cliente.php");
            break;
        
        case "Seleccionar":
            
            $sentenciaSQL= $conexion->prepare("SELECT * FROM cliente WHERE idcliente=:idcliente");
            $sentenciaSQL->bindParam(':idcliente',$idcliente);
            $sentenciaSQL->execute();
            $cliente=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            $nombre=$cliente['nombre'];
            $direccion=$cliente['direccion'];
            $telefono=$cliente['telefono'];
            $pedido=$cliente['pedido'];

            // echo "Presionado botón Seleccionar";
            break;

        case "Eliminar":

                $sentenciaSQL= $conexion->prepare("DELETE FROM cliente WHERE idcliente=:idcliente");
                $sentenciaSQL->bindParam('idcliente',$idcliente);
                $sentenciaSQL->execute();
                header("location:cliente.php");

            break;


}

$sentenciaSQL= $conexion->prepare("SELECT * FROM cliente");
$sentenciaSQL->execute();
$tablacliente=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                        Cliente
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data" >
                                <div class = "form-group">
                                <label for="idcliente">ID:</label>
                                <input type="number" required readonly class="form-control" value="<?php echo $idcliente; ?>" name="idcliente"; id="idcliente" placeholder="ID">
                                </div>

                                <div class = "form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" required class="form-control"  value="<?php echo $nombre; ?>" name="nombre"; id="nombre" maxlength="60" placeholder="Nombre">
                                </div>

                                <div class = "form-group">
                                <label for="direccion">Dirección:</label>
                                <input type="text" required class="form-control"  value="<?php echo $direccion; ?>" name="direccion"; id="direccion" maxlength="60" placeholder="Dirección">
                                </div>

                                <div class = "form-group">
                                <label for="telefono">Teléfono:</label>
                                <input type="tel" required class="form-control"  value="<?php echo $telefono; ?>" name="telefono"; id="telefono" maxlength="12" placeholder="Teléfono">
                                </div>

                                <div class = "form-group">
                                <label for="pedido">Pedido:</label>
                                <input type="text" required class="form-control"  value="<?php echo $pedido; ?>" name="pedido"; id="pedido"  maxlength="12" placeholder="Pedido">
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
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Pedido</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach ($tablacliente as $cliente) { ?> 
                            <tr>
                                <td><?php echo $cliente['idcliente']; ?></td>
                                <td><?php echo $cliente['nombre']; ?></td>
                                <td><?php echo $cliente['direccion']; ?></td>
                                <td><?php echo $cliente['telefono']; ?></td>
                                <td><?php echo $cliente['pedido']; ?></td>

                                
                                <td>            
                                    <form method="post">     
                                    <input type="hidden" name="idcliente" id="idcliente" value="<?php echo $cliente['idcliente']; ?>" >
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