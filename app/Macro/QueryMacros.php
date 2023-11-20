<?php

namespace App\Macro;

use Carbon\Carbon;

class QueryMacros
{
    // todays results
    public function today()
    {
        return function ($column = 'datetime') {
            return $this->whereDate($column, date("Y-m-d", strtotime("today")));
        };
    }

    // yesterday results
    public function yesterday()
    {
        return function ($column = 'datetime') {
            return $this->whereDate($column, date("Y-m-d", strtotime("yesterday")));
        };
    }

    // week results
    public function week()
    {
        return function ($column = 'created_at') {
            return $this->whereBetween(
                $column,
                [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
            );
        };
    }

    // month results
    public function month()
    {
        return function ($column = 'created_at') {
            return $this->whereBetween(
                $column,
                [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]
            );
        };
    }

    // year results
    public function year()
    {
        return function ($column = 'created_at') {
            return $this->whereBetween(
                $column,
                [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()]
            );
        };
    }
}
