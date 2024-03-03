<?php

use models\Travel;
?>
<div class="card-body">
    <h4 class="card-title">Відвідані країни</h4>
    <div class="row">
        <div class="col-md-5">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <?php foreach ($travel as $value) : ?>
                            <tr>
                                <td>
                                    <i class="flag-icon flag-icon-<?= strtolower($value['code']) ?>"></i>
                                </td>
                                <td><?= $value['name'] ?></td>
                                <td class="text-right"> <?= $value['count'] ?> </td>
                                <td class="text-right font-weight-medium"> <?= $value['percentage'] ?>%</td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-7">
            <div style="width: 467px; height: 20px; background: linear-gradient(to right, #ee82ee, #6a5acd);"></div>
            <div>
                <div style="background-color: transparent;"><svg width="467.156" height="300">
                        <defs></defs>
                        <g transform="scale(0.5190622222222225) translate(0, 68.62953991601698)">
                            <?php echo $map ?>
                        </g>
                        <g></g>
                        <g></g>
                        <g></g>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>