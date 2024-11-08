@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 offset-sm-2">
                <h1>Dashboard</h1>
                <nav aria-label="breadcrumb" class="mt-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Recov</li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <div class="row mt-3 mb-3">
                    <div class="col-sm-6 mt-2 mb-2">
                        <div class="w-95 rounded-3 bg-white p-4">
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
                                Fall Detected
                            </h2>
                            <div class="mt-2">
                                <div class="count d-inline-block">{{ $fallCount }}</div>
                                <span class="subcount d-inline-block">+{{ $fallTodayCount }}</span>
                            </div>

                            <span class="card-detail text-secondary">Employee</span>

                        </div>
                    </div>

                    <div class="col-sm-6 mt-2 mb-2">
                        <div class="w-95 rounded-3 bg-white p-4">
                            <div class="float-start me-2" style="margin-top: -1px;">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.5 17.5V15.8333C2.5 14.9493 2.85119 14.1014 3.47631 13.4763C4.10143 12.8512 4.94928 12.5 5.83333 12.5H9.16667C10.0507 12.5 10.8986 12.8512 11.5237 13.4763C12.1488 14.1014 12.5 14.9493 12.5 15.8333V17.5M13.3333 2.60824C14.0503 2.79182 14.6859 3.20882 15.1397 3.79349C15.5935 4.37817 15.8399 5.09726 15.8399 5.8374C15.8399 6.57754 15.5935 7.29664 15.1397 7.88131C14.6859 8.46598 14.0503 8.88298 13.3333 9.06657M17.5 17.4999V15.8333C17.4958 15.0976 17.2483 14.3839 16.7961 13.8036C16.3439 13.2233 15.7124 12.8088 15 12.6249M4.16667 5.83333C4.16667 6.71739 4.51786 7.56523 5.14298 8.19036C5.7681 8.81548 6.61594 9.16667 7.5 9.16667C8.38405 9.16667 9.2319 8.81548 9.85702 8.19036C10.4821 7.56523 10.8333 6.71739 10.8333 5.83333C10.8333 4.94928 10.4821 4.10143 9.85702 3.47631C9.2319 2.85119 8.38405 2.5 7.5 2.5C6.61594 2.5 5.7681 2.85119 5.14298 3.47631C4.51786 4.10143 4.16667 4.94928 4.16667 5.83333Z"
                                        stroke="#14B8AD" stroke-width="1.66667" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <h2 class="d-inline-block ms-1" style="font-size: 15px !important;font-weight: 500 !important;">
                                PPE Not Wearing
                            </h2>
                            <div class="mt-2">
                                <div class="count d-inline-block">{{ $otherTypeCount }}</div>
                                <span class="subcount d-inline-block">+{{ $otherTypeTodayCount }}</span>
                            </div>

                            <span class="card-detail text-secondary">Employee</span>

                        </div>
                    </div>
                </div>

                <video class="hero bg-white w-100" id="webcam" autoplay playsinline></video>
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

                <div class="mb-5">
                    <a href="{{ route('records.index') }}" class="btn btn-view-more">View More</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        async function startWebcam() {
            try {
                const videoElement = document.getElementById('webcam');
                const stream = await navigator.mediaDevices.getUserMedia({
                    video: true
                });
                videoElement.srcObject = stream;
                window.localStream = stream; // Save stream to stop later
            } catch (error) {
                console.error('Error accessing webcam:', error);
            }
        }

        startWebcam()
    </script>
@endsection
