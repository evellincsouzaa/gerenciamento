<?php
require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

</head>
<body style="background-size:cover" background="fotos/TaskPlanner (2).png" width="100%" height="100%">
<br>
<br>

    
          <nav>
			<ul>
<a href="paginainicial.php">
  <button class="butao"><b>Página Inicial</b></button >
</a>    

<br>
<br>
<br>
<br>

    <div class="container">
        <div class="container-formulario">
            <h1></h1>
            <?php
            if (isset($_POST['submit'])) {
                $titulo = $_POST['titulo'];
                $categoria = $_POST['categoria'];
                $data = $_POST['data'];
                $horario = $_POST['horario'];
                $descricao = $_POST['descricao'];

                $stmt = $pdo->prepare('SELECT COUNT(*) FROM gerenciamentodetarefas WHERE data = ? AND horario = ?');
                $stmt->execute([$data, $horario]);
                $count = $stmt->fetchColumn();

                if ($count > 0) {
                    $error = '𝐉á 𝐞𝐱𝐢𝐬𝐭𝐞 𝐮𝐦𝐚 𝐭𝐚𝐫𝐞𝐟𝐚 𝐚 𝐬𝐞𝐫 𝐫𝐞𝐚𝐥𝐢𝐳𝐚𝐝𝐚 𝐧𝐞𝐬𝐬𝐚 𝐝𝐚𝐭𝐚 𝐞 𝐡𝐨𝐫á𝐫𝐢𝐨.';
                } else {

                    $stmt = $pdo->prepare('INSERT INTO gerenciamentodetarefas ( titulo, categoria, data, horario, descricao) 
                    VALUES(:titulo, :categoria, :data, :horario, :descricao)');
                    $stmt->execute(['titulo' => $titulo, 'categoria' => $categoria,
                                    'data' => $data, 'horario' => $horario, 'descricao' => $descricao]);

                    if ($stmt->rowCount()) {
                        echo '<span>𝐓𝐚𝐫𝐞𝐟𝐚 𝐀𝐝𝐢𝐜𝐢𝐨𝐧𝐚𝐝𝐚!</span>';
                    } else {
                        echo '<span>𝐄𝐫𝐫𝐨 𝐚𝐨 𝐚𝐝𝐢𝐜𝐢𝐨𝐧𝐚𝐫 𝐭𝐚𝐫𝐞𝐟𝐚. 𝐓𝐞𝐧𝐭𝐞 𝐧𝐨𝐯𝐚𝐦𝐞𝐧𝐭𝐞!</span>';
                    }
                }
                if (isset($error)) {
                    echo '<span>' . $error . '</span>';
                }
            }
            ?>

            <form method="post">
                

                <label for="titulo">𝐓í𝐭𝐮𝐥𝐨</label>
                <input type="text" name="titulo" required><br>

                <label for="categoria">𝐂𝐚𝐭𝐞𝐠𝐨𝐫𝐢𝐚</label>
                <style>
  /* Estilos dos checkboxes */
  .checkbox-wrapper-4 {
    margin-bottom: 10px;
  }

  .inp-cbx {
    display: none;
  }

  .cbx {
    display: inline-block;
    vertical-align: middle;
    font-size: 14px;
    cursor: pointer;
  }

  .cbx span {
    display: inline-block;
    vertical-align: middle;
    transform: translate3d(0, 0, 0);
  }

  .cbx span:first-child {
    position: relative;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    transform: scale(1);
    vertical-align: middle;
    border: 1px solid #ccc;
  }

  .cbx span:first-child:before {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    width: 10px;
    height: 10px;
    transform: translate(-50%, -50%) scale(0);
    border-radius: 50%;
    background-color: #f45dc7;
    opacity: 0;
    transition: all 0.3s ease;
  }

  .inp-cbx:checked + .cbx span:first-child:before {
    transform: translate(-50%, -50%) scale(1);
    opacity: 1;
  }
</style>

<div class="checkbox-wrapper-4">
  <input type="radio" id="lazer" name="categoria" class="inp-cbx" value="Lazer">
  <label for="lazer" class="cbx"><span></span><span>Lazer</span></label>
</div>

<div class="checkbox-wrapper-4">
  <input type="radio" id="atividades" name="categoria" class="inp-cbx" value="Atividades em casa">
  <label for="atividades" class="cbx"><span></span><span>Atividades em casa</span></label>
</div>

<div class="checkbox-wrapper-4">
  <input type="radio" id="financas" name="categoria" class="inp-cbx" value="Finanças">
  <label for="financas" class="cbx"><span></span><span>Finanças</span></label>
</div>

<div class="checkbox-wrapper-4">
  <input type="radio" id="trabalho" name="categoria" class="inp-cbx" value="Trabalho">
  <label for="trabalho" class="cbx"><span></span><span>Trabalho</span></label>
</div>

<div class="checkbox-wrapper-4">
  <input type="radio" id="saude" name="categoria" class="inp-cbx" value="Saúde">
  <label for="saude" class="cbx"><span></span><span>Saúde</span></label>
</div>

                


                <label for="data">𝐃𝐚𝐭𝐚</label>
                <input type="date" name="data" required><br>

                <label for="horario">𝐇𝐨𝐫á𝐫𝐢𝐨 </label>
                <input type="time" name="horario" required><br>

                <label for="descricao">𝐃𝐞𝐬𝐜𝐫𝐢çã𝐨</label>
                <input type="text" name="descricao" required><br>


                <div>
                    <button type="submit" name="submit" value="Adicionar">Adicionar</button>
                    <a class="botao-gerenciar" href="listar.php">Gerenciar</a>
                </div>

            </form>
        </div>
    </div>






</body>

</html>