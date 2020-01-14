<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <title>Вход в MVC Project</title>
</head>

<body>
<div class="container">
    <?php if (!empty($error) && $error == 2) :?>
        <div class="alert alert-danger" role="alert">
            Такой пользователь уже существует выбирете другой e-mail или перейдите на страницу
            <a href="/login">Авторизации</a>
        </div>
    <?php elseif (!empty($error)) : ?>
        <div class="alert alert-danger" role="alert">
            Что то пошло не так попробуйте еще раз
        </div>
    <?php endif; ?>
    <div class="d-flex justify-content-between align-items-center">
        <form action="/registration" method="post" enctype="multipart/form-data" class="form-signin">
            <span class="images text-center"></span>
            <h1 class="h3 mb-3 font-weight-normal text-center">Регистрация</h1>

            <label for="inputPassword" >Имя</label>
            <input type="text" name="name" class="form-control" placeholder="Имя" required>

            <label for="inputEmail" >Email</label>
            <input type="text" name="email" class="form-control" placeholder="E-mail" required autofocus>

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

            <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
            <p class="mt-5 mb-3 text-muted">
                Если у Вас уже есть профиль
                <a href="/login">Войдите</a>
            </p>
        </form>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>