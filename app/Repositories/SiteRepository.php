<?php

namespace App\Repositories;

use App\Models\SiteModel;
use App\Entities\Site;

class SiteRepository extends AbstractRepository
{
    public function getSites()
    {
        $siteModel = new SiteModel();
        $siteRows = $siteModel->get();

        $entities = $this->createEntityCollection('Site', $siteRows);
        return $entities;
    }

    public function getSite($siteId)
    {
        $siteModel = new SiteModel();
        $siteRow = $siteModel
            ->where('site_id', $siteId)
            ->first();

        $entity = $this->createEntity('Site', $siteRow);
        return $entity;
    }


}