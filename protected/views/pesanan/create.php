<?php
/* @var $this PesananController */
/* @var $model Pesanan */
?>

<?php
$this->breadcrumbs=array(
	'Pesanan'=>array('index'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'Pesanan', 'url'=>array('index'), 'icon'=>TbHtml::ICON_LIST,'visible'=>Yii::app()->user->checkAccess('pesanan.index')),
	array('label'=>'Kelola', 'url'=>array('admin'), 'icon'=>  TbHtml::ICON_BOOK,'visible'=>Yii::app()->user->checkAccess('pesanan.admin')),
);
?>

<h3>
<?php
echo TbHtml::em('Tambah Pesanan', array('color' => TbHtml::TEXT_COLOR_INFO));
?>
</h3>

<ul class="breadcrumb">
<?php
echo TbHtml::buttonGroup($this->menu);
?>
</ul>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>