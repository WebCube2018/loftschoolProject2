<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <title>Добавить нового пользователя</title>
</head>

<body>
<?php if ($role == 1) : ?>
    <div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark p-4">
                <h4 class="text-white">Функции Администратора</h4>
                <ul class="text-white nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/users">Список пользователей</a>
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
    <?php if (!empty($error) && $error == 2) :?>
        <div class="alert alert-danger" role="alert">
            Такой пользователь уже существует выбирете другой e-mail
        </div>
    <?php elseif (!empty($error) && $error == 1) : ?>
        <div class="alert alert-danger" role="alert">
            К сожалению вы не администратор и добавлять пользователя не можете
            <a href="/users">Список пользователей</a>
        </div>
    <?php elseif (!empty($error)) : ?>
        <div class="alert alert-danger" role="alert">
            Что то пошло не так попробуйте еще раз
        </div>
    <?php endif; ?>
    <?php if (!empty($result)) : ?>
        <div class="alert alert-success" role="alert">
            Пользователь с id <?=$result?> добавлен
        </div>
    <?php endif; ?>
    <?php if ($role == 1) : ?>
    <div class="user d-flex justify-content-between align-items-center">
        <form action="/adduser" method="post" enctype="multipart/form-data" class="form-signin">
            <span class="images text-center"></span>
            <h1 class="h3 mb-3 font-weight-normal text-center">Добавление пользователя</h1>

            <label for="inputPassword" >Имя</label>
            <input type="text" name="name" class="form-control" placeholder="Имя" required>

            <label for="inputEmail" >Email</label>
            <input type="text" name="email" class="form-control" placeholder="E-mail" required autofocus>

            <label for="exampleFormControlSelect2">Группа пользователя</label>
            <select name="role" multiple class="form-control" id="exampleFormControlSelect2">
                <option selected value="2">Обычный пользователь</option>
                <option value="1">Администратор</option>
            </select>

            <label for="inputPassword" >Пароль</label>
            <input type="password" name="password" class="form-control" placeholder="Пароль" required>

            <label for="inputPassword" >Возраст</label>
            <input type="text" name="age" class="form-control" placeholder="Возраст" required>

            <label for="inputPassword" >Описание</label>
            <textarea name="description" class="form-control" placeholder="Описание" required></textarea>

            <div class="form-group">
                <label for="exampleFormControlFile1">Файлы</label>
                <input type="file" class="form-control-file" name="files">
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Добавить пользователя</button>
        </form>
    </div>
    <?php endif; ?>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>