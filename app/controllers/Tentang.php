<?php

class Tentang extends Controller
{
  public function index()
  {
    $data['judul'] = "Tentang Lite Tube";

    $this->view('templates/header', $data);
    $this->view('tentang/index');
    $this->view('templates/footer');
  }
}
