<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);
?>
<h1>About</h1>

<div class="row-fluid">
    <div class="span3">
    <?php
        echo TbHtml::imagePolaroid(Yii::app()->baseUrl.'/images/resto1.jpg')
    ?>        
    </div>
    <div class="span4">
        <p>
            <b>RestoApp</b> merupakan aplikasi pengelolaan restoran berbasis web.
            Aplikasi ini merupakan pra-syarat untuk lulus dalam pendidikan sarjana strata 1
            di Jurusan Teknik Elektro, Universitas Udayana, Bali.
        </p>
        <p>
            Aplikasi ini dibuat menggunakan bahasa pemrograman PHP, dengan database MySQL Server.
            Untuk mempermudah pembuatan aplikasi, saya menggunakan Yii PHP framework dikombinasikan
            dengan CSS framework Bootsrap.
        </p>
    </div>
    <div class="span5">
        &nbsp;
    </div>
</div>

