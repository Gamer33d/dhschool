<?php
/*include('conexao.php');*/

$mensagem = false;

if(isset($_POST['enviar_formulario'])):
  $formatosPermitidos = array("png", "jpeg", "jpg");
  $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);

  if(in_array($extensao, $formatosPermitidos)):
    $pasta = "arquivos/";
    $temporario = $_FILES['arquivo']['tmp_name'];
    $novonome = uniqid().".$extensao";

    if(move_uploaded_file($temporario, $pasta.$novonome)):
      /*$sql_code = "INSERT INTO images (img_id, img_url) VALUES (null, '$novonome')";
        if($conexao->query($sql_code))
            $mensagem = "Arquivo enviado";
        else
            $mensagem = "Falha ao enviar a foto para o banco de dados";*/
    else:
      $mensagem = "Erro, nao foi possivel fazer upload para a pasta";
    endif;
  else:
    $mensagem = "formato inválido";
  endif;

endif;

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar foto</title>
    <link rel="icon" type="image/jpg" href="./img/logo_light.jpeg" />
    <link rel="stylesheet" href="../css/cadastrar_foto_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link
    href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;600;700&display=swap"
    rel="stylesheet"
  />
    <link rel="stylesheet" href="../css/nav.css">
</head>
<body>
    <input type="checkbox" id="darkmodeToggle" />
    <header>

      <div class="logo">
        <a href="index.html"
          ><img class="logo_light" src="../imgs/logo_light.jpeg" alt=""
        /></a>
      </div>

        <nav class="navegaçao">


          <label for="darkmodeToggle" class="darkmodeLabel">Dark Mode</label>
          <ul>
            <li><a href="#">Voltar</a></li>
          </ul>
        </nav>
    </header>

    <section class="card">
        <h1>Faça upload da sua imagem</h1>

        <?php if($mensagem != false) echo "<p> $mensagem </p>"; ?>

        <div class="form">
            <form action="cadastrar_foto.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="arquivo" id="" class="file" >
                <input type="submit" name="enviar_formulario">
            </form>

            <a href="./fotos.php">Ver fotos</a>
        </div>
    </section>

</body>
</html>