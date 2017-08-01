<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\tiretype;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class TireTypeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $tiretype = tiretype::all();
        return view('tiretype.main',compact('tiretype'));
    }

    public function create()
    {
        return view('tiretype.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
                            'name'=>'required'
                    ]);

        $input = input::all();

        $tiretype = new tiretype;
        $tiretype->name = $input['name'];

        $tiretype->save();

        $request->session()->flash('alert-success','Data berhasil disimpan!');
        return redirect()->action('TireTypeController@index');
    }

    public function edit($id)
    {
        $tiretype = tiretype::where('id',$id)->first();
        return view('tiretype.edit',compact('tiretype'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
                            'name'=>'required','code'=>'required','pattern'=>'required','diff'=>'required|numeric|'
                    ]);

        $input = $request->all();
        tiretype::find($id)->update($input);

        $request->session()->flash('alert-success','Data berhasil diubah!');
        return redirect()->action('tiretypeController@index');
    }

    public function destroy(Request $request, $id)
    {
        $tiretype = tiretype::find($id);
        $tiretype->delete();

        $request->session()->flash('alert-success','Data berhasil dihapus!');
        return redirect()->action('tiretypeController@index');
    }

    public function show($id)
    {
        $tiretype = tiretype::where('id',$id)->first();
        return view('tiretype.show',compact('tiretype'));
    }

    public function api()
    {
        return Datatables::of(tiretype::query())->make(true);
    }
}