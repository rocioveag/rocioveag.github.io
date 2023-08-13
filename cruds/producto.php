<?php include("../inicio/head.php"); ?>
<?php   

$idproducto=(isset($_POST['idproducto']))?$_POST['idproducto']:"";
$imagen=(isset($_FILES['imagen']['name']))?$_FILES['imagen']['name']:"";
$nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
$descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";
$precio=(isset($_POST['precio']))?$_POST['precio']:"";
$action=(isset($_POST['action']))?$_POST['action']:"";



include("../base_datos/conexion.php");

switch($action){
        case "Crear":
            $sentenciaSQL= $conexion->prepare("INSERT INTO producto (nombre,descripcion,precio,imagen) 
            VALUES (:nombre,:descripcion,:precio,:imagen);");

            $sentenciaSQL->bindParam(':nombre',$nombre);
            $sentenciaSQL->bindParam(':descripcion',$telefono);
            $sentenciaSQL->bindParam(':precio',$pedido);
            $sentenciaSQL->execute();

            $fecha= new DateTime();
            $nombreArchivo=($imagen!="")?$fecha->getTimestamp()."_".$_FILES["imagen"]["name"]:"imagen.jpg";
            
            $tmpImagen=$_FILES["imagen"]["tmp_name"];

            if($tmpImagen!=""){

                    move_uploaded_file($tmpImagen,"../images/".$nombreArchivo);
            }

            $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
            $sentenciaSQL->execute();

            header("location:producto.php");
            break;

        case "Actualizar":

            $sentenciaSQL= $conexion->prepare("UPDATE producto SET nombre=:nombre,descripcion=:descripcion,precio=:precio WHERE idproducto=:idproducto");
            $sentenciaSQL->bindParam(':nombre',$nombre);
            $sentenciaSQL->bindParam(':descripcion',$descripcion);
            $sentenciaSQL->bindParam(':precio',$precio);
            $sentenciaSQL->bindParam(':idproducto',$idproducto);
            $sentenciaSQL->execute();

            if($imagen!=""){
                
                $fecha= new DateTime();
                $nombreArchivo=($imagen!="")?$fecha->getTimestamp()."_".$_FILES["imagen"]["name"]:"imagen.jpg";
                $tmpImagen=$_FILES["imagen"]["tmp_name"];

                move_uploaded_file($tmpImagen,"../images/".$nombreArchivo);

            $sentenciaSQL= $conexion->prepare("SELECT imagen FROM producto WHERE idproducto=:idproducto");
            $sentenciaSQL->bindParam(':idproducto',$idproducto);
            $sentenciaSQL->execute();
            $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if( isset($producto["imagen"]) &&($producto["imagen"]!="imagen.jpg") ){

                if(file_exists("../images/".$producto["imagen"])){
                    
                    unlink("../images/".$producto["imagen"]);
                }
               
            }


                $sentenciaSQL= $conexion->prepare("UPDATE producto SET imagen=:imagen WHERE idproducto=:idproducto");
                $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
                $sentenciaSQL->bindParam(':idproducto',$idproducto);
                $sentenciaSQL->execute();
            }

            header("location:producto.php");
            break;
        
        case "Seleccionar":
            
            $sentenciaSQL= $conexion->prepare("SELECT * FROM producto WHERE idproducto=:idproducto");
            $sentenciaSQL->bindParam(':idproducto',$idproducto);
            $sentenciaSQL->execute();
            $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            $nombre=$producto['nombre'];
            $direccion=$producto['descripcion'];
            $telefono=$producto['precio'];

            // echo "Presionado botón Seleccionar";
            break;

        case "Eliminar":

            
            $sentenciaSQL= $conexion->prepare("SELECT imagen FROM producto WHERE idproducto=:idproducto");
            $sentenciaSQL->bindParam(':idproducto',$idproducto);
            $sentenciaSQL->execute();
            $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if( isset($producto["imagen"]) &&($producto["imagen"]!="imagen.jpg") ){

                if(file_exists("../images/".$producto["imagen"])){
                    
                    unlink("../images/".$producto["imagen"]);
                }
               
            }

                $sentenciaSQL= $conexion->prepare("DELETE FROM producto WHERE idproducto=:idproducto");
                $sentenciaSQL->bindParam('idproducto',$idproducto);
                $sentenciaSQL->execute();
                header("location:producto.php");

            break;


}

$sentenciaSQL= $conexion->prepare("SELECT * FROM producto");
$sentenciaSQL->execute();
$tablaproducto=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                        Producto
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data" >
                                <div class = "form-group">
                                <label for="idproducto">ID:</label>
                                <input type="number" required readonly class="form-control" value="<?php echo $idproducto; ?>" name="idproducto"; id="idproducto" placeholder="ID">
                                </div>

                                <div class = "form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" required class="form-control"  value="<?php echo $nombre; ?>" name="nombre"; id="nombre"  maxlength="40" placeholder="Nombre">
                                </div>

                                <div class = "form-group">
                                <label for="descripcion">Descripción:</label>
                                <input type="text" required class="form-control"  value="<?php echo $descripcion; ?>" name="descripcion"; id="descripcion"  maxlength="120" placeholder="Descripción">
                                </div>

                                <div class = "form-group">
                                <label for="precio">Precio:</label>
                                <input type="number" required class="form-control"  value="<?php echo $precio; ?>" name="precio"; id="precio" maxlength="12" placeholder="Precio">
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
                                <th>Descripción</th>
                                <th>Precio</th>

                                <th>Acciones</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach ($tablaproducto as $producto) { ?> 
                            <tr>
                                <td><?php echo $producto['idproducto']; ?></td>
                                <td><?php echo $producto['nombre']; ?></td>
                                <td><?php echo $producto['descripcion']; ?></td>
                                <td><?php echo $producto['precio']; ?></td>

                                
                                <td>            
                                    <form method="post">     
                                    <input type="hidden" name="idproducto" id="idproducto" value="<?php echo $producto['idproducto']; ?>" >
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