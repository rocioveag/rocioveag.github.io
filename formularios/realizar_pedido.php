<html>
<head>
<title>Realizar Pedido</title>
<style>
body {
font-family: "Bodoni", serif;
}

h2 {
font-size: 24px;
font-weight: bold;
text-align: center;
}

form {
max-width: 400px;
margin: 0 auto;
}

label {
display: block;
margin-top: 10px;
}

input[type="text"], input[type="tel"] {
width: 100%;
padding: 5px;
font-size: 16px;
}

input[type="submit"] {
width: 100%;
padding: 10px;
font-size: 18px;
font-weight: bold;
background-color:
#4CAF50; color: FDD835;
border: none;
cursor: pointer;
}
</style>
</head>
<body>

<h2>Realizar Pedido</h2>

<form action="#" method="POST">
<label for="nombre">Nombre:</label>
<input type="text" id="nombre"
name="nombre" maxlength="30" required>

<label for="apellidos">Apellidos:</label>
<input type="text" id="apellidos"
name="apellidos" maxlength="30" required>

<label for="direccion">Dirección:</label>
<input type="text" id="direccion"
name="direccion" maxlength="30" required>

<label for="codigo-postal">Código Postal:</label>
<input type="text" id="codigo-postal"
name="codigo-postal" pattern="[0-9]{1,7}" maxlength="7"
required>

<label for="codigo-postal">Referencias:</label> <input
type="text" id="referencias" name="referencias"
pattern="[0-9]{1,7}" maxlength="60" required>
<label for="telefono">Teléfono:</label>
<input type="tel" id="telefono"
name="telefono" pattern="[0-9]{1,15}"
maxlength="15" required>

<br> </br>
<input type="submit" value="Enviar">

</form>

</body>
</html>