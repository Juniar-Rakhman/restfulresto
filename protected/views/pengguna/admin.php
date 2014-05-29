<?php
/* @var $this PenggunaController */
/* @var $model Pengguna */


$this->breadcrumbs=array(
	'Pengguna'=>array('index'),
	'Kelola',
);

$this->menu=array(
	array('label'=>'Pengguna', 'url'=>array('index'),'icon'=>TbHtml::ICON_LIST,'visible'=>Yii::app()->user->checkAccess('pengguna.index')),
	array('label'=>'Tambah', 'url'=>array('create'),'icon'=>TbHtml::ICON_PLUS,'visible'=>Yii::app()->user->checkAccess('pengguna.create')),
);
?>

<h3>
<?php
echo TbHtml::em('Kelola Pengguna', array('color' => TbHtml::TEXT_COLOR_INFO));
?>
</h3>

<ul class="breadcrumb">
<?php
echo TbHtml::buttonGroup($this->menu);
?>
</ul>

<?php $this->widget('yiiwheels.widgets.grid.WhGridView',array(
	'id'=>'pengguna-grid',
    'fixedHeader' => true,
    'type' => 'striped bordered',    
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'headerOffset' => 40,
	'columns'=>array(
		'username',
		#'password',
		#'saltPassword',
		'email',
		'tgl_daftar',
		array(
            'name'=>'level_id',
            'type'=>'raw',
			'filter'=>$model->getLevelList(),
            'value'=>'Pengguna::getLevelDesc($data->level_id)'
            ),
		array(
            'name'=>'pegawai_id',
            'type'=>'raw',
            'value'=>'$data->pegawai_id > 0 ? Pegawai::model()->findByPk($data->pegawai_id)->nama : null'
            ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'deleteConfirmation' => 'Anda yakin mau menghapus data ini?',
            'viewButtonLabel' => 'Lihat',
            'updateButtonLabel' => 'Ubah',
            'deleteButtonLabel' => 'Hapus',            
		),
	),
)); ?>