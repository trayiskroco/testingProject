<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\PartUnit;
class MspartunitController extends Controller
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
        $PartUnit = PartUnit::all();
        return view('partunit.main',compact('partunit'));
    }

    public function create()
    {
        return view('tiresize.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
                            'name'=>'required'
                    ]);

        $input = input::all();

        $tiresize = new tiresize;
        $tiresize->name = $input['name'];

        $tiresize->save();

        $request->session()->flash('alert-success','Data berhasil disimpan!');
        return redirect()->action('TireSizeController@index');
    }

    public function edit($id)
    {
        $tiresize = tiresize::where('id',$id)->first();
        return view('tiresize.edit',compact('tiresize'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
                            'name'=>'required'
                    ]);

        $input = $request->all();
        tiresize::find($id)->update($input);

        $request->session()->flash('alert-success','Data berhasil diubah!');
        return redirect()->action('TireSizeController@index');
    }

    public function destroy(Request $request, $id)
    {
        $tiresize = tiresize::find($id);
        $tiresize->delete();

        $request->session()->flash('alert-success','Data berhasil dihapus!');
        return redirect()->action('TireSizeController@index');
    }

    public function show($id)
    {
        $tiresize = tiresize::where('id',$id)->first();
        return view('tiresize.show',compact('tiresize'));
    }
}
