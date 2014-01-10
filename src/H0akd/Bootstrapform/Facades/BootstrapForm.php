<?php

namespace H0akd\Bootstrapform\Facades;

use Illuminate\Support\Facades\Facade;

class BootstrapForm extends Facade {

    protected static function getFacadeAccessor() {
        return "bootstrapform";
    }

}
