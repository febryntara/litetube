<?php

class Database
{
  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $name = DB_NAME;
  private $dbh; //database handler
  private $stmt;

  public function __construct()
  {
    // data source name
    $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->name;

    // option database
    $option = [
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
    try {
      $this->dbh = new PDO($dsn, $this->user, $this->pass, $option); //intansiasi objek koneksi
    } catch (PDOException $e) {
      die($e->getMessage()); //getMessage adalah fungsi bawaan PDO
    }
  }

  public function query($query) //fungsi untuk menyiapkan query
  {
    $this->stmt = $this->dbh->prepare($query); //prepare adalah fungsi bawaan PDO
  }

  public function bind($param, $value, $type = NULL) //fungsi untuk binding nilai pada variabel dan menentukan tipe nya, untuk menghindari sql injection
  {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
      }
    }

    $this->stmt->bindValue($param, $value, $type); //bindvalue adalah fungsi bawaan PDO
  }

  public function execute() //execute disini berbeda dengan execute pada baris 57, disini execute adalah fungsi buatan yang menjalan fungsi execute pada PDO
  {
    $this->stmt->execute(); //execute adalah fungsi bawaan PDO
  }

  public function resultSet()
  {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC); //fetchAll adalah fungsi bawaan PDO, memiliki nilai return berupa semua data yang sesuai dengan query
  }

  public function single()
  {
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_ASSOC); //fetch dalah fungsi bawaan PDO, mereturn 1 hasil saja walaupun dalam query ada banyak ada yg dapat diseleksi
  }

  public function numRow()
  {
    return $this->stmt->rowCount(); //fungsi bawaan PDO, berfungsi untuk mengecek adanya penambahan baris baru saat query berhasil di eksekusi
  }
}
