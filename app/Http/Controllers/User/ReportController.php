<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Report;

use App\Http\Requests\DailyReportRequest;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $report;

    public function __construct(Report $instanceClass)

    {
        $this->middleware('auth');
        $this->report = $instanceClass;
    }

    public function index(Request $request)
    {
        //
        $month = $request->input('search-month');
        if(isset($month)) {
            $reports = $this->report->searchByMonth(Auth::id(), $month);
        }else{
            $reports = $this->report->getAll(Auth::id());
        }
        return view('user.daily_report.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.daily_report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DailyReportRequest $request)
    {
        //
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $this->report->fill($input)->save();
        return redirect()->to('report');
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
        $report = $this->report->find($id);
        return view('user.daily_report.show', compact('report'));
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
        $report = $this->report->find($id);
        return view('user.daily_report.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DailyReportRequest $request, $id)
    {
        //
        $input = $request->all();
        $this->report->find($id)->fill($input)->save();
        return redirect()->to('report');
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
        $this->report->find($id)->delete();
        return redirect()->to('report');
    }
}
