<?php
session_start();
include '../crud/conexao.php'; // Inclui o arquivo de conexão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consulta para verificar o usuário
    $sql = "SELECT * FROM cadastrar_usuarios WHERE email = :email"; // Use :email como parâmetro
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR); // Vincula o email
    $stmt->execute(); // Executa a declaração

    // Verifica se o usuário existe
    if ($stmt->rowCount() === 1) {
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica a senha
        if ($senha == $usuario['senha']) {
            $_SESSION['id_cliente'] = $usuario['id'];
            header('Location: cuidadores.php');
            exit;
        } else {
            echo "Senha incorreta."; // Mensagem de senha incorreta
        }
    } else {
        echo "Usuário não encontrado."; // Mensagem se o usuário não existir
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Cuidadores</title>
</head>

<body>
    <form action="" method="POST" class="formLogin">
        <label for="email">Email</label>
        <input type="email" placeholder="Email" autofocus="true" id="email" name="email" required />
        <label for="senha">Senha</label>
        <input type="password" placeholder="Digite sua Senha" id="senha" name="senha" required />
        <input type="submit" id="botao" value="Entrar">

        <a href="./crud/cadastro.php">
            <h4 id="conta">Não tem conta?</h4>
        </a>
    </form>
</body>

</html>
