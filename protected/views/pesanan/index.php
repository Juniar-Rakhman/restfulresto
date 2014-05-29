<?php
/* @var $this PesananController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Pesanan',
);

$this->menu=array(
	array('label'=>'Tambah', 'url'=>array('create'),'icon'=>TbHtml::ICON_PLUS,'visible'=>Yii::app()->user->checkAccess('pesanan.create')),    
	array('label'=>'Kelola', 'url'=>array('admin'),'icon'=>TbHtml::ICON_BOOK,'visible'=>Yii::app()->user->checkAccess('pesanan.admin')),
);
?>

<h3>
<?php
echo TbHtml::em('Daftar Pesanan', array('color' => TbHtml::TEXT_COLOR_INFO));
?>
</h3>

<ul class="breadcrumb">
<?php
echo TbHtml::buttonGroup($this->menu);
?>
</ul>

<?php $this->widget('yiiwheels.widgets.grid.WhGridView',array(
	'id'=>'pesanan-grid',
    'fixedHeader' => true,
    'type' => 'striped bordered',    
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'headerOffset' => 40,
	'columns'=>array(
		'nomor_meja',
        array(
			'name'=>'tanggal',
			'value'=>'date(\'d F Y\',strtotime($data->tanggal))',
            'type'=>'raw',
        ),
		'nama_pelanggan',
		array(
            'name' => 'pegawai_id',
            'type' => 'raw',
            'value' => '$data->pegawai->nama',
        ),
		'total_harga',
		array(
            'name' => 'lunas',
            'type' => 'raw',
            'value' => '$data->lunas==\'Y\' ? \'Ya\' : \'Tidak\'',
        ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'viewButtonLabel' => 'Lihat',
            'template' => '{view}',           
		),
	),
)); ?>