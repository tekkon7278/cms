<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\SiteService;
use App\Services\PageService;

class IndexController extends Controller
{
    public function index($siteId)
    {
        $service = new SiteService();
        $site = $service->getSite($siteId);

        $pageService = new PageService();
        $pages = $pageService->getSitePages($siteId);

        return view('index', [
            'site' => $site,
            'pages' => $pages
        ]);
    }
}
