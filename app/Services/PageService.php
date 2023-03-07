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
    
    public function createContent($pageId, $content, $beforeContentId)
    {
        $pageRepo = app()->make('PageRepository');
        return $pageRepo->createContent($pageId, $content, $beforeContentId);
    }

    public function updateContent($contentId, $content)
    {
        $pageRepo = app()->make('PageRepository');
        return $pageRepo->updateContent($contentId, $content);
    }
}