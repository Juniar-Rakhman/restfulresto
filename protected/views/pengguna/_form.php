<?php
/* @var $this PenggunaController */
/* @var $model Pengguna */
/* @var $form TbActiveForm */
?>

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'pengguna-form',
	// Catatan: Saat validasi AJAX diaktifkan, pastikan kode terkait yang ada di
	// controller action juga menangani dengan benar.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Kotak dengan tanda <span class="required">*</span> harus diisi.</p>

    <?php echo $form->errorSummary($model); ?>
    <div class="row-fluid">
        <div class="span6">
            <?php echo $form->textFieldControlGroup($model,'username',array('span'=>10,'maxlength'=>20)); ?>
        </div>
        <div class="span6">
            <?php echo $form->textFieldControlGroup($model,'email',array('span'=>10,'maxlength'=>50)); ?>
        </div>
    </div>
    <?php if($model->isNewRecord) { ?>
    <div class="row-fluid">
        <div class="span6">
            <?php echo $form->passwordFieldControlGroup($model,'password',array('span'=>10,'maxlength'=>50)); ?>
        </div>
        <div class="span6">
            <?php echo $form->passwordFieldControlGroup($model,'password2',array('span'=>10,'maxlength'=>50)); ?>
        </div>
    </div>
    <?php } ?>
    <div class="row-fluid">
        <div class="span6">
            <?php echo $form->dropDownListControlGroup($model,'level_id',$model->getLevelList(), array('span'=>10)); ?>
        </div>
        <div class="span6">
            <?php echo $form->dropDownListControlGroup($model,'pegawai_id',Pegawai::getNoLoginList($model->pegawai_id), array('span'=>10,'empty'=>'')); ?>
        </div>
    </div>
    
    <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Buat' : 'Simpan',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_DEFAULT,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>
