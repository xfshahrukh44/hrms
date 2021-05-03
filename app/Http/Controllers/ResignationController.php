<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Mail\ResignationSend;
use App\Resignation;
use App\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ResignationController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Resignation'))
        {
            if(Auth::user()->type == 'employee')
            {
                $emp          = Employee::where('user_id', '=', \Auth::user()->id)->first();
                $resignations = Resignation::where('created_by', '=', \Auth::user()->creatorId())->where('employee_id', '=', $emp->id)->get();
            }
            else
            {
                $resignations = Resignation::where('created_by', '=', \Auth::user()->creatorId())->get();
            }

            return view('resignation.index', compact('resignations'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(\Auth::user()->can('Create Resignation'))
        {
            $employees = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

            return view('resignation.create', compact('employees'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Resignation'))
        {

            $validator = \Validator::make(
                $request->all(), [
                                   'employee_id' => 'required',
                                   'notice_date' => 'required',
                                   'resignation_date' => 'required',
                               ]
            );

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $resignation                   = new Resignation();
            $resignation->employee_id      = $request->employee_id;
            $resignation->notice_date      = $request->notice_date;
            $resignation->resignation_date = $request->resignation_date;
            $resignation->description      = $request->description;
            $resignation->created_by       = \Auth::user()->creatorId();
            $resignation->save();

            $setings = Utility::settings();
            if($setings['employee_resignation'] == 1)
            {
                $employee           = Employee::find($resignation->employee_id);
                $resignation->name  = $employee->name;
                $resignation->email = $employee->email;
                try
                {
                    Mail::to($resignation->email)->send(new ResignationSend($resignation));
                }
                catch(\Exception $e)
                {
                    $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
                }

                return redirect()->route('resignation.index')->with('success', __('Resignation  successfully created.') . (isset($smtp_error) ? $smtp_error : ''));


            }

            return redirect()->route('resignation.index')->with('success', __('Resignation  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Resignation $resignation)
    {
        return redirect()->route('resignation.index');
    }

    public function edit(Resignation $resignation)
    {
        if(\Auth::user()->can('Edit Resignation'))
        {
            $employees = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            if($resignation->created_by == \Auth::user()->creatorId())
            {

                return view('resignation.edit', compact('resignation', 'employees'));
            }
            else
            {
                return response()->json(['error' => __('Permission denied.')], 401);
            }
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function update(Request $request, Resignation $resignation)
    {
        if(\Auth::user()->can('Edit Resignation'))
        {
            if($resignation->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'employee_id' => 'required',
                                       'notice_date' => 'required',
                                       'resignation_date' => 'required',
                                   ]
                );

                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }
                $resignation->employee_id      = $request->employee_id;
                $resignation->notice_date      = $request->notice_date;
                $resignation->resignation_date = $request->resignation_date;
                $resignation->description      = $request->description;
                $resignation->save();

                return redirect()->route('resignation.index')->with('success', __('Resignation successfully updated.'));
            }
            else
            {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function destroy(Resignation $resignation)
    {
        if(\Auth::user()->can('Delete Resignation'))
        {
            if($resignation->created_by == \Auth::user()->creatorId())
            {
                $resignation->delete();

                return redirect()->route('resignation.index')->with('success', __('Resignation successfully deleted.'));
            }
            else
            {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
