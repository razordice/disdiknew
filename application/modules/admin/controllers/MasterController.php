<?php
class Admin_MasterController extends Zend_Controller_Action {
    public function indexAction() {
  		$this->_helper->layout->setLayout('layoutadmin');
  	}

    /* Kecamatan CRUD */
    public function kecamatanAction() {
  		$this->_helper->layout->setLayout('layoutadmin');
      $model = new Admin_Model_MasterModel();
  		$listkecamatan = $model->getKecamatanlist();
  		$this->view->detail = $listkecamatan;
  	}
    public function addkecAction() {
  		$this->_helper->layout->setLayout('layoutadmin');
      if ($this->_request->isPost()) {
  			$model = new Admin_Model_MasterModel();
  			$Dataform = $this->_request->getPost();

  			if($Dataform['nama']==null) {
  				$this->view->message = 'Please Fill out The Form First!';
  			} else {
  				$cek_kec = $model->cekKecamatan($Dataform['nama']);
  				//Zend_Debug::dump(count($cekemail));die();
  				if(count($cek_kec)==0) {
  					$insert = $model->insertKecamatan($Dataform);
  					if($insert===true) {
  						//zend_debug::dump($insert);die();
  						$this->view->msg = 'Insert Success';
  					} else {
  						$this->view->message = 'Insert Failed';
  					}
  				} else {
  					$this->view->message = 'Nama Kecamatan is Already Use';
  				}

  			}
  		}
  	}
    public function editkecAction() {
  		$this->_helper->layout->setLayout('layoutadmin');
      $model = new Admin_Model_MasterModel();
  		$req = $this->getRequest();
  		$id = $req->getParam('p');

  		$det = $model->getKecamatandet($id);
  		$this->view->det = $det;
  		if ($this->_request->isPost()) {
  			$Dataform = $this->_request->getPost();
  			/*Zend_Debug::dump($Dataform);die();*/
  			if($Dataform['nama']==null) {
  				$this->view->message = 'Please Fill out The Form First!';
  			} else {
  				//Zend_Debug::dump($Dataform);die();
  				$insert = $model->updateKecamatan($Dataform);
  			}

  			if($insert===true) {
  				$this->view->msg = 'Insert Success';
  			} else {
  				$this->view->message = 'Insert Failed';
  			}

  		}
  		$id = $req->getParam('p');
  		if($id!='') {
  			$det = $model->getKecamatandet($id);
  			$this->view->det = $det;
  		}
  	}
    public function delkecAction() {
      $model = new Admin_Model_MasterModel();
      $req = $this->getRequest();
      $id = $req->getParam('key');
      $delete = $model->delKecamatan($id);
      return $this->_helper->json(
          array(
              'edit' => $delete,
          )
      );
  	}
    /* End Kecamatan CRUD */

    /* Guru RUD */
    public function guruAction() {
  		$this->_helper->layout->setLayout('layoutadmin');
      $model = new Admin_Model_MasterModel();
  		$listguru = $model->getGurulist();
  		$this->view->detail = $listguru;
  	}
    public function editguruAction() {
  		$this->_helper->layout->setLayout('layoutadmin');
      $model = new Admin_Model_MasterModel();
  		$req = $this->getRequest();
  		$id = $req->getParam('p');

  		$det = $model->getGurudet($id);
  		$this->view->det = $det;
  		if ($this->_request->isPost()) {
  			$Dataform = $this->_request->getPost();
  			/*Zend_Debug::dump($Dataform);die();*/
  			if($Dataform['nama']==null) {
  				$this->view->message = 'Please Fill out The Form First!';
  			} else {
  				//Zend_Debug::dump($Dataform);die();
  				$insert = $model->updateGuru($Dataform);
  			}

  			if($insert===true) {
  				$this->view->msg = 'Insert Success';
  			} else {
  				$this->view->message = 'Insert Failed';
  			}

  		}
  		$id = $req->getParam('p');
  		if($id!='') {
  			$det = $model->getGurudet($id);
  			$this->view->det = $det;
  		}
  	}
    public function delguruAction() {

  	}
    /* End Guru RUD */

    /* Siswa RUD */
    public function siswaAction() {
  		$this->_helper->layout->setLayout('layoutadmin');
      $model = new Admin_Model_MasterModel();
  		$listsiswa = $model->getSiswalist();
  		$this->view->detail = $listsiswa;
  	}
    public function editsiswaAction() {
  		$this->_helper->layout->setLayout('layoutadmin');
      $model = new Admin_Model_MasterModel();
  		$req = $this->getRequest();
  		$id = $req->getParam('p');

  		$det = $model->getSiswadet($id);
  		$this->view->det = $det;
  		if ($this->_request->isPost()) {
  			$Dataform = $this->_request->getPost();
  			/*Zend_Debug::dump($Dataform);die();*/
  			if($Dataform['nama']==null) {
  				$this->view->message = 'Please Fill out The Form First!';
  			} else {
  				//Zend_Debug::dump($Dataform);die();
  				$insert = $model->updateSiswa($Dataform);
  			}

  			if($insert===true) {
  				$this->view->msg = 'Insert Success';
  			} else {
  				$this->view->message = 'Insert Failed';
  			}

  		}
  		$id = $req->getParam('p');
  		if($id!='') {
  			$det = $model->getSiswadet($id);
  			$this->view->det = $det;
  		}
  	}
    public function delsiswaAction() {

  	}
    /* End Siswa RUD */

    /* Sekolah CRUD */
    public function sekolahAction() {
  		$this->_helper->layout->setLayout('layoutadmin');
  	}
    public function addsekolahAction() {
  		$this->_helper->layout->setLayout('layoutadmin');
  	}
    public function editsekolahAction() {
  		$this->_helper->layout->setLayout('layoutadmin');
  	}
    public function delsekolahAction() {

  	}
    /* End Sekolah CRUD */

    /* Mapel CRUD */
    public function mapelAction() {
  		$this->_helper->layout->setLayout('layoutadmin');
      $model = new Admin_Model_MasterModel();
  		$listmapel = $model->getMapellist();
  		$this->view->detail = $listmapel;
  	}
    public function addmapelAction() {
  		$this->_helper->layout->setLayout('layoutadmin');
      if ($this->_request->isPost()) {
  			$model = new Admin_Model_MasterModel();
  			$Dataform = $this->_request->getPost();

  			if($Dataform['nama']==null && $Dataform['tingkat']==null) {
  				$this->view->message = 'Please Fill out The Form First!';
  			} else {
  				$cek_mapel = $model->cekMapel($Dataform['nama'],$Dataform['tingkat']);
  				//Zend_Debug::dump(count($cekemail));die();
  				if(count($cek_mapel)==0) {
  					$insert = $model->insertMapel($Dataform);
  					if($insert===true) {
  						//zend_debug::dump($insert);die();
  						$this->view->msg = 'Insert Success';
  					} else {
  						$this->view->message = 'Insert Failed';
  					}
  				} else {
  					$this->view->message = 'Nama Mata Pelajaran is Already Use';
  				}

  			}
  		}
  	}
    public function editmapelAction() {
  		$this->_helper->layout->setLayout('layoutadmin');
      $model = new Admin_Model_MasterModel();
  		$req = $this->getRequest();
  		$id = $req->getParam('p');

  		$det = $model->getMapeldet($id);
  		$this->view->det = $det;
  		if ($this->_request->isPost()) {
  			$Dataform = $this->_request->getPost();
  			/*Zend_Debug::dump($Dataform);die();*/
  			if($Dataform['nama']==null && $Dataform['tingkat']==null) {
  				$this->view->message = 'Please Fill out The Form First!';
  			} else {
  				//Zend_Debug::dump($Dataform);die();
  				$insert = $model->updateMapel($Dataform);
  			}

  			if($insert===true) {
  				$this->view->msg = 'Insert Success';
  			} else {
  				$this->view->message = 'Insert Failed';
  			}

  		}
  		$id = $req->getParam('p');
  		if($id!='') {
  			$det = $model->getMapeldet($id);
  			$this->view->det = $det;
  		}
    }
    public function delmapelAction() {
      $model = new Admin_Model_MasterModel();
      $req = $this->getRequest();
      $id = $req->getParam('key');
      $delete = $model->delMapel($id);
      return $this->_helper->json(
          array(
              'edit' => $delete,
          )
      );
  	}
    /* End Mapel CRUD */

    /* Jabatan CRUD */
    public function jabatanAction() {
  		$this->_helper->layout->setLayout('layoutadmin');
      $model = new Admin_Model_MasterModel();
  		$listjabatan = $model->getJabatanlist();
  		$this->view->detail = $listjabatan;
  	}
    public function addjabatanAction() {
  		$this->_helper->layout->setLayout('layoutadmin');
      if ($this->_request->isPost()) {
  			$model = new Admin_Model_MasterModel();
  			$Dataform = $this->_request->getPost();

  			if($Dataform['nama']==null) {
  				$this->view->message = 'Please Fill out The Form First!';
  			} else {
  				$cek_jabatan = $model->cekJabatan($Dataform['nama']);
  				//Zend_Debug::dump(count($cekemail));die();
  				if(count($cek_jabatan)==0) {
  					$insert = $model->insertJabatan($Dataform);
  					if($insert===true) {
  						//zend_debug::dump($insert);die();
  						$this->view->msg = 'Insert Success';
  					} else {
  						$this->view->message = 'Insert Failed';
  					}
  				} else {
  					$this->view->message = 'Nama Jabatan is Already Use';
  				}

  			}
  		}
  	}
    public function editjabatanAction() {
  		$this->_helper->layout->setLayout('layoutadmin');
  	}
    public function deljabatanAction() {

  	}
    /* End Jabatan CRUD */

    /* Status Pegawai CRUD */
    public function statuspegAction() {
  		$this->_helper->layout->setLayout('layoutadmin');
      $model = new Admin_Model_MasterModel();
  		$listStat = $model->getStatuspeglist();
  		$this->view->detail = $listStat;
  	}
    public function addstatuspegAction() {
  		$this->_helper->layout->setLayout('layoutadmin');
      if ($this->_request->isPost()) {
  			$model = new Admin_Model_MasterModel();
  			$Dataform = $this->_request->getPost();

  			if($Dataform['nama']==null) {
  				$this->view->message = 'Please Fill out The Form First!';
  			} else {
  				$cek_stat = $model->cekStatpeg($Dataform['nama']);
  				//Zend_Debug::dump(count($cekemail));die();
  				if(count($cek_stat)==0) {
  					$insert = $model->insertStatpeg($Dataform);
  					if($insert===true) {
  						//zend_debug::dump($insert);die();
  						$this->view->msg = 'Insert Success';
  					} else {
  						$this->view->message = 'Insert Failed';
  					}
  				} else {
  					$this->view->message = 'Nama Status Pegawai is Already Use';
  				}

  			}
  		}
  	}
    public function editstatuspegAction() {
  		$this->_helper->layout->setLayout('layoutadmin');
      $model = new Admin_Model_MasterModel();
  		$req = $this->getRequest();
  		$id = $req->getParam('p');

  		$det = $model->getStatpegdet($id);
  		$this->view->det = $det;
  		if ($this->_request->isPost()) {
  			$Dataform = $this->_request->getPost();
  			/*Zend_Debug::dump($Dataform);die();*/
  			if($Dataform['nama']==null) {
  				$this->view->message = 'Please Fill out The Form First!';
  			} else {
  				//Zend_Debug::dump($Dataform);die();
  				$insert = $model->updateStatpeg($Dataform);
  			}

  			if($insert===true) {
  				$this->view->msg = 'Insert Success';
  			} else {
  				$this->view->message = 'Insert Failed';
  			}

  		}
  		$id = $req->getParam('p');
  		if($id!='') {
  			$det = $model->getStatpegdet($id);
  			$this->view->det = $det;
  		}
  	}
    public function delstatuspegAction() {
      $model = new Admin_Model_MasterModel();
      $req = $this->getRequest();
      $id = $req->getParam('key');
      $delete = $model->delStatpeg($id);
      return $this->_helper->json(
          array(
              'edit' => $delete,
          )
      );
  	}
    /* End Status Pegawai CRUD */
}
