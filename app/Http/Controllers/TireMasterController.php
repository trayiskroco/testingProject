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
use App\tiresize;
use App\tiretype;

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
        $tiresize = tiresize::lists('name', 'id');
        $tiretype = tiretype::lists('name', 'id');
        return view('tiremaster.add',['tiretype'=>$tiretype,'tiresize'=>$tiresize]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
                            'code'=>'required'
                    ]);

        $input = input::all();

        $tiremaster = new tiremaster;
        $tiremaster->code = $input['code'];
        $tiremaster->type_id = $input['type_id'];
        $tiremaster->partnumber = $input['partnumber'];
        $tiremaster->size_id = $input['size_id'];
        $tiremaster->brand_id = $input['brand'];
        $tiremaster->km = $input['km'];
        $tiremaster->price = $input['price'];
        $tiremaster->supplier = $input['supplier'];

        $tiremaster->save();

        $request->session()->flash('alert-success','Data berhasil disimpan!');
        return redirect()->action('TireMasterController@index');
    }

    public function edit($id)
    {
        $tiremaster = tiremaster::where('id',$id)->first();
        $tiresize = tiresize::lists('name', 'id');
        $tiretype = tiretype::lists('name', 'id');
        return view('tiremaster.edit',['tiremaster'=>$tiremaster,'tiretype'=>$tiretype,'tiresize'=>$tiresize]);
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