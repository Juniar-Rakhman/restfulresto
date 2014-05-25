<?php
/* @var $this PenggunaController */
/* @var $model Pengguna */
?>

<?php
$this->breadcrumbs=array(
	'Pengguna'=>array('index'),
	$model->username=>array('view','id'=>$model->id),
	'Ubah',
);

$this->menu=array(
	array('label'=>'Pengguna', 'icon'=>TbHtml::ICON_LIST, 'url'=>array('index'),'visible'=>Yii::app()->user->checkAccess('pengguna.index')),
	array('label'=>'Tambah', 'icon'=>TbHtml::ICON_PLUS, 'url'=>array('create'),'visible'=>Yii::app()->user->checkAccess('pengguna.create')),
	array('label'=>'Lihat', 'icon'=>  TbHtml::ICON_EYE_OPEN, 'url'=>array('view', 'id'=>$model->id),'visible'=>Yii::app()->user->checkAccess('pengguna.view')),
	array('label'=>'Kelola', 'icon'=> TbHtml::ICON_BOOK, 'url'=>array('admin'),'visible'=>Yii::app()->user->checkAccess('pengguna.admin')),
    array('label'=>'Reset Password', 'icon'=>  TbHtml::ICON_REFRESH, 'url'=>array('resetPasswd', 'id'=>$model->id),'visible'=>Yii::app()->user->isAdmin),
);
?>

<h3>
<?php
echo TbHtml::em('Ubah Pengguna', array('color' => TbHtml::TEXT_COLOR_INFO));
?>
</h3>

<ul class="breadcrumb">
<?php
echo TbHtml::buttonGroup($this->menu);
?>
</ul> 

<?php $this->renderPartial('_form', array('model'=>$model)); ?>