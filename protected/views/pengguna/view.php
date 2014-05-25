<?php
/* @var $this PenggunaController */
/* @var $model Pengguna */
?>

<?php
$this->breadcrumbs=array(
	'Pengguna'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Pengguna', 'icon'=>TbHtml::ICON_LIST, 'url'=>array('index'),'visible'=>Yii::app()->user->checkAccess('pengguna.index')),
	array('label'=>'Tambah', 'icon'=>TbHtml::ICON_PLUS, 'url'=>array('create'),'visible'=>Yii::app()->user->checkAccess('pengguna.create')),
	array('label'=>'Ubah', 'icon'=>  TbHtml::ICON_PENCIL, 'url'=>array('update', 'id'=>$model->id),'visible'=>Yii::app()->user->checkAccess('pengguna.update')),
	array('label'=>'Kelola', 'icon'=> TbHtml::ICON_BOOK, 'url'=>array('admin'),'visible'=>Yii::app()->user->checkAccess('pengguna.admin')),
);
?>

<h3>
<?php
echo TbHtml::em('Lihat Pengguna', array('color' => TbHtml::TEXT_COLOR_INFO));
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
		'username',
		'email',
		array(
            'name'=>'tgl_daftar',
            'value'=>date('d F Y',  strtotime($model->tgl_daftar))
        ),
		array(
            'name'=>'level_id',
            'value'=>$model->getLevelDesc($model->level_id)
        ),
		array(
            'name'=>'pegawai_id',
            'value'=>  Pegawai::model()->findByPk($model->pegawai_id)->nama,
        ),
	),
)); ?>