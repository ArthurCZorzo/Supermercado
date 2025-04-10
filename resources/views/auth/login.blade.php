<!doctype html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    </head>
    <body>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                @if (session()->has('mensagem'))
                <div class="alert alert-danger">
                    {{ session('mensagem') }}
                </div>
                @endif
                <form action="{{ route('try.login') }}" method="post">
                @csrf
                <h1>Login</h1>
                <div class="mb-3">
                    <label for="email" class="form-label">Endereço de email</label>
                    <input type="email" class="form-control" id="email" placeholder="Digite seu email" name="email">
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha">
                </div>
                <input type="submit" value="Registrar" class="btn btn-success">
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    </body>
</html>