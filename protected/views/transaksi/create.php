<?php
/* @var $this TransaksiController */
/* @var $model Transaksi */
?>

<?php
$this->breadcrumbs=array(
	'Transaksi'=>array('index'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'Transaksi', 'url'=>array('index'), 'icon'=>TbHtml::ICON_LIST,'visible'=>Yii::app()->user->checkAccess('transaksi.index')),
	array('label'=>'Kelola', 'url'=>array('admin'), 'icon'=>  TbHtml::ICON_BOOK,'visible'=>Yii::app()->user->checkAccess('transaksi.admin')),
);
?>

<h3>
<?php
echo TbHtml::em('Tambah Transaksi', array('color' => TbHtml::TEXT_COLOR_INFO));
?>
</h3>

<ul class="breadcrumb">
<?php
echo TbHtml::buttonGroup($this->menu);
?>
</ul>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>