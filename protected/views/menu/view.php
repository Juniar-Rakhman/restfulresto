<?php
/* @var $this MenuController */
/* @var $model Menu */
?>

<?php
$this->breadcrumbs=array(
	'Menu'=>array('index'),
	$model->nama,
);

$this->menu=array(
	array('label'=>'Menu', 'icon'=>TbHtml::ICON_LIST, 'url'=>array('index'),'visible'=>Yii::app()->user->checkAccess('menu.index')),
	array('label'=>'Tambah', 'icon'=>TbHtml::ICON_PLUS, 'url'=>array('create'),'visible'=>Yii::app()->user->checkAccess('menu.create')),
	array('label'=>'Ubah', 'icon'=>  TbHtml::ICON_PENCIL, 'url'=>array('update', 'id'=>$model->id),'visible'=>Yii::app()->user->checkAccess('menu.update')),
	array('label'=>'Kelola', 'icon'=> TbHtml::ICON_BOOK, 'url'=>array('admin'),'visible'=>Yii::app()->user->checkAccess('menu.admin')),
);
?>

<h3>
<?php
echo TbHtml::em('Lihat Menu', array('color' => TbHtml::TEXT_COLOR_INFO));
?>
</h3>

<ul class="breadcrumb">
<?php
echo TbHtml::buttonGroup($this->menu);
?>
</ul>

<div class="row-fluid">
    <div class="span10">
        <?php 
        $this->widget('yiiwheels.widgets.detail.WhDetailView',array(
            'htmlOptions' => array(
                'class' => 'table table-striped table-condensed table-hover table-bordered',
            ),
            'data'=>$model,
            'attributes'=>array(
                'nama',
                array(
                    'name'=>'kategori_id',
                    'type'=>'raw',
                    'value'=>  Kategori::model()->findByPk($model->kategori_id)->nama
                ),
                //'gambar',
                'harga',
                'keterangan',
            ),
        )); 
        ?>
    </div>
   <div class="span2">
        <?php 
            if (isset($model->gambar)) {
                echo TbHtml::imagePolaroid(Yii::app()->image->getUrl($model->gambar,'small'));
            }else{
                echo TbHtml::imagePolaroid('holder.js/120x120');
            }
        ?>
    </div>    
</div>