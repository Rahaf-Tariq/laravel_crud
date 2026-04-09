<x-app-layout>
    <div class="page-header">
        <div class="page-title">Add Department</div>
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

        <form method="POST" action="{{ route('departments.store') }}">
            @csrf

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 13px; color: #000;">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 13px; @error('name') border-color: #dc3545; @enderror">
                @error('name') <p style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</p> @enderror
            </div>

            <div style="margin-bottom: 30px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 13px; color: #000;">Description</label>
                <textarea name="description" rows="4" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 13px; @error('description') border-color: #dc3545; @enderror">{{ old('description') }}</textarea>
                @error('description') <p style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</p> @enderror
            </div>

            <div style="display: flex; gap: 10px;">
                <button type="submit" class="btn">Create Department</button>
                <a href="{{ route('departments.index') }}" style="padding: 10px 20px; background-color: #6c757d; color: white; border: none; border-radius: 4px; font-size: 13px; cursor: pointer; text-decoration: none; display: inline-block; transition: background-color 0.3s;">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
