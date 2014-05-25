<?php
/* @var $this MenuController */
/* @var $model Menu */
/* @var $form TbActiveForm */
?>

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'menu-form',
	// Catatan: Saat validasi AJAX diaktifkan, pastikan kode terkait yang ada di
	// controller action juga menangani dengan benar.
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

    <p class="help-block">Kotak dengan tanda <span class="required">*</span> harus diisi.</p>

    <?php echo $form->errorSummary($model); ?>

            <div class="row-fluid">
                <div class="span6">
                    <?php echo $form->textFieldControlGroup($model,'nama',array('span'=>10,'maxlength'=>45)); ?>
                </div>
                <div class="span6">
                    <?php echo $form->dropDownListControlGroup(
                            $model,'kategori_id',
                            CHtml::listData(Kategori::model()->findAll(),'id','nama'),
                            array('span'=>5, 'empty'=>''));
                    ?>
                </div>
            <div class="row-fluid">     
                <div class="span6">
                    <?php echo $form->textFieldControlGroup($model,'harga',array('prepend'=>'Rp', 'append'=>'.00')); ?>
                </div>
                <div class="span6">
                    <?php echo $form->textAreaControlGroup($model,'keterangan',array('rows'=>3,'span'=>10)); ?>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6">
                    <?php echo $form->fileFieldControlGroup($model, 'gambar'); ?>
                </div>
                <div class="span6">
                    <?php
                        if (isset($model->gambar)) {
                            echo TbHtml::imagePolaroid(Yii::app()->image->getUrl($model->gambar,'small')); 
                        }
                    ?>
                </div>
            </div>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Buat' : 'Simpan',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_DEFAULT,
		)); ?>
        </div>
    <?php $this->endWidget(); ?>
