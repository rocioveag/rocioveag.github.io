<?php include('../inicio/head.php'); ?>
                
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h1 class="display-3">Bienvenido <?php echo $nombreUsuario; ?></h1>
                        <p class="lead">Da clic en cualquier botón y <b>crea, modifica, borra y consulta</b> registros:</p>
                        <hr class="my-2">
                        <p class="lead">
                            <a class="btn btn-primary btn-lg" href="../cruds/cliente.php" role="button">Clientes</a>
                            <a class="btn btn-primary btn-lg" href="../cruds/pedido.php" role="button">Pedido</a>
                            <a class="btn btn-primary btn-lg" href="../cruds/detalle.php" role="button">Detalle de Pedido</a>
                            <a class="btn btn-primary btn-lg" href="../cruds/producto.php" role="button">Producto</a>
                            <a class="btn btn-primary btn-lg" href="../cruds/tienda.php" role="button">Tienda</a>
                        </p>
                    </div>
                
                </div>

<?php include('../inicio/footer.php'); ?>