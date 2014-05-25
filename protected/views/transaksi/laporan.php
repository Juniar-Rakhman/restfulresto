<?php
/* @var $this TransaksiController */
/* @var $model Transaksi */
/* @var $form TbActiveForm */
?>

<h3>
<?php
echo TbHtml::em('Laporan Transaksi', array('color' => TbHtml::TEXT_COLOR_INFO));
?>
</h3>

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'transaksi-form',
	// Catatan: Saat validasi AJAX diaktifkan, pastikan kode terkait yang ada di
	// controller action juga menangani dengan benar.
	'enableAjaxValidation'=>false,
)); ?>

    <?php echo $form->errorSummary($model); ?>
    <div class="row-fluid">
        <div class="span3">
            <?php $tgl_awal = $this->widget('yiiwheels.widgets.formhelpers.WhDatePickerHelper', array(
                    'model' => $model,
                    'attribute' => 'tgl_awal',
                    'inputOptions' => array('class' => 'input-medium'),
                    'name' => 'datepicker',
                    //'value' => '2000-01-01'
               ), true); 
            ?>
            <?php echo $form->customControlGroup($tgl_awal, $model, 'tgl_awal', array('span'=>6)); ?>    
        </div>
    </div>
    <div class="row-fluid">
        <div class="span3">
            <?php $tgl_akhir = $this->widget('yiiwheels.widgets.formhelpers.WhDatePickerHelper', array(
                    'model' => $model,
                    'attribute' => 'tgl_akhir',
                    'inputOptions' => array('class' => 'input-medium'),
                    'name' => 'datepicker',
                    //'value' => '2000-01-01'
               ), true); 
            ?>
            <?php echo $form->customControlGroup($tgl_akhir, $model, 'tgl_akhir', array('span'=>6)); ?>   
        </div>
    </div>            
    
    <div class="form-actions">
        <?php echo TbHtml::submitButton('Tampilkan',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_DEFAULT,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

