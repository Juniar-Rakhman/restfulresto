<?php
/* @var $this PenggunaController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Pengguna',
);

$this->menu=array(
	array('label'=>'Tambah', 'url'=>array('create'),'icon'=>TbHtml::ICON_PLUS,'visible'=>Yii::app()->user->checkAccess('pengguna.create')),    
	array('label'=>'Kelola', 'url'=>array('admin'),'icon'=>TbHtml::ICON_BOOK,'visible'=>Yii::app()->user->checkAccess('pengguna.admin')),
);
?>

<h3>
<?php
echo TbHtml::em('Daftar Pengguna', array('color' => TbHtml::TEXT_COLOR_INFO));
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
            'viewButtonLabel' => 'Lihat',
            'template' => '{view}',           
		),
	),
)); ?>