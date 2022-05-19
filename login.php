<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lead - Embarque no foguete</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <img width="240" height="auto" src="./assets/lead.png" alt="Logo do lead" title="Logo do lead">
        <div class="form">
            <form action="index.php" method="POST">
                <div class="formTitles">
                    <h1>Painel do<br/>administrador</h1>
                </div>
                <div class="formInputs">
                    <label>
                        <h3>Email</h3>
                        <input required placeholder="Digite seu email" type="email" name="email" />
                    </label>
                    <label>
                        <h3>Senha</h3>
                        <input required placeholder="Digite sua senha" name="password" type="password" />
                    </label>
                    <button type="submit">
                        Entrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>