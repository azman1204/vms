<form method="post" action="index.php?r=main/auth">
    <div class="well container-fluid" id="login-wrapper" style="padding-left: 30px;padding-right: 30px;">
        <div class="row">
            <div class="col col-md-12"><label>ID Pengguna</label></div>
        </div>
        <div class="row">
            <div class="col col-md-12"><input type="text" name="userid" id='userid' class="form-control"></div>
        </div>
        <div class="row">
            <div class="col col-md-12"><label>Kata Laluan</label></div>
        </div>    
        <div class="row">
            <div class="col col-md-12"><input type="password" name="password" class="form-control"></div>
        </div>    
        <div class="row">    
            <div class="col-md-4" style="padding-left:0"><input type="submit" value="Masuk" class="btn btn-success"/></div>
            <div class="col-md-8">
                <a href="index.php?r=main/home/forgot-pwd">Lupa Katalaluan</a>
            </div>
        </div>
    </div>
</form>

<script>
    $(function () {
        $('#userid').focus();
    });
</script>