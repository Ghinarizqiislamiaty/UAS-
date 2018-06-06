<?php
class koneksi {
   private $server = "localhost";
   private $username = "id6084634_uas_web";
   private $password = "14bismillah";
   private $db = "id6084634_uas_web";

    function getKoneksi() {
        return new mysqli($this->server, $this->username,$this->password,$this->db);
    }
}

?>