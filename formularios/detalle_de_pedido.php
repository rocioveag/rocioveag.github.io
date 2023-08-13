<!DOCTYPE html>
<html>
<head>
<style>
body {
background-image:
url('https://png.pngtree.com/background/20221028/original/pngtree-paste
l-color-aesthetic-background-with-vintage-leaves-ornament-picture-image
_1931599.jpg');
background-size: cover;
}
form {
width: 400px;
margin: 0 auto;
padding: 20px;
background-color: rgba(255, 255, 255, 0.8);
border-radius: 5px;
}
form input {
width: 100%;
padding: 10px;
margin-bottom: 10px;
border-radius: 3px;
border: 1px solid #ccc;

}
form button {
width: 100%;
padding: 10px;
background-color: #2f4d8d;
color: white;
border: none;
border-radius: 3px;
cursor: pointer;
}
</style>
</head>
<body>
<form>
<h2>Detalle de Pedido</h2>
<label for="detalleProducto">Detalle de Producto:</label>
<input type="text" id="detalleProducto" name="detalleProducto"
required>
<label for="idPedido">ID Pedido:</label>
<input type="text" id="idPedido" name="idPedido" required>
<label for="idProducto">ID Producto:</label>
<input type="text" id="idProducto" name="idProducto" required>
<label for="cantidad">Cantidad:</label>
<input type="number" id="cantidad" name="cantidad" required>
<label for="precio">Precio:</label>
<input type="number" id="precio" name="precio" step="0.01"
required>
<button type="submit">Enviar</button>
</form>
</body>
</html>