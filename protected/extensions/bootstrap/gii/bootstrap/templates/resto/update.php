<?php
/**
 * The following variables are available in this template:
 * - $this: the BootstrapCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
<?php echo "?>\n"; ?>

<?php
echo "<?php\n";
$nameColumn = $this->guessNameColumn($this->tableSchema->columns);
$label = $this->class2name($this->modelClass);
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	'Ubah',
);\n";
?>

$this->menu=array(
	array('label'=>'<?php echo $label; ?>', 'icon'=>TbHtml::ICON_LIST, 'url'=>array('index')),
	array('label'=>'Tambah', 'icon'=>TbHtml::ICON_PLUS, 'url'=>array('create')),
	array('label'=>'Lihat', 'icon'=>  TbHtml::ICON_EYE_OPEN, 'url'=>array('view', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	array('label'=>'Kelola', 'icon'=> TbHtml::ICON_BOOK, 'url'=>array('admin')),
);
?>

<h3>
<?php
echo "<?php\n";
echo "echo TbHtml::em('Ubah $label', array('color' => TbHtml::TEXT_COLOR_INFO));\n"; 
echo "?>\n";
?>
</h3>

<ul class="breadcrumb">
<?php
echo "<?php\n";
echo "echo TbHtml::buttonGroup(\$this->menu);\n";
echo "?>\n";
?>
</ul> 

<?php echo "<?php \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>