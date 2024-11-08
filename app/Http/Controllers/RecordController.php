<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Record;
use App\Models\RequestRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $records = Record::with('employee')->get();
            $requests = RequestRecord::with('employee')
                ->where('status', 0)
                ->get();
            return view("records.index", ["records" => $records, 'requests' => $requests]);
        } catch (\Throwable $th) {
            return "TROUBLE..." . $th;
        }
    }

    public function filter(Request $request)
    {
        try {
            $query = Record::query();

            if ($request->date) {
                $query->whereDate('date', $request->date);
            }

            if ($request->type) {
                $query->where('type', $request->type);
            }

            $records = $query->with('employee')->get();

            return response()->json(['records' => $records]);
        } catch (\Throwable $th) {
            return "TROUBLE..." . $th;
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|string|max:255',
            'date' => 'required|date',
            'capture' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'description' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $captureImagePath = null;
        if ($request->hasFile('capture')) {
            $captureImage = $request->file('capture');
            $filename = uniqid('capture_', true) . '.png';
            $captureImagePath = $captureImage->storeAs('captures', $filename, 'public');
        }

        $record = Record::create([
            'type' => $request->type,
            'date' => $request->date,
            'capture' => $captureImagePath,
            'description' => $request->description
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Record created successfully',
            'data' => $record,
        ], 201);
    }

    public function show(string $id)
    {
        try {
            $employees = Employee::limit(3)->get();
            $record = Record::with('employee')->find($id);
            $requests = RequestRecord::with('employee')
                ->where('status', 0)
                ->get();
            return view("records.show", ["record" => $record, "employees" => $employees, "requests" => $requests]);
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

        return response()->json(view('records._record_rows', compact('employees'))->render());
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required|exists:employees,id',
            'description' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('error', 'Failed update record.');
        }

        $record = Record::find($id);
        $record->employee_id = $request->employee_id;
        $record->description = $request->description;
        $record->save();

        return redirect()->back()
            ->with('success-update-record', 'Record data successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        try {
            $record = Record::find($id);
            if ($record->delete()) {
                return redirect()->route('records.index')
                    ->with('success-delete-record', 'Record deleted successfully.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Failed delete record.');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with('error', 'Failed delete record.');
        }
    }
}
