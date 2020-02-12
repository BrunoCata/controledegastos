<!DOCTYPE html>
<html>
    
    <head>
        <title>Cadastro</title>

        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body class="background">
        <div class="cadastro">
        <form action="model/cadastrarUsuario.php" method="POST">
        <div class="form-group">
            <label>Login</label>
            <input type="text" class="form-control" id="login" placeholder=" Digite seu login de acesso" name="login" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <input type="password" class="form-control" id="senha" placeholder="Digite sua senha" name="senha" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Nome</label>
            <input type="text" class="form-control" id="nome" placeholder="Digite seu nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Salario</label>
            <input type="text" class="form-control" id="salario" placeholder="Digite seu salario" name="salario" required>
        </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a class="btn btn-danger" href="index.php">Voltar</a>
        </form>
        </div>
        </body>
</html>