<?php

namespace App\Http\Controllers;

use App\Plan;
use File;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Plan'))
        {
            $plans = Plan::get();

            return view('plan.index', compact('plans'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function create()
    {
        if(\Auth::user()->can('Create Plan'))
        {
            $arrDuration = Plan::$arrDuration;

            return view('plan.create', compact('arrDuration'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Plan'))
        {
            if(empty(env('STRIPE_KEY')) || empty(env('STRIPE_SECRET')))
            {
                return redirect()->back()->with('error', __('Please set stripe api key & secret key for add new plan.'));
            }
            else
            {

                $validator = \Validator::make(
                    $request->all(), [
                                       'name' => 'required|unique:plans',
                                       'price' => 'required|numeric|min:0',
                                       'duration' => 'required',
                                       'price' => 'required|numeric|min:0',
                                       'max_users' => 'required|numeric',
                                       'max_employees' => 'required|numeric',
                                       'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:20480',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $post = $request->all();

                if($request->hasFile('image'))
                {
                    $filenameWithExt = $request->file('image')->getClientOriginalName();
                    $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension       = $request->file('image')->getClientOriginalExtension();
                    $fileNameToStore = 'plan_' . time() . '.' . $extension;

                    $dir = storage_path('uploads/plan/');
                    if(!file_exists($dir))
                    {

                        mkdir($dir, 0777, true);
                    }
                    $path          = $request->file('image')->storeAs('uploads/plan/', $fileNameToStore);
                    $post['image'] = $fileNameToStore;
                }

                if(Plan::create($post))
                {
                    return redirect()->back()->with('success', __('Plan Successfully created.'));
                }
                else
                {
                    return redirect()->back()->with('error', __('Something is wrong.'));
                }
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

    }


    public function edit($plan_id)
    {
        if(\Auth::user()->can('Edit Plan'))
        {
            $arrDuration = Plan::$arrDuration;
            $plan        = Plan::find($plan_id);

            return view('plan.edit', compact('plan', 'arrDuration'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function update(Request $request, $plan_id)
    {

        if(\Auth::user()->can('Edit Plan'))
        {
            if(empty(env('STRIPE_KEY')) || empty(env('STRIPE_SECRET')))
            {
                return redirect()->back()->with('error', __('Please set stripe api key & secret key for add new plan.'));
            }
            else
            {
                $plan = Plan::find($plan_id);
                if(!empty($plan))
                {
                    $validator = \Validator::make(
                        $request->all(), [
                                           'name' => 'required|unique:plans,name,' . $plan_id,
                                           'duration' => 'required',
                                           'max_users' => 'required|numeric',
                                           'max_employees' => 'required|numeric',
                                           'image' => 'image|mimes:jpeg,png,jpg,svg|max:3072',
                                       ]
                    );
                    if($validator->fails())
                    {
                        $messages = $validator->getMessageBag();

                        return redirect()->back()->with('error', $messages->first());
                    }

                    $post = $request->all();

                    if($request->hasFile('image'))
                    {
                        $filenameWithExt = $request->file('image')->getClientOriginalName();
                        $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                        $extension       = $request->file('image')->getClientOriginalExtension();
                        $fileNameToStore = 'plan_' . time() . '.' . $extension;

                        $dir = storage_path('uploads/plan/');
                        if(!file_exists($dir))
                        {
                            mkdir($dir, 0777, true);
                        }

                        $image_path = $dir . '/' . $plan->image;  // Value is not URL but directory file path

                        if(File::exists($image_path))
                        {

                            chmod($image_path, 0755);
                            File::delete($image_path);
                        }
                        $path = $request->file('image')->storeAs('uploads/plan/', $fileNameToStore);

                        $post['image'] = $fileNameToStore;
                    }

                    if($plan->update($post))
                    {
                        return redirect()->back()->with('success', __('Plan successfully updated.'));
                    }
                    else
                    {
                        return redirect()->back()->with('error', __('Something is wrong.'));
                    }
                }
                else
                {
                    return redirect()->back()->with('error', __('Plan not found.'));
                }
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

    }


    public function userPlan(Request $request)
    {
        if(\Auth::user()->can('Buy Plan'))
        {
            $objUser = \Auth::user();
            $planID  = \Illuminate\Support\Facades\Crypt::decrypt($request->code);
            $plan    = Plan::find($planID);
            if($plan)
            {
                if($plan->price <= 0)
                {
                    $objUser->assignPlan($plan->id);

                    return redirect()->route('plans.index')->with('success', __('Plan successfully activated.'));
                }
                else
                {
                    return redirect()->back()->with('error', __('Something is wrong.'));
                }
            }
            else
            {
                return redirect()->back()->with('error', __('Plan not found.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
