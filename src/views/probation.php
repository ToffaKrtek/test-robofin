    
    <h5 class="text-center" id="title-data"><?= $title;?></h5>
    <table class="table" id="data_table">
    <thead>
        <tr>
        <th scope="col">Сотрудник</th>
        <th scope="col">Принят на работу</th>
        <th scope="col">Отдел</th>
        <th scope="col">Должность</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach( $staff as $user):?>
        <tr>
        <th scope="row"><?= $user['last_name'] . ' '. $user['first_name'] . ' ' .$user['middle_name'];?></th>
        <td><?= date('d.m.Y', strtotime($user['created_at']));?></td>
        <td><?= $user['department'];?></td>
        <td><?= $user['position'];?></td>
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
