

<div class="card-body">
    <h4 class="card-title">Список паспортів для підтвердження</h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th> Фото </th>
                    <th> Імя </th>
                    <th> Прізвище </th>
                    <th> Місце народження </th>
                    <th> Номер </th>
                    <th> Підтвердити </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($array_data as $value): ?>
                <tr>
                    <td class="py-1">
                        <img src="<?=$value['img']?>" alt="image">
                    </td>
                    <td> <?=$value['name']?> </td>
                    <td> <?=$value['surname']?> </td>
                    <td> <?=$value['city_of_birth']?> </td>
                    <td> <?=$value['num']?> </td>
                    <td> <a href="/admin/conf_zak_pass/<?=$value['id']?>" class="btn btn-success mr-2">Підтвердити</a> </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>