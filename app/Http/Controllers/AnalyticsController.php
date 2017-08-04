<?php

namespace App\Http\Controllers;

use App\AnalyticsPage;
use App\AnalyticsVisitor;
use App\Http\Requests;
use App\WebmasterSection;
use Auth;
use File;
use Helper;
use Illuminate\Http\Request;
use Redirect;

class AnalyticsController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth');


        if(@Auth::user()->delete_status == 1){
            Auth::logout();
            return \Redirect::to(route('NoPermission'))->send();
        }else{
            if (@Auth::user()->role_type_id == 4 || @Auth::user()->role_type_id == 3) {  
                        Auth::logout();
                        return \Redirect::to(route('NoPermission'))->send();
            }
        }

/*        if (!@Auth::user()->permissionsGroup->analytics_status) {
            return Redirect::to(route('NoPermission'))->send();
        }*/
    }



    public function index($stat = "date")
    {


        $analyticsVars = array("date", "country", "city", "os", "browser", "referrer", "hostname", "org");
        if (!in_array($stat, $analyticsVars)) {
            return redirect()->action('AnalyticsController@index');
        }


        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();


        $daterangepicker_start = date('Y-m-d', strtotime('-29 day'));
        $daterangepicker_end = date('Y-m-d');
        $daterangepicker_start_text = date("F d , Y", strtotime($daterangepicker_start));
        $daterangepicker_end_text = date("F d , Y", strtotime($daterangepicker_end));
        $min_visitor_date = date('d-m-Y', strtotime('-29 day'));



        $AnalyticsValues = array();



        $ix = 0;

        if ($stat == "date") {

        } else {
            usort($AnalyticsValues, function ($a, $b) {
                return $b['visits'] - $a['visits'];
            });
        }

        $TotalVisitors = AnalyticsVisitor::where('date', '>=', $daterangepicker_start)
            ->where('date', '<=', $daterangepicker_end)
            ->count();

        $TotalPages = AnalyticsPage::where('date', '>=', $daterangepicker_start)
            ->where('date', '<=', $daterangepicker_end)
            ->count();

        if ($stat == "org") {
            $statText = "visitorsAnalyticsByOrganization";
        } elseif ($stat == "hostname") {
            $statText = "visitorsAnalyticsByHostName";
        } elseif ($stat == "referrer") {
            $statText = "visitorsAnalyticsByReachWay";
        } elseif ($stat == "resolution") {
            $statText = "visitorsAnalyticsByScreenResolution";
        } elseif ($stat == "browser") {
            $statText = "visitorsAnalyticsByBrowser";
        } elseif ($stat == "os") {
            $statText = "visitorsAnalyticsByOperatingSystem";
        } elseif ($stat == "country") {
            $statText = "visitorsAnalyticsByCountry";
        } elseif ($stat == "city") {
            $statText = "visitorsAnalyticsByCity";
        } else {
            $statText = "visitorsAnalyticsBydate";
        }


        return view("backEnd.analytics",
            compact("GeneralWebmasterSections", "daterangepicker_start", "daterangepicker_end",
                "daterangepicker_start_text", "daterangepicker_end_text", "min_visitor_date", "max_visitor_date",
                "stat", "AnalyticsVisitors", "TotalVisitors", "TotalPages", "statText", "AnalyticsValues"));

    }

    public function tracking($stat='date'){

        $analyticsVars = array("date", "country", "city", "os", "browser", "referrer", "hostname", "org");
        if (!in_array($stat, $analyticsVars)) {
            return redirect()->action('AnalyticsController@index');
        }

        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();



        $daterangepicker_start = date('Y-m-d', strtotime('-29 day'));
        $daterangepicker_end = date('Y-m-d');
        $daterangepicker_start_text = date("F d , Y", strtotime($daterangepicker_start));
        $daterangepicker_end_text = date("F d , Y", strtotime($daterangepicker_end));
        $min_visitor_date = date('d-m-Y', strtotime('-29 day'));



        $AnalyticsValues = array();



        $ix = 0;

        if ($stat == "date") {

        } else {
            usort($AnalyticsValues, function ($a, $b) {
                return $b['visits'] - $a['visits'];
            });
        }





        if ($stat == "org") {
            $statText = "visitorsAnalyticsByOrganization";
        } elseif ($stat == "hostname") {
            $statText = "visitorsAnalyticsByHostName";
        } elseif ($stat == "referrer") {
            $statText = "visitorsAnalyticsByReachWay";
        } elseif ($stat == "resolution") {
            $statText = "visitorsAnalyticsByScreenResolution";
        } elseif ($stat == "browser") {
            $statText = "visitorsAnalyticsByBrowser";
        } elseif ($stat == "os") {
            $statText = "visitorsAnalyticsByOperatingSystem";
        } elseif ($stat == "country") {
            $statText = "visitorsAnalyticsByCountry";
        } elseif ($stat == "city") {
            $statText = "visitorsAnalyticsByCity";
        } else {
            $statText = "visitorsAnalyticsBydate";
        }


        return view("backEnd.tracking",
            compact("GeneralWebmasterSections", "daterangepicker_start", "daterangepicker_end",
                "daterangepicker_start_text", "daterangepicker_end_text", "min_visitor_date", "max_visitor_date",
                "stat", "AnalyticsVisitors", "TotalVisitors", "TotalPages", "statText", "AnalyticsValues"));
    }















}
