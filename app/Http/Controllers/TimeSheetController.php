<?php

namespace App\Http\Controllers;

use App\TimeSheet;
use App\User;
use App\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimeSheetController extends Controller
{

    public function index()
    {
        if(\Auth::user()->can('Manage TimeSheet'))
        {
            if(\Auth::user()->type == 'employee')
            {
                $timeSheets = TimeSheet::where('employee_id', \Auth::user()->id)->get();
            }
            else
            {
                $timeSheets = TimeSheet::where('created_by', \Auth::user()->creatorId())->get();
            }

            return view('timeSheet.index', compact('timeSheets'));
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function create()
    {

        if(\Auth::user()->can('Create TimeSheet'))
        {
            $employees = User::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', "employee")->get()->pluck('name', 'id');
            $shifts = Shift::all()->pluck('title', 'id');

            return view('timeSheet.create', compact('employees', 'shifts'));
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('Create TimeSheet'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                //    'employee_id' => 'required|unique:time_sheets',
                                'date_to' => 'after_or_equal:date',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            // redundant timesheet check
            $redundant_results = TimeSheet::where('employee_id', $request['employee_id'])
                                            ->where(function($q) use($request){
                                                $q->orWhere(function($q) use($request){
                                                    $q->whereDate('date', '<=', $request['date']);
                                                    $q->whereDate('date_to', '>=', $request['date']);
                                                });
                                                $q->orWhere(function($q) use($request){
                                                    $q->whereDate('date', '<=', $request['date_to']);
                                                    $q->whereDate('date_to', '>=', $request['date_to']);
                                                });
                                            })
                                            ->get();
            if(count($redundant_results) > 0){
                return redirect()->back()->with('error', 'This employee has already been assigned a timesheet in the duration specified.');
            }
                                            

            $timeSheet = new Timesheet();
            if(\Auth::user()->type == 'employee')
            {
                $timeSheet->employee_id = \Auth::user()->id;
            }
            else
            {
                $timeSheet->employee_id = $request->employee_id;
            }

            $timeSheet->shift_id   = $request->shift_id;
            $timeSheet->date       = $request->date;
            $timeSheet->date_to       = $request->date_to;
            $timeSheet->hours      = $request->hours;
            $timeSheet->remark     = $request->remark;
            $timeSheet->created_by = \Auth::user()->creatorId();
            $timeSheet->save();

            return redirect()->route('timesheet.index')->with('success', __('Timesheet successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }

    }

    public function show(TimeSheet $timeSheet)
    {
        //
    }

    public function edit(TimeSheet $timeSheet, $id)
    {

        if(\Auth::user()->can('Edit TimeSheet'))
        {
            $employees = User::where('created_by', '=', Auth::user()->creatorId())->where('type', '=', "employee")->get()->pluck('name', 'id');
            $shifts = Shift::all()->pluck('title', 'id');
            $timeSheet = Timesheet::find($id);

            return view('timeSheet.edit', compact('timeSheet', 'employees', 'shifts'));
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function update(Request $request, $id)
    {
        if(\Auth::user()->can('Edit TimeSheet'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                //    'employee_id' => 'required|unique:time_sheets,employee_id,'.$id,
                                'date_to' => 'after_or_equal:date',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            // redundant timesheet check
            $redundant_results = TimeSheet::where('id', '!=', $id)
                                            ->where('employee_id', $request['employee_id'])
                                            ->where(function($q) use($request){
                                                $q->orWhere(function($q) use($request){
                                                    $q->whereDate('date', '<=', $request['date']);
                                                    $q->whereDate('date_to', '>=', $request['date']);
                                                });
                                                $q->orWhere(function($q) use($request){
                                                    $q->whereDate('date', '<=', $request['date_to']);
                                                    $q->whereDate('date_to', '>=', $request['date_to']);
                                                });
                                            })
                                            ->get();
            if(count($redundant_results) > 0){
                return redirect()->back()->with('error', 'This employee has already been assigned a timesheet in the duration specified.');
            }

            $timeSheet = Timesheet::find($id);
            if(\Auth::user()->type == 'employee')
            {
                $timeSheet->employee_id = \Auth::user()->id;
            }
            else
            {
                $timeSheet->employee_id = $request->employee_id;
            }

            $timeSheet->shift_id   = $request->shift_id;
            $timeSheet->date   = $request->date;
            $timeSheet->date_to   = $request->date_to;
            $timeSheet->hours  = $request->hours;
            $timeSheet->remark = $request->remark;
            $timeSheet->save();

            return redirect()->route('timesheet.index')->with('success', __('TimeSheet successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function destroy($id)
    {
        if(\Auth::user()->can('Delete TimeSheet'))
        {
            $timeSheet = Timesheet::find($id);
            $timeSheet->delete();

            return redirect()->route('timesheet.index')->with('success', __('TimeSheet successfully deleted.'));
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }
}
