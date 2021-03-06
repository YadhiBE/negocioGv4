<!DOCTYPE html>
<html lang="es">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Iniciar Sesion</title>
     <link rel="stylesheet" href="node_modules\bulma\css\bulma.min.css">
     <script defer="" src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
</head>
<body>
    <div class="hero is-fullheight is-primary">
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="column is-7 is-offset-2">
                <a class="title has-text-centered-white m-6 p-3" href="index.html">Iniciar Sesion</a>
                <a class="title has-text-centered-white m-6 p-3" href="registro.php">Registrarme</a>
                <hr class="login-hr">
                <div class="box">
                        <img src="img/bebe.png" width="600px" height="60px">
                    <form action="api\index.php\nuevosusuarios" method="POST">
                        <div class="field">
                            <div class="control">
                                <label class="label">Nombre de usuario</label>
                                <p class="control has-icons-left">
                                    <input class="input is-primary is-rounded" type="text" name="usuario" placeholder="Usuario" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label class="label">Contraseña</label>
                                <p class="control has-icons-left">
                                    <input class="input is-primary is-rounded" type="password" name="contraseña" placeholder="Contraseña" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <input class="button is-primary has-text-centered mt-2 is-rounded buton" type="submit" value="Registrarme" onclick="nuevosusuarios()">
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function nuevosusuarios (){
            axios.post('api/index.php/nuevosusuarios', {
                usuario: document.forms[0].calificacion.value,
                contraseña: document.forms[0].calificacion.value,
            }).then(resp => {
                alert(`Se a registrado correctamente\n`)
                setTimeout(`location. href='guarderia.php'`, 500)
                console.log(resp)
            }).catch(error => {
                alert(`No se registro correctamente, vuelva a intentarlo`)
            });
        }
    </script>
</body>
</html>