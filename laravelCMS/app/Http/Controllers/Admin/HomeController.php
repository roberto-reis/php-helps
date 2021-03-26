<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use App\User;
use App\Visitor;


class HomeController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $visitsCount = 0;
        $onlineCount = 0;
        $pageCount = 0;
        $userCount = 0;

        $interval = intval($request->input("interval", 30));
        if($interval > 120) {
            $interval = 120;
        }


        // Contagem de Visitantes
        $dateIntervel = date('Y-m-d H:i:s', strtotime('-'.$interval.'days'));
        $visitsCount = Visitor::where('date_access', '>=', $dateIntervel)->count();

        // Contagem de Usuários Online
        $dateLimit = date('Y-m-d H:i:s', strtotime('-5 minutes'));
        $onlineLint = Visitor::select('ip')->where('date_access', '>=', $dateLimit)->groupBy('ip')->get();
        $onlineCount = count($onlineLint);

        // Contagem de páginas
        $pageCount = Page::count();

        // Contagem de Usuários Online
        $userCount = User::count();
        
        // Contagem para o PagePie
        $pagePie = [];
        $visitsAll = Visitor::selectRaw('page, count(page) as contAcesso')
                            ->where('date_access', '>=', $dateIntervel)
                            ->groupBy('page')
                            ->get();
        foreach($visitsAll as $visit) {
            $pagePie[ $visit['page'] ] = intval($visit['contAcesso']);
        }

        $pageLabels = json_encode(array_keys($pagePie));
        $pageValues = json_encode(array_values($pagePie));

        return view('admin.home', [
            'visitsCount' => $visitsCount,
            'onlineCount' => $onlineCount,
            'pageCount' => $pageCount,
            'userCount' => $userCount,
            'pageLabels' => $pageLabels,
            'pageValues' => $pageValues,
            'dateInterval' => $interval
        ]);
    }
}
