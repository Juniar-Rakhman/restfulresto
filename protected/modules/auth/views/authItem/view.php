<?php
/* @var $this OperationController|TaskController|RoleController */
/* @var $item CAuthItem */
/* @var $ancestorDp AuthItemDataProvider */
/* @var $descendantDp AuthItemDataProvider */
/* @var $formModel AddAuthItemForm */
/* @var $form TbActiveForm */
/* @var $childOptions array */

$this->breadcrumbs = array(
	$this->capitalize($this->getTypeText(true)) => array('index'),
	$item->description,
);

$this->menu=array(
    array('label'=>'.','icon'=>  TbHtml::ICON_ARROW_LEFT,'url'=>array('index')),
	array('label'=>Yii::t('AuthModule.main','Assignments'), 'url'=>array('/auth/assignment')),    
);

?>

<div class="title-row clearfix">

	<h3 class="pull-left">
        <p class="text-info">
		<?php echo CHtml::encode($item->description); ?>
		<small><?php echo $this->getTypeText(); ?></small>
        </p>
	</h3>

	<?php echo TbHtml::buttonGroup(array(
		array(
			'label'=>Yii::t('AuthModule.main', 'Edit'),
			'url'=>array('update', 'name'=>$item->name),
		),
		array(
            'label'=>  Yii::t('AuthModule.main','Delete'),
			#'icon'=>'trash',
			'url'=>array('delete', 'name'=>$item->name),
			'htmlOptions'=>array(
				'confirm'=>Yii::t('AuthModule.main', 'Are you sure you want to delete this item?'),
			),
		),
	),array('class'=>'pull-right', 'color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>

</div>

<ul class="breadcrumb">
<?php
echo TbHtml::buttonGroup($this->menu);
?>
</ul>

<?php //$this->widget('bootstrap.widgets.TbDetailView', array(
$this->widget('zii.widgets.CDetailView', array(
    'data' => $item,
    'attributes' => array(
        array(
            'name' => 'name',
			'label' => Yii::t('AuthModule.main', 'System name'),
		),
		array(
			'name' => 'description',
			'label' => Yii::t('AuthModule.main', 'Description'),
		),
        array(
			'name' => 'bizrule',
			'label' => Yii::t('AuthModule.main', 'Business rule'),
		),
		array(
			'name' => 'data',
			'label' => Yii::t('AuthModule.main', 'Data'),
		),
    ),
)); ?>

<hr />

<div class="row">

	<div class="span6">

		<h3>
			<?php echo Yii::t('AuthModule.main', 'Ancestors'); ?>
			<small><?php echo Yii::t('AuthModule.main', 'Permissions that inherit this item'); ?></small>
		</h3>

		<?php $this->widget('bootstrap.widgets.TbGridView', array(
			'type' => 'striped condensed hover',
			'dataProvider'=>$ancestorDp,
			'emptyText'=>Yii::t('AuthModule.main', 'This item does not have any ancestors.'),
			'template'=>"{items}",
			'hideHeader'=>true,
			'columns'=>array(
				array(
					'class'=>'AuthItemDescriptionColumn',
					'itemName'=>$item->name,
				),
				array(
					'class'=>'AuthItemTypeColumn',
					'itemName'=>$item->name,
				),
				array(
					'class'=>'AuthItemRemoveColumn',
					'itemName'=>$item->name,
				),
			),
		)); ?>

	</div>

	<div class="span6">

		<h3>
			<?php echo Yii::t('AuthModule.main', 'Descendants'); ?>
			<small><?php echo Yii::t('AuthModule.main', 'Permissions granted by this item'); ?></small>
		</h3>

		<?php $this->widget('bootstrap.widgets.TbGridView', array(
			'type' => 'striped condensed hover',
			'dataProvider'=>$descendantDp,
			'emptyText'=>Yii::t('AuthModule.main', 'This item does not have any descendants.'),
			'hideHeader'=>true,
			'template'=>"{items}",
			'columns'=>array(
				array(
					'class'=>'AuthItemDescriptionColumn',
					'itemName'=>$item->name,
				),
				array(
					'class'=>'AuthItemTypeColumn',
					'itemName'=>$item->name,
				),
				array(
					'class'=>'AuthItemRemoveColumn',
					'itemName'=>$item->name,
				),
			),
		)); ?>

	</div>

</div>

<div class="row">

	<div class="span6 offset6">

		<?php if (!empty($childOptions)): ?>

			<h4><?php echo Yii::t('AuthModule.main', 'Add child'); ?></h4>

			<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
				'layout'=>TbHtml::FORM_LAYOUT_INLINE,
			)); ?>

			<?php echo $form->dropDownListControlGroup($formModel, 'items', $childOptions, array('label'=>false)); ?>

			<?php echo TbHtml::submitButton(Yii::t('AuthModule.main', 'Add'),array(
				'type'=>TbHtml::BUTTON_COLOR_PRIMARY,
			)); ?>

			<?php $this->endWidget(); ?>

		<?php endif; ?>

	</div>

</div>