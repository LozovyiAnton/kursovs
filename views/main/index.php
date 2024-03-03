<?php

use core\Utils;

?>

<?php if (isset($_SESSION['user'])) : ?>
    <h3 style="margin-top: 10px;">Паспорт громадянина України</h3>

    <?php if (!empty($grom)) : ?>
        <?php if ($grom['conf'] == 1) : ?>

            <div class="row">
                <div class="col-md-4 grid-margin stretch-card">

                    <div class="card" style="padding: 7px;">
                        <div class="card-body">
                            <h4 class="card-title">Ваше фото та базові дані</h4>
                            <img style="display: block; max-width:100%; max-height:500px; width: auto; height: auto;" src="<?= $grom['img'] ?>">
                        </div>
                        <div class="preview-item-content d-sm-flex flex-grow">
                            <div class="flex-grow">
                                <span class="menu-icon">
                                    <i class="mdi mdi-rename-box"></i>
                                </span>
                                Імя:
                            </div>
                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <div class="flex-grow">
                                    <?php $fn = Utils::splitStringBySlash($grom['name']) ?>
                                    <h6 class="preview-subject"><?= $fn[0] ?></h6>
                                    <p class="text-muted mb-0"><?= $fn[1] ?></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="preview-item-content d-sm-flex flex-grow">
                            <div class="flex-grow">
                                <span class="menu-icon">
                                    <i class="mdi mdi-regex"></i>
                                </span>
                                Прізвище:
                            </div>
                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <div class="flex-grow">
                                    <?php $ln = Utils::splitStringBySlash($grom['surname']) ?>
                                    <h6 class="preview-subject"><?= $ln[0] ?></h6>
                                    <p class="text-muted mb-0"><?= $ln[1] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between">
                                <h4 class="card-title mb-1">Ваші розширені дані</h4>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="preview-list">
                                        <div class="preview-item-content d-sm-flex flex-grow">
                                            <div class="flex-grow">
                                                <span class="menu-icon">
                                                    <i class="mdi mdi-reproduction"></i>
                                                </span>
                                                По батькові:
                                            </div>
                                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject"><?= $grom['pb'] ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="preview-item-content d-sm-flex flex-grow">
                                            <div class="flex-grow">
                                                <span class="menu-icon">
                                                    <i class="mdi mdi-octagon-outline"></i>
                                                </span>
                                                Стать:
                                            </div>
                                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                <div class="flex-grow">
                                                    <?php $sex = Utils::splitStringBySlash($grom['sex']) ?>
                                                    <h6 class="preview-subject"><?= $sex[0] ?></h6>
                                                    <p class="text-muted mb-0"><?= $sex[1] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="preview-item-content d-sm-flex flex-grow">
                                            <div class="flex-grow">
                                                <span class="menu-icon">
                                                    <i class="mdi mdi-timelapse"></i>
                                                </span>
                                                Дата народження:
                                            </div>
                                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject"><?= $grom['date_of_birth'] ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="preview-item-content d-sm-flex flex-grow">
                                            <div class="flex-grow">
                                                <span class="menu-icon">
                                                    <i class="mdi mdi-timer-off"></i>
                                                </span>
                                                Дійсний до:
                                            </div>
                                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject"><?= $grom['end_date'] ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="preview-item-content d-sm-flex flex-grow">
                                            <div class="flex-grow">
                                                <span class="menu-icon">
                                                    <i class="mdi mdi-account-card-details"></i>
                                                </span>
                                                Номер документа:
                                            </div>
                                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject"><?= $grom['num'] ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="preview-item-content d-sm-flex flex-grow">
                                            <div class="flex-grow">
                                                <span class="menu-icon">
                                                    <i class="mdi mdi-airplane"></i>
                                                </span>
                                                Громадянство:
                                            </div>
                                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                <div class="flex-grow">
                                                    <?php $gr = Utils::splitStringBySlash($grom['gr']) ?>
                                                    <h6 class="preview-subject"><?= $gr[0] ?></h6>
                                                    <p class="text-muted mb-0"><?= $gr[1] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="preview-item-content d-sm-flex flex-grow">
                                            <div class="flex-grow">
                                                Орган що видав:
                                            </div>
                                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject"><?= $grom['organ'] ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <? else : ?>
            Ваш паспорт поки не підтвердили
        <? endif; ?>
    <?php else : ?>
        В вас немає паспорта
    <?php endif; ?>

    <hr>

    <h3>Закордонний паспорт</h3>

    <?php if (!empty($zak)) : ?>
        <?php if ($zak['conf'] == 1) : ?>
            <div class="row">
                <div class="col-md-4 grid-margin stretch-card">

                    <div class="card" style="padding: 7px;">
                        <div class="card-body">
                            <h4 class="card-title">Ваше фото та базові дані</h4>
                            <img style="display: block; max-width:100%; max-height:500px; width: auto; height: auto;" src="<?= $zak['img'] ?>">
                        </div>
                        <div class="preview-item-content d-sm-flex flex-grow">
                            <div class="flex-grow">
                                <span class="menu-icon">
                                    <i class="mdi mdi-rename-box"></i>
                                </span>
                                Імя:
                            </div>
                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <div class="flex-grow">
                                    <?php $fn = Utils::splitStringBySlash($zak['name']) ?>
                                    <h6 class="preview-subject"><?= $fn[0] ?></h6>
                                    <p class="text-muted mb-0"><?= $fn[1] ?></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="preview-item-content d-sm-flex flex-grow">
                            <div class="flex-grow">
                                <span class="menu-icon">
                                    <i class="mdi mdi-regex"></i>
                                </span>
                                Прізвище:
                            </div>
                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <div class="flex-grow">
                                    <?php $ln = Utils::splitStringBySlash($zak['surname']) ?>
                                    <h6 class="preview-subject"><?= $ln[0] ?></h6>
                                    <p class="text-muted mb-0"><?= $ln[1] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between">
                                <h4 class="card-title mb-1">Ваші розширені дані</h4>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="preview-list">
                                        <div class="preview-item-content d-sm-flex flex-grow">
                                            <div class="flex-grow">
                                                <span class="menu-icon">
                                                    <i class="mdi mdi-reproduction"></i>
                                                </span>
                                                Місце народження:
                                            </div>
                                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                <div class="flex-grow">
                                                    <?php $c = Utils::splitStringBySlash($zak['city_of_birth']) ?>
                                                    <h6 class="preview-subject"><?= $c[0] ?></h6>
                                                    <p class="text-muted mb-0"><?= $c[1] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="preview-item-content d-sm-flex flex-grow">
                                            <div class="flex-grow">
                                                <span class="menu-icon">
                                                    <i class="mdi mdi-octagon-outline"></i>
                                                </span>
                                                Стать:
                                            </div>
                                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                <div class="flex-grow">
                                                    <?php $sex = Utils::splitStringBySlash($zak['sex']) ?>
                                                    <h6 class="preview-subject"><?= $sex[0] ?></h6>
                                                    <p class="text-muted mb-0"><?= $sex[1] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="preview-item-content d-sm-flex flex-grow">
                                            <div class="flex-grow">
                                                <span class="menu-icon">
                                                    <i class="mdi mdi-timelapse"></i>
                                                </span>
                                                Дата народження:
                                            </div>
                                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject"><?= $zak['date_of_birth'] ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="preview-item-content d-sm-flex flex-grow">
                                            <div class="flex-grow">
                                                <span class="menu-icon">
                                                    <i class="mdi mdi-timer-off"></i>
                                                </span>
                                                Дійсний до:
                                            </div>
                                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject"><?= $zak['end_date'] ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="preview-item-content d-sm-flex flex-grow">
                                            <div class="flex-grow">
                                                <span class="menu-icon">
                                                    <i class="mdi mdi-account-card-details"></i>
                                                </span>
                                                Номер документа:
                                            </div>
                                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject"><?= $zak['num'] ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="preview-item-content d-sm-flex flex-grow">
                                            <div class="flex-grow">
                                                <span class="menu-icon">
                                                    <i class="mdi mdi-airplane"></i>
                                                </span>
                                                Громадянство:
                                            </div>
                                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                <div class="flex-grow">
                                                    <?php $gr = Utils::splitStringBySlash($zak['gr']) ?>
                                                    <h6 class="preview-subject"><?= $gr[0] ?></h6>
                                                    <p class="text-muted mb-0"><?= $gr[1] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="preview-item-content d-sm-flex flex-grow">
                                            <div class="flex-grow">
                                                Орган що видав:
                                            </div>
                                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject"><?= $zak['organ'] ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <? else : ?>
            Ваш паспорт поки не підтвердили
        <? endif; ?>
    <?php else : ?>
        В вас немає паспорта
    <?php endif; ?>
<?php else : ?>
    Ввійдіть в акаунт щоб побачити інформацію
<?php endif; ?>