<x-app-layout>
    <div class="page-header">
        <div class="page-title">Departments</div>
        <div class="page-actions">
            <a href="{{ route('departments.create') }}" class="btn">+ Add Department</a>
        </div>
    </div>

    <div class="table-section">
        <div class="table-header">
            <div>
                <div class="table-title">All Departments</div>
                <div class="record-count">{{ $departments->total() }} departments</div>
            </div>
        </div>

        @if($departments->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($departments as $department)
                        <tr>
                            <td style="font-weight: bold;">{{ $department->name }}</td>
                            <td>{{ $department->description ?? '-' }}</td>
                            <td>
                                <div class="actions-cell">
                                    @if(!$department->trashed())
                                        <a href="{{ route('departments.edit', $department) }}" class="action-icon" title="Edit">✎</a>
                                        <form method="POST" action="{{ route('departments.destroy', $department) }}" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-icon delete" title="Delete" onclick="return confirm('Delete this department?')">✕</button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('departments.restore', $department->id) }}" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="action-icon" title="Restore">↻</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if($departments->hasPages())
                <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #e0e0e0;">
                    {{ $departments->links() }}
                </div>
            @endif
        @else
            <div class="no-data">No departments found.</div>
        @endif
    </div>
</x-app-layout>
