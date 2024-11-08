<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Record;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $records = Record::with('employee')->limit(5)->get();
            $fallCount = Record::where('type', 'Fall')->count();
            $otherTypeCount = Record::where('type', '!=', 'Fall')->count();

            $fallTodayCount = Record::where('type', 'Fall')
                ->whereDate('date', Carbon::today())
                ->count();

            $otherTypeTodayCount = Record::where('type', '!=', 'Fall')
                ->whereDate('date', Carbon::today())
                ->count();

            return view("dashboard", [
                "records" => $records,
                "fallCount" => $fallCount,
                "otherTypeCount" => $otherTypeCount,
                "fallTodayCount" => $fallTodayCount,
                "otherTypeTodayCount" => $otherTypeTodayCount
            ]);
        } catch (\Throwable $th) {
            return "TROUBLE... " . $th;
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
