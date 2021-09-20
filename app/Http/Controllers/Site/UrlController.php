<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Url;
use App\Http\Middleware\GetHttpStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('site.url.index', [
            'urls' => Url::where('user_id', '=', $id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, GetHttpStatus $get_status, $id)
    {
        $urls = Url::all();
        $status = '';

        foreach ($urls as $url) {
            $status = $get_status->getHTTPResponseStatusCode($url['url']);

            $code_status = explode(" ", $status);

            if($status == null) {
                $code_status[0] = '500';
                $code_status[1] = 'Server Error';
            }

            DB::table('urls')->where('id', $url['id'])->update(['status' => $code_status[0], 'body_request' => $code_status[1]]);
        }

        return Url::where('user_id', '=', $id)->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view(view: 'site.url.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
