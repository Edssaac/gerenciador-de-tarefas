<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="/public/images/task_manager.png" type="image/png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/public/css/main.css">

    <script src="/public/js/tinymce/tinymce.min.js" defer></script>
    <script src="/public/js/bootstrap.bundle.min.js" defer></script>
    <script src="/public/js/main.js" defer></script>

    <?php foreach ($data['scripts'] as $script) { ?>
        <script src="/public/js/<?= $script ?>.js" defer></script>
    <?php } ?>

    <title><?= $data['title'] ?></title>
</head>

<body>

    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fa-solid fa-list-check text-success"></i>
                <span>Tarefeiro</span>
            </a>
        </div>
    </nav>

    <div class="row p-3 mx-0 mt-3">

        <div class="col-12 col-md-3 mb-4">
            <ul class="list-group">
                <a class="text-decoration-none" href="/task/new">
                    <li class="list-group-item">Nova Tarefa</li>
                </a>
                <a class="text-decoration-none" href="/task/tasks">
                    <li class="list-group-item">Tarefas</li>
                </a>
            </ul>
        </div>

        <div class="col-12 col-md-9 mb-4">