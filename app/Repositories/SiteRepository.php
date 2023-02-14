<?php

namespace App\Repositories;

use App\Models\SiteModel;
use App\Entities\Site;

class SiteRepository extends AbstractRepository
{
    public function getSite($siteId)
    {
        $siteModel = new SiteModel();
        $siteRow = $siteModel
            ->where('site_id', $siteId)
            ->first();

        $entity = $this->createEntity(Site::class, $siteRow);
        return $entity;
    }

}