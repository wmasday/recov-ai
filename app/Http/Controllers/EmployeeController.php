<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $employees = Employee::all();
            return view("employee.index", ["employees" => $employees]);
        } catch (\Throwable $th) {
            return "TROUBLE..." . $th;
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'identify' => 'required|unique:employees,identify|max:255',
                'fullname' => 'string|max:255',
                'email' => 'required|email|unique:employees,email|max:255',
                'profile' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            ], [
                'email.unique' => 'The email has already been taken.',
                'identify.unique' => 'The employee ID is already registered.',
                'profile.mimes' => 'Profile picture not allowed.',
                'profile.max' => 'Profile picture max 2 mb.',
            ]);

            $profileImagePath = null;
            if ($request->hasFile('profile')) {
                $profileImage = $request->file('profile');
                $filename = uniqid('profile_', true) . '.png';
                $profileImagePath = $profileImage->storeAs('profiles', $filename, 'public');
            }
            Employee::create([
                'identify' => $request->identify,
                'fullname' => $request->fullname,
                'email' => $request->email,
                'profile' => $profileImagePath,
            ]);

            return redirect()->route('employee.index')
                ->with('success-add-employee', $request->fullname . ' added as an employee');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function show(Request $request, $id)
    {
        try {
            $employee = Employee::findOrFail($id);
            return response()->json($employee);
        } catch (\Throwable $th) {
            return "TROUBLE..." . $th;
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'identify' => 'required|unique:employees,identify,' . $id . '|max:255',
                'fullname' => 'string|max:255',
                'email' => 'required|email|unique:employees,email,' . $id . '|max:255',
            ], [
                'email.unique' => 'The email has already been taken.',
                'identify.unique' => 'The employee ID is already registered.',
            ]);

            $employee = Employee::findOrFail($id);

            $profileImagePath = $employee->profile;
            if ($request->hasFile('profile')) {
                if ($profileImagePath && file_exists(storage_path('app/public/' . $profileImagePath))) {
                    unlink(storage_path('app/public/' . $profileImagePath));
                }

                $profileImage = $request->file('profile');
                $filename = uniqid('profile_', true) . '.png';
                $profileImagePath = $profileImage->storeAs('profiles', $filename, 'public');
            }

            $employee->update([
                'identify' => $request->identify,
                'fullname' => $request->fullname,
                'email' => $request->email,
                'profile' => $profileImagePath,
            ]);

            return redirect()->route('employee.index')
                ->with('success-update-employee', $request->fullname . ' data successfully edited.');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function search(Request $request)
    {
        $query = $request->get('search');

        $employee = Employee::where('fullname', 'LIKE', "%{$query}%")
            ->orWhere('identify', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->first();

        return response()->json(view('employee._employee_rows', compact('employee'))->render());
    }

    public function destroy(Request $request, $id)
    {
        try {
            $employee = Employee::find($id);
            if ($employee->delete()) {
                return redirect()->route('employee.index')
                    ->with('success-delete-employee', $employee->fullname . ' deleted as an employee');
            } else {
                return redirect()->back()->withInput()->with('error', 'Failed delete employee.');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with('error', 'Failed delete employee.');
        }
    }
}
