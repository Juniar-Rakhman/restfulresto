<?php
/* @var $this PegawaiController */
/* @var $model Pegawai */
?>

<?php
$this->breadcrumbs=array(
	'Pegawai'=>array('index'),
	$model->nama,
);

$this->menu=array(
	array('label'=>'Pegawai', 'icon'=>TbHtml::ICON_LIST, 'url'=>array('index'),'visible'=>Yii::app()->user->checkAccess('pegawai.index')),
	array('label'=>'Tambah', 'icon'=>TbHtml::ICON_PLUS, 'url'=>array('create'),'visible'=>Yii::app()->user->checkAccess('pegawai.create')),
	array('label'=>'Ubah', 'icon'=>  TbHtml::ICON_PENCIL, 'url'=>array('update', 'id'=>$model->id),'visible'=>Yii::app()->user->checkAccess('pegawai.update')),
	array('label'=>'Kelola', 'icon'=> TbHtml::ICON_BOOK, 'url'=>array('admin'),'visible'=>Yii::app()->user->checkAccess('pegawai.admin')),
);
?>

<h3>
<?php
echo TbHtml::em('Lihat Pegawai', array('color' => TbHtml::TEXT_COLOR_INFO));
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
		'nomor_induk',
		'tgl_masuk',
		'tgl_keluar',
		'nama',
		'alamat',
		'telepon',
		'aktif',
	),
)); ?>