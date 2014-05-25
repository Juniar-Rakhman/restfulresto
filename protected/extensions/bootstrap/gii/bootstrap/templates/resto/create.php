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
$label = $this->class2name($this->modelClass);
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Tambah',
);\n";
?>

$this->menu=array(
	array('label'=>'<?php echo $label; ?>', 'url'=>array('index'), 'icon'=>TbHtml::ICON_LIST),
	array('label'=>'Kelola', 'url'=>array('admin'), 'icon'=>  TbHtml::ICON_BOOK),
);
?>

<h3>
<?php echo "<?php\n"; 
echo "echo TbHtml::em('Tambah $label', array('color' => TbHtml::TEXT_COLOR_INFO));\n"; 
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