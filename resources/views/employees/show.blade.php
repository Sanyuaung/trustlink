@extends('layouts.layout')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <a type="button" href="{{ route('index') }}" class="rounded-lg px-4 py-2 bg-blue-500 text-white">Back</a>
        <form>
            @csrf
            <div class="mt-5 mb-4">
                <h2 class="text-xl font-semibold">Detail Employee Information</h2>

                <div class="flex flex-col justify-center items-center mt-5">
                    <span class="block text-center py-4 text-gray-500">Photo</span>
                    <div class="relative w-32 h-32 bg-gray-200 rounded-lg border border-dashed border-gray-500">
                        <img class="h-32 w-32 rounded-lg" src="{{ asset('employees/' . $employee->image) }}"
                            alt="Employee Photo">
                    </div>
                </div>

                <div class="flex flex-col justify-center items-center mt-5 grid grid-cols-2 gap-4">
                    <div class="w-full">
                        <label for="first_name" class="block text-gray-500 font-semibold text-sm">First Name</label>
                        <input type="text" id="first_name" name="first_name" value="{{ $employee->first_name }}" readonly
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="w-full">
                        <label for="last_name" class="block text-gray-500 font-semibold text-sm">Last Name</label>
                        <input type="text" name="last_name" value="{{ $employee->last_name }}" readonly
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center mt-5 grid grid-cols-2 gap-4">
                    <div class="w-full">
                        <label for="father_name" class="block text-gray-500 font-semibold text-sm">Father Name</label>
                        <input type="text" id="father_name" name="father_name" value="{{ $employee->father_name }}"
                            readonly
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="w-full">
                        <label for="email" class="block text-gray-500 font-semibold text-sm">Email</label>
                        <input type="text" name="email" value="{{ $employee->email }}" readonly
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center mt-5 grid grid-cols-2 gap-4">
                    <div class="w-full">
                        <label for="apply_position" class="block text-gray-500 font-semibold text-sm">Apply Position</label>
                        <input type="text" id="apply_position" name="apply_position"
                            value="{{ $employee->apply_position }}" readonly
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="w-full">
                        <label for="day_of_birth" class="block text-gray-500 font-semibold text-sm">Day Of Birth</label>
                        <input type="text" id="day_of_birth" name="day_of_birth"
                            value="{{ Carbon\Carbon::parse($employee->day_of_birth)->format('d M Y') }}" readonly
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center mt-5 grid grid-cols-2 gap-4">
                    <div class="w-full">
                        <label for="address" class="block text-gray-500 font-semibold text-sm">Address</label>
                        <input type="text" id="address" name="address" value="{{ $employee->address }}" readonly
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="w-full">
                        <label for="phone" class="block text-gray-500 font-semibold text-sm">Phone Number</label>
                        <input type="text" name="phone" value="{{ $employee->phone }}" readonly
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center mt-5 grid grid-cols-2 gap-4">
                    <div class="w-full">
                        <label for="gender" class="block text-gray-500 font-semibold text-sm">Gender</label>
                        <input type="text" id="gender" name="gender" value="{{ $employee->gender }}" readonly
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="w-full">
                        <label for="nationality" class="block text-gray-500 font-semibold text-sm">Nationality</label>
                        <input type="text" name="nationality" value="{{ $employee->nationality }}" readonly
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center mt-5 grid grid-cols-2 gap-4">
                    <div class="w-full">
                        <label for="religion" class="block text-gray-500 font-semibold text-sm">Religion</label>
                        <input type="text" id="religion" name="religion" value="{{ $employee->religion }}" readonly
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="w-full">
                        <label for="marital_status" class="block text-gray-500 font-semibold text-sm">Marital
                            Status</label>
                        <input type="text" name="marital_status"
                            value="{{ $employee->marital_status == 1 ? 'Yes' : 'No' }}" readonly
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center mt-5 grid grid-cols-2 gap-4">
                    <div class="w-full">
                        <label for="spouse_name" class="block text-gray-500 font-semibold text-sm">Spouse Name</label>
                        <input type="text" id="spouse_name" name="spouse_name" value="{{ $employee->spouse_name }}"
                            readonly
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="w-full">
                        <label for="expected_salary" class="block text-gray-500 font-semibold text-sm">Expected
                            Salary</label>
                        <input type="text" name="expected_salary"
                            value="{{ number_format($employee->expected_salary, 3) }}" readonly
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center mt-5 grid grid-cols-2 gap-4">
                    <div class="w-full">
                        <label for="other_qualification" class="block text-gray-500 font-semibold text-sm">Other
                            Qualification</label>
                        <input type="text" id="other_qualification" name="other_qualification"
                            value="{{ $employee->other_qualification }}" readonly
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="w-full">
                        <label for="nrc" class="block text-gray-500 font-semibold text-sm">NRC</label>
                        <input type="text" name="nrc"
                            value="{{ $employee->nrc }}" readonly
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                </div>

            </div>

            <div class="mb-4">
                <h2 class="text-xl font-semibold">Working Experience</h2>
                @for ($i = 0; $i < count($employee->workingExperiences); $i++)
                    <div class="flex flex-col justify-center items-center mt-5 grid grid-cols-2 gap-4">
                        <div class="w-full">
                            <label for="company_name" class="block text-gray-500 font-semibold text-sm">Company
                                Name{{ $i + 1 }}</label>
                            <input type="text" id="company_name" name="company_name"
                                value="{{ $employee->workingExperiences[$i]->company_name }}" readonly
                                class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="w-full">
                            <label for="job_title" class="block text-gray-500 font-semibold text-sm">Job
                                Title{{ $i + 1 }}</label>
                            <input type="text" name="job_title"
                                value="{{ $employee->workingExperiences[$i]->job_title }}" readonly
                                class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        </div>
                    </div>
                    <div class="flex flex-col justify-center items-center mt-5 grid grid-cols-2 gap-4">
                        <div class="w-full">
                            <label for="start_date" class="block text-gray-500 font-semibold text-sm">Start
                                Date{{ $i + 1 }}
                            </label>
                            <input type="text" id="start_date" name="start_date"
                                value="{{ \Carbon\Carbon::parse($employee->workingExperiences[$i]->start_date)->format('d M Y') }}"
                                readonly
                                class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="w-full">
                            <label for="end_date" class="block text-gray-500 font-semibold text-sm">End
                                Date{{ $i + 1 }}
                            </label>
                            <input type="text" id="end_date" name="end_date"
                                value="{{ \Carbon\Carbon::parse($employee->workingExperiences[$i]->end_date)->format('d M Y') }}"
                                readonly
                                class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        </div>
                    </div>
                    <div class="flex flex-col justify-center items-center mt-5 grid grid-cols-2 gap-4">
                        <div class="w-full">
                            <label for="department"
                                class="block text-gray-500 font-semibold text-sm">Department{{ $i + 1 }}</label>
                            <input type="text" id="department" name="department"
                                value="{{ $employee->workingExperiences[$i]->department }}" readonly
                                class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="w-full">
                            <label for="project_link" class="block text-gray-500 font-semibold text-sm">Project
                                Link{{ $i + 1 }}</label>
                            <input type="text" name="project_link"
                                value="{{ $employee->workingExperiences[$i]->project_link }}" readonly
                                class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        </div>
                    </div>
                @endfor
            </div>
        </form>
    </div>
@endsection
