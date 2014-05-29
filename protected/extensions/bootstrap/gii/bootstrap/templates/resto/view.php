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
	\$model->{$nameColumn},
);\n";
?>

$this->menu=array(
	array('label'=>'<?php echo $label; ?>', 'icon'=>TbHtml::ICON_LIST, 'url'=>array('index')),
	array('label'=>'Tambah', 'icon'=>TbHtml::ICON_PLUS, 'url'=>array('create')),
	array('label'=>'Ubah', 'icon'=>  TbHtml::ICON_PENCIL, 'url'=>array('update', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	array('label'=>'Kelola', 'icon'=> TbHtml::ICON_BOOK, 'url'=>array('admin')),
);
?>

<h3>
<?php
echo "<?php\n"; 
echo "echo TbHtml::em('Lihat $label', array('color' => TbHtml::TEXT_COLOR_INFO));\n"; 
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

<?php echo "<?php"; ?> $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover table-bordered',
    ),
    'data'=>$model,
    'attributes'=>array(
<?php
foreach ($this->tableSchema->columns as $column) {
    if($column->name!='id') {
        echo "\t\t'" . $column->name . "',\n";
    }
}
?>
	),
)); ?>