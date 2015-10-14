<?php

use app\helpme\MyDate;
use yii\helpers\Html;
use app\models\Ref;
?>

<legend>Laporan Lawatan Mengikut Jabatan</legend>

<form method="post" action="index.php?r=report/by-dept">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?= Html::dropDownList('year', $year, MyDate::yearList(3)) ?>
                <input type="submit" value="Hantar" class="btn btn-primary btn-sm">
            </div>
        </div>
    </div>
</form>

<div class="col-md-4">
    <table class="table table-bordered">
        <tr class="success">
            <td>Jabatan</td>
            <td>Bilangan</td>
        </tr>
        <?php
        foreach ($rs as $r) :
            ?>
            <tr>
                <td><?= Ref::getDesc('jab', $r['dept']) ?></td>
                <td><?= $r['bil'] ?></td>
            </tr>
            <?php
        endforeach;
        ?>
    </table>
</div>

<div class="col-md-8">
    <div id='container'></div>
</div>

<script src="Highcharts-4.1.8/js/highcharts.js"></script>
<script>
    $(function () {
        // Create the chart
        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            xAxis: {
                type: 'category',
                title: {
                    text: 'Jabatan'
                }
            },
            yAxis: {
                title: {
                    text: 'Jumlah Lawatan'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.0f}'
                    }
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
            },
            series: [{
                name: "Brands",
                colorByPoint: true,
                data: [
                    <?php
                    foreach ($rs as $r) {
                    ?>
                    {
                        name: "<?=Ref::getDesc('jab', $r['dept']) ?>",
                        y: <?=$r['bil']?>
                    },
                    <?php
                    }
                    ?>
                ]
            }]
        });
    });
</script>