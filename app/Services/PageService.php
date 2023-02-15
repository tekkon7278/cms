<?php

namespace App\Services;

use App\Repositories\PageRepository;

class PageService
{

    public function getSitePages($siteId)
    {
        $pageRepo = app()->make('PageRepository');
        return $pageRepo->getSitePages($siteId);
    }
    
    public function getPage($siteId, $pageId)
    {
        $pageRepo = app()->make('PageRepository');
        return $pageRepo->getPage($siteId, $pageId);
    }
}