<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'PeopleDesk') }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .app-container {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #ffffff;
            border-right: 1px solid #e0e0e0;
            padding: 30px 20px;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }
        .sidebar-header {
            margin-bottom: 40px;
        }
        .app-name {
            font-size: 22px;
            font-weight: bold;
            color: #000000;
            margin-bottom: 5px;
        }
        .app-subtitle {
            font-size: 12px;
            color: #999999;
        }
        .nav-links {
            list-style: none;
        }
        .nav-links li {
            margin-bottom: 15px;
        }
        .nav-links a {
            display: block;
            padding: 12px 15px;
            color: #000000;
            text-decoration: none;
            font-size: 14px;
            border-radius: 5px;
            transition: all 0.3s;
        }
        .nav-links a:hover {
            background-color: #f5f5f5;
        }
        .nav-links a.active {
            background-color: #007bff;
            color: white;
        }
        .main-content {
            margin-left: 250px;
            flex: 1;
            background-color: #f0f0f0;
            padding: 30px 40px;
        }
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .page-title {
            font-size: 28px;
            font-weight: bold;
            color: #000000;
        }
        .page-actions {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        .search-box {
            display: flex;
            gap: 10px;
        }
        .search-box input {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 13px;
            width: 250px;
        }
        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 13px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .stats-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-box {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 4px;
            border: 1px solid #e0e0e0;
            text-align: center;
        }
        .stat-number {
            font-size: 32px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 8px;
        }
        .stat-label {
            font-size: 12px;
            color: #666666;
            text-transform: uppercase;
        }
        .table-section {
            background-color: #ffffff;
            border-radius: 4px;
            border: 1px solid #e0e0e0;
            padding: 20px;
        }
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .table-title {
            font-size: 16px;
            font-weight: bold;
            color: #000000;
        }
        .record-count {
            font-size: 12px;
            color: #999999;
        }
        .filter-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        .filter-btn {
            padding: 8px 15px;
            background-color: #f5f5f5;
            color: #000000;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.3s;
        }
        .filter-btn:hover,
        .filter-btn.active {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }
        th {
            background-color: #fafafa;
            border-bottom: 1px solid #e0e0e0;
            padding: 12px;
            text-align: left;
            font-weight: bold;
            color: #000000;
        }
        td {
            border-bottom: 1px solid #e0e0e0;
            padding: 12px;
            color: #333333;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        .employee-cell {
            display: flex;
            flex-direction: column;
        }
        .employee-name {
            font-weight: bold;
            color: #000000;
        }
        .employee-email {
            font-size: 12px;
            color: #999999;
        }
        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: bold;
        }
        .badge-active {
            background-color: #d4edda;
            color: #155724;
        }
        .badge-inactive {
            background-color: #f8d7da;
            color: #721c24;
        }
        .badge-on-leave {
            background-color: #fff3cd;
            color: #856404;
        }
        .actions-cell {
            display: flex;
            gap: 8px;
        }
        .action-icon {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            color: #007bff;
            padding: 4px 8px;
        }
        .action-icon:hover {
            color: #0056b3;
        }
        .action-icon.delete {
            color: #dc3545;
        }
        .action-icon.delete:hover {
            color: #c82333;
        }
        .no-data {
            text-align: center;
            padding: 30px;
            color: #999999;
        }
    </style>
</head>
<body>
    <div class="app-container">
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="app-name">PeopleDesk</div>
                <div class="app-subtitle">Employee Management</div>
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('employees.index') }}" class="{{ request()->routeIs('employees.*') ? 'active' : '' }}">Employees</a></li>
                <li><a href="{{ route('departments.index') }}" class="{{ request()->routeIs('departments.*') ? 'active' : '' }}">Departments</a></li>
                <li style="margin-top: 40px; border-top: 1px solid #e0e0e0; padding-top: 20px;">
                    <a href="{{ route('profile.edit') }}" class="">Profile</a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                        @csrf
                        <button type="submit" style="background: none; border: none; padding: 12px 15px; color: #000000; cursor: pointer; font-size: 14px; text-align: left; width: 100%; border-radius: 5px;">Logout</button>
                    </form>
                </li>
            </ul>
        </div>

        <div class="main-content">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
