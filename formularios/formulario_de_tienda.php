<!DOCTYPE html>
<html>
<head>
<style>
body {
background-image:
url('https://marketplace.canva.com/EAEK4dC2olw/1/0/1600w/canva-arco%C3%
ADris-gradiente-rosa-y-naranja-fondo-virtual-c3PYha1JI9M.jpg');
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
<h2>Formulario de Tienda</h2>
<label for="tienda">Tienda:</label>
<input type="text" id="tienda" name="tienda" required>
<label for="nombre">Nombre:</label>
<input type="text" id="nombre" name="nombre" required>
<label for="direccion">Dirección:</label>
<input type="text" id="direccion" name="direccion" required>
<label for="telefono">Teléfono:</label>
<input type="tel" id="telefono" name="telefono" required>
<label for="cliente">Cliente:</label>
<input type="text" id="cliente" name="cliente" required>
<button type="submit">Enviar</button>
</form>
</body>
</html>