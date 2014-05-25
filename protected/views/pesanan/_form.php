<?php
/* @var $this PesananController */
/* @var $model Pesanan */
/* @var $form TbActiveForm */
?>

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'pesanan-form',
    'layout'=> TbHtml::FORM_LAYOUT_SEARCH,  
	// Catatan: Saat validasi AJAX diaktifkan, pastikan kode terkait yang ada di
	// controller action juga menangani dengan benar.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Kotak dengan tanda <span class="required">*</span> harus diisi.</p>

    <?php echo $form->errorSummary(array($model)); ?>
    
    <div class="row-fluid">
        <div class="span6">
            <?php $tanggal = $this->widget('yiiwheels.widgets.formhelpers.WhDatePickerHelper', array(
                    'model' => $model,
                    'attribute' => 'tanggal',
                    'inputOptions' => array('class' => 'input-medium'),
                    'name' => 'datepicker',
                    //'value' => '2000-01-01'
               ), true); 
            ?>
            <?php echo $form->customControlGroup($tanggal, $model, 'tanggal'); ?>          
        </div>
        <div class="span6">
            <?php echo $form->textFieldControlGroup($model,'nama_pelanggan',array('span'=>10,'maxlength'=>64)); ?>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <?php echo $form->dropDownListControlGroup($model,'nomor_meja',
                    array(1, 2, 3, 4, 5, 6, 7, 8, 9 , 10, 11, 12, 13, 14, 15, 16, 17, 18, 19 ,20),
                    array('empty'=>'')); ?>
        </div>
        <div class="span6">
            <?php echo $form->dropDownListControlGroup(
                    $model,'pegawai_id',
                    CHtml::listData(Pegawai::model()->findAll(),'id','nama'),
                    array('span'=>10, 'empty'=>''));
            ?>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <?php echo $form->uneditableFieldControlGroup($model,'total_harga'); ?>
        </div>
        <div class="span6">
            <?php echo $form->dropDownListControlGroup($model,'lunas',array('N'=>'Tidak','Y'=>'Ya'),array('disabled'=>true)); ?>
        </div>
    </div>

    <?php if(!$model->isNewRecord) { ?>
    <div class="row-fluid">
        <div class="span12">
        <?php
        $this->widget('ext.multimodelform.MultiModelForm',array(
                'id' => 'id_pesanan_detail', //the unique widget id
                'formConfig' => $pesananDetail->getMultiModelForm(), //the form configuration array
                'model' => $pesananDetail, //instance of the form model
                'addItemText' => TbHtml::icon(TbHtml::ICON_PLUS).' Tambah',
                'bootstrapLayout' => true,
                //if submitted (not empty) from the controller,
                //the form will be rendered with validation errors
                'validatedItems' => $validatedMembers,
                'removeText' => TbHtml::icon(TbHtml::ICON_TRASH),
                'removeConfirm' => 'Hapus baris ini?',
                //array of member instances loaded from db
                //only needed if validatedItems are empty (not in displaying validation errors mode)
                'data' => empty($validatedItems) ? $pesananDetail->findAll(
                                                 array('condition'=>'pesanan_id=:psid',
                                                       'params'=>array(':psid'=>$model->id),
                                                       //'order'=>'position', //see 'sortAttribute' below
                                                       )) : null,

                //'sortAttribute' => 'position', //if assigned: sortable fieldsets is enabled

                'showAddItemOnError' => false, //not allow add items when in validation error mode (default = true)

                //------------ output style ----------------------
               'tableView' => true, //sortable will not work

                //add position:relative because of embedded removeLinkWrapper with style position:absolute
                'fieldsetWrapper' => array('tag' => 'div',
                    'htmlOptions' => array('class' => 'view','style'=>'position:relative;background:#EFEFEF;')
                ),

                'removeLinkWrapper' => array('tag' => 'div',
                    'htmlOptions' => array('style'=>'position:absolute; top:1em; right:1em;')
                ),

            ));
        ?>
        </div>
    </div>
    <?php } ?>    
    
    <div class="form-actions">
    <?php echo TbHtml::submitButton($model->isNewRecord ? 'Buat' : 'Simpan',array(
        'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
        'size'=>TbHtml::BUTTON_SIZE_DEFAULT,
    )); ?>
    </div>

    <?php $this->endWidget(); ?>
