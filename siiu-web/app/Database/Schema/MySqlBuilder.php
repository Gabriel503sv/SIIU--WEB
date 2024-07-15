<?php

namespace App\Database\Schema;

use Illuminate\Database\Schema\MySqlBuilder as BaseMySqlBuilder;
use App\Traits\SchemaBuilderTrait;

class MySqlBuilder extends BaseMySqlBuilder
{
    use SchemaBuilderTrait;
}