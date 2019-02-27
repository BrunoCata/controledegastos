<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>

        <link rel="stylesheet" type="text/css" href="style.css">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="teste">
        <form action="formulario.php" method="POST">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <input type="password" class="form-control" id="senha" placeholder="Senha" nome="senha">
        </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        </div>
        </body>
</html>