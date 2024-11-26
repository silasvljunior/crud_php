<?php include 'conn.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Registro</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
        }

        button {
            padding: 5px 10px;
            background-color: #f44336;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <h1>Excluir Registro</h1>

    <?php
    // Exclui o registro, caso o ID seja passado
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM users WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            echo "<p style='color: green;'>Registro excluído com sucesso!</p>";
        } else {
            echo "<p style='color: red;'>Erro ao excluir: " . $conn->error . "</p>";
        }
    }

    // Busca todos os usuários para exibição
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ação</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td>
                        <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir este registro?');">
                            <button>Excluir</button>
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>Nenhum registro encontrado.</p>
    <?php endif; ?>
</body>
</html>
