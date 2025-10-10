@extends('layouts.student.main')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #1e88e5;
            --sidebar-bg: #ffffff;
            --body-bg: #f8f9fa;
        }

        body {
            background-color: var(--body-bg);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            width: 250px;
            background: var(--sidebar-bg);
            border-right: 1px solid #e0e0e0;
            padding: 2rem 1rem;
            z-index: 1000;
        }

        .sidebar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 3rem;
            text-decoration: none;
        }

        .sidebar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-nav li {
            margin-bottom: 0.5rem;
        }

        .sidebar-nav a {
            display: block;
            padding: 0.75rem 1rem;
            color: #333;
            text-decoration: none;
            border-radius: 12px;
            transition: all 0.3s;
        }

        .sidebar-nav a:hover {
            background-color: #f0f0f0;
        }

        .sidebar-nav a.active {
            background-color: var(--primary-color);
            color: white;
            font-weight: 500;
        }

        /* .main-content {
            margin-left: 250px;
            padding: 2rem;
        } */

        .profile-header {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .profile-avatar {
            width: 80px;
            height: 80px;
            border-radius: 16px;
            object-fit: cover;
        }

        .profile-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            background-color: #e3f2fd;
            color: var(--primary-color);
            border-radius: 6px;
            font-size: 0.875rem;
            font-weight: 500;
            margin-right: 0.5rem;
        }

        .section-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .section-title {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .info-item label {
            display: block;
            font-size: 0.875rem;
            color: #666;
            margin-bottom: 0.5rem;
        }

        .info-item .value {
            font-size: 1rem;
            color: #333;
            padding: 0.75rem;
            background-color: #f8f9fa;
            border-radius: 8px;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .summary-item:last-child {
            border-bottom: none;
        }

        .summary-badge {
            background-color: #d4edda;
            color: #28a745;
            padding: 0.25rem 0.75rem;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .certificate-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.25rem;
            background-color: #f8f9fa;
            border-radius: 12px;
            margin-bottom: 1rem;
        }

        .btn-link-custom {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            background: none;
            border: none;
            cursor: pointer;
        }

        .btn-link-custom:hover {
            text-decoration: underline;
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 1.5rem;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 2rem;
            left: 1rem;
            right: 1rem;
            color: var(--primary-color);
            font-size: 0.875rem;
        }

        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            /* .main-content {
                margin-left: 0;
            } */

            .info-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .profile-header .d-flex {
                flex-direction: column;
                align-items: flex-start !important;
            }

            .profile-header .ms-auto {
                margin-left: 0 !important;
                margin-top: 1rem;
            }
        }

        .mobile-toggle {
            display: none;
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 1001;
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 0.5rem;
        }

        @media (max-width: 991px) {
            .mobile-toggle {
                display: block;
            }
        }
    </style>
@section('content')
    <div class="container mt-4">
        <div class="row">
            <main class="main-content">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>

        <!-- Profile Header -->
        <div class="profile-header">
            <div class="d-flex align-items-start">
                <img src="{{asset($student->image)}}" alt="Profile" class="profile-avatar me-3">
                <div class="flex-grow-1">
                    <h2 class="mb-1">{{$student->name}}</h2>
                    <p class="text-muted mb-2">Student Since {{ $student->created_at->year }} • {{count($student->studentCourses)}} course(s)</p>
                    <div>
                        @forelse ($student->studentCourses as $courses)
                            <span class="profile-badge">{{$courses->course->name}}</span>
                        @empty
                            
                        @endforelse
                    </div>
                </div>
                <div class="ms-auto">
                    <button class="btn btn-outline-primary me-2" onclick="add('{{route('student.edit_image')}}','modal-lg')">Change Photo</button>
                    <button class="btn btn-primary" onclick="add('{{route('student.edit.profile')}}','modal-lg')">Edit Profile</button>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-6">
                <!-- Personal Info -->
                <div class="section-card">
                    <div class="section-title">
                        <span>Personal Info</span>
                        {{-- <button class="btn-link-custom">Edit</button> --}}
                    </div>
                    <div class="info-grid">
                        <div class="info-item">
                            <label>Full Name</label>
                            <div class="value">{{$student->name}}</div>
                        </div>
                        <div class="info-item">
                            <label>Father Name</label>
                            <div class="value">{{$student->fathers_name}}</div>
                        </div>
                        <div class="info-item">
                            <label>Mother Name</label>
                            <div class="value">{{$student->mothers_name}}</div>
                        </div>
                        <div class="info-item">
                            <label>Email</label>
                            <div class="value">{{$student->email}}</div>
                        </div>
                        <div class="info-item">
                            <label>Phone</label>
                            <div class="value">{{$student->mobile}}</div>
                        </div>
                        <div class="info-item">
                            <label>Heighest Qualification</label>
                            <div class="value">{{$student->heighest_qualification}}</div>
                        </div>
                        <div class="info-item">
                            <label>Address</label>
                            <div class="value">{{$student->address}}</div>
                        </div>
                        <div class="info-item">
                            <label>Location</label>
                            <div class="value">{{$student->district}}, {{$student->state}}</div>
                        </div>
                        <div class="info-item">
                            <label>Time Zone</label>
                            <div class="value">{{ config('app.timezone') }}</div>
                        </div>
                    </div>
                </div>

                <!-- Security -->
                {{-- <div class="section-card">
                    <div class="section-title">
                        <span>Security</span>
                    </div>
                    <div class="info-grid">
                        <div class="info-item">
                            <label>Password</label>
                            <div class="value">••••••••</div>
                        </div>
                        <div class="info-item">
                            <label>Two-Factor Auth</label>
                            <div class="value">Enabled</div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn-link-custom me-3">Change Password</button>
                        <button class="btn-link-custom">Manage 2FA</button>
                    </div>
                </div> --}}

                <!-- Preferences -->
                {{-- <div class="section-card">
                    <div class="section-title">
                        <span>Preferences</span>
                    </div>
                    <div class="info-grid">
                        <div class="info-item">
                            <label>Language</label>
                            <div class="value">English</div>
                        </div>
                        <div class="info-item">
                            <label>Theme</label>
                            <div class="value">System</div>
                        </div>
                        <div class="info-item">
                            <label>Email Notifications</label>
                            <div class="value">Weekly Summary</div>
                        </div>
                        <div class="info-item">
                            <label>Reminder Frequency</label>
                            <div class="value">Every 3 days</div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn-link-custom me-3">Notification Settings</button>
                        <button class="btn-link-custom">Customize</button>
                    </div>
                </div> --}}
            </div>

            <!-- Right Column -->
            <div class="col-lg-6">
                <!-- Learning Summary -->
                <div class="section-card">
                    <div class="section-title">
                        <span>Learning Summary</span>
                    </div>
                    <div class="summary-item">
                        <span>In Progress</span>
                        <span class="summary-badge">{{count($studentOtherData->data->on_going_courses)}}</span>
                    </div>
                    <div class="summary-item">
                        <span>Completed</span>
                        <span class="summary-badge">{{count($studentOtherData->data->completed_courses)}}</span>
                    </div>
                    {{-- <div class="summary-item">
                        <span>Certificates</span>
                        <span class="summary-badge">2</span>
                    </div>
                    <div class="summary-item">
                        <span>Time This Week</span>
                        <span class="summary-badge">6h 42m</span>
                    </div> --}}
                </div>

                <!-- Certificates -->
                {{-- <div class="section-card">
                    <div class="section-title">
                        <span>Certificates</span>
                        <span class="text-muted" style="font-size: 0.875rem; font-weight: normal;">2 earned</span>
                    </div>
                    <div class="certificate-item">
                        <span class="fw-medium">Teaching Basics Certificate</span>
                        <div>
                            <button class="btn-link-custom me-3">Download</button>
                            <button class="btn-link-custom">Share</button>
                        </div>
                    </div>
                    <div class="certificate-item">
                        <span class="fw-medium">Classroom Management Certificate</span>
                        <div>
                            <button class="btn-link-custom me-3">Download</button>
                            <button class="btn-link-custom">Share</button>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </main>
        </div>
    </div>

   
@endsection
 {{-- <script>
        function changeImage(){
            
        }
    </script> --}}