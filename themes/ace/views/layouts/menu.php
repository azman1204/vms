<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="index.php?r=main"><span class="glyphicon glyphicon-home" style="font-size: 20px"></span></a></li>
                <li class=""><a href="index.php?r=visit/reg-in"><span class="glyphicon glyphicon-check" style="font-size: 14px;color:greenyellow"></span> Masuk</a></li>
                <li class=""><a href="index.php?r=visit/reg-out"><span class="glyphicon glyphicon-log-out" style="font-size: 14px; color:red;"></span> Keluar</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pelawat<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="index.php?r=visitor/reg">Daftar Pelawat</a></li>
                        <li><a href="index.php?r=visitor/search"><span class="glyphicon glyphicon-search" style="font-size: 14px"></span> Carian</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Lawatan<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="index.php?r=visit/in"><i class="fa fa-arrow-up" style="color:#21b384;"></i> Masuk</a></li>
                        <li><a href="index.php?r=visit/out"><i class="fa fa-arrow-down" style="color:red;"></i> Keluar</a></li>
                        <li><a href="index.php?r=visit/search"><span class="glyphicon glyphicon-search" style="font-size: 14px"></span> Carian</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Kad Pelawat<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="index.php?r=card/daily">Jana Kad</a></li>
                        <li><a href="index.php?r=card/search"><span class="glyphicon glyphicon-search" style="font-size: 14px"></span> Carian</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Laporan<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="index.php?r=report/by-month">Statistik Pelawat Mengikut Bulan</a></li>
                        <li><a href="index.php?r=report/by-dept">Statistik Lawatan Mengikut Jabatan</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="index.php?r=user/list">Pengguna Sistem</a></li>
                        <li><a href="index.php?r=ref/katlist">Tetapan Sistem</a></li>
                        <li><a href="index.php?r=audit/list">Log Sistem</a></li>
                        <li><a href="index.php?r=cms/list">Berita</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php?r=user/profile">Profil</a></li>
                <?php if (!\Yii::$app->user->isGuest) : ?>
                    <li class=""><a href="index.php?r=main/logout">Log Keluar</a></li>
                <?php endif;
                ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>