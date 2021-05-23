<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title;?></title>

    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
   
    <hr />
    <div class="btn-toolbar p-3 mb-2 px-auto bg-dark bg-gradient text-white">
        <div class=" col-md-4 form-check">
            <input class="form-check-input list_type " type="radio" name="list_type" id="show_all" checked>
            <label class="form-check-label" for="show_all">
                Все
            </label>
        </div>
        <div class=" col-md-4 form-check">
            <input class="form-check-input list_type" type="radio" name="list_type" id="show_probation" >
            <label class="form-check-label" for="show_probation">
                Испытательный срок
            </label>
        </div>
        <div class=" col-md-4 form-check">
            <input class="form-check-input list_type" type="radio" name="list_type" id="show_fired">
            <label class="form-check-label" for="show_fired">
                Уволенные
            </label>
        </div>
        <hr />
        <div class=" col-md-4 form-check">
            <input class="form-check-input list_type " type="radio" name="list_type" id="show_chiefs" >
            <label class="form-check-label" for="show_chiefs">
                Начальники
            </label>
            <p style="font-size: 11px;">Данный инпут был указан в тексте ТЗ, но его не было на приложенном изображении и не имелось табличной зависимости по типу начальник-подчененный, - что смог выдумал для реализации</p>
        </div>
 
    </div>
    <hr />