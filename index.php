<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>

        <link rel="stylesheet" type="text/css" href="css/style.css">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body class="background">
        <div class="teste">
        <form action="/model/verificaLogin.php" method="POST">
        <div class="form-group">
            <label>Login</label>
            <input type="text" class="form-control" id="login" placeholder="Login" name="login">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha">
        </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="cadastro.php" class="btn btn-primary">Cadastrar</a> 
        </form>
        </div>
        </body>
</html>