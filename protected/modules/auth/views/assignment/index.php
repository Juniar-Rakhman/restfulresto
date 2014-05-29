<?php
/* @var $this AssignmentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    Yii::t('AuthModule.main', 'Assignments'),
);

$this->menu=array(
	array('label'=>Yii::t('AuthModule.main','role|roles'), 'url'=>array('/auth/role')),    
	array('label'=>Yii::t('AuthModule.main','task|tasks'), 'url'=>array('/auth/task')),
    array('label'=>Yii::t('AuthModule.main','operation|operations'), 'url'=>array('/auth/operation')),    
);
?>

<h3>
<?php
echo TbHtml::em(Yii::t('AuthModule.main', 'Assignments'), array('color' => TbHtml::TEXT_COLOR_INFO));
?>
</h3>

<ul class="breadcrumb">
<?php
echo TbHtml::buttonGroup($this->menu);
?>
</ul>

<?php $this->widget('yiiwheels.widgets.grid.WhGridView', array(
    'type' => 'striped bordered',
    'dataProvider' => $dataProvider,
	'emptyText' => Yii::t('AuthModule.main', 'No assignments found.'),
	#'template'=>"{items}\n{pager}",
    'columns' => array(
        array(
            'header' => Yii::t('AuthModule.main', 'User'),
            'class' => 'AuthAssignmentNameColumn',
        ),
        array(
            'header' => Yii::t('AuthModule.main', 'Assigned items'),
            'class' => 'AuthAssignmentItemsColumn',
        ),
        array(
            'class' => 'AuthAssignmentViewColumn',
        ),
    ),
)); ?>
