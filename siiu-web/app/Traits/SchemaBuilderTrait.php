<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait SchemaBuilderTrait
{
    public function getColumns($table)
    {
        $databaseName = env('DB_DATABASE');
        return DB::select("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ?", [$databaseName, $table]);
    }
}