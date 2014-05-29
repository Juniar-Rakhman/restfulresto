<?php
/* @var $this KategoriController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Kategori',
);

$this->menu=array(
	array('label'=>'Tambah', 'url'=>array('create'),'icon'=>TbHtml::ICON_PLUS,'visible'=>Yii::app()->user->checkAccess('kategori.create')),    
	array('label'=>'Kelola', 'url'=>array('admin'),'icon'=>TbHtml::ICON_BOOK,'visible'=>Yii::app()->user->checkAccess('kategori.admin')),
);
?>

<h3>
<?php
echo TbHtml::em('Daftar Kategori', array('color' => TbHtml::TEXT_COLOR_INFO));
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
            'viewButtonLabel' => 'Lihat',
            'template' => '{view}',           
		),
	),
)); ?>