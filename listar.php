<?php Include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="listar.css ">
 
</head>

<body style="background-size:cover" background="fotos/TaskPlanner (2).png" width="100%" height="100%">
<body class="listar">
<div class="container">
  <h1>Gerenciamento de Tarefas</h1>
  <nav>
			<ul>
<a href="index.php">
  <button class="butao"><b>Voltar</b></button >
</a>    

<br>
<br>
<br>
<br>

  <?php
  $stmt = $pdo->query('SELECT * FROM gerenciamentodetarefas ORDER BY data, horario');
  $gerenciadordetarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if (count($gerenciadordetarefas) == 0) {
      echo '<p>Nenhuma tarefa adicionada.</p>';
  } else {
      echo '<table>';
      echo '<thead><tr><th>Título</th><th>Categoria</th><th>Data</th><th>Horário</th><th>Descrição</th><th colspan="2">Opções</th></tr></thead>';
      echo '<tbody>';

      foreach ($gerenciadordetarefas as $gerenciamentodetarefa) {
          echo '<tr>';
      
          echo '<td>' . $gerenciamentodetarefa['titulo']  .  '</td>';
          echo '<td>' . $gerenciamentodetarefa['categoria']  .  '</td>';
          echo '<td>' . date('d/m/Y', strtotime($gerenciamentodetarefa['data'])) . '</td>';
          echo '<td>' . date('H:i', strtotime($gerenciamentodetarefa['horario'])) . '</td>';  
          echo '<td>' . $gerenciamentodetarefa['descricao']  .  '</td>';
          
         
          echo '<td><a class="link-atualizar" href="atualizar.php?id=' . $gerenciamentodetarefa['id'] . '">Atualizar</a></td>';
          echo '<td><a class="link-concluir" href="deletar.php?id=' . $gerenciamentodetarefa['id'] . '">Concluir Tarefa</a></td>';
          
          echo '</tr>';
      }
      echo '</tbody>';
      echo '</table>';
  }
  ?>
</div>


 

</body>
</html>
