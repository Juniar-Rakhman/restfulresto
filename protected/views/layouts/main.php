<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    
    <?php Yii::app()->bootstrap->register(); ?>
</head>

<body>
<?php
$this->widget('bootstrap.widgets.TbNavbar', array(
    'display' => TbHtml::NAVBAR_DISPLAY_FIXEDTOP, // default is static to top
    #'display' => null, // default is static to top
    #'color' => TbHtml::NAVBAR_COLOR_INVERSE,
    'collapse'=>true,
    'items' => array(
        array(
            'class' => 'bootstrap.widgets.TbNav',
            'items' => array(
                array('label' => 'Home', 'url' => array('/site/index'),'icon'=>  TbHtml::ICON_HOME),
                array('label' => 'Kategori', 'url' => array('/kategori'), 'visible' => !Yii::app()->user->isGuest),
                array('label' => 'Menu', 'url' => array('/menu'), 'visible' => !Yii::app()->user->isGuest),
                array('label' => 'Pesanan', 'url' => array('/pesanan'), 'visible' => !Yii::app()->user->isGuest),
                array('label' => 'Transaksi', 'url' => '#', 'visible' => !Yii::app()->user->isGuest,
                    'items' => array(
                        array('label' => 'Daftar Transaksi', 'url' => array('/transaksi'), 'visible'=>  Yii::app()->user->checkAccess('transaksi.index')),
                        array('label' => 'Laporan Transaksi', 'url' => array('/transaksi/laporan'),'visible'=>  Yii::app()->user->checkAccess('transaksi.laporan')),
                    )),
                array('label' => 'Pegawai', 'url' => array('/pegawai'), 'visible' => !Yii::app()->user->isGuest),
                array('label' => 'Pengguna', 'url' => array('/pengguna'), 'visible' => !Yii::app()->user->isGuest),
                array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
                array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                array('label' => Yii::app()->user->name, 'url' => '#', 'visible' => !Yii::app()->user->isGuest,
                    'items' => array(
                        array('label' => 'Pengaturan Akses', 'url' => array('/auth'),'icon'=>  TbHtml::ICON_LOCK, 'visible'=>  Yii::app()->user->isAdmin),
                        array('label' => 'Ganti Password', 'url' => array('/pengguna/resetPasswd/'.Yii::app()->user->id), 'icon'=>  TbHtml::ICON_REFRESH),
                        array('label' => 'Logout', 'url' => array('/site/logout'),'icon'=>  TbHtml::ICON_OFF),    
                    ), 'icon'=>  TbHtml::ICON_USER)
            ),
        ),
    ),
));
?>

<div class="container" id="page">
   <?php
    if (isset($this->breadcrumbs)) {
        echo TbHtml::breadcrumbs($this->breadcrumbs);
    }
    ?> 
    
    <?php $this->widget('bootstrap.widgets.TbAlert'); ?>
	
   <?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
