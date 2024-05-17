<?php

require 'app/init.php';

use Config\Env;
use App\Models\Admin;

Env::parse(__DIR__);
var_dump(Admin::all())

?>