<?php
use app\models\Ref;
?>

<table border="0" class="tb" cellspacing="0">
    <tr>
        <td width="110" class="header"><img src="images/mpkj.png"><br></td>
        <td height="50" class="header">
            Menara MPKj<br>
            Jalan Cempaka Putih<br>
            Off Jalan Semenyih <br>
            43000 Kajang <br>
            Selangor Darul Ehsan
        </td>
    </tr>
    <tr>
        <td height="160" align="center" colspan="2">
            <?=$type?> <br> <?=$no?> <br>
            <img src="barcode/<?=$no?>.jpg">
        </td>
    </tr>
    <tr>
        <td height="50" class="footer" colspan="2">
            Sila kemukakan kad ini dikaunter pelawat
        </td>
    </tr>
</table>