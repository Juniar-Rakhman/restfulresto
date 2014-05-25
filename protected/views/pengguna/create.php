<?php
/* @var $this PenggunaController */
/* @var $model Pengguna */
?>

<?php
$this->breadcrumbs=array(
	'Pengguna'=>array('index'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'Pengguna', 'url'=>array('index'), 'icon'=>TbHtml::ICON_LIST,'visible'=>Yii::app()->user->checkAccess('pengguna.index')),
	array('label'=>'Kelola', 'url'=>array('admin'), 'icon'=>  TbHtml::ICON_BOOK,'visible'=>Yii::app()->user->checkAccess('pengguna.admin')),
);
?>

<h3>
<?php
echo TbHtml::em('Tambah Pengguna', array('color' => TbHtml::TEXT_COLOR_INFO));
?>
</h3>

<ul class="breadcrumb">
<?php
echo TbHtml::buttonGroup($this->menu);
?>
</ul>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>