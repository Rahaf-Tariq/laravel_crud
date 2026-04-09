<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create departments
        $departments = [
            ['name' => 'Sales', 'description' => 'Sales and business development team'],
            ['name' => 'Engineering', 'description' => 'Software development and maintenance'],
            ['name' => 'Marketing', 'description' => 'Marketing and communications'],
            ['name' => 'HR', 'description' => 'Human resources and recruitment'],
            ['name' => 'Finance', 'description' => 'Financial management and accounting'],
        ];

        foreach ($departments as $dept) {
            Department::create($dept);
        }

        // Create employees
        $employees = [
            ['name' => 'John Smith', 'email' => 'john@example.com', 'phone' => '555-0101', 'department_id' => 1, 'position' => 'Sales Manager', 'salary' => 60000, 'hire_date' => '2023-01-15', 'status' => 'active'],
            ['name' => 'Jane Doe', 'email' => 'jane@example.com', 'phone' => '555-0102', 'department_id' => 2, 'position' => 'Senior Developer', 'salary' => 85000, 'hire_date' => '2022-06-20', 'status' => 'active'],
            ['name' => 'Mike Johnson', 'email' => 'mike@example.com', 'phone' => '555-0103', 'department_id' => 1, 'position' => 'Sales Executive', 'salary' => 50000, 'hire_date' => '2023-03-10', 'status' => 'active'],
            ['name' => 'Sarah Williams', 'email' => 'sarah@example.com', 'phone' => '555-0104', 'department_id' => 3, 'position' => 'Marketing Manager', 'salary' => 65000, 'hire_date' => '2022-11-05', 'status' => 'active'],
            ['name' => 'David Brown', 'email' => 'david@example.com', 'phone' => '555-0105', 'department_id' => 2, 'position' => 'Junior Developer', 'salary' => 45000, 'hire_date' => '2024-01-08', 'status' => 'active'],
            ['name' => 'Emily Davis', 'email' => 'emily@example.com', 'phone' => '555-0106', 'department_id' => 4, 'position' => 'HR Coordinator', 'salary' => 40000, 'hire_date' => '2023-07-12', 'status' => 'active'],
            ['name' => 'Robert Miller', 'email' => 'robert@example.com', 'phone' => '555-0107', 'department_id' => 5, 'position' => 'Accountant', 'salary' => 55000, 'hire_date' => '2023-02-20', 'status' => 'inactive'],
            ['name' => 'Lisa Anderson', 'email' => 'lisa@example.com', 'phone' => '555-0108', 'department_id' => 3, 'position' => 'Content Creator', 'salary' => 42000, 'hire_date' => '2023-09-14', 'status' => 'active'],
        ];

        foreach ($employees as $emp) {
            Employee::create($emp);
        }
    }
}
