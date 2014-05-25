<?php
/* @var $this PegawaiController */
/* @var $model Pegawai */
?>

<?php
$this->breadcrumbs=array(
	'Pegawai'=>array('index'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'Pegawai', 'url'=>array('index'), 'icon'=>TbHtml::ICON_LIST,'visible'=>Yii::app()->user->checkAccess('pegawai.index')),
	array('label'=>'Kelola', 'url'=>array('admin'), 'icon'=>  TbHtml::ICON_BOOK,'visible'=>Yii::app()->user->checkAccess('pegawai.admin')),
);
?>

<h3>
<?php
echo TbHtml::em('Tambah Pegawai', array('color' => TbHtml::TEXT_COLOR_INFO));
?>
</h3>

<ul class="breadcrumb">
<?php
echo TbHtml::buttonGroup($this->menu);
?>
</ul>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>