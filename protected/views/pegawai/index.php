<?php
/* @var $this PegawaiController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Pegawai',
);

$this->menu=array(
	array('label'=>'Tambah', 'url'=>array('create'),'icon'=>TbHtml::ICON_PLUS,'visible'=>Yii::app()->user->checkAccess('pegawai.create')),    
	array('label'=>'Kelola', 'url'=>array('admin'),'icon'=>TbHtml::ICON_BOOK,'visible'=>Yii::app()->user->checkAccess('pegawai.admin')),
);
?>

<h3>
<?php
echo TbHtml::em('Daftar Pegawai', array('color' => TbHtml::TEXT_COLOR_INFO));
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
            'viewButtonLabel' => 'Lihat',
            'template' => '{view}',           
		),
	),
)); ?>