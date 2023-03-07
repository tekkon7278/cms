<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function list()
    {
        $siteService = app()->make('SiteService');
        $siteList = $siteService->getSiteList();

        return view('cms.site.list', [
            'sites' => $siteList,
        ]);
    }

    public function page($siteId, $pageId = null)
    {
        $siteService = app()->make('SiteService');
        $site = $siteService->getSite($siteId);

        $pages = $siteService->getSitePages($siteId);
        $currentPage = $siteService->getSitePage($siteId, $pageId);

        return view('cms.site.page', [
            'site' => $site,
            'pages' => $pages,
            'currentPage' => $currentPage,
        ]);
    }
}
