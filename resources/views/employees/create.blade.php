<x-app-layout>
    <div class="page-header">
        <div class="page-title">Add Employee</div>
    </div>

    <div style="background-color: #ffffff; border: 1px solid #e0e0e0; border-radius: 4px; padding: 30px; max-width: 600px;">
        @if ($errors->any())
            <div style="background-color: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                <strong>Error:</strong>
                @foreach ($errors->all() as $error)
                    <p style="margin: 5px 0 0 0;">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('employees.store') }}">
            @csrf

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 13px; color: #000;">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 13px; @error('name') border-color: #dc3545; @enderror">
                @error('name') <p style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</p> @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 13px; color: #000;">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 13px; @error('email') border-color: #dc3545; @enderror">
                @error('email') <p style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</p> @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 13px; color: #000;">Phone</label>
                <input type="text" name="phone" value="{{ old('phone') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 13px; @error('phone') border-color: #dc3545; @enderror">
                @error('phone') <p style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</p> @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 13px; color: #000;">Department</label>
                <select name="department_id" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 13px; @error('department_id') border-color: #dc3545; @enderror">
                    <option value="">Select Department</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                    @endforeach
                </select>
                @error('department_id') <p style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</p> @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 13px; color: #000;">Position</label>
                <input type="text" name="position" value="{{ old('position') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 13px; @error('position') border-color: #dc3545; @enderror">
                @error('position') <p style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</p> @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 13px; color: #000;">Salary</label>
                <input type="number" name="salary" step="0.01" value="{{ old('salary') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 13px; @error('salary') border-color: #dc3545; @enderror">
                @error('salary') <p style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</p> @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 13px; color: #000;">Hire Date</label>
                <input type="date" name="hire_date" value="{{ old('hire_date') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 13px; @error('hire_date') border-color: #dc3545; @enderror">
                @error('hire_date') <p style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</p> @enderror
            </div>

            <div style="margin-bottom: 30px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 13px; color: #000;">Status</label>
                <select name="status" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 13px; @error('status') border-color: #dc3545; @enderror">
                    <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status') <p style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</p> @enderror
            </div>

            <div style="display: flex; gap: 10px;">
                <button type="submit" class="btn">Create Employee</button>
                <a href="{{ route('employees.index') }}" style="padding: 10px 20px; background-color: #6c757d; color: white; border: none; border-radius: 4px; font-size: 13px; cursor: pointer; text-decoration: none; display: inline-block; transition: background-color 0.3s;">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
