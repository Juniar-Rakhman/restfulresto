<?php
/* @var $this PenggunaController */
/* @var $model Pengguna */
?>

<?php
$this->breadcrumbs=array(
	'Pengguna'=>array('index'),
	$model->username=>array('view','id'=>$model->id),
	'Reset Password',
);

$this->menu=array(
	array('label'=>'Pengguna', 'icon'=>TbHtml::ICON_LIST, 'url'=>array('index'),'visible'=>Yii::app()->user->checkAccess('pengguna.index')),
	array('label'=>'Tambah', 'icon'=>TbHtml::ICON_PLUS, 'url'=>array('create'),'visible'=>Yii::app()->user->checkAccess('pengguna.create')),
	array('label'=>'Lihat', 'icon'=>  TbHtml::ICON_EYE_OPEN, 'url'=>array('view', 'id'=>$model->id),'visible'=>Yii::app()->user->checkAccess('pengguna.view')),
	array('label'=>'Kelola', 'icon'=> TbHtml::ICON_BOOK, 'url'=>array('admin'),'visible'=>Yii::app()->user->checkAccess('pengguna.admin')),
);
?>

<h3>
<?php
echo TbHtml::em('Reset Password', array('color' => TbHtml::TEXT_COLOR_INFO));
?>
</h3>

<ul class="breadcrumb">
<?php
echo TbHtml::buttonGroup($this->menu);
?>
</ul> 

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'pengguna-form',
	// Catatan: Saat validasi AJAX diaktifkan, pastikan kode terkait yang ada di
	// controller action juga menangani dengan benar.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Kotak dengan tanda <span class="required">*</span> harus diisi.</p>

    <?php echo $form->errorSummary($model); ?>
    
            <?php echo $form->uneditableFieldControlGroup($model,'username'); ?>
            <?php echo $form->passwordFieldControlGroup($model,'password',array('span'=>5,'maxlength'=>50)); ?>
            <?php echo $form->passwordFieldControlGroup($model,'password2',array('span'=>5,'maxlength'=>50)); ?>
    
    <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Buat' : 'Simpan',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_DEFAULT,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>