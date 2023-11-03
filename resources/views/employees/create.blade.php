@extends('layouts.layout')
<style>
    #image-preview {
        background-image: url('');
    }

    label[for="image"] {
        cursor: pointer;
    }

    #remove-image {
        transition: opacity 0.3s ease;
    }

    #remove-image:hover {
        opacity: 0.8;
    }
</style>
@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <a type="button" href="{{ route('index') }}" class="rounded-lg px-4 py-2 bg-blue-500 text-white">Back</a>
        <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mt-5 mb-4">
                <h2 class="text-xl font-semibold">Employee Information</h2>

                <div class="flex flex-col justify-center items-center mt-5">
                    <span class="block text-center py-4 text-gray-500">Photo</span>
                    <label for="image"
                        class="relative w-32 h-32 bg-gray-200 rounded-lg border border-dashed border-gray-500">
                        <input type="file" name="image" id="image" class="hidden" accept="image/*" />
                        <div id="image-preview" class="w-32 h-32 rounded-lg bg-cover bg-center"></div>
                        <button id="remove-image"
                            class="absolute top-0 right-0 w-8 h-8 flex items-center justify-center rounded-bl-lg cursor-pointer hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </label>
                    @error('image')
                        <div class="mt-3 text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex flex-col justify-center items-center mt-5 grid grid-cols-2 gap-4">
                    <div class="w-full">
                        <input type="text" name="first_name" placeholder="First Name"
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        @error('first_name')
                            <div class="mt-3 text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full">
                        <input type="text" name="last_name" placeholder="Last Name"
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        @error('last_name')
                            <div class="mt-3 text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col justify-center items-center  mt-5 grid grid-cols-2 gap-4">
                    <div class="w-full">
                        <input type="text" name="father_name" placeholder="Father Name"
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        @error('father_name')
                            <div class="mt-3 text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full">
                        <input type="email" name="email" placeholder="Email Address"
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        @error('email')
                            <div class="mt-3 text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center  mt-5 grid grid-cols-2 gap-4">
                    <div class="w-full">
                        <input type="text" name="apply_position" placeholder="Apply Position"
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        @error('apply_position')
                            <div class="mt-3 text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full">
                        <input type="text" name="nrc" placeholder="NRC No"
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        @error('nrc')
                            <div class="mt-3 text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center  mt-5 grid grid-cols-2 gap-4">
                    <div class="w-full">
                        <input type="date" name="day_of_birth" placeholder="Day of Birth"
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        @error('day_of_birth')
                            <div class="mt-3 text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full">
                        <input type="text" name="address" placeholder="Address"
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        @error('address')
                            <div class="mt-3 text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center  mt-5 grid grid-cols-2 gap-4">
                    <div class="w-full">
                        <input type="text" name="phone" placeholder="Phone No"
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        @error('phone')
                            <div class="mt-3 text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full">
                        <select name="gender" id="gender"
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="">Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        @error('gender')
                            <div class="mt-3 text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center  mt-5 grid grid-cols-2 gap-4">
                    <div class="w-full">
                        <input type="text" name="nationality" placeholder="Nationality"
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        @error('nationality')
                            <div class="mt-3 text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full">
                        <input type="text" name="religion" placeholder="Religion"
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        @error('religion')
                            <div class="mt-3 text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center  mt-5 grid grid-cols-2 gap-4">
                    <div class="w-full">
                        <select name="marital_status" id="marital_status"
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="male">Marital Status</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                        @error('marital_status')
                            <div class="mt-3 text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full">
                        <input type="text" name="spouse_name" placeholder="Spouse Name"
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        @error('spouse_name')
                            <div class="mt-3 text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center  mt-5 grid grid-cols-2 gap-4">
                    <div class="w-full">
                        <input type="text" name="expected_salary" placeholder="Nationality"
                            class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        @error('expected_salary')
                            <div class="mt-3 text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class=" mt-5 grid gap-4">
                    <textarea name="other_qualification" id="other_qualification" cols="30" rows="10"
                        placeholder="Other Qualification"></textarea>
                    @error('other_qualification')
                        <div class="mt-3 text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <h2 class="text-xl font-semibold">Working Experience</h2>
            <div class="mt-4">
                <a id="add-skill" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add</a>
            </div>
            <div class="mt-4" id="skills-container">
                <div class="mb-4 w-full">
                    <label for="company_name[1]" class="mt-3 block text-gray-500 font-semibold text-sm">Company
                        Name <span id="count">1</span></label>
                    <input class="mt-3 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                        type="text" name="company_name[]" class="w-full p-2" placeholder="Company Name">
                    <label for="company_name[1]" class="mt-3 block text-gray-500 font-semibold text-sm">Job Title 1</label>
                    <input class="mt-3 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                        type="text" name="job_title[]" class="w-full p-2" placeholder="Job Title">
                    <label for="company_name[1]" class="mt-3 block text-gray-500 font-semibold text-sm">Start Date 1</label>
                    <input class="mt-3 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                        type="date" name="start_date[]" class="w-full p-2" placeholder="Start Date">
                    <label for="company_name[1]" class="mt-3 block text-gray-500 font-semibold text-sm">End Date 1</label>
                    <input class="mt-3 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                        type="date" name="end_date[]" class="w-full p-2" placeholder="End Date">
                    <label for="company_name[1]" class="mt-3 block text-gray-500 font-semibold text-sm">Department 1</label>
                    <input class="mt-3 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                        type="text" name="department[]" class="w-full p-2" placeholder="Department">
                    <label for="company_name[1]" class="mt-3 block text-gray-500 font-semibold text-sm">Project Link 1</label>
                    <input class="mt-3 w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                        type="text" name="project_link[]" class="w-full p-2" placeholder="Project Link">
                </div>
            </div>
            <div class="mt-4">
                <button type="submit"
                    class="mt-5 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">Create</button>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('image');
            const imagePreview = document.getElementById('image-preview');
            const removeButton = document.getElementById('remove-image');

            imageInput.addEventListener('change', function() {
                if (imageInput.files.length > 0) {
                    imagePreview.style.backgroundImage = `url(${URL.createObjectURL(imageInput.files[])}`;
                    removeButton.classList.remove('hidden');
                } else {
                    imagePreview.style.backgroundImage = 'none';
                    removeButton.classList.add('hidden');
                }
            });

            removeButton.addEventListener('click', function(event) {
                event.preventDefault();
                event.preventDefault();
                imageInput.value = '';
                imagePreview.style.backgroundImage = 'none';
                removeButton.classList.add('hidden');
            });
        });
    </script>
    <script>
        let index = 1;
        document.getElementById('add-skill').addEventListener('click', function() {
            const skillsContainer = document.getElementById('skills-container');
            const skillInput = skillsContainer.querySelector('.mb-4').cloneNode(true);

            index++;
            skillInput.querySelectorAll('label').forEach((label) => {
                label.htmlFor = label.htmlFor.replace('[1]', '[' + index + ']');
                label.textContent = label.textContent.replace('1', index);
            });
            skillsContainer.appendChild(skillInput);
        });
    </script>
@endsection
