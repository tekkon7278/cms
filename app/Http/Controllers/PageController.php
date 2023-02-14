<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SiteService;
use App\Services\PageService;
use App\Repositories\PageRepository;

class PageController extends Controller
{
    public function index($siteId, $pageId)
    {
        $service = new SiteService();
        $site = $service->getSite($siteId);

        $pageService = new PageService();
        $pages = $pageService->getSitePages($siteId);
        $currentPage = $pageService->getPage($siteId, $pageId);

        return view('index', [
            'site' => $site,
            'pages' => $pages,
            'currentPage' => $currentPage,
        ]);
    }
}
