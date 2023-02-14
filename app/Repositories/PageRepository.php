<?php

namespace App\Repositories;

use App\Models\PageModel;
use App\Models\SiteModel;
use App\Models\ContentModel;
use App\Entities\Page;
use App\Entities\Content;
use Illuminate\Support\Collection;

class PageRepository extends AbstractRepository
{
    public function getSitePages($siteId)
    {
        $pageModel = new PageModel();
        $pageRows = $pageModel
            ->where('site_id', $siteId)
            ->get();
        
        $pages = $this->createEntityCollection(Page::class, $pageRows);
        return $pages;
    }

    public function getPage($siteId, $pageId)
    {    
        $pageModel = new PageModel();
        $pageRow = $pageModel
            ->where('page_id', $pageId)
            ->first();

        $contentModel = new ContentModel();
        $contentRows = $contentModel
            ->where('page_id', $pageId)
            ->orderBy('sort')
            ->get();
        
        $page = $this->createEntity(Page::class, $pageRow);
        $contents = $this->createEntityCollection(Content::class, $contentRows);
        $page->setContents($contents);
        return $page;
    }
}