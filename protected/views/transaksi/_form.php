<?php
/* @var $this TransaksiController */
/* @var $model Transaksi */
/* @var $form TbActiveForm */
?>

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'transaksi-form',
	// Catatan: Saat validasi AJAX diaktifkan, pastikan kode terkait yang ada di
	// controller action juga menangani dengan benar.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Kotak dengan tanda <span class="required">*</span> harus diisi.</p>

    <?php echo $form->errorSummary($model); ?>
    <div class="row-fluid">
        <div class="span2">
            <?php $tanggal = $this->widget('yiiwheels.widgets.formhelpers.WhDatePickerHelper', array(
                    'model' => $model,
                    'attribute' => 'tanggal',
                    'inputOptions' => array('class' => 'input-medium'),
                    'name' => 'datepicker',
                    //'value' => '2000-01-01'
               ), true); 
            ?>
            <?php echo $form->customControlGroup($tanggal, $model, 'tanggal', array('span'=>6)); ?>    
        </div>
        <div class="span2">
             <?php $jam = $this->widget('yiiwheels.widgets.formhelpers.WhTimePickerHelper', array(
                'inputOptions' => array('class' => 'input-medium'),
                'name' => 'timepicker',
                'model' => $model,
                 'attribute' => 'jam',
                //'value' => '08:00'
             ), true);
            ?>
            <?php echo $form->customControlGroup($jam, $model, 'jam', array('span'=>6)); ?>
        </div>
        <div class="span2">
            &nbsp;
        </div>
        <div class="span6">
            <?php
                $pesanan = null;
                if($model->isNewRecord) {
                    //jika buat transaksi, tampilkan semua semua pesanan yang belum lunas
                    $pesanan = Pesanan::model()->findAll('lunas=:lunas',array(':lunas'=>'N'));
                }else{
                   //jika mengubah transaksi, hanya tampilkan pesanan yang terpilih 
                    $pesanan = Pesanan::model()->findAllByPk($model->pesanan_id);
                }
                echo $form->dropDownListControlGroup(
                    $model,'pesanan_id',
                    CHtml::listData($pesanan,'id','nama_pelanggan'),
                    array('span'=>10, 'empty'=>'','disabled'=>!$model->isNewRecord,
                        'ajax' => array(
                          'type' => 'POST', //request type
                          'url' => CController::createUrl('pesanan/salinHarga'), //url to call.
                          'data'=>array('pesanan_id' => 'js: $(this).val()',
                              'pajak' => 'js: $(\'#'.CHtml::activeId($model,'pajak').'\').val()'),
                          'dataType'=>'json',
                          'success' => 'function(data) {
                                $(\'#'.CHtml::activeId($model,'harga_pesanan').'\').val(data.jumlah);
                                $(\'#'.CHtml::activeId($model,'harga_total').'\').val(data.total);
                            }'
                    )
              ));
            ?>
        </div>
    </div>            
    <div class="row-fluid">
        <div class="span6">
            <?php echo $form->dropDownListControlGroup(
                    $model,'pegawai_id',
                    CHtml::listData(Pegawai::model()->findAll(),'id','nama'),
                    array('span'=>10, 'empty'=>''));
            ?>
        </div>
        <div class="span6">
            <?php echo $form->textFieldControlGroup($model,'harga_pesanan',array('span'=>10)); ?>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <?php echo $form->textFieldControlGroup($model,'harga_total',array('span'=>5)); ?>
        </div>
        <div class="span6">
            <?php echo $form->dropDownListControlGroup($model,'pajak',array(0=>'0',10=>'10%'),
                    array('span'=>10,
                        'ajax' => array(
                          'type' => 'POST', //request type
                          'url' => CController::createUrl('pesanan/hitungPajak'), //url to call.
                          'data'=>array('pajak' => 'js: $(this).val()',
                              'harga' => 'js: $(\'#'.CHtml::activeId($model,'harga_pesanan').'\').val()'),
                          'dataType'=>'json',
                          'success' => 'function(data) {
                                $(\'#'.CHtml::activeId($model,'harga_total').'\').val(data.jumlah);
                            }'
                    )
              )); ?>
        </div>
    </div>
    
    <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Buat' : 'Simpan',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_DEFAULT,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>
