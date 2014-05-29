<?php
/* @var $this OperationController|TaskController|RoleController */
/* @var $model AuthItemForm */
/* @var $item CAuthItem */
/* @var $form TbActiveForm */

$this->breadcrumbs = array(
	$this->capitalize($this->getTypeText(true)) => array('index'),
	$item->description => array('view', 'name' => $item->name),
	Yii::t('AuthModule.main', 'Edit'),
);

$this->menu=array(
    array('label'=>'.','icon'=>  TbHtml::ICON_ARROW_LEFT,'url'=>array('index')),
	array('label'=>Yii::t('AuthModule.main','Assignments'), 'url'=>array('/auth/assignment')),    
);

?>

<h3>
    <p class="text-info">
	<?php echo CHtml::encode($item->description); ?>
	<small><?php echo $this->getTypeText(); ?></small>
    </p>
</h3>

<ul class="breadcrumb">
<?php
echo TbHtml::buttonGroup($this->menu);
?>
</ul>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<?php echo $form->hiddenField($model, 'type'); ?>
<?php echo $form->textFieldControlGroup($model, 'name', array(
	'disabled'=>true,
	'title'=>Yii::t('AuthModule.main', 'System name cannot be changed after creation.'),
)); ?>
<?php echo $form->textFieldControlGroup($model, 'description'); ?>
<?php echo $form->textAreaControlGroup($model, 'bizrule'); ?>
<?php echo $form->textAreaControlGroup($model, 'data'); ?>

<div class="form-actions">
	<?php echo TbHtml::submitButton(Yii::t('AuthModule.main', 'Save'),array(
		'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
	)); ?>
	<?php echo TbHtml::linkButton(Yii::t('AuthModule.main', 'Cancel'),array(
		'color'=>TbHtml::BUTTON_COLOR_LINK,
		'url' => array('view', 'name' => $item->name),
	)); ?>
</div>

<?php $this->endWidget(); ?>