<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\WebmasterBanner;
use App\WebmasterSection;
use App\Permissions;
use Auth;
use File;
use Helper;
use Illuminate\Config;
use Illuminate\Http\Request;
use Redirect;
use Carbon\Carbon;

use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;


class EmailFrontController extends Controller
{

    public function __construct()
    {

    }


    public function index()
    {



            $cssToInlineStyles = new CssToInlineStyles();
            $html = \View::make('backend.emails.welcome')->render();
            $css = \View::make('backend.emails.bootstrap')->render();
            $my_css =  "Hi Srinivasa".$cssToInlineStyles->convert($html,$css);

            \Mail::send(array(), array(), function ($message) use ($my_css) {
              $message->to('srini@verzdesign.com')
                ->from('srini@verzdesign.com','Rahul')
                ->subject('Cog Registration sucessfull')
                ->setBody($my_css, 'text/html');
            });

            echo "email sent successfully";


    }


}