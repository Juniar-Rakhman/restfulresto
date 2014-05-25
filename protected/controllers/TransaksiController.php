<?php

class TransaksiController extends Controller
{
	/**
	 * @var string tata letak yang digunakan untuk tampilan. Diisi dengan '//layouts/column1',
	 * berarti menggunakan tata letak 1 kolom. Lihat 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
        return array(
            'accessControl', // perform access control for CRUD operations
            array(
                'ext.starship.RestfullYii.filters.ERestFilter +
                REST.GET, REST.PUT, REST.POST, REST.DELETE'
            ),
        );
	}

    public function actions()
    {
        return array(
            'REST.'=>'ext.starship.RestfullYii.actions.ERestActionProvider',
        );
    }

	/**
	 * Menampilkan model.
	 * @param integer $id kunci primer dari model yang akan ditampilkan
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Membuat model.
	 * Jika berhasil, pengguna akan diarahkan ke halaman detail.
	 */
	public function actionCreate()
	{
		$model=new Transaksi;

		// Hilangkan komentar berikut jika validasi AJAX diaktifkan
		// $this->performAjaxValidation($model);

		if (isset($_POST['Transaksi'])) {
			$model->attributes=$_POST['Transaksi'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}else{
            $model->tanggal = date('Y-m-d');
        }

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Mengubah model.
	 * Jika berhasil, pengguna akan diarahkan ke halaman detail.
	 * @param integer $id kunci primer dari model yang akan ditampilkan
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		//transaksi yang telah dibuat tidak dapat diubah lagi
		Yii::app()->user->setFlash('error','Transaksi yang sudah dibuat tidak dapat diubah!');
		$this->redirect(array('view','id'=>$model->id));

		// Hilangkan komentar berikut jika validasi AJAX diaktifkan
		// $this->performAjaxValidation($model);

		if (isset($_POST['Transaksi'])) {
			$model->attributes=$_POST['Transaksi'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Menghapus model.
	 * Jika berhasil, pengguna akan diarahkan ke halaman kelola.
	 * @param integer $id kunci primer dari model yang akan dihapus
	 */
	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		} else {
			throw new CHttpException(400,'Permintaan gagal. Mohon tidak melanjutkan permintaan ini.');
		}
	}

	/**
	 * Menampilkan semua model.
	 */
	public function actionIndex()
	{
		$model=new Transaksi('search');
		$model->unsetAttributes();  // kosongkan semua nilai
		if (isset($_GET['Transaksi'])) {
			$model->attributes=$_GET['Transaksi'];
		}

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Mengelola semua model.
	 */
	public function actionAdmin()
	{
		$model=new Transaksi('search');
		$model->unsetAttributes();  // kosongkan semua nilai
		if (isset($_GET['Transaksi'])) {
			$model->attributes=$_GET['Transaksi'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Kembalikan model berdasarkan kunci utama yang dilewatkan melalui variabel GET.
	 * Jika data model tidak ditemukan, HTTP exception akan dibuat.
	 * @param integer $id kunci primer dari model yang akan dimuat
	 * @return Transaksi model yang dimuat
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Transaksi::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'Halaman yang diminta tidak ditemukan.');
		}
		return $model;
	}

	/**
	 * Melakukan validasi AJAX.
	 * @param Transaksi $model model yang divalidasi
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='transaksi-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    public function actionLunas($id) {
        $model=$this->loadModel($id);
        $pesanan = $model->pesanan;
        $pesanan->lunas = 'Y';
        if($pesanan->save()) {
            Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS,
            'Data telah disimpan!');
        }else{
            Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_ERROR,
            'Terjadi kesalahan, silakan dicoba lagi!');
        }
        $this->redirect(array('view','id'=>$model->id));
    }

    public function actionLaporan() {
        /**
         * Displays the request parameter
         */
        //buat model baru
        $model = new TransaksiForm;

        //jika ada data yang dikirim oleh user
        if (isset($_POST['TransaksiForm'])) {

            //assign user input ke model
            $model->attributes = $_POST['TransaksiForm'];

            //jika input user valid
            if ($model->validate()) {

                //ambil data transaksi
                $dataTrans = $model->getDataTransaksi();
                if (!$dataTrans) {
                    Yii::app()->user->setFlash('error', 'Data transaksi tidak ditemukan!');
                    $this->render('index', array('model' => $model));
                } else {
                    //semua OK, tampilkan laporan
                    $this->layout = 'report';
                    //pass variable yang diperlukan ke view
                    $this->render('_laporan', array('params' => $model, 'dataTrans' => $dataTrans));
                }
            }else{
                //tampilkan halaman untuk menampilkan error
                $this->render('laporan', array('model' => $model));
            }
        } else {
            //tampilkan halaman untuk mengisi request parameter
            $this->render('laporan', array('model' => $model));
        }
    }

}