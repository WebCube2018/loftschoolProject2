<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<?php if ($role == 1) : ?>
    <div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark p-4">
                <h4 class="text-white">Функции Администратора</h4>
                <ul class="text-white nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/adduser">Добавить пользователя</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/addfile">Добавить себе файл</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/files">Перйти к списку Ваших файлов</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Выйти</a>
                    </li>
                </ul>
            </div>
        </div>
        <nav class="navbar navbar-dark bg-dark">
            <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarToggleExternalContent"
                    aria-controls="navbarToggleExternalContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
                Меню администратора
            </button>
        </nav>
    </div>
<?php endif; ?>
<div class="container">
    <div class="row">
        <div class="col-xl d-flex justify-content-between align-items-center">
            <h1>Hello, world! User: <?=$user?></h1>
            <a href="/logout" class="close" aria-label="Close">
                <span aria-hidden="true">Back &times;</span>
            </a>
        </div>
        <div class="col-xl-12">
            <table class="table table-hover table-dark">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Имя</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Возраст</th>
                    <th scope="col">Совершенолетие</th>
                    <th scope="col">Файл</th>
                    <th scope="col">Описание</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $value) : ?>
                    <tr>
                        <th scope="row"><?=$value->id?></th>
                        <td><?=$value->name?></td>
                        <td>
                            <?=$value->email?>
                            <?php if ($role == 1) : ?>
                                <a href="/edituser?id=<?=$value->id?>">Редактировать</a>
                            <?php endif; ?>
                        </td>
                        <td><?=$value->age?></td>
                        <td>
                            <?php if ($value->age < 18) : ?>
                                Несовершеннолетний
                            <?php else : ?>
                                Совершеннолетний
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if (!$value->namefile) : ?>
                                no files
                            <?php else : ?>
                                <a href="/images/<?=$value->namefile?>"><?=$value->namefile?></a>
                            <?php endif; ?>
                        </td>
                        <td><?=$value->description?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <p class="mb-3 text-muted">
                Перйти к списку Ваших
                <a href="/files">файлов</a>
            </p>
            <p class="mb-3 text-muted">
                Добавить файл
                <a href="/addfile">файл</a>
            </p>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>