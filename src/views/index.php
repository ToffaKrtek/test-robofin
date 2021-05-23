<?php 
?>
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
    <h1 class="text-center"><?= $title;?></h1>
    <hr />
    <div class="btn-toolbar p-3 mb-2 px-auto bg-dark bg-gradient text-white">
        <div class=" col-md-4 form-check">
            <input class="form-check-input list_type " type="radio" name="list_type" id="show_all" >
            <label class="form-check-label" for="list_type1">
                Все
            </label>
        </div>
        <div class=" col-md-4 form-check">
            <input class="form-check-input list_type" type="radio" name="list_type" id="show_probation" >
            <label class="form-check-label" for="list_type2">
                Испытательный срок
            </label>
        </div>
        <div class=" col-md-4 form-check">
            <input class="form-check-input list_type" type="radio" name="list_type" id="show_fired">
            <label class="form-check-label" for="list_type3">
                Уволенные
            </label>
        </div>
    </div>
   
    <table class="table" id="data_table">
    <thead>
        <tr>
        <th scope="col">Сотрудник</th>
        <th scope="col">Принят на работу</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach( $staff as $user):?>
        <tr>
        <th scope="row"><?= $user['last_name'] . ' '. $user['middle_name'] . ' ' . $user['first_name'];?></th>
        <td><?= date('d.m.Y', strtotime($user['created_at']));?></td>
        </tr>
    <?php endforeach;?>
    </tbody>
    </table>
    <div class="text-center" id="pagination">
        <p>(<?=count($staff);?> из <?=$total[0];?> найденных)</p>
        <?php if($pagination->countPages > 1):?>
            <nav>
                <?=$pagination;?>
            </nav>
        <?php endif;?>
    </div>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script>
    $(".list_type").click(function(e){
        console.log(e.target.id);
        $.ajax({
	    url: '/index.php',
        method: 'get', 
        dataType: 'html', 
        data: {list_type: e.target.id},
        success: function(data) {
                // Замена контента
              
                var dom = $('<div/>').html(data);
                $("#data_table").html(dom.find("#data_table"));
                $("#pagination").html(dom.find("#pagination"));
        }
        });
    });
</script>
</body>
</html>