

<table class="table table-bordered table-striped table-hover">
    <thead>
    <th>#</th>
    <th>Nama</th>
    <th style="text-align:center">Masa Masuk</th>
    <th>No Pass</th>
    <th style="text-align:center">Bil. Pelawat</th>
    <th>Tujuan</th>
    <th>Tingkat</th>
</thead>
<?php
$i = 1;
foreach ($visits as $visit) :
    ?>
    <tr>
        <td><?= $i++ ?>.</td>
        <td><?= $visit->visitor->name ?></td>
        <td align='center'><?= date('H:i', strtotime($visit->in_dt)) ?></td>
        <td><?= $visit->pass_no ?></td>
        <td align='center'><?= $visit->num ?></td>
        <td><?= $visit->purpose ?></td>
        <td align='center'><?= $visit->level ?></td>
    </tr>
    <?php endforeach; ?>
</table>