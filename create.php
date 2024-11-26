<?php include 'conn.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Registro</title>
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

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        form input, form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form input:focus, form button:focus {
            outline: none;
            border-color: #4CAF50;
        }

        form button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        form button:hover {
            background-color: #45a049;
        }

        .message {
            margin-top: 20px;
            color: #4CAF50;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Criar Registro</h1>
    <form action="" method="post">
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" placeholder="Digite o nome" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Digite o email" required>
        <button type="submit" name="submit">Criar</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];

        $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
        if ($conn->query($sql) === TRUE) {
            echo "<p class='message'>Registro criado com sucesso!</p>";
        } else {
            echo "<p class='error'>Erro: " . $conn->error . "</p>";
        }
    }
    ?>
</body>
</html>
