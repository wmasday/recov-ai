<?php

namespace App\Http\Controllers;

use App\Models\Assurance;
use App\Models\Employee;
use App\Models\Record;
use App\Models\RequestRecord;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function client()
    {
        try {
            $requests = RequestRecord::with('employee')
                ->where('status', 0)
                ->get();

            $employees = Employee::all();
            return view("client", ["employees" => $employees, "requests" => $requests]);
        } catch (\Throwable $th) {
            return "TROUBLE..." . $th;
        }
    }

    public function search(Request $request)
    {
        $query = $request->get('search');

        $employees = Employee::where('fullname', 'LIKE', "%{$query}%")
            ->orWhere('identify', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->get();

        return response()->json(view('_client_rows', compact('employees'))->render());
    }

    public function assuranceCheck(Request $request, $id)
    {
        try {
            $employee = Employee::find($id);
            $assurance = Assurance::where('employee_id', $id)->first();
            $currentDate = Carbon::now();
            $assurance->available = $currentDate->lt(Carbon::parse($assurance->end));
            $endDate = Carbon::parse($assurance->end);

            return redirect()->route('client')
                ->with('assurance-avaiable', $employee->fullname . ' Insurance is available until ' . $endDate->format('d F Y'));
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Employee not found or error retrieving assurances.',
            ], 404);
        }
    }

    public function requestRecord(Request $request, $id)
    {
        try {
            $employee = Employee::findOrFail($id);


            $RequestRecord = new RequestRecord();
            $RequestRecord->employee_id = $id;
            $RequestRecord->date = now();
            $RequestRecord->disease = null;
            $RequestRecord->notes = null;
            $RequestRecord->status = false;
            $RequestRecord->save();

            return redirect()->route('client')
                ->with('request-record-success', 'Your request medical record has beed delivered to Manager, please check your email ' . $employee->email);
        } catch (\Exception $e) {
            return redirect()->route('client') // Or any route you want to redirect to
                ->with('error', 'There was an error creating the assurance record.');
        }
    }

    public function allRequestRecord()
    {
        $requests = RequestRecord::with('employee')->get();
    }
}
