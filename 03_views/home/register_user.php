<!DOCTYPE html>
<html>
<head>
    <title>Registrar usuario</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">    -->
</head>

<body>

<h1>Registrar usuario</h1>

<!-- Añadir enlace -->
<form action="" method="post">

<label for="username">Username</label>
<input type="text" name="username" >
<br/>

<label for="hashedPassword">Cobtraseña</label>
<input type="password" name="hashedPassword" >
<br/>

<label for="hashedPassword2">Repetir contraseña</label>
<input type="password" name="hashedPassword2" >
<br/>

<label for="email">Correo electrónico</label>
<input type="email" name="email" >
<br/>

<label for="fechaNac">Fecha de nacimiento</label>
<input type="date" name="fechaNac" >
<br/>

<input type="submit" name="registrarUsuario" value="Registrar usuario">

</form>
<!-- <a href="/PHP/MF0493/sessions/login">LOGUEAR USUARIO</a>
<br/>
<a href="/PHP/MF0493/">HOME</a> -->
</body>

</html>