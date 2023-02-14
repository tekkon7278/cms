<?php

namespace App\Services;

use App\Repositories\SiteRepository;

class SiteService
{
    public function getSite($siteId)
    {
        $siteRepo = new SiteRepository();
        return  $siteRepo->getSite($siteId);
    }
}