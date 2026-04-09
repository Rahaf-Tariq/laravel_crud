<x-app-layout>
    <div class="page-header">
        <div class="page-title">Dashboard</div>
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
            <div class="stat-number">{{ $totalDepartments }}</div>
            <div class="stat-label">Departments</div>
        </div>
        <div class="stat-box">
            <div class="stat-number">0</div>
            <div class="stat-label">On Leave</div>
        </div>
    </div>

    <div class="table-section">
        <div class="table-title">Welcome to PeopleDesk</div>
        <div style="padding: 20px; color: #666;">
            <p>Employee Management System</p>
            <p style="margin-top: 10px; font-size: 13px; color: #999;">Manage your employees and departments from this dashboard.</p>
        </div>
    </div>
</x-app-layout>
