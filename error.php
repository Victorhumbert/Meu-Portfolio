<!DOCTYPE html>
<html lang="pt-bt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Erro no envio</title>
  <link rel="stylesheet" href="./style.css">
</head>

<body class="msg">
  <main>
    <h1>Mensagem não enviada <span class="erro">✖</span></h1>
    <a href="./index.html">Voltar</a>
  </main>

  <script>
  <?php
    session_start();

    if (isset($_SESSION['msg_erro'])) {
      $msg_erro = $_SESSION['msg_erro'];
      ?> console.log(`<?php echo $msg_erro ?>`) <?php
    }
    ?>
  </script>
</body>

</html>