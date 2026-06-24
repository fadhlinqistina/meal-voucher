<?php
// app/Helpers/cache_helper.php

use CodeIgniter\Cache\CacheInterface;

if (!function_exists('cache')) {
    /**
     * Simple cache helper
     */
    function cache()
    {
        $cache = \Config\Services::cache();
        return $cache;
    }
}