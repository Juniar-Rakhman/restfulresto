<?php
/* @var $this PegawaiController */
/* @var $model Pegawai */
?>

<?php
$this->breadcrumbs=array(
	'Pegawai'=>array('index'),
	$model->nama=>array('view','id'=>$model->id),
	'Ubah',
);

$this->menu=array(
	array('label'=>'Pegawai', 'icon'=>TbHtml::ICON_LIST, 'url'=>array('index'),'visible'=>Yii::app()->user->checkAccess('pegawai.index')),
	array('label'=>'Tambah', 'icon'=>TbHtml::ICON_PLUS, 'url'=>array('create'),'visible'=>Yii::app()->user->checkAccess('pegawai.create')),
	array('label'=>'Lihat', 'icon'=>  TbHtml::ICON_EYE_OPEN, 'url'=>array('view', 'id'=>$model->id),'visible'=>Yii::app()->user->checkAccess('pegawai.view')),
	array('label'=>'Kelola', 'icon'=> TbHtml::ICON_BOOK, 'url'=>array('admin'),'visible'=>Yii::app()->user->checkAccess('pegawai.admin')),
);
?>

<h3>
<?php
echo TbHtml::em('Ubah Pegawai', array('color' => TbHtml::TEXT_COLOR_INFO));
?>
</h3>

<ul class="breadcrumb">
<?php
echo TbHtml::buttonGroup($this->menu);
?>
</ul> 

<?php $this->renderPartial('_form', array('model'=>$model)); ?>