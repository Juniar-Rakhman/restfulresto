<?php
/* @var $this MenuController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Menu',
);

$this->menu=array(
	array('label'=>'Tambah', 'url'=>array('create'),'icon'=>TbHtml::ICON_PLUS,'visible'=>Yii::app()->user->checkAccess('menu.create')),    
	array('label'=>'Kelola', 'url'=>array('admin'),'icon'=>TbHtml::ICON_BOOK,'visible'=>Yii::app()->user->checkAccess('menu.admin')),
);
?>

<h3>
<?php
echo TbHtml::em('Daftar Menu', array('color' => TbHtml::TEXT_COLOR_INFO));
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
            'viewButtonLabel' => 'Lihat',
            'template' => '{view}',           
		),
	),
)); ?>