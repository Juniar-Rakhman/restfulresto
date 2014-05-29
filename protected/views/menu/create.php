<?php
/* @var $this MenuController */
/* @var $model Menu */
?>

<?php
$this->breadcrumbs=array(
	'Menu'=>array('index'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'Menu', 'url'=>array('index'), 'icon'=>TbHtml::ICON_LIST,'visible'=>Yii::app()->user->checkAccess('menu.index')),
	array('label'=>'Kelola', 'url'=>array('admin'), 'icon'=>  TbHtml::ICON_BOOK,'visible'=>Yii::app()->user->checkAccess('menu.admin')),
);
?>

<h3>
<?php
echo TbHtml::em('Tambah Menu', array('color' => TbHtml::TEXT_COLOR_INFO));
?>
</h3>

<ul class="breadcrumb">
<?php
echo TbHtml::buttonGroup($this->menu);
?>
</ul>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>