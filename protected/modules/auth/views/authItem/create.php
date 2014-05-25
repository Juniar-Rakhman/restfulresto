<?php
/* @var $this OperationController|TaskController|RoleController */
/* @var $model AuthItemForm */
/* @var $form TbActiveForm */

$this->breadcrumbs = array(
	$this->capitalize($this->getTypeText(true)) => array('index'),
	Yii::t('AuthModule.main', 'New {type}', array('{type}' => $this->getTypeText())),
);

$this->menu=array(
    array('label'=>'.','icon'=>  TbHtml::ICON_ARROW_LEFT,'url'=>array('index')),
	array('label'=>Yii::t('AuthModule.main','Assignments'), 'url'=>array('/auth/assignment')),    
);
?>

<h3>
<?php
echo TbHtml::em(Yii::t('AuthModule.main', 'New {type}', array('{type}' => $this->getTypeText())), array('color' => TbHtml::TEXT_COLOR_INFO));
?>
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
<?php echo $form->textFieldControlGroup($model, 'name'); ?>
<?php echo $form->textFieldControlGroup($model, 'description'); ?>
<?php echo $form->textAreaControlGroup($model, 'bizrule'); ?>
<?php echo $form->textAreaControlGroup($model, 'data'); ?>

<div class="form-actions">
	<?php echo TbHtml::submitButton(Yii::t('AuthModule.main', 'Create'),array(
		'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
	)); ?>
	<?php echo TbHtml::linkButton(Yii::t('AuthModule.main', 'Cancel'),array(
		'type'=>TbHtml::BUTTON_TYPE_LINK,
		'url' => array('index'),
	)); ?>
</div>

<?php $this->endWidget(); ?>