<?php
/**
 * Request parameter untuk laporan transaksi
 */
class TransaksiForm extends CFormModel
{
	public $tgl_awal;
	public $tgl_akhir;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('tgl_awal,tgl_akhir', 'required'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
         'tgl_awal'=>'Mulai tanggal',
         'tgl_akhir'=>'Hingga tanggal'
		);
	}
   
   public function getDataTransaksi() {
      $awal = date('Y-m-d',strtotime($this->tgl_awal));
      $akhir = date('Y-m-d',strtotime($this->tgl_akhir));
      
      $sql = "SELECT t.tanggal,p.nama_pelanggan,t.harga_pesanan,t.pajak,
              t.harga_total,k.nama kasir, w.nama pelayan 
              FROM transaksi t,pesanan p,pegawai k,pegawai w
              WHERE t.tanggal >='$awal' and t.tanggal <= '$akhir' and p.id=t.pesanan_id 
                and k.id=t.pegawai_id and w.id=p.pegawai_id";
      
      return Yii::app()->db->createCommand($sql)->queryAll();
      
   }
}