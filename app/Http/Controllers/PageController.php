<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index($siteId, $pageId)
    {
        $siteService = app()->make('SiteService');
        $site = $siteService->getSite($siteId);

        $pages = $siteService->getSitePages($siteId);
        $currentPage = $siteService->getSitePage($siteId, $pageId);

        return view('index', [
            'site' => $site,
            'pages' => $pages,
            'currentPage' => $currentPage,
        ]);
    }
}
