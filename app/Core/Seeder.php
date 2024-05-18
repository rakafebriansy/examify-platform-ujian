<?php

namespace App\Core;

use App\Core\Database;

class Seeder extends Database
{
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