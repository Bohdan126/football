<?php

class Database {

  public $host = DB_HOST;

  public $username = DB_USER;

  public $password = DB_PASS;

  public $db_name = DB_NAME;

  public $link;

  public $error;

  /**
   * Database constructor.
   *
   * @param string $host
   * @param string $username
   * @param string $password
   * @param string $db_name
   */
  public function __construct() {
    //Call Connect Function
    $this->connect();
  }

  /**
   * Connector
   */

  private function connect() {
    $this->link = new mysqli($this->host, $this->username, $this->password, $this->db_name);

    if (!$this->link) {
      $this->error = "Connection Failed: " . $this->link->connect_error;
      return FALSE;
    }
  }

  /**
   * Select
   */
  public function select($query) {
    $result = $this->link->query($query) or die($this->link->error . __LINE__);
    if ($result->num_rows > 0) {
      return $result;
    }
    else {
      return FALSE;
    }
  }

  /**
   * Insert
   */
  public function insert($query) {
    $insert_row = $this->link->query($query) or die($this->link->error . __LINE__);

    //Validate Insert
    if ($insert_row) {
      header("Location: index.php?msg=" . urldecode('Record Added'));
      exit();
    }
    else {
      die('Error : (' . $this->link->error . ')' . $this->link->error);
    }
  }

  /**
   * Update
   */
  public function update($query) {
    $update_row = $this->link->query($query) or die($this->link->error . __LINE__);

    //Validate Insert
    if ($update_row) {
      header("Location: index.php?msg=" . urldecode('Record Updated'));
      exit();
    }
    else {
      die('Error : (' . $this->link->error . ')' . $this->link->error);
    }
  }

  /**
   * Delete
   */
  public function delete($query) {
    $delete_row = $this->link->query($query) or die($this->link->error . __LINE__);

    //Validate Insert
    if ($delete_row) {
      header("Location: index.php?msg=" . urldecode('Record Deleted'));
      exit();
    }
    else {
      die('Error : (' . $this->link->error . ')' . $this->link->error);
    }
  }
  /**
   * Insert
   */
  public function insertRegistration($query) {
    $insert_row = $this->link->query($query) or die($this->link->error . __LINE__);

    //Validate Insert
    if ($insert_row) {
      header("Location: ../admin");
      exit();
    }
    else {
      die('Error : (' . $this->link->error . ')' . $this->link->error);
    }
  }
}