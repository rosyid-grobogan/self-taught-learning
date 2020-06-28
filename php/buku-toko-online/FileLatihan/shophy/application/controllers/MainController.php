<?php
namespace application\controllers;
use \Controller;
class MainController extends Controller{
   public function template($viewName, $data=array()){   
	//Menyiapkan semua model
      $this->model('pengaturan');
      $this->model('menu');
      $this->model('kategori');
      $this->model('informasi');
      $this->model('produk');
      $this->model('keranjang');
    
	//Menyiapkan data pengaturan, kategori, informasi dan produk terlaris
      $query = $this->pengaturan->selectAll();
      $datapengaturan = $this->pengaturan->getResult($query);
      
      $query = $this->kategori->selectAll();
      $datakategori = $this->kategori->getResult($query);
      
      $query = $this->informasi->selectAll();
      $datainformasi = $this->informasi->getResult($query);
      
      $query = $this->produk->selectAll('dibeli', 'DESC', 4);
      $produklaris = $this->produk->getResult($query);
    
    //Menyiapkan data keranjang belanja	
      $sid = session_id();      
      $query = $this->keranjang->selectJoin(array('produk'), 'LEFT JOIN',array('keranjang.id_produk'=>'produk.id_produk'), array('keranjang.id_session'=>$sid));
      $datakeranjang = $this->keranjang->getResult($query);
    
	//Menyiapkan data menu
      $query = $this->menu->selectWhere(array('induk'=>0), 'urutan', 'ASC');
      $datamenu = $this->menu->getResult($query);
      $menu = array();
      foreach($datamenu as $m){         
         $qsub = $this->menu->selectWhere(array('induk'=>$m['id_menu']), 'urutan', 'ASC');
         $datasub = $this->menu->getResult($qsub);
         
		 //Membuat array sub menu
		 $sub = array();
         foreach($datasub as $s){
            $sub[] = array(
               'judul' => $s['nama_menu'],
               'link' => $this->get_link($s['jenis_link'], $s['link'])
            );
         }
         
		 //Membuat array menu
         $menu[] = array(
               'judul' => $m['nama_menu'],
               'link' => $this->get_link($m['jenis_link'], $m['link']),
               'submenu' => $sub
            );
      }
      
	  //Mengirimkan data ke template
      $view = $this->view('template');
      $view->bind('viewName', $viewName);
      $view->bind('pengaturan', $datapengaturan);
      $view->bind('data', array_merge($data, array(
         'keranjang' => $datakeranjang, 
         'menu' => $menu, 
         'pengaturan'=>$datapengaturan, 
         'informasi'=>$datainformasi, 
         'kategori'=>$datakategori,
         'bestseller' => $produklaris)));   
   }
   
   //Membuat fungsi untuk menentukan target menu ketika diklik sesuai nilai jenis link
   function get_link($datajenis, $datalink){
      $link = "";
      if($datajenis == 'kategori'){
         $qkat = $this->kategori->selectWhere(array('id_kategori'=>$datalink));
         $dkat = $this->kategori->getResult($qkat);
         $jml = $this->kategori->getRows($qkat);
         if($jml>=1) $link = BASE_PATH."/produk/kategori/".$dkat[0]['slug'];
      }elseif($datajenis == 'informasi'){
         $qinfo = $this->informasi->selectWhere(array('id_informasi'=>$datalink));
         $dinfo = $this->informasi->getResult($qinfo);
         $jml = $this->informasi->getRows($qinfo);
         if($jml>=1) $link = BASE_PATH."/informasi/konten/".$dinfo[0]['slug'];
      }else{
         $link = BASE_PATH."/".$datalink;
      }
      return $link;
   }
} 