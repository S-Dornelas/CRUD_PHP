<?php
switch ($_REQUEST["acao"]) {
    case 'cadastrar':

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        // com o md5() podemos criptografar a senha
        $data_nasc = $_POST["data_nasc"];

        $sql = "INSERT INTO usuario (nome, email, senha, data_nasc) VALUES ('{$nome}', '{$email}', '{$senha}', '{$data_nasc}')";

        $resultado = $bd->query($sql);

        if ($resultado == true) {
            echo "<script>alert('Cadastro realizado com sucesso!');</script>";
            echo "<script> location.href='?page=listar';</script>";
        } else {
            echo "<script>alert('Não foi possivel realizar o cadastro!');</script>";
            echo "<script> location.href='?page=listar';</script>";
        }
        break;
    case 'editar':

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $data_nasc = $_POST["data_nasc"];

        $sql = "UPDATE usuario SET 
                    nome = '{$nome}',
                    email = '{$email}',
                    senha = '{$senha}',
                    data_nasc = '{$data_nasc}'
                    WHERE 
                        id = " . $_REQUEST["id"];

        $resposta = $bd->query($sql);

        if ($resultado) {
            echo "<script>alert('Não foi possivel editar o cadastro!');</script>";
            echo "<script> location.href='?page=listar';</script>";
        } else {
            echo "<script>alert('Cadastro editado com sucesso!');</script>";
            echo "<script> location.href='?page=listar';</script>";
        }
        break;
    case 'excluir':

        $sql = "DELETE FROM usuario WHERE id=" . $_REQUEST["id"];

        $resposta = $bd->query($sql);

        if ($resultado) {
            echo "<script>alert('Cadastro não excluido!');</script>";
            echo "<script> location.href='?page=listar';</script>";           
        } else {
            echo "<script>alert('Cadastro excluido com sucesso!');</script>";
            echo "<script> location.href='?page=listar';</script>";
        }
        break;
}
