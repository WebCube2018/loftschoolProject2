<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <title>Hello, world!</title>
</head>
<body>
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
                    <th scope="col">Файл</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $value) : ?>
                    <tr>
                        <th scope="row"><?=$value["id"]?></th>
                        <td>
                            <?php if (!$value["namefile"]) : ?>
                                no files
                            <?php else : ?>
                                <a href="/images/<?=$value["namefile"]?>"><?=$value["namefile"]?></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <p class="mt-5 mb-3 text-muted">
                Перйти к списку
                <a href="/users">Пользователей</a>
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