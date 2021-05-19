<?php

namespace App\Repository;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Sailor;

class Sailors{
    CONST CACHE_KEY = 'SAILORS';
    public function all($orderBy){
        $key = "all.{$orderBy}";
        $cacheKey = $this->getCacheKey($key);
        // dd($cacheKey);
        return cache()->remember($cacheKey, Carbon::now()->addMinutes(5), function() use($orderBy){
            return Sailor::orderBy($orderBy)->get();
        });
        // return Sailor::orderBy($orderBy)->get();
    }
    public function get($get){

    }
    public function getCacheKey($key){
        $key = strtoupper($key);

        return self::CACHE_KEY.".$key";
    }
}