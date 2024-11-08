<?php

namespace App\Http\Controllers;

use App\Models\Assurance;
use App\Models\Employee;
use App\Models\Record;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function client()
    {
        try {
            $employees = Employee::all();
            return view("client", ["employees" => $employees]);
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
            // Azra Hudaya Insurance is available until 6 Desember 2024
        } catch (\Exception $e) {
            // If employee not found or other errors
            return response()->json([
                'status' => 'error',
                'message' => 'Employee not found or error retrieving assurances.',
            ], 404);
        }
    }
}
