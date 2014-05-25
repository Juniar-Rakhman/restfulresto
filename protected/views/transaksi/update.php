<?php
/* @var $this TransaksiController */
/* @var $model Transaksi */
?>

<?php
$this->breadcrumbs=array(
	'Transaksi'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Ubah',
);

$this->menu=array(
	array('label'=>'Transaksi', 'icon'=>TbHtml::ICON_LIST, 'url'=>array('index'),'visible'=>Yii::app()->user->checkAccess('transaksi.index')),
	array('label'=>'Tambah', 'icon'=>TbHtml::ICON_PLUS, 'url'=>array('create'),'visible'=>Yii::app()->user->checkAccess('transaksi.create')),
	array('label'=>'Lihat', 'icon'=>  TbHtml::ICON_EYE_OPEN, 'url'=>array('view', 'id'=>$model->id),'visible'=>Yii::app()->user->checkAccess('transaksi.view')),
	array('label'=>'Kelola', 'icon'=> TbHtml::ICON_BOOK, 'url'=>array('admin'),'visible'=>Yii::app()->user->checkAccess('transaksi.admin')),
);
?>

<h3>
<?php
echo TbHtml::em('Ubah Transaksi', array('color' => TbHtml::TEXT_COLOR_INFO));
?>
</h3>

<ul class="breadcrumb">
<?php
echo TbHtml::buttonGroup($this->menu);
?>
</ul> 

<?php $this->renderPartial('_form', array('model'=>$model)); ?>