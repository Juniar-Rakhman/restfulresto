<?php
/* @var $this TransaksiController */
/* @var $model Transaksi */
?>

<?php
$this->breadcrumbs=array(
	'Transaksi'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Transaksi', 'icon'=>TbHtml::ICON_LIST, 'url'=>array('index'),'visible'=>Yii::app()->user->checkAccess('transaksi.index')),
	array('label'=>'Tambah', 'icon'=>TbHtml::ICON_PLUS, 'url'=>array('create'),'visible'=>Yii::app()->user->checkAccess('transaksi.create')),
	array('label'=>'Ubah', 'icon'=>  TbHtml::ICON_PENCIL, 'url'=>array('update', 'id'=>$model->id),'visible'=>Yii::app()->user->checkAccess('transaksi.update')),
	array('label'=>'Kelola', 'icon'=> TbHtml::ICON_BOOK, 'url'=>array('admin'),'visible'=>Yii::app()->user->checkAccess('transaksi.admin')),
);
?>

<h3>
<?php
echo TbHtml::em('Lihat Transaksi', array('color' => TbHtml::TEXT_COLOR_INFO));
?>
</h3>

<ul class="breadcrumb">
<?php
echo TbHtml::buttonGroup($this->menu);
?>
</ul>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover table-bordered',
    ),
    'data'=>$model,
    'attributes'=>array(
		array(
            'name'=>'tanggal',
            'value'=>date('d F Y',  strtotime($model->tanggal))
        ),
		'jam',
		array(
            'name'=>'pesanan_id',
            'type'=>'raw',
            'value'=> CHtml::link($model->pesanan->nama_pelanggan, array('/pesanan/'.$model->pesanan_id))
        ),
		'harga_pesanan',
		array(
            'name'=>'pajak',
            'value'=>$model->pajak . '%'
        ),
		'harga_total',
		array(
            'name'=>'pegawai_id',
            'value'=>$model->pegawai->nama
        ),
	),
)); ?>

<?php if($model->pesanan->lunas != 'Y') { ?>
<ul class="breadcrumb">
<?php
echo TbHtml::buttonGroup(array(array('label'=>'Bayar', 'icon'=>TbHtml::ICON_SHOPPING_CART, 
    'url'=>array('lunas','id'=>$model->id))),array('color'=>  TbHtml::BUTTON_COLOR_PRIMARY));
?>
</ul>
<?php } ?>