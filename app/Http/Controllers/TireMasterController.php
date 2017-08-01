<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\tiremaster;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class TireMasterController extends Controller
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
        $tiremaster = tiremaster::all();
        return view('tiremaster.main',compact('tiremaster'));
    }

    public function create()
    {
        return view('tiremaster.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
                            'name'=>'required'
                    ]);

        $input = input::all();

        $tiremaster = new tiremaster;
        $tiremaster->name = $input['name'];

        $tiremaster->save();

        $request->session()->flash('alert-success','Data berhasil disimpan!');
        return redirect()->action('tiremasterController@index');
    }

    public function edit($id)
    {
        $tiremaster = tiremaster::where('id',$id)->first();
        return view('tiremaster.edit',compact('tiremaster'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
                            'name'=>'required'
                    ]);

        $input = $request->all();
        tiremaster::find($id)->update($input);

        $request->session()->flash('alert-success','Data berhasil diubah!');
        return redirect()->action('tiremasterController@index');
    }

    public function destroy(Request $request, $id)
    {
        $tiremaster = tiremaster::find($id);
        $tiremaster->delete();

        $request->session()->flash('alert-success','Data berhasil dihapus!');
        return redirect()->action('tiremasterController@index');
    }

    public function show($id)
    {
        $tiremaster = tiremaster::where('id',$id)->first();
        return view('tiremaster.show',compact('tiremaster'));
    }
}