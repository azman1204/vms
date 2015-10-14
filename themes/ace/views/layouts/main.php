<!doctype html>
<html>
    <head>
        <title>Open VMS</title>
        <link rel="stylesheet" href="../themes/ace/dist/css/bootstrap.min.css" />
<!--        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" />-->
        <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css" />
        <!--<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300" />-->
        <!-- ace styles -->
        <link rel="stylesheet" href="../themes/ace/dist/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
        <link href="../themes/ace/css/layout.css" rel="stylesheet">
        <link href="jquery/jquery-ui.min.css" rel="stylesheet">
        
	<link rel="stylesheet" type="text/css" href="jquery-easyui-1.4.2/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="jquery-easyui-1.4.2/themes/icon.css">
        
        <script src="jquery/external/jquery/jquery.js"></script>
        <script src="jquery/jquery-ui.js"></script>
        <script src="../themes/ace/dist/js/ace-extra.min.js"></script>
        <script src="twitter/js/bootstrap.js"></script>
        <script type="text/javascript" src="jquery-easyui-1.4.2/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="js/open_vms.js"></script>
    </head>
    <body>
        <div id="iwrapper">
            <div id="iheader"></div>
            <div id="imenu">
                <?php 
                if(! Yii::$app->user->isGuest) {
                    include 'menu.php';
                }
                ?>
            </div>
            <div id="icontent">
                <?php include 'msg.php' ?>
                <?php echo $content; ?>
            </div>
            <div style="clear: both"></div>
            <div id="ifooter"></div>
        </div>
    </body>
</html>

