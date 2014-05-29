<?php
/* @var $this TransaksiController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Transaksi',
);

$this->menu=array(
	array('label'=>'Tambah', 'url'=>array('create'),'icon'=>TbHtml::ICON_PLUS,'visible'=>Yii::app()->user->checkAccess('transaksi.create')),    
	array('label'=>'Kelola', 'url'=>array('admin'),'icon'=>TbHtml::ICON_BOOK,'visible'=>Yii::app()->user->checkAccess('transaksi.admin')),
);
?>

<h3>
<?php
echo TbHtml::em('Daftar Transaksi', array('color' => TbHtml::TEXT_COLOR_INFO));
?>
</h3>

<ul class="breadcrumb">
<?php
echo TbHtml::buttonGroup($this->menu);
?>
</ul>

<?php $this->widget('yiiwheels.widgets.grid.WhGridView',array(
	'id'=>'transaksi-grid',
    'fixedHeader' => true,
    'type' => 'striped bordered',    
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'headerOffset' => 40,
	'columns'=>array(
		'tanggal',
		'jam',
        array(
            'name'=>'pesanan_id',
            'type'=>'raw',
            'value'=>'$data->pesanan->nama_pelanggan'
        ),
		'harga_pesanan',
		array(
            'name'=>'pajak',
            'type'=>'raw',
            'value'=>'$data->pajak . \'%\''
        ),
		'harga_total',
        array(
            'name'=>'pegawai_id',
            'type'=>'raw',
            'value'=>'$data->pegawai->nama'
        ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'viewButtonLabel' => 'Lihat',
            'template' => '{view}',           
		),
	),    
)); ?>