<script src="js/webcam.js"></script>

<div id="my_camera" style="width:320px; height:240px;"></div>
<div id="my_result"></div>

<script language="JavaScript">
    Webcam.set({
        width: 320,
        height: 240,
        force_flash: true,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach('#my_camera');

    function take_snapshot() {
        Webcam.snap(function (data_uri) {
            document.getElementById('my_result').innerHTML = '<img src="' + data_uri + '"/>';
            Webcam.upload(data_uri, 'index.php?r=camera/upload', function (code, text) {
                alert(text + ' ' + code);
            });

        });
    }
</script>

<a href="javascript:void(take_snapshot())">Take Snapshot</a>