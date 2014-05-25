<?php
/* @var $this PesananController */
/* @var $model Pesanan */
?>

<?php
$this->breadcrumbs=array(
	'Pesanan'=>array('index'),
	$model->nama_pelanggan=>array('view','id'=>$model->id),
	'Ubah',
);

$this->menu=array(
	array('label'=>'Pesanan', 'icon'=>TbHtml::ICON_LIST, 'url'=>array('index'),'visible'=>Yii::app()->user->checkAccess('pesanan.index')),
	array('label'=>'Tambah', 'icon'=>TbHtml::ICON_PLUS, 'url'=>array('create'),'visible'=>Yii::app()->user->checkAccess('pesanan.create')),
	array('label'=>'Lihat', 'icon'=>  TbHtml::ICON_EYE_OPEN, 'url'=>array('view', 'id'=>$model->id),'visible'=>Yii::app()->user->checkAccess('pesanan.view')),
	array('label'=>'Kelola', 'icon'=> TbHtml::ICON_BOOK, 'url'=>array('admin'),'visible'=>Yii::app()->user->checkAccess('pesanan.admin')),
);
?>

<h3>
<?php
echo TbHtml::em('Ubah Pesanan', array('color' => TbHtml::TEXT_COLOR_INFO));
?>
</h3>

<ul class="breadcrumb">
<?php
echo TbHtml::buttonGroup($this->menu);
?>
</ul> 

<?php $this->renderPartial('_form', array('model'=>$model,
                                           'pesananDetail'=>$pesananDetail,
										   'validatedMembers'=>$validatedMembers)); ?>