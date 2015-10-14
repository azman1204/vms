<?php

use yii\helpers\Html;
?>

<legend>Daftar Maklumat Pelawat</legend>

<form method="post" action="index.php?r=visitor/save" enctype="multipart/form-data">
    <div class="col col-md-6">
        <div class="widget-box">
            <div class="widget-header"><h4>Pelawat</h4></div>
            <div class="widget-body">
                <div class="widget-main" style="background-color: #eee;">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col col-md-2"></div>
                            <div class="col col-md-6"><input type="button" id="readme" value="Baca Kad Pengenalan" class="btn btn-success btn-sm"></div>
                        </div>
                        <div class="row">
                            <div class="col col-md-2">Nama</div>
                            <div class="col col-md-6"><input type="text" name="name" id="nama" size="35"></div>
                        </div>
                        <div class="row">
                            <div class="col col-md-2">No KP</div>
                            <div class="col col-md-6"><input type="text" name="icno" id="nokp" size="35"></div>
                        </div>
                        <div class="row">
                            <div class="col col-md-2">No Tel</div>
                            <div class="col col-md-6"><input type="text" name="tel" id="nokp" size="35"></div>
                        </div>
                        <div class="row">
                            <div class="col col-md-2">Gambar</div>
                            <div class="col col-md-6" id="gambar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col col-md-6">
        <div class="widget-box">
            <div class="widget-header"><h4>Tujuan Lawatan</h4></div>
            <div class="widget-body">
                <div class="widget-main" style="background-color: #eee;">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col col-md-2">Tujuan</div>
                            <div class="col col-md-10"><?= Html::dropDownList('purpose', '', $purpose, ['class' => 'form-control']) ?></div>
                        </div> 
                        <div class="row">
                            <div class="col col-md-2">Jabatan</div>
                            <div class="col col-md-10"><?= Html::dropDownList('dept', '', $jab, ['class' => 'form-control']) ?></div>
                        </div>
                        <div class="row">
                            <div class="col col-md-2">Pegawai Ditemui</div>
                            <div class="col col-md-10"><input type="text" name="to_meet" class="form-control"></div>
                        </div>
                        <div class="row">
                            <div class="col col-md-2">Nota</div>
                            <div class="col col-md-10"><input type="text" name="in_remark" class="form-control"></div>
                        </div>
                        <div class="row">
                            <div class="col col-md-2">No Kad Pelawat</div>
                            <div class="col col-md-10"><input type="text" name="pass_no" class="form-control"></div>
                        </div>
                        <div class="row">
                            <div class="col col-md-2">Bil Pelawat</div>
                            <div class="col col-md-10"><input type="text" name="num" value="1" class="form-control"></div>
                        </div>
                        <div class="row">
                            <div class="col col-md-2"></div>
                            <div class="col col-md-6"><input type="submit" value="Simpan" class="btn btn-primary"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div id="msg" ></div>

<script src="js/mykad.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript">
<?php
if (isset($_GET['sts']) && $_GET['sts'] === '1') {
    echo 'alert("Maklumat telah disimpan");';
}
?>

    $('#readme').click(function () {
        $(this).val('Sedang Membaca ...');
        setTimeout(ReadTest, 1000);
        //ReadTest();
    });

    function AddItem(Text) {
        $('#msg').append(Text);
    }

    function ResetList() {
        document.getElementById("SelectMsg").options.length = 0;
    }

    function ReadTest() {
        AddItem("initMyKAD()");
        res = initMyKAD();
        

        res = version();
        AddItem("version() " + res);

        res = openReader("ACS ACR38USB 0", "ACS ACR38USBSAM 0");
        AddItem("openReader() " + res);

        res = loadMyKAD();
        AddItem("loadMyKAD()" + res);

        // what to read
        setReadHolderName(true);
        setICNo(true);
//            setReadOldICNo(true);
//            setReadAddress1(true);
//            setReadAddress2(true);
//            setReadAddress3(true);
//            setReadState(true);
//            setReadPostCode(true);
//            setReadCity(true);
//            setReadReligion(true);
//            setReadGender(true);
//            setReadBirthDate(true);
//            setReadBirthPlace(true);
//            setReadRace(true);
//            setReadCitizenship(true);
//            setReadDateIssued(true);
//            setReadDateRegistered(true);
        //setReadPhoto("C:\\temp\\MYKAD-PHOTO.BMP");
        var serial = <?php echo rand(1, 10000) . date('dmY') ?>;
        setReadPhoto("C:\\xampp\\htdocs\\openvms\\web\\images\\" + serial + ".jpg");
        //setReadPhoto("\\\\Emachine-pc\\development\\" + serial + ".jpg");
        //setReadPhoto("\\\\192.168.0.20\\Share\\test\\" + serial + ".jpg");

        res = readMyKAD();
        var nama = holderName();
        var nokp = icNo();
        $('#nama').val(nama);
        $('#nokp').val(nokp);

//            AddItem("readMyKAD()" + res);
//
//            AddItem("=====================================================");
//            AddItem("holderName():" + holderName());
//            AddItem("icNo():" + icNo());
//            AddItem("oldICNo():" + oldICNo());
//            AddItem("address1():" + address1());
//            AddItem("address2():" + address2());
//            AddItem("address3():" + address3());
//            AddItem("state():" + state());
//            AddItem("postcode():" + postcode());
//            AddItem("city():" + city());
//            AddItem("religion():" + religion());
//            AddItem("gender():" + gender());
//            AddItem("birthDate():" + birthDate());
//            AddItem("birthPlace():" + birthPlace());
//            AddItem("race():" + race());
//            AddItem("citizenship():" + citizenship());
//            AddItem("dateIssued():" + dateIssued());
//            AddItem("dateRegistered():" + dateRegistered());
//            AddItem("Photo stored at " + "C:\\temp\\MYKAD-PHOTO.BMP");
//            AddItem("=====================================================");

        res = unloadMyKAD();
        AddItem("unloadMyKAD()" + res);

        res = closeReader();
        AddItem("closeReader() " + res);

        res = freeMyKAD();
        AddItem("freeMyKAD()");

        alert("Read finished.");
        $('#gambar').html("<img src='http://localhost/openvms/web/images/" + serial + ".jpg'>");
        $('#readme').val('Baca Kad Pengenalan');
    }
</script>

