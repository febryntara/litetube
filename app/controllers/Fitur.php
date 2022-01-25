<?php

class Fitur extends Controller
{
  public function index()
  {
    $data['judul'] = "Fitur Lite Tube";

    $this->view('templates/header', $data);
    $this->view('fitur/index');
    $this->view('templates/footer');
  }
}
