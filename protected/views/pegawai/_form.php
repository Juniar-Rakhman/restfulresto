<?php
/* @var $this PegawaiController */
/* @var $model Pegawai */
/* @var $form TbActiveForm */
?>

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'pegawai-form',
	// Catatan: Saat validasi AJAX diaktifkan, pastikan kode terkait yang ada di
	// controller action juga menangani dengan benar.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Kotak dengan tanda <span class="required">*</span> harus diisi.</p>

    <?php echo $form->errorSummary($model); ?>
    <div class="row-fluid">
        <div class="span6">
            <?php echo $form->textFieldControlGroup($model,'nomor_induk',array('span'=>5,'maxlength'=>8)); ?>
        </div>
        <div class="span6">
            <?php echo $form->textFieldControlGroup($model,'nama',array('span'=>10,'maxlength'=>64)); ?>    
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <?php $tgl_masuk = $this->widget('yiiwheels.widgets.formhelpers.WhDatePickerHelper', array(
                    'model' => $model,
                    'attribute' => 'tgl_masuk',
                    'inputOptions' => array('class' => 'input-medium'),
                    'name' => 'dp_tgl_masuk',
                    //'value' => '2000-01-01'
               ), true); 
            ?>
            <?php echo $form->customControlGroup($tgl_masuk, $model, 'tgl_masuk'); ?>
        </div>
        <div class="span6">
            <?php $tgl_keluar = $this->widget('yiiwheels.widgets.formhelpers.WhDatePickerHelper', array(
                    'model' => $model,
                    'attribute' => 'tgl_keluar',
                    'inputOptions' => array('class' => 'input-medium'),
                    'name' => 'dp_tgl_keluar',
                    //'value' => '2000-01-01'
               ), true); 
            ?>
            <?php echo $form->customControlGroup($tgl_keluar, $model, 'tgl_keluar'); ?>    
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <?php echo $form->textFieldControlGroup($model, 'telepon'); ?>            
        </div>
        <div class="span6">
            <?php echo $form->dropDownListControlGroup($model,'aktif',array('Y'=>'Ya','N'=>'Tidak')); ?>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <?php echo $form->textAreaControlGroup($model,'alamat',array('rows'=>3,'span'=>10)); ?>
        </div>
    </div>
        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Buat' : 'Simpan',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_DEFAULT,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>