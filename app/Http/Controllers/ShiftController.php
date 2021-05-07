<?php

namespace App\Http\Controllers;

use App\Shift;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ShiftController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Shifts'))
        {
            if(\Auth::user()->type == 'employee')
            {
                $shifts = Shift::where('user_id', \Auth::user()->id)->get();
            }
            else
            {
                $shifts = Shift::all();
            }

            return view('shift.index', compact('shifts'));
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function create()
    {
        if(\Auth::user()->can('Create Shift'))
        {
            return view('shift.create');
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function store(Request $request)
    {
        // dd($request->all());
        if(\Auth::user()->can('Create Shift'))
        {
            $shift = New Shift();
            $shift->title     = $request->title;
            $shift->start_time       = Carbon::parse($request->start_time);
            $shift->end_time      = Carbon::parse($request->end_time);
            $shift->save();

            return redirect()->route('shift.index')->with('success', __('Shift successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        if(\Auth::user()->can('Edit Shift'))
        {
            $shift = Shift::find($id);

            return view('shift.edit', compact('shift'));
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }
    
    public function update(Request $request, $id)
    {
        if(\Auth::user()->can('Edit Shift'))
        {
            $shift = Shift::find($id);

            $shift->title   = $request->title;
            $shift->start_time  = $request->start_time;
            $shift->end_time = $request->end_time;
            $shift->save();

            return redirect()->route('shift.index')->with('success', __('Shift successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }
    
    public function destroy($id)
    {
        if(\Auth::user()->can('Delete Shift'))
        {
            $shift = Shift::find($id);
            $shift->delete();

            return redirect()->route('shift.index')->with('success', __('Shift successfully deleted.'));
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }
}
