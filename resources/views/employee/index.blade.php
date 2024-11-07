@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 offset-sm-2">

                <div class="row">
                    <div class="col-sm-3">
                        <h1>Employee List</h1>
                        <nav aria-label="breadcrumb" class="mt-3">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Recov</li>
                                <li class="breadcrumb-item active" aria-current="page">Employee List</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-sm-7">
                        <i class="bi bi-search" id="search-icon"></i>
                        <input type="text" class="form-control border-0 shadow-none w-100 mt-4 ps-5" id="search-form"
                            placeholder="Search">
                    </div>
                    <div class="col-sm-2 pt-3">
                        <button type="button" class="btn btn-add mt-2 w-100" data-bs-toggle="modal"
                            data-bs-target="#addEmployee" onclick="addModal()">
                            <div class="float-start me-3">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <mask id="mask0_41_116" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0"
                                        y="11" width="14" height="7">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.666687 11.0466H13.795V17.1624H0.666687V11.0466Z" fill="white" />
                                    </mask>
                                    <g mask="url(#mask0_41_116)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.23085 12.2966C3.70502 12.2966 1.91669 12.9025 1.91669 14.0958C1.91669 15.3008 3.70502 15.9125 7.23085 15.9125C10.7567 15.9125 12.545 15.3066 12.545 14.1141C12.545 12.9075 10.7567 12.2966 7.23085 12.2966M7.23085 17.1625C5.60752 17.1625 0.666687 17.1625 0.666687 14.0958C0.666687 11.3625 4.41252 11.0466 7.23085 11.0466C8.85419 11.0466 13.795 11.0466 13.795 14.1141C13.795 16.8466 10.0492 17.1625 7.23085 17.1625"
                                            fill="white" />
                                    </g>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.23085 1.91675C5.47752 1.91675 4.05002 3.34425 4.05002 5.09841C4.04668 5.94758 4.37335 6.74341 4.96918 7.34425C5.56585 7.94425 6.36085 8.27675 7.20752 8.28008L7.23085 8.90508V8.28008C8.98502 8.28008 10.4125 6.85258 10.4125 5.09841C10.4125 3.34425 8.98502 1.91675 7.23085 1.91675M7.23085 9.53008H7.20502C6.02252 9.52591 4.91418 9.06175 4.08335 8.22508C3.25168 7.38758 2.79585 6.27591 2.80002 5.09591C2.80002 2.65508 4.78752 0.666748 7.23085 0.666748C9.67502 0.666748 11.6625 2.65508 11.6625 5.09841C11.6625 7.54175 9.67502 9.53008 7.23085 9.53008"
                                        fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M15.0034 10.1914C14.6584 10.1914 14.3784 9.91138 14.3784 9.56638V6.22388C14.3784 5.87888 14.6584 5.59888 15.0034 5.59888C15.3484 5.59888 15.6284 5.87888 15.6284 6.22388V9.56638C15.6284 9.91138 15.3484 10.1914 15.0034 10.1914"
                                        fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M16.7084 8.52002H13.3C12.955 8.52002 12.675 8.24002 12.675 7.89502C12.675 7.55002 12.955 7.27002 13.3 7.27002H16.7084C17.0534 7.27002 17.3334 7.55002 17.3334 7.89502C17.3334 8.24002 17.0534 8.52002 16.7084 8.52002"
                                        fill="white" />
                                </svg>

                            </div>
                            <span>Add Employee</span>
                        </button>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-3 p-4 mb-4">
                    <div class="mb-3">
                        <div class="float-start me-2" style="margin-top: -1px;">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.3334 2.5V5.83333M6.66671 2.5V5.83333M3.33337 9.16667H16.6667M9.16671 12.5H10V15M3.33337 5.83333C3.33337 5.39131 3.50897 4.96738 3.82153 4.65482C4.13409 4.34226 4.55801 4.16667 5.00004 4.16667H15C15.4421 4.16667 15.866 4.34226 16.1786 4.65482C16.4911 4.96738 16.6667 5.39131 16.6667 5.83333V15.8333C16.6667 16.2754 16.4911 16.6993 16.1786 17.0118C15.866 17.3244 15.4421 17.5 15 17.5H5.00004C4.55801 17.5 4.13409 17.3244 3.82153 17.0118C3.50897 16.6993 3.33337 16.2754 3.33337 15.8333V5.83333Z"
                                    stroke="#14B8AD" stroke-width="1.66667" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <h2 class="d-inline-block ms-1" style="font-size: 15px !important;font-weight: 500 !important;">
                            Employee List
                        </h2>
                    </div>

                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Employee ID</th>
                                <th scope="col" class="text-center">Email</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="employeeTableBody">
                            @foreach ($employees as $employee)
                                @include('employee._employee_rows', ['employee' => $employee])
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addEmployee" tabindex="-1" aria-labelledby="addEmployeeLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="p-3 border-bottom">
                    <h1 class="modal-title fs-5" id="addEmployeeLabel">Add Your Employee</h1>
                    <div class="text-secondary d-block subpoint">Fill the form below to add an employee</div>
                    <button type="button" class="btn-close float-end custom-close" data-bs-dismiss="modal"
                        aria-label="Close" onclick="closeAddModal()">
                    </button>
                </div>
                <form class="modal-body" method="POST" action="{{ route('employee.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="mb-2 text-secondary">Employee Name</label>
                        <input type="text" class="form-control py-2" placeholder="Fullname" name="fullname"
                            required />
                    </div>

                    <div class="mb-3">
                        <label class="mb-2 text-secondary">Email</label>
                        <input type="email" class="form-control py-2" placeholder="Email" name="email" required />
                    </div>

                    <div class="mb-3">
                        <label class="mb-2 text-secondary">Employee ID</label>
                        <input type="number" class="form-control py-2" placeholder="XXX XXX XXX XXX XXX"
                            name="identify" required />
                    </div>

                    <div class="mb-3">
                        <label class="mb-2 text-secondary">Employee Profile</label>
                        <input type="file" class="form-control py-2" name="profile" required />
                    </div>

                    <button type="submit" class="btn btn-add-employee">Add Employee</button>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editEmployee" tabindex="-2" aria-labelledby="editEmployeeLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="p-3 border-bottom">
                    <h1 class="modal-title fs-5" id="editEmployeeLabel">Edit Your Employee</h1>
                    <div class="text-secondary d-block subpoint">Fill the form below to edit an employee</div>
                    <button type="button" class="btn-close float-end custom-close" data-bs-dismiss="modal"
                        aria-label="Close" onclick="closeEditModal()">
                    </button>
                </div>
                <form class="modal-body" method="POST" id="update-employee-form" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="mb-2 text-secondary">Employee Name</label>
                        <input type="text" class="form-control py-2" placeholder="Fullname" name="fullname"
                            id="edFullname" required />
                    </div>

                    <div class="mb-3">
                        <label class="mb-2 text-secondary">Email</label>
                        <input type="email" class="form-control py-2" placeholder="Email" name="email"
                            id="edEmail" required />
                    </div>

                    <div class="mb-3">
                        <label class="mb-2 text-secondary">Employee ID</label>
                        <input type="number" class="form-control py-2" placeholder="XXX XXX XXX XXX XXX"
                            name="identify" id="edIdentify" required />
                    </div>

                    <div class="mb-3">
                        <label class="mb-2 text-secondary">Employee Profile</label>
                        <input type="file" class="form-control py-2" name="profile" />
                    </div>
                    <button type="submit" class="btn btn-add-employee">Edit Employee</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        function deleteEmployee(url) {
            Swal.fire({
                title: "Are You Sure?",
                text: "Data will be deleted permanently",
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: "Yes",
                denyButtonText: `No`
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }

        function addModal() {
            let addEmployee = new bootstrap.Modal(document.getElementById('addEmployee'), {});
            addEmployee.show();
        }

        function closeAddModal() {
            let addEmployee = new bootstrap.Modal(document.getElementById('addEmployee'), {});
            addEmployee.hide();
            document.querySelectorAll('.modal-backdrop').forEach((backdrop) => backdrop.remove());
        }

        function editModal(url, url_update) {
            $('#update-employee-form').attr('action', url_update);
            let editEmployee = new bootstrap.Modal(document.getElementById('editEmployee'), {});
            $.ajax({
                url,
                method: 'GET',
                success: function(employee) {
                    $('#edFullname').val(employee.fullname);
                    $('#edEmail').val(employee.email);
                    $('#edIdentify').val(employee.identify);
                    editEmployee.show();
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching employee data:", error);
                }
            });
        }


        function closeEditModal() {
            let editEmployee = new bootstrap.Modal(document.getElementById('editEmployee'), {});
            editEmployee.hide();
            document.querySelectorAll('.modal-backdrop').forEach((backdrop) => backdrop.remove());
        }

        $(document).ready(function() {
            $('#search-form').on('input', function() {
                let searchQuery = $(this).val();
                $.ajax({
                    url: '{{ route('employee.search') }}',
                    method: 'GET',
                    data: {
                        search: searchQuery
                    },
                    success: function(response) {
                        $('#employeeTableBody').html(response);
                    },
                    error: function(err) {
                        console.error('Error fetching filtered employees:', err);
                    }
                });
            });
        });
    </script>
@endsection
