<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="row-fluid">
    <div class="span3">
        <?php
            echo TbHtml::imagePolaroid(Yii::app()->baseUrl.'/images/resto7.jpg');
        ?>
    </div>
    <div class="span9">
        <?php $this->widget('bootstrap.widgets.TbHeroUnit', array(
            'heading' => 'Selamat datang, '.Yii::app()->user->name.'!',
            'content' => '<p>Silakan pilih tautan yang tersedia di panel atas untuk memulai menggunakan aplikasi ini.</p>',
        )); ?>        
    </div>
</div>