<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD em PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
        }

        h1 {
            color: #4CAF50;
        }

        nav {
            margin: 20px 0;
        }

        nav a {
            text-decoration: none;
            margin: 0 10px;
            padding: 10px 20px;
            color: white;
            background-color: #4CAF50;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>CRUD Simples em PHP</h1>
    <nav>
        <a href="create.php">Criar</a>
        <a href="read.php">Ler</a>
        <a href="update.php">Atualizar</a>
        <a href="delete.php">Excluir</a>
    </nav>
</body>
</html>
