<?php
/* @var $this PesananController */
/* @var $model Pesanan */
?>

<?php
$this->breadcrumbs=array(
	'Pesanan'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Pesanan', 'icon'=>TbHtml::ICON_LIST, 'url'=>array('index'),'visible'=>Yii::app()->user->checkAccess('pesanan.index')),
	array('label'=>'Tambah', 'icon'=>TbHtml::ICON_PLUS, 'url'=>array('create'),'visible'=>Yii::app()->user->checkAccess('pesanan.create')),
	array('label'=>'Ubah', 'icon'=>  TbHtml::ICON_PENCIL, 'url'=>array('update', 'id'=>$model->id),'visible'=>Yii::app()->user->checkAccess('pesanan.update')),
	array('label'=>'Kelola', 'icon'=> TbHtml::ICON_BOOK, 'url'=>array('admin'),'visible'=>Yii::app()->user->checkAccess('pesanan.admin')),
);
?>

<h3>
<?php
echo TbHtml::em('Lihat Pesanan', array('color' => TbHtml::TEXT_COLOR_INFO));
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
		'nomor_meja',
        array(
            'name'=>'tanggal',
            'type'=>'raw',
            'value'=> date('d F Y', strtotime($model->tanggal))
        ),
		'nama_pelanggan',
        array(
            'name'=>'pegawai_id',
            'type'=>'raw',
            'value'=> Pegawai::model()->findByPk($model->pegawai_id)->nama
        ),        
		'total_harga',
        array(
            'name'=>'lunas',
            'type'=>'raw',
            'value'=>$model->lunas=='Y' ? 'Ya' : 'Tidak',
        ),
	),
)); ?>

<?php

$criteria=new CDbCriteria;
$criteria->compare('pesanan_id',$model->id);

$pesananDetail = new CActiveDataProvider(PesananDetail::model(), array(
    'criteria'=>$criteria,
));
        
$this->widget('yiiwheels.widgets.grid.WhGridView',array(
	'id'=>'pesanan-detail-grid',
    'fixedHeader' => true,
    'type' => 'striped bordered',    
	'dataProvider'=> $pesananDetail,
    'headerOffset' => 40,
	'columns'=>array(
        array(
            'class' => 'yiiwheels.widgets.grid.WhImageColumn',
            'imagePathExpression' => 'isset($data->menu->gambar) ? Yii::app()->image->getUrl($data->menu->gambar,\'tiny\') : null',
            'htmlOptions' => array('class' => 'span1'),
        ),        
		array(
            'name'=>'menu_id',
            'type'=>'raw',
            'value'=>'$data->batal==\'Y\' ? \'<s>\'.$data->menu->nama.\'</s>\' : $data->menu->nama',
        ),
		array(
            'name'=>'harga',
            'type'=>'raw',
            'value'=>'$data->batal==\'Y\' ? \'<s>\'.$data->harga.\'</s>\' : $data->harga'
        ),
		'jumlah',
        array(
            'name'=>'status',
            'type'=>'raw',
            'value'=>'$data->batal==\'Y\' ? \'<s>\'.PesananDetail::getStatusDesc($data->status).\'</s>\' : PesananDetail::getStatusDesc($data->status)',
        ),
		array(
            'name'=>'catatan',
            'type'=>'raw',
            'value'=>'$data->batal==\'Y\' ? \'<s>\'.$data->catatan.\'</s>\' : $data->catatan'
        ),
        array(
            'name'=>'batal',
            'type'=>'raw',
            'value'=>'$data->batal==\'Y\' ? \'Ya\' : \'Tidak\'')
	),
)); ?>