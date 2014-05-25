<?php
/* @var $this PesananController */
/* @var $model Pesanan */


$this->breadcrumbs=array(
	'Pesanan'=>array('index'),
	'Kelola',
);

$this->menu=array(
	array('label'=>'Pesanan', 'url'=>array('index'),'icon'=>TbHtml::ICON_LIST,'visible'=>Yii::app()->user->checkAccess('pesanan.index')),
	array('label'=>'Tambah', 'url'=>array('create'),'icon'=>TbHtml::ICON_PLUS,'visible'=>Yii::app()->user->checkAccess('pesanan.create')),
);
?>

<h3>
<?php
echo TbHtml::em('Kelola Pesanan', array('color' => TbHtml::TEXT_COLOR_INFO));
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
            'deleteConfirmation' => 'Anda yakin mau menghapus data ini?',
            'viewButtonLabel' => 'Lihat',
            'updateButtonLabel' => 'Ubah',
            'deleteButtonLabel' => 'Hapus',
			'template' => Yii::app()->user->isAdmin ? '{view}{update}{delete}' : '{view}{update}'
		),
	),
)); ?>