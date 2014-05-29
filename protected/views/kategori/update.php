<?php
/* @var $this KategoriController */
/* @var $model Kategori */
?>

<?php
$this->breadcrumbs=array(
	'Kategori'=>array('index'),
	$model->nama=>array('view','id'=>$model->id),
	'Ubah',
);

$this->menu=array(
	array('label'=>'Kategori', 'icon'=>TbHtml::ICON_LIST, 'url'=>array('index'),'visible'=>Yii::app()->user->checkAccess('kategori.index')),
	array('label'=>'Tambah', 'icon'=>TbHtml::ICON_PLUS, 'url'=>array('create'),'visible'=>Yii::app()->user->checkAccess('kategori.create')),
	array('label'=>'Lihat', 'icon'=>  TbHtml::ICON_EYE_OPEN, 'url'=>array('view', 'id'=>$model->id),'visible'=>Yii::app()->user->checkAccess('kategori.view')),
	array('label'=>'Kelola', 'icon'=> TbHtml::ICON_BOOK, 'url'=>array('admin'),'visible'=>Yii::app()->user->checkAccess('kategori.admin')),
);
?>

<h3>
<?php
echo TbHtml::em('Ubah Kategori', array('color' => TbHtml::TEXT_COLOR_INFO));
?>
</h3>

<ul class="breadcrumb">
<?php
echo TbHtml::buttonGroup($this->menu);
?>
</ul> 

<?php $this->renderPartial('_form', array('model'=>$model)); ?>