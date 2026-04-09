<x-app-layout>
    <x-slot name="header">Trash</x-slot>

    <div class="mb-6">
        <a href="{{ route('employees.index') }}" class="px-4 py-2 bg-gray-300 text-black rounded hover:bg-gray-400">Back to Employees</a>
    </div>

    @if($employees->count() == 0)
        <div class="bg-white border border-gray-300 rounded p-6 text-center">
            <p class="text-gray-600">No deleted items</p>
        </div>
    @else
        <div class="bg-white border border-gray-300 rounded overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-100 border-b border-gray-300">
                    <tr>
                        <th class="px-6 py-3 text-left text-black font-bold">Name</th>
                        <th class="px-6 py-3 text-left text-black font-bold">Email</th>
                        <th class="px-6 py-3 text-left text-black font-bold">Department</th>
                        <th class="px-6 py-3 text-left text-black font-bold">Position</th>
                        <th class="px-6 py-3 text-left text-black font-bold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr class="border-b border-gray-300 hover:bg-gray-50">
                            <td class="px-6 py-3 text-black">{{ $employee->name }}</td>
                            <td class="px-6 py-3 text-black">{{ $employee->email }}</td>
                            <td class="px-6 py-3 text-black">{{ $employee->department->name }}</td>
                            <td class="px-6 py-3 text-black">{{ $employee->position }}</td>
                            <td class="px-6 py-3 space-x-2 flex">
                                <form method="POST" action="{{ route('employees.restore', $employee->id) }}" class="inline">
                                    @csrf
                                    <button type="submit" class="px-3 py-1 bg-green-100 text-green-700 rounded border border-green-300 hover:bg-green-200">Restore</button>
                                </form>
                                <form method="POST" action="{{ route('employees.forceDelete', $employee->id) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Permanently delete this employee?')" class="px-3 py-1 bg-red-100 text-red-700 rounded border border-red-300 hover:bg-red-200">Delete Forever</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $employees->links() }}
        </div>
    @endif
</x-app-layout>
