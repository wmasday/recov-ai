@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 offset-sm-2">
                <h1>Record List</h1>
                <nav aria-label="breadcrumb" class="mt-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Recov</li>
                        <li class="breadcrumb-item active" aria-current="page">Record List</li>
                    </ol>
                </nav>

                <div class="row mt-3 mb-3">
                    <div class="col-sm-12 mt-2 mb-2">
                        <div class="w-100 rounded-3 bg-white p-4">
                            <div class="float-start me-2" style="margin-top: -1px;">
                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16 3.79999V7.79999M8 3.79999V7.79999M4 11.8H20M11 15.8H12V18.8M4 7.79999C4 7.26955 4.21071 6.76085 4.58579 6.38577C4.96086 6.0107 5.46957 5.79999 6 5.79999H18C18.5304 5.79999 19.0391 6.0107 19.4142 6.38577C19.7893 6.76085 20 7.26955 20 7.79999V19.8C20 20.3304 19.7893 20.8391 19.4142 21.2142C19.0391 21.5893 18.5304 21.8 18 21.8H6C5.46957 21.8 4.96086 21.5893 4.58579 21.2142C4.21071 20.8391 4 20.3304 4 19.8V7.79999Z"
                                        stroke="#14B8AD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <h2 class="d-inline-block ms-1" style="font-size: 15px !important;font-weight: 500 !important;">
                                Filter Data
                            </h2>
                            <div class="row">
                                <div class="col-sm-6 mt-2 mb-2">
                                    <span class="text-secondary mb-1 pt-3">Date</span>
                                    <input type="date" class="form-control mt-3 border-0 bg-light filter-date-input"
                                        id="date">
                                </div>

                                <div class="col-sm-6 mt-2 mb-2">
                                    <span class="text-secondary mb-1 pt-3">Type</span>
                                    <select class="form-select mt-3 border-0 bg-light filter-date-input"
                                        aria-label="Filter Type" id="type" name="type" required>
                                        <option value="" selected>All Type</option>
                                        <option value="Fall">Fall</option>
                                        <option value="Safety">Safety</option>
                                    </select>
                                </div>

                            </div>

                        </div>
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
                            Record List
                        </h2>
                    </div>

                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Employee ID</th>
                                <th scope="col" class="text-center">Type Detection</th>
                                <th scope="col" class="text-center">Date</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $record)
                                <tr class="border-bottom">
                                    <td>
                                        <img src="{{ $record->employee && $record->employee->profile ? asset('storage/' . $record->employee->profile) : 'https://randomuser.me/api/portraits/men/90.jpg' }}"
                                            alt="Profile Image" class="float-start circle-profile" />
                                        <div class="uname">
                                            <div class="fullname">
                                                {{ $record->employee ? $record->employee->fullname : 'No Employee Assigned' }}
                                            </div>
                                            <span class="text-secondary">Employee</span>
                                        </div>
                                    </td>
                                    <td class="text-center pt-3">
                                        {{ $record->employee ? $record->employee->identify : 'N/A' }}</td>
                                    <td class="text-center pt-3">{{ $record->type ?? 'No Type' }}</td>
                                    <td class="text-center pt-3">{{ $record->date->format('j F Y') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('records.show', $record->id) }}" class="btn btn-see-detail">
                                            See Details
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('date');
            const typeSelect = document.getElementById('type');


            function fetchRecords() {
                const date = dateInput.value;
                const type = typeSelect.value;

                fetch(`{{ route('records.filter') }}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            date,
                            type
                        })
                    })
                    .then(response => response.json())
                    .then(data => updateTable(data.records))
                    .catch(error => console.error('Error fetching records:', error));
            }

            function updateTable(records) {
                const tbody = document.querySelector('table tbody');
                tbody.innerHTML = '';

                records.forEach(record => {
                    const row = document.createElement('tr');
                    row.classList.add('border-bottom');
                    row.innerHTML = `
                    <td>
                        <img src="${record.employee && record.employee.profile ? '{{ asset('storage/') }}/' + record.employee.profile : 'https://randomuser.me/api/portraits/men/90.jpg'}"
                             alt="Profile Image" class="float-start circle-profile" />
                        <div class="uname">
                            <div class="fullname">${record.employee ? record.employee.fullname : 'No Employee Assigned'}</div>
                            <span class="text-secondary">Employee</span>
                        </div>
                    </td>
                    <td class="text-center pt-3">${record.employee ? record.employee.identify : 'N/A'}</td>
                    <td class="text-center pt-3">${record.type ?? 'No Type'}</td>
                    <td class="text-center pt-3">${new Date(record.date).toLocaleDateString('en-GB', {day: 'numeric',month: 'long',year: 'numeric'})}</td>
                    <td class="text-center">
                        <a href="{{ url('/records') }}/${record.id}" class="btn btn-see-detail">See Details</a>
                    </td>
                `;
                    tbody.appendChild(row);
                });
            }

            dateInput.addEventListener('change', fetchRecords);
            typeSelect.addEventListener('change', fetchRecords);
        });
    </script>
@endsection
