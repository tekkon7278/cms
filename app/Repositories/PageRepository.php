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
            ->where('site_id', $siteId)
            ->where('page_id', $pageId)
            ->first();

        $contentModel = new ContentModel();
        $contentRows = $contentModel
            ->where('page_id', $pageId)
            ->orderBy('sort')
            ->get();
        
        $page = $this->createEntity('Page', $pageRow);
        $contents = $this->createEntityCollection('Content', $contentRows);
        $page->setContents($contents);
        return $page;
    }

    public function getIndexPage($siteId)
    {
        $pageModel = new PageModel();
        $pageId = $pageModel
            ->where('site_id', $siteId)
            ->where('is_index', 1)
            ->value('page_id');

        return $this->getPage($siteId, $pageId);
    }

    public function createContent($pageId, $content, $beforeContentId)
    {
        $contentModel = new ContentModel();
        $sort = $contentModel
            ->where('content_id', $beforeContentId)
            ->value('sort');

        $contentModel = new ContentModel();
        $contentModel
            ->where('page_id', $pageId)
            ->where('sort', '>', $sort)
            ->increment('sort');

        $contentModel = new ContentModel();
        $result = $contentModel
            ->insert([
                'page_id' => $pageId,
                'content' => $content,
                'sort' => $sort++,
            ]);
        return $result;
    }

    public function updateContent($contentId, $content)
    {
        $contentModel = new ContentModel();
        $result = $contentModel
            ->where('content_id', $contentId)
            ->update([
                'content' => $content,
            ]);
        return $result;
    }
}