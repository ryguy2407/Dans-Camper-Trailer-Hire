<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\HolidayRequest;
use App\Holiday;

class HolidaysController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $holidays = Holiday::paginate(10);
        return view('holidays.index')->with('holidays', $holidays);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('holidays.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param HolidayRequest|Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(HolidayRequest $request)
    {
        Holiday::create($request->except('_token'));
        return redirect()->back()->with('success', 'Holidays Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $holiday = Holiday::find($id);
        return view('holidays.edit')->with('holiday', $holiday);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param HolidayRequest|Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(HolidayRequest $request, $id)
    {
        $holiday = Holiday::find($id);
        $holiday->update($request->all());
        $holiday->save();
        return response()->json($holiday);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $holiday = Holiday::find($id);
        $holiday->delete();
    }
}
