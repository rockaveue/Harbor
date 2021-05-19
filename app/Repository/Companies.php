<?php

namespace App\Repository;
use Carbon\Carbon;
use App\Models\Company;

class Companies{
    CONST CACHE_KEY = 'COMPANY';
    public function all($orderBy){
        $key = "all.{$orderBy}";
        $cacheKey = $this->getCacheKey($key);
        // dd($cacheKey);
        return cache()->remember($cacheKey, Carbon::now()->addMinutes(5), function() use($orderBy){
            return Company::orderBy($orderBy)->get();
        });
    }
    public function getCacheKey($key){
        $key = strtoupper($key);

        return self::CACHE_KEY.".$key";
    }
}