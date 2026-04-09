<x-app-layout>
    <div class="page-header">
        <div class="page-title">Employees</div>
        <div class="page-actions">
            <div class="search-box">
                <form method="GET" action="{{ route('employees.index') }}" style="display: flex; gap: 10px;">
                    <input type="text" name="search" placeholder="Search employees..." value="{{ request('search') }}">
                    <button type="submit" class="btn">Search</button>
                </form>
            </div>
            <a href="{{ route('employees.create') }}" class="btn">+ Add employee</a>
        </div>
    </div>

    <div class="stats-row">
        <div class="stat-box">
            <div class="stat-number">{{ $totalEmployees }}</div>
            <div class="stat-label">Total Employees</div>
        </div>
        <div class="stat-box">
            <div class="stat-number">{{ $activeEmployees }}</div>
            <div class="stat-label">Active</div>
        </div>
        <div class="stat-box">
            <div class="stat-number">0</div>
            <div class="stat-label">On Leave</div>
        </div>
        <div class="stat-box">
            <div class="stat-number">{{ $totalDepartments }}</div>
            <div class="stat-label">Departments</div>
        </div>
    </div>

    <div class="table-section">
        <div class="table-header">
            <div>
                <div class="table-title">Employee directory</div>
                <div class="record-count">{{ $employees->total() }} records</div>
            </div>
        </div>

        <div class="filter-buttons">
            <a href="{{ route('employees.index') }}" class="filter-btn {{ !request('status') ? 'active' : '' }}">All</a>
            <a href="{{ route('employees.index', ['status' => 'active']) }}" class="filter-btn {{ request('status') == 'active' ? 'active' : '' }}">Active</a>
            <a href="{{ route('employees.index', ['status' => 'on_leave']) }}" class="filter-btn {{ request('status') == 'on_leave' ? 'active' : '' }}">On leave</a>
            <a href="{{ route('employees.index', ['status' => 'inactive']) }}" class="filter-btn {{ request('status') == 'inactive' ? 'active' : '' }}">Inactive</a>
        </div>

        @if($employees->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Department</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Joined Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>
                                <div class="employee-cell">
                                    <span class="employee-name">{{ $employee->name }}</span>
                                    <span class="employee-email">{{ $employee->email }}</span>
                                </div>
                            </td>
                            <td>{{ $employee->department->name ?? '-' }}</td>
                            <td>{{ $employee->position ?? '-' }}</td>
                            <td>
                                @if($employee->status == 'active')
                                    <span class="badge badge-active">+ Active</span>
                                @elseif($employee->status == 'inactive')
                                    <span class="badge badge-inactive">Inactive</span>
                                @else
                                    <span class="badge badge-on-leave">On Leave</span>
                                @endif
                            </td>
                            <td>{{ $employee->hire_date ? $employee->hire_date->format('M d, Y') : '-' }}</td>
                            <td>
                                <div class="actions-cell">
                                    <a href="{{ route('employees.edit', $employee) }}" class="action-icon" title="Edit">✎</a>
                                    <form method="POST" action="{{ route('employees.destroy', $employee) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-icon delete" title="Delete" onclick="return confirm('Delete this employee?')">✕</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if($employees->hasPages())
                <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #e0e0e0;">
                    {{ $employees->links() }}
                </div>
            @endif
        @else
            <div class="no-data">No employees found.</div>
        @endif
    </div>
</x-app-layout>
