<?php
use app\models\Util;
?>

<table border="0" width="100%">
    <?php
    for ($i=0; $i<count($arr_no);) {
        $no1 = $arr_no[$i++];
        $no2 = $arr_no[$i++];
        $no3 = $arr_no[$i++];
    ?>
    <tr>
        <td height="300" width="200" class="main"><?=$this->render('format1', ['no'=>$no1, 'type'=>$type])?></td>
        <td width="200" class="main"><?=$this->render('format1', ['no'=>$no2, 'type'=>$type])?></td>
        <td width="200" class="main"><?=$this->render('format1', ['no'=>$no3, 'type'=>$type])?></td>
    </tr>
    <?php
    }
    ?>
</table>