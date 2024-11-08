@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 offset-sm-2">
                <h1>Detail Record</h1>
                <nav aria-label="breadcrumb" class="mt-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Recov</li>
                        <li class="breadcrumb-item active" aria-current="page">Record List</li>
                        <li class="breadcrumb-item active" aria-current="page">See Details</li>
                    </ol>
                </nav>

                <div class="row">
                    <div class="col-sm-10 mt-2 mb-2">
                        <a href="{{ route('records.index') }}" class="btn btn-return py-2 px-3">
                            <i class="bi bi-arrow-left-circle me-2"></i>
                            Return Record List
                        </a>
                    </div>
                    <div class="col-sm-1 mt-2 mb-2 px-1">
                        @if (!$record->employee)
                            <button type="button" class="btn btn-edit w-100 text-center shadow-sm" data-bs-toggle="modal"
                                data-bs-target="#editModal" onclick="editModal()">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M17.2923 18.2832H11.2482C10.9032 18.2832 10.6232 18.0032 10.6232 17.6582C10.6232 17.3132 10.9032 17.0332 11.2482 17.0332H17.2923C17.6373 17.0332 17.9173 17.3132 17.9173 17.6582C17.9173 18.0032 17.6373 18.2832 17.2923 18.2832"
                                        fill="#14B8AD" />
                                    <mask id="mask0_30_5494" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="1"
                                        y="2" width="15" height="17">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M1.66693 2.50024H15.9841V18.2832H1.66693V2.50024Z" fill="white" />
                                    </mask>
                                    <g mask="url(#mask0_30_5494)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M10.9255 4.18078L3.07966 13.9933C2.93716 14.1716 2.88466 14.4016 2.93716 14.6224L3.50466 17.0266L6.03716 16.9949C6.27799 16.9924 6.50049 16.8849 6.64799 16.7016C9.32883 13.3474 14.4397 6.95245 14.5847 6.76495C14.7213 6.54328 14.7747 6.22995 14.703 5.92828C14.6297 5.61911 14.4372 5.35661 14.1597 5.18911C14.1005 5.14828 12.6963 4.05828 12.653 4.02411C12.1247 3.60078 11.3538 3.67411 10.9255 4.18078V4.18078ZM3.01133 18.2833C2.72216 18.2833 2.47049 18.0849 2.40299 17.8024L1.72049 14.9099C1.57966 14.3108 1.71966 13.6924 2.10383 13.2124L9.95383 3.39411C9.95716 3.39078 9.95966 3.38661 9.96299 3.38328C10.8238 2.35411 12.3805 2.20245 13.4305 3.04495C13.4722 3.07745 14.8663 4.16078 14.8663 4.16078C15.373 4.46245 15.7688 5.00161 15.9188 5.63995C16.068 6.27161 15.9597 6.92328 15.6122 7.47411C15.5863 7.51495 15.5638 7.54995 7.62383 17.4833C7.24133 17.9599 6.66799 18.2374 6.05216 18.2449L3.01966 18.2833H3.01133Z"
                                            fill="#14B8AD" />
                                    </g>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M13.5195 9.73747C13.3861 9.73747 13.2528 9.69497 13.1386 9.6083L8.59531 6.1183C8.32198 5.9083 8.27031 5.51664 8.48031 5.24164C8.69114 4.9683 9.08281 4.91747 9.35698 5.12747L13.9011 8.61664C14.1745 8.82664 14.2261 9.21914 14.0153 9.4933C13.8928 9.6533 13.707 9.73747 13.5195 9.73747"
                                        fill="#14B8AD" />
                                </svg>
                            </button>
                        @endif
                    </div>

                    <div class="col-sm-1 mt-2 mb-2 px-1">
                        <a class="btn btn-delete w-100 text-center shadow-sm"
                            href="{{ route('records.destroy', $record->id) }}">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10.2055 18.3334C9.07635 18.3334 7.97552 18.3209 6.88635 18.2984C5.49302 18.2709 4.52885 17.3675 4.37135 15.9409C4.10885 13.5742 3.65969 7.99588 3.65552 7.94004C3.62719 7.59588 3.88385 7.29421 4.22802 7.26671C4.56719 7.25754 4.87385 7.49588 4.90135 7.83921C4.90552 7.89588 5.35385 13.455 5.61385 15.8034C5.70302 16.6142 6.14052 17.0325 6.91219 17.0484C8.99552 17.0925 11.1214 17.095 13.413 17.0534C14.233 17.0375 14.6764 16.6275 14.768 15.7975C15.0264 13.4692 15.4764 7.89588 15.4814 7.83921C15.5089 7.49588 15.813 7.25588 16.1539 7.26671C16.498 7.29504 16.7547 7.59588 16.7272 7.94004C16.7222 7.99671 16.2705 13.5892 16.0105 15.935C15.8489 17.3909 14.8872 18.2767 13.4355 18.3034C12.3247 18.3225 11.253 18.3334 10.2055 18.3334"
                                    fill="#FF4757" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M17.2567 5.82446H3.125C2.78 5.82446 2.5 5.54446 2.5 5.19946C2.5 4.85446 2.78 4.57446 3.125 4.57446H17.2567C17.6017 4.57446 17.8817 4.85446 17.8817 5.19946C17.8817 5.54446 17.6017 5.82446 17.2567 5.82446"
                                    fill="#FF4757" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M14.5337 5.82449C13.5853 5.82449 12.762 5.14866 12.5753 4.21866L12.3728 3.20533C12.3303 3.05116 12.1545 2.91699 11.9545 2.91699H8.42701C8.22701 2.91699 8.05117 3.05116 8.00034 3.24366L7.80617 4.21866C7.62034 5.14866 6.79617 5.82449 5.84784 5.82449C5.50284 5.82449 5.22284 5.54449 5.22284 5.19949C5.22284 4.85449 5.50284 4.57449 5.84784 4.57449C6.20284 4.57449 6.51117 4.32116 6.58117 3.97283L6.78367 2.95949C6.98951 2.18283 7.66201 1.66699 8.42701 1.66699H11.9545C12.7195 1.66699 13.392 2.18283 13.5895 2.92199L13.8012 3.97283C13.8703 4.32116 14.1787 4.57449 14.5337 4.57449C14.8787 4.57449 15.1587 4.85449 15.1587 5.19949C15.1587 5.54449 14.8787 5.82449 14.5337 5.82449"
                                    fill="#FF4757" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="row mt-3 mb-3">
                    <div class="col-sm-12 mt-2 mb-2">
                        <div class="w-100 rounded-3 bg-white p-4">
                            <div class="row mt-3">
                                <div class="col-sm-6 mb-2">
                                    <div class="mb-3">
                                        <div class="float-start me-2" style="margin-top: -1px;">
                                            <i class="bi bi-info-circle"></i>
                                        </div>
                                        <h2 class="d-inline-block ms-1"
                                            style="font-size: 15px !important;font-weight: 500 !important;">
                                            General Information
                                        </h2>
                                    </div>
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="text-secondary">Name</td>
                                                <td>
                                                    {{ $record->employee ? $record->employee->fullname : 'No Employee Assigned' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-secondary">Time</td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($record->time)->format('H:i:s') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-secondary">Date</td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($record->time)->format('j F Y') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-secondary">Type Detection</td>
                                                <td>
                                                    {{ $record->type }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-secondary">Description</td>
                                                <td>
                                                    {{ $record->description }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <img src="{{ asset('storage/' . $record->capture) }}" class="hero-mini"
                                        alt="Hero" />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (!$record->employee)
        <div class="modal fade" id="editRecord" tabindex="-2" aria-labelledby="editRecordLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-3">
                    <div class="p-3 border-bottom">
                        <h1 class="modal-title fs-5" id="editRecordLabel">Edit Your Record</h1>
                        <div class="text-secondary d-block subpoint">Fill the form below to edit an Record</div>
                        <button type="button" class="btn-close float-end custom-close" data-bs-dismiss="modal"
                            aria-label="Close" onclick="closeEditModal()">
                        </button>
                    </div>
                    <form class="modal-body" method="POST" id="update-Record-form" enctype="multipart/form-data"
                        action="{{ route('records.update', $record->id) }}">
                        @csrf
                        <div class="mb-3">
                            <label class="mb-2 text-secondary">Employee Name</label>
                            <input type="hidden" name="employee_id" id="employee_id" />
                            <input type="text" class="form-control py-2 mb-2"
                                placeholder="Serach: fullname, identify, email" name="search" id="search-form"
                                required />

                            <table class="table table-borderless" id="employeeTableBody">
                                @include('records._record_rows', ['employees' => $employees])
                            </table>

                            <div class="mt-3">
                                <label class="text-secondary mb-2 mt-2">Description</label>
                                <textarea class="form-control" rows="3" name="description"></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-add-employee">Edit Record</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('scripts')
    @if (!$record->employee)
        <script type="text/javascript">
            $(document).ready(function() {
                $('#search-form').on('input', function() {
                    let searchQuery = $(this).val();
                    $.ajax({
                        url: '{{ route('records.search') }}',
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

            function compl(id, fullname) {
                $('#table').empty();
                $('#search-form').val(fullname);
                $('#employee_id').val(id);
            }

            function editModal() {
                let editRecord = new bootstrap.Modal(document.getElementById('editRecord'), {});
                editRecord.show();
            }


            function closeEditModal() {
                let editRecord = new bootstrap.Modal(document.getElementById('editRecord'), {});
                editRecord.hide();
                document.querySelectorAll('.modal-backdrop').forEach((backdrop) => backdrop.remove());
            }
        </script>
    @endif
@endsection
