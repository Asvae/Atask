<?php namespace Laravel_test\Http\Controllers;

use Laravel_test\Http\Requests;
use Laravel_test\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

    public function about()
    {
        $data['name'] = "Asva";
        $data['second_name'] = "Lentevi";
        $data['additional_info'] = DB::select('select * from users where id = ?', [1]);

        return view('pages.about', $data);
    }

    public function contact()
    {
        return(view('pages.contact'));
    }
}
