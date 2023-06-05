<?php
include 'db.php';
if(!isset($_GET['id'])) {
    header('Location: listar.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM gerenciamentodetarefas WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment){
    header('Location: listar.php');
    exit;
}
$id    = $appointment['id'];
$titulo    = $appointment['titulo'];
$categoria = $appointment['categoria'];
$data     = $appointment['data'];
$horario     = $appointment['horario'];
$descricao     = $appointment['descricao'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar tarefa</title>
    <link rel="stylesheet" href="atualizar.css ">
    <body style="background-size:cover" background="fotos/TaskPlanner (2).png" width="100%" height="100%">
</head>
<body>
     <h1>Atualizar </h1>
     <form method="post">
        
        <label for="titulo">título</label>
        <input type="text" name="titulo" value="<?php echo $titulo; ?>" require><br>

        <label for="categoria">Categoria</label>
        <input type="text" name="categoria" value="<?php echo $categoria; ?>" require><br>

        <label for="data">Data:</label>
        <input type="date" name="data" value="<?php echo $data; ?>" require><br>

        <label for="horario">Horário:</label>
        <input type="time" name="horario" value="<?php echo $horario; ?>" require><br>

        <label for="descricao">Descrição:</label>
<input type="text" name="descricao" value="<?php echo $descricao; ?>" require><br>

        <button type="submit">Atualizar</button>
</form>
</body>
</html>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $titulo = $_POST['titulo'];
        $categoria = $_POST['categoria'];
        $data = $_POST['data'];
        $horario = $_POST['horario'];
        $descricao = $_POST['descricao'];
    $stmt = $pdo->prepare('UPDATE gerenciamentodetarefas SET titulo = ?, categoria = ?, data = ?, horario = ?, descricao = ? WHERE id = ?');
    $stmt->execute([$titulo, $categoria, $data, $horario, $descricao, $id]);
    header('Location: listar.php');
    exit;
    }
    ?>