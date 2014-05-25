<?php
/* @var $this PegawaiController */
/* @var $model Pegawai */


$this->breadcrumbs=array(
	'Pegawai'=>array('index'),
	'Kelola',
);

$this->menu=array(
	array('label'=>'Pegawai', 'url'=>array('index'),'icon'=>TbHtml::ICON_LIST,'visible'=>Yii::app()->user->checkAccess('pegawai.index')),
	array('label'=>'Tambah', 'url'=>array('create'),'icon'=>TbHtml::ICON_PLUS,'visible'=>Yii::app()->user->checkAccess('pegawai.create')),
);
?>

<h3>
<?php
echo TbHtml::em('Kelola Pegawai', array('color' => TbHtml::TEXT_COLOR_INFO));
?>
</h3>

<ul class="breadcrumb">
<?php
echo TbHtml::buttonGroup($this->menu);
?>
</ul>

<?php $this->widget('yiiwheels.widgets.grid.WhGridView',array(
	'id'=>'pegawai-grid',
    'fixedHeader' => true,
    'type' => 'striped bordered',    
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'headerOffset' => 40,
	'columns'=>array(
		'nomor_induk',
		'tgl_masuk',
		'tgl_keluar',
		'nama',
		'alamat',
		/*
		'telepon',
		'aktif',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'deleteConfirmation' => 'Anda yakin mau menghapus data ini?',
            'viewButtonLabel' => 'Lihat',
            'updateButtonLabel' => 'Ubah',
            'deleteButtonLabel' => 'Hapus',            
		),
	),
)); ?>