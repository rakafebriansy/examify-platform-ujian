<?php

namespace App\Core;

use App\Core\Database;

class Migration extends Database
{
    public function __construct($dir) {
        parent::__construct($dir);
    }
    public function connect(): void
    {
        parent::connect();
    }
    public function close(): void
    {
        parent::close();
    }
    public function fresh()
    {
        
    }
}

?>