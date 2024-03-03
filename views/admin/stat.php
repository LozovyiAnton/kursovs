<h3 style="margin-top: 10px;">Кількість паспотрів громадянина україни: <?= count($Passport) ?></h3>
<h3 style="margin-top: 10px;">Кількість закордонний паспотрів: <?= count($Passport_Zak) ?></h3>

<div class="card">
    <div class="card-body">
        <h3>Служби що видають паспорти</h3>
        <div class="table-container" style="max-height: 400px; overflow-y: auto;">
            <table>
                <thead>
                    <tr>
                        <th>Код</th>
                        <th>Назва</th>
                        <th>Адреса</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($Organs as $value) : ?>
                        <tr>
                            <td><?= $value['code'] ?></td>
                            <td><?= $value['name'] ?></td>
                            <td><?= $value['address'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Паспорти громадянина україни</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Імя</th>
                                <th>Фамілія</th>
                                <th>По батькові</th>
                                <th>Номер</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($Passport as $value) : ?>
                                <tr>
                                    <td><?= $value['name'] ?></td>
                                    <td><?= $value['surname'] ?></td>
                                    <td><?= $value['pb'] ?></td>
                                    <td><?= $value['num'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Закордонні паспорти</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Імя</th>
                                <th>Фамілія</th>
                                <th>Місто</th>
                                <th>Номер</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($Passport_Zak as $value) : ?>
                                <tr>
                                    <td><?= $value['name'] ?></td>
                                    <td><?= $value['surname'] ?></td>
                                    <td><?= $value['city_of_birth'] ?></td>
                                    <td><?= $value['num'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h5>Повний бекап бази даних</h5>
                <div class="row">
                    <a href="/admin/backup_full" class="btn btn-success">Створити</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Бекапи</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Назва</th>
                                <th>Бекапнути</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($Back_Up as $value) : ?>
                                <tr>
                                    <td>Бекап за <?= $value['name'] ?></td>
                                    <td>
                                        <a href="/admin/backup_restore/<?= $value['path'] ?>" class="btn btn-success mr-2">Відновити</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>