<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index($siteId, $pageId)
    {
        $siteService = app()->make('SiteService');
        $site = $siteService->getSite($siteId);

        $pageService = app()->make('PageService');
        $pages = $pageService->getSitePages($siteId);
        $currentPage = $pageService->getPage($siteId, $pageId);

        return view('index', [
            'site' => $site,
            'pages' => $pages,
            'currentPage' => $currentPage,
        ]);
    }
}
