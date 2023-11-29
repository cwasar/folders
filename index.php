<?php
header('Content-Type: text/html; charset=utf-8');

require_once 'functions.php';


?>

<!doctype html>
<html lang="en">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Скачивание фоток и распределение по папкам</title>
</head>
<body>
<div class="container">
    <h1 class="text-center">Folders</h1>
    <form action="" method="post">
<div class="row justify-content-center">
    <div class="col-6">
        <textarea name="links" id="" cols="80" rows="10" placeholder="Прямые ссылки на фото в формате jpg или png"></textarea>
    </div>
    <div class="col-6">
        <textarea name="names" id="" cols="80" rows="10" placeholder="Имена в формате: Название--артикул---порядковый номер фото при совпадении названии и артикула"></textarea>
    </div>
</div>
<div class="row justify-content-end">
    <div class="col-2">
        <button class="btn btn-primary">Выполнить</button>
    </div>
</div>



    </form>
</div>

</body>
</html>
<?php


if($_POST['links'] && $_POST['names']){

//    makeFolders($_POST['text']);
    pickPhotos();
}else{
    echo 'no data';
}