<?php

class APP
{
  protected $controller = 'home';
  protected $method = 'index';
  protected $params = [];

  public function __construct()
  {
    $url = $this->parseUrl();

    // mengecek controller
    if (isset($url[0])) { //mengecek apakah $_GET['url] indek ke 0 ada nilanya / tidak
      if (file_exists('../app/controllers/' . $url[0] . '.php')) { //fungsi mengecek adanya sebuah file disebuah direktori tertentu
        $this->controller = $url[0]; //mengatur value controller dari home menjadi nilai dari $url[0]
        unset($url[0]); //setelah nilai controller berubah, maka nilai $url[0] akan dihilangkan untuk membersihkan array
      }
    }

    //memanggil file controller
    require_once '../app/controllers/' . $this->controller . '.php';
    //menginstansiasi objek controller
    $this->controller = new $this->controller;

    //mengecek method
    if (isset($url[1])) { //cek $url[1] ada nilainya atau tidak
      if (method_exists($this->controller, $url[1])) { //cek dalam objek controller ada method berdasarkan $url[1] atau tidak
        $this->method = $url[1]; //mereplace nilai index berdasarkan nilai $url[1] pada atribut method
        unset($url[1]); //menghilangkan nilai $url[1] dalam array agar array bersih
      }
    }

    //cek parameter, mulai dari $url[2] dst, ini akan menjadi parameter
    if (!empty($url)) {
      $this->params = array_values($url); //mengisi nilai atribut params sesuai dengan semua nilai pada array $url
    }

    // menjalankan controller, method dan kirim parameter
    call_user_func_array([$this->controller, $this->method], $this->params);

    // vardump $url
    // var_dump($url);
  }

  public function parseUrl() //fungsi pengolah url
  {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/'); //menghilangkan karakter '/' pada akhir string
      $url = filter_var($url, FILTER_SANITIZE_URL); //melakukan filter untuk mencegah karakter aneh pada string
      $url = explode('/', $url); //memecah string berdasarkan karakter '/'

      return $url;
    }
  }
}
