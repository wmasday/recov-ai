<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Assurance;
use App\Models\RequestRecord;
use Illuminate\Http\Request;

class AssuranceController extends Controller
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

            $employees = Employee::all();
            return view("assurance.index", ["employees" => $employees, 'requests' => $requests]);
        } catch (\Throwable $th) {
            return "TROUBLE..." . $th;
        }
    }

    public function store(Request $request, $id)
    {
        try {
            $request->validate([
                'type' => 'string|max:255',
                'start' => 'required|date',
                'end' => 'required|date',
            ]);

            $data = [
                'type' => $request->input('type'),
                'start' => $request->input('start'),
                'end' => $request->input('end'),
            ];

            Assurance::updateOrCreate(
                ['employee_id' => $id],
                $data
            );

            return redirect()->route('assurance.index')
                ->with('success-manage-assurance', 'Manage data successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function show(Request $request, $id)
    {
        try {
            $employee = Employee::with('assurances')->findOrFail($id);

            return response()->json([
                'status' => 'success',
                'data' => $employee
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Employee not found.'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while retrieving the employee.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function search(Request $request)
    {
        $query = $request->get('search');

        $employee = Employee::where('fullname', 'LIKE', "%{$query}%")
            ->orWhere('identify', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->first();

        return response()->json(view('assurance._assurance_rows', compact('employee'))->render());
    }
}
