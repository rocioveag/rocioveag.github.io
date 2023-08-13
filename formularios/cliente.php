<!DOCTYPE html>
<html>
<head>
<style>
body {
background-image:
url('https://img.freepik.com/fotos-premium/fondo-vintage-papel-beige-an
tiguo-diseno-texto_213524-529.jpg');
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
background-color: #4CAF50;
color: white;
border: none;
border-radius: 3px;
cursor: pointer;
}
</style>
</head>
<body>
<form>
<h2>Cliente</h2>

<label for="nombre">Nombre:</label>
<input type="text" id="nombre" name="nombre" required>
<label for="direccion">Dirección:</label>
<input type="text" id="direccion" name="direccion" required>
<label for="telefono">Teléfono:</label>
<input type="tel" id="telefono" name="telefono" required>
<label for="idPedido">ID Pedido:</label>
<input type="text" id="idPedido" name="idPedido" required>
<button type="submit">Enviar</button>
</form>
</body>
</html>