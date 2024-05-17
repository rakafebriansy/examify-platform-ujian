<?php

namespace App\Core;

class Model
{
    protected Cursor $db;

    public function __construct() {
        $this->db = new Cursor();
    }
}

?>