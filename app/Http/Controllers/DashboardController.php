<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Record;
use App\Models\RequestRecord;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\RequestRecordUpdated;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $requests = RequestRecord::with('employee')
                ->where('status', 0)
                ->get();

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
                "otherTypeTodayCount" => $otherTypeTodayCount,
                "requests" => $requests
            ]);
        } catch (\Throwable $th) {
            return "TROUBLE... " . $th;
        }
    }

    public function approveRecordShow($id)
    {
        $req = RequestRecord::with('employee')->findOrFail($id);
        return view('layouts._approve', compact('req'));
    }

    public function declineRecordShow($id)
    {
        $req = RequestRecord::with('employee')->findOrFail($id);
        return view('layouts._decline', compact('req'));
    }

    public function updateRequestRecord(Request $request, $id)
    {
        try {
            $req = RequestRecord::findOrFail($id);

            $validatedData = $request->validate([
                'date' => 'nullable|date',
                'disease' => 'nullable|string|max:255',
                'notes' => 'nullable|string',
            ]);

            $req->update([
                'date' => $validatedData['date'] ?? $req->date,
                'disease' => $validatedData['disease'] ?? $req->disease,
                'notes' => $validatedData['notes'] ?? $req->notes,
                'status' => 'Approve',
            ]);

            Mail::to($req->employee->email)->send(new RequestRecordUpdated($req));

            return redirect()->route('dashboard')
                ->with('success', 'Request Record updated successfully and email sent to employee.');
        } catch (\Exception $e) {
            // Handle error
            return redirect()->route('dashboard')
                ->with('error', 'An error occurred while updating the record: ' . $e->getMessage());
        }
    }

    public function updateRequestRecordDECLINE(Request $request, $id)
    {
        try {
            $req = RequestRecord::findOrFail($id);

            $validatedData = $request->validate([
                'notes' => 'nullable|string',
            ]);

            $req->update([
                'disease' => '',
                'notes' => $validatedData['notes'] ?? $req->notes,
                'status' => 'Decline',
            ]);

            Mail::to($req->employee->email)->send(new RequestRecordUpdated($req));

            return redirect()->route('dashboard')
                ->with('success', 'Request Record updated successfully and email sent to employee.');
        } catch (\Exception $e) {
            // Handle error
            return redirect()->route('dashboard')
                ->with('error', 'An error occurred while updating the record: ' . $e->getMessage());
        }
    }
}
