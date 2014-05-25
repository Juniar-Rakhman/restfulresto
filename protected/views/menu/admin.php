<?php
/* @var $this MenuController */
/* @var $model Menu */


$this->breadcrumbs=array(
	'Menu'=>array('index'),
	'Kelola',
);

$this->menu=array(
	array('label'=>'Menu', 'url'=>array('index'),'icon'=>TbHtml::ICON_LIST,'visible'=>Yii::app()->user->checkAccess('menu.index')),
	array('label'=>'Tambah', 'url'=>array('create'),'icon'=>TbHtml::ICON_PLUS,'visible'=>Yii::app()->user->checkAccess('menu.create')),
);
?>

<h3>
<?php
echo TbHtml::em('Kelola Menu', array('color' => TbHtml::TEXT_COLOR_INFO));
?>
</h3>

<ul class="breadcrumb">
<?php
echo TbHtml::buttonGroup($this->menu);
?>
</ul>

<?php $this->widget('yiiwheels.widgets.grid.WhGridView',array(
	'id'=>'menu-grid',
    'fixedHeader' => true,
    'type' => 'striped bordered',    
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'headerOffset' => 40,
	'columns'=>array(
        array(
            'class' => 'yiiwheels.widgets.grid.WhImageColumn',
            'imagePathExpression' => 'isset($data->gambar) ? Yii::app()->image->getUrl($data->gambar,\'tiny\') : null',
            'htmlOptions' => array('class' => 'span1'),
        ),
        'nama',
		array(
			'name'=>'kategori_id',
			'value'=>'$data->kategori->nama',
			'filter'=>CHtml::listData(Kategori::model()->findAll(),'id','nama'),
			),
		'harga',
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