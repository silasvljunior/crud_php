<?php include 'conn.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Registro</title>
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

        form input, form select, form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form input:focus, form select:focus, form button:focus {
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
            margin-bottom: 20px;
            color: #4CAF50;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Atualizar Registro</h1>

    <?php
    // Exibe mensagens de sucesso ou erro
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];

        $sql = "UPDATE users SET name = '$name', email = '$email' WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            echo "<p class='message'>Registro atualizado com sucesso!</p>";
        } else {
            echo "<p class='error'>Erro ao atualizar: " . $conn->error . "</p>";
        }
    }

    // Preenche a lista de usuários
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
        } else {
            echo "<p class='error'>Usuário não encontrado.</p>";
        }
    }
    ?>

    <!-- Formulário para selecionar usuário -->
    <form method="get" action="">
        <label for="id">Selecione um usuário:</label>
        <select name="id" id="id" onchange="this.form.submit()">
            <option value="">Selecione...</option>
            <?php
            $sql = "SELECT id, name FROM users";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                $selected = (isset($_GET['id']) && $_GET['id'] == $row['id']) ? 'selected' : '';
                echo "<option value='{$row['id']}' $selected>{$row['name']}</option>";
            }
            ?>
        </select>
    </form>

    <!-- Formulário de edição -->
    <?php if (isset($user)): ?>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $user['id']; ?>">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" value="<?= $user['name']; ?>" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= $user['email']; ?>" required>
            <button type="submit" name="update">Atualizar</button>
        </form>
    <?php endif; ?>
</body>
</html>
