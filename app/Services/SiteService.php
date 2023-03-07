<?php

namespace App\Services;

use App\Repositories\SiteRepository;

class SiteService
{
    public function getSiteList()
    {
        $siteRepo = app()->make('SiteRepository');
        return  $siteRepo->getSites();
    }

    public function getSite($siteId)
    {
        $siteRepo = app()->make('SiteRepository');
        return  $siteRepo->getSite($siteId);
    }
    
    public function getSitePages($siteId)
    {
        $pageRepo = app()->make('PageRepository');
        return $pageRepo->getSitePages($siteId);
    }
    
    public function getSitePage($siteId, $pageId)
    {
        $pageRepo = app()->make('PageRepository');
        if ($pageId === null) {
            return $pageRepo->getIndexPage($siteId);
        } else {
            return $pageRepo->getPage($siteId, $pageId);
        }
    }

}