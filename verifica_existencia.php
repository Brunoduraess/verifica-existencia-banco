<?php
include('conexao.php'); //chama o arquivo de conexão com o BD

if (isset($_POST['envia'])) { //se existir a var submit, ele vai salvar os dados no banco

    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $dados_st = array_map('strip_tags', $dados_rc);
    $dados = array_map('trim', $dados_st);
    $result_usuario = "SELECT id FROM tabela_do_seu_banco WHERE nome ='" . $dados['nome'] . "'";
    $resultado_usuario = mysqli_query($conexao, $result_usuario);
    if (($resultado_usuario) and ($resultado_usuario->num_rows != 0)) {
        echo "<script>
                alert('Existe esse nome no BD.')
              </script>";
    } else {
        echo "<script>
                alert('Não existe esse nome nome no BD.')
              </script>";
    }
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>

    <form action="verifica_existencia.php" method="post">

        <label>Informe um nome:</label>
        <input type="text" name="nome">

        <input type="submit" name="envia">
    </form>
</body>

</html>
