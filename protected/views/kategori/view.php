<?php
/* @var $this KategoriController */
/* @var $model Kategori */
?>

<?php
$this->breadcrumbs=array(
	'Kategori'=>array('index'),
	$model->nama,
);

$this->menu=array(
	array('label'=>'Kategori', 'icon'=>TbHtml::ICON_LIST, 'url'=>array('index'),'visible'=>Yii::app()->user->checkAccess('kategori.index')),
	array('label'=>'Tambah', 'icon'=>TbHtml::ICON_PLUS, 'url'=>array('create'),'visible'=>Yii::app()->user->checkAccess('kategori.create')),
	array('label'=>'Ubah', 'icon'=>  TbHtml::ICON_PENCIL, 'url'=>array('update', 'id'=>$model->id),'visible'=>Yii::app()->user->checkAccess('kategori.update')),
	array('label'=>'Kelola', 'icon'=> TbHtml::ICON_BOOK, 'url'=>array('admin'),'visible'=>Yii::app()->user->checkAccess('kategori.admin')),
);
?>

<h3>
<?php
echo TbHtml::em('Lihat Kategori', array('color' => TbHtml::TEXT_COLOR_INFO));
?>
</h3>

<ul class="breadcrumb">
<?php
echo TbHtml::buttonGroup($this->menu);
?>
</ul>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover table-bordered',
    ),
    'data'=>$model,
    'attributes'=>array(
		'nama',
		'keterangan',
	),
)); ?>