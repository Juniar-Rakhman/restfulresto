<?php
/* @var $this KategoriController */
/* @var $model Kategori */


$this->breadcrumbs=array(
	'Kategori'=>array('index'),
	'Kelola',
);

$this->menu=array(
	array('label'=>'Kategori', 'url'=>array('index'),'icon'=>TbHtml::ICON_LIST,'visible'=>Yii::app()->user->checkAccess('kategori.index')),
	array('label'=>'Tambah', 'url'=>array('create'),'icon'=>TbHtml::ICON_PLUS,'visible'=>Yii::app()->user->checkAccess('kategori.create')),
);
?>

<h3>
<?php
echo TbHtml::em('Kelola Kategori', array('color' => TbHtml::TEXT_COLOR_INFO));
?>
</h3>

<ul class="breadcrumb">
<?php
echo TbHtml::buttonGroup($this->menu);
?>
</ul>

<?php $this->widget('yiiwheels.widgets.grid.WhGridView',array(
	'id'=>'kategori-grid',
    'fixedHeader' => true,
    'type' => 'striped bordered',    
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'headerOffset' => 40,
	'columns'=>array(
		'nama',
		'keterangan',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'deleteConfirmation' => 'Anda yakin mau menghapus data ini?',
            'viewButtonLabel' => 'Lihat',
            'updateButtonLabel' => 'Ubah',
            'deleteButtonLabel' => 'Hapus',            
		),
	),
)); ?>