<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\WorkingExperience;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('workingExperiences')
            ->orderBy('id', 'desc')
            ->paginate(5);
        return view('employees/index', compact('employees'));
    }

    public function create()
    {
        return view('employees/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'father_name' => 'required',
            'nrc' => 'required',
            'day_of_birth' => 'required',
            'phone' => 'required',
            'image' => 'required',
            'image.*' => 'required|mimes:png,jpg,jpeg,svg',
            'gender' => 'required',
            'nationality' => 'required',
            'religion' => 'required',
            'email' => 'required|email|unique:employees',
        ]);

        $file = $request->file('image');
        $fileName = time() . $file->getClientOriginalName();
        $file->move(public_path('employees'), $fileName);
        $employee = Employee::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'father_name' => $request->input('father_name'),
            'nrc' => $request->input('nrc'),
            'day_of_birth' => $request->input('day_of_birth'),
            'phone' => $request->input('phone'),
            'image' => $fileName,
            'gender' => $request->input('gender'),
            'nationality' => $request->input('nationality'),
            'religion' => $request->input('religion'),
            'email' => $request->input('email'),
            'apply_position' => $request->input('apply_position'),
            'address' => $request->input('address'),
            'spouse_name' => $request->input('spouse_name'),
            'expected_salary' => $request->input('expected_salary'),
            'other_qualification' => $request->input('other_qualification'),
            'marital_status' => $request->input('marital_status'),
        ]);

        for ($i = 0; $i < count($request->company_name); $i++) {
            WorkingExperience::create([
                'employee_id' => $employee->id,
                'company_name' => $request->company_name[$i],
                'job_title' => $request->job_title[$i],
                'start_date' => $request->start_date[$i],
                'end_date' => $request->end_date[$i],
                'department' => $request->department[$i],
                'project_link' => $request->project_link[$i],
            ]);
        }
        return redirect()->route('index')->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        if (!$employee) {
            return redirect()->route('index')->with('error', 'Employee not found');
        }
        $employee->load('workingExperiences');
        return view('employees.show', compact('employee'));
    }



    public function edit(Employee $employee)
    {
        if (!$employee) {
            return redirect()->route('index')->with('error', 'Employee not found');
        }
        $employee->load('workingExperiences');
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        // return $request->input('experience_id');
        $dayOfBirth = Carbon::createFromFormat('d M Y', $request->input('day_of_birth'))->format('Y-m-d');
        $maritalStatus = ($request->input('marital_status') === 'Yes') ? 1 : 0;
        $employee->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'father_name' => $request->input('father_name'),
            'nrc' => $request->input('nrc'),
            'day_of_birth' => $dayOfBirth,
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'nationality' => $request->input('nationality'),
            'religion' => $request->input('religion'),
            'email' => $request->input('email'),
            'apply_position' => $request->input('apply_position'),
            'address' => $request->input('address'),
            'spouse_name' => $request->input('spouse_name'),
            'expected_salary' => $request->input('expected_salary'),
            'other_qualification' => $request->input('other_qualification'),
            'marital_status' => $maritalStatus,
        ]);
        for ($i = 0; $i < count($request->company_name); $i++) {
            WorkingExperience::updateOrCreate(
                ['id' => $request->input('experience_id')],
                [
                    'employee_id' => $employee->id,
                    'company_name' => $request->company_name[$i],
                    'job_title' => $request->job_title[$i],
                    'start_date' => Carbon::createFromFormat('d M Y', $request->start_date[$i])->format('Y-m-d'),
                    'end_date' => Carbon::createFromFormat('d M Y', $request->end_date[$i])->format('Y-m-d'),
                    'department' => $request->department[$i],
                    'project_link' => $request->project_link[$i],
                ]
            );
        }

        return redirect()->route('index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        $employee->workingExperiences()->delete();
        return redirect()->route('index')
            ->with('success', 'Employee deleted successfully');
    }
}