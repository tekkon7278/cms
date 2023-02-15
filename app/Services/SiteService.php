<?php

namespace App\Services;

use App\Repositories\SiteRepository;

class SiteService
{
    public function getSite($siteId)
    {
        $siteRepo = app()->make('SiteRepository');
        return  $siteRepo->getSite($siteId);
    }
}