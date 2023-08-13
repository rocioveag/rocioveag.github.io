<!DOCTYPE html>
<html>
<head>
<style>
body {
background-image:
url('https://img.freepik.com/vector-gratis/pastel-polvo-fondo-elementos
-dibujados-mano_52683-40301.jpg?w=2000');
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

form textarea {
width: 100%;
padding: 10px;
margin-bottom: 10px;
border-radius: 3px;
border: 1px solid #ccc;
}
form button {
width: 100%;
padding: 10px;
background-color: #cc6715;
color: white;
border: none;
border-radius: 3px;
cursor: pointer;
}
</style>
</head>
<body>
<form>
<h2>Detalles del Producto</h2>
<label for="idProducto">ID Producto:</label>
<input type="text" id="idProducto" name="idProducto" required>
<label for="nombre">Nombre:</label>
<input type="text" id="nombre" name="nombre" required>
<label for="descripcion">Descripción:</label>
<textarea id="descripcion" name="descripcion" required></textarea>
<label for="precio">Precio:</label>
<input type="number" id="precio" name="precio" step="0.01"
required>
<button type="submit">Enviar</button>
</form>
</body>
</html>