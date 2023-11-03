@extends('layouts.layout')

@section('content')
    @if (session('success'))
        <div class="alert bg-green-100 border-l-4 border-green-500 p-4 relative">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm leading-5 text-green-700">
                        {{ session('success') }}
                    </p>
                </div>
                <div class="ml-auto pl-3">
                    <div class="-mx-1.5 -my-1.5">
                        <button type="button"
                            class="alert-close inline-flex rounded-md p-1.5 text-green-500 hover:bg-green-200 focus:outline-none focus:bg-green-200 transition ease-in-out duration-150"
                            aria-label="Close">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M6.293 6.293a1 1 0 011.414 0L10 8.586l2.293-2.293a1 1 0 111.414 1.414L11.414 10l2.293 2.293a1 1 0 01-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 01-1.414-1.414L8.586 10 6.293 7.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Employee List</h1>

        <a href="{{ route('create') }}" class="rounded-lg px-4 py-2 bg-blue-500 text-white">Create Employee</a>

        <div class="overflow-x-auto">
            <table class="mb-5 min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Photo
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($employees as $employee)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $loop->iteration }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $employee->first_name }}
                                            {{ $employee->last_name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($employee->image)
                                    <div class="flex items-center">
                                        <div class="h-16 w-16">
                                            <img class="h-16 w-16 rounded-lg"
                                                src="{{ asset('employees/' . $employee->image) }}" alt="Employee Photo">
                                        </div>
                                    </div>
                                @else
                                    <div class="h-16 w-16 bg-gray-200 rounded-lg"></div>
                                @endif
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('show', $employee->id) }}"
                                    class="rounded-lg px-4 py-2 bg-blue-500 text-white">View</a>
                                <a href="{{ route('edit', $employee->id) }}"
                                    class="rounded-lg px-4 py-2 bg-yellow-500 text-white">Edit</a>
                                <form action="{{ route('destroy', $employee->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-lg px-4 py-1 bg-red-500 text-white"
                                        onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                                </form>
                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $employees->links() }}
        </div>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const closeButton = document.querySelector('.alert-close');
            if (closeButton) {
                closeButton.addEventListener('click', function() {
                    const alert = this.closest('.alert');
                    if (alert) {
                        alert.style.display = 'none';
                    }
                });
            }
        });
    </script>
@endsection
