<?php
/**
 * The following variables are available in this template:
 * - $this: the BootstrapCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $dataProvider CActiveDataProvider */
<?php echo "?>\n"; ?>

<?php
echo "<?php\n";
$label = $this->class2name($this->modelClass);
echo "\$this->breadcrumbs=array(
	'$label',
);\n";
?>

$this->menu=array(
	array('label'=>'Tambah', 'url'=>array('create'),'icon'=>TbHtml::ICON_PLUS),    
	array('label'=>'Kelola', 'url'=>array('admin'),'icon'=>TbHtml::ICON_BOOK),
);
?>

<h3>
<?php echo "<?php\n"; 
echo "echo TbHtml::em('Daftar $label', array('color' => TbHtml::TEXT_COLOR_INFO));\n"; 
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

<?php echo "<?php"; ?> $this->widget('yiiwheels.widgets.grid.WhGridView',array(
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
    'fixedHeader' => true,
    'type' => 'striped bordered',    
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'headerOffset' => 40,
	'columns'=>array(
<?php
$count = 0;
foreach ($this->tableSchema->columns as $column) {
    if (++$count == 7) {
		echo "\t\t/*\n";
	}
    if($column->name!='id') {
        echo "\t\t'" . $column->name . "',\n";
    }
}
if ($count >= 7) {
	echo "\t\t*/\n";
}
?>
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'viewButtonLabel' => 'Lihat',
            'template' => '{view}',           
		),
	),
)); ?>