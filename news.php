<?php
include_once "./templates/generation.php";
$id_article = $_REQUEST["id_article"];
$comment = $_REQUEST["comment"];
 
function send_comment ($mysqli, $comment, $id_article) {
    $sql = "INSERT INTO `comments` (`comment`, `id_article`, `date`) VALUES ('$comment', '$id_article', CURRENT_TIMESTAMP)";
    $mysqli -> query($sql);
    echo '<script>location.replace("https://schooldirectory.ru/news.html' . $id_article . '");</script>'; exit;
}
 
if (isset($_REQUEST['doGo']) === true) {
    send_comment($mysqli, $_REQUEST['comment'], $id_article);
}
 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>О нас</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="style/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <script src="//code.jivo.ru/widget/49Lwh5ldTD" async></script>
</head>
<body>
    <header class="p-3 bg-dark text-white">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <img src="https://media.discordapp.net/attachments/872029012006944809/1088339182163857438/643_20230323145111.png?width=1024&height=1024" style="height: 55px;">
    
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="index.php" class="nav-link px-2 text-white">Главная</a></li>
              <li><a href="rasp.html" class="nav-link px-2 text-white">Расписания</a></li>
              <li><a href="events.html" class="nav-link px-2 text-white">Мероприятия</a></li>
              <li><a href="about.html" class="nav-link px-2 text-white">Про нас</a></li>
              <li><a href="otzyvy.html" class="nav-link px-2 text-white">Отзывы</a></li>
            </ul>
    
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
              <input type="search" class="form-control form-control-dark" placeholder="Найти..." aria-label="Search">
            </form>
    
            <div class="text-end">
              <a type="button" class="btn btn-outline-light me-2" href="login.html">Войти</a>
              <a type="button" class="btn" href="sign-up.html" style="background-color: purple; color: #fff;">Зарегистрироваться</a>
            </div>
          </div>
        </div>
      </header>
      <div class="maindiv">
      <?php function generation_posts_index ($mysqli) {
      $sql = "SELECT * FROM `articles`";
      $res = $mysqli -> query($sql);
      if ($res -> num_rows > 0) {
          while ($resArticle = $res -> fetch_assoc()) {
            ?>
            <div class="news-container">
                <div class="news-card">
                    <div class="content">
                        <h2><a href="post.php?id_article=<?= $resArticle['id'] ?>"> <?= $resArticle['title']?></a></h2>
                        <p><?= mb_substr($resArticle['text'], 0, 158, 'UTF-8') ?> </p>
                        <a href="news.html">Подробнее</a>
                    </div>
                    <img src="https://media.discordapp.net/attachments/872029012006944809/1087986861168939048/642_20230322153104.png?width=1120&height=1120">
                </div>
            </div>
            <?php
              }
    } else {
        // Если нет статей то выводим надпись
        echo "Нет статей";
    }
}
  ?>
      </div>
</body>