    <h5 class="text-center" id="title-data"><?= $title;?></h5>
    <table class="table" id="data_table">
    <thead>
        <tr>
        <th scope="col">Руководитель отдела</th>
        <th scope="col">Отдел</th>
        <th scope="col">Сотрудник</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach( $staff as $user):?>
        <tr>
        <th scope="row"><?= $user['chief_lname'] . ' '. $user['chief_fname'] . ' ' .$user['chief_mname'];?></th>
        <td><?= $user['department_title'];?></td>
        <td><?= $user['last_name'] . ' '. $user['first_name'] . ' ' .$user['middle_name'];?></td>
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
