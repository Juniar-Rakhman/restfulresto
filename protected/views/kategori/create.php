<?php
/* @var $this KategoriController */
/* @var $model Kategori */
?>

<?php
$this->breadcrumbs=array(
	'Kategori'=>array('index'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'Kategori', 'url'=>array('index'), 'icon'=>TbHtml::ICON_LIST,'visible'=>Yii::app()->user->checkAccess('kategori.index')),
	array('label'=>'Kelola', 'url'=>array('admin'), 'icon'=>  TbHtml::ICON_BOOK,'visible'=>Yii::app()->user->checkAccess('kategori.admin')),
);
?>

<h3>
<?php
echo TbHtml::em('Tambah Kategori', array('color' => TbHtml::TEXT_COLOR_INFO));
?>
</h3>

<ul class="breadcrumb">
<?php
echo TbHtml::buttonGroup($this->menu);
?>
</ul>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>