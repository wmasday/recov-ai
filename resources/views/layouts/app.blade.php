<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>RecovAI</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-white p-3 bg-white border-bottom pt-0 pb-0 fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand border-end" href="#">
                <img src="{{ asset('images/logo-recov.png') }}" alt="RecovAI Logo" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <div class="welcome">Good morning, Super Admin!</div>
                        <span class="text-secondary subwelcome">Lorem Ipsum Agrieva Xananda Pramudita</span>
                    </li>
                </ul>
                <div class="d-flex border-start ps-3" role="search">
                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://randomuser.me/api/portraits/men/92.jpg" alt="Profile Image" />
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="offcanvas offcanvas-start sidebar border-end" data-bs-scroll="true" data-bs-backdrop="false"
        tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <span class="offcanvas-title text-secondary" id="offcanvasScrollingLabel">MENU</span>
        </div>
        <div class="offcanvas-body">
            <a class="{{ request()->routeIs('dashboard') ? 'menu-list-active' : 'menu-list' }}"
                href="{{ route('dashboard') }}">
                <div class="icon float-start">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9 21.8V15.8C9 15.2696 9.21071 14.7608 9.58579 14.3858C9.96086 14.0107 10.4696 13.8 11 13.8H13C13.5304 13.8 14.0391 14.0107 14.4142 14.3858C14.7893 14.7608 15 15.2696 15 15.8V21.8M5 12.8H3L12 3.79999L21 12.8H19V19.8C19 20.3304 18.7893 20.8391 18.4142 21.2142C18.0391 21.5893 17.5304 21.8 17 21.8H7C6.46957 21.8 5.96086 21.5893 5.58579 21.2142C5.21071 20.8391 5 20.3304 5 19.8V12.8Z"
                            stroke="{{ request()->routeIs('dashboard') ? '#14B8AD' : '#9A9A9A' }}" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <span class="link-title">Dashboard</span>
            </a>

            <a class="{{ request()->routeIs('records') ? 'menu-list-active' : 'menu-list' }}"
                href="{{ route('records') }}">
                <div class="icon float-start">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16 3.79999V7.79999M8 3.79999V7.79999M4 11.8H20M11 15.8H12V18.8M4 7.79999C4 7.26955 4.21071 6.76085 4.58579 6.38577C4.96086 6.0107 5.46957 5.79999 6 5.79999H18C18.5304 5.79999 19.0391 6.0107 19.4142 6.38577C19.7893 6.76085 20 7.26955 20 7.79999V19.8C20 20.3304 19.7893 20.8391 19.4142 21.2142C19.0391 21.5893 18.5304 21.8 18 21.8H6C5.46957 21.8 4.96086 21.5893 4.58579 21.2142C4.21071 20.8391 4 20.3304 4 19.8V7.79999Z"
                            stroke="{{ request()->routeIs('records') ? '#14B8AD' : '#9A9A9A' }}" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <span class="link-title">Record List</span>
            </a>

            <a class="{{ request()->routeIs('employee.index') ? 'menu-list-active' : 'menu-list' }}"
                href="{{ route('employee.index') }}">
                <div class="icon float-start">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3 21V19C3 17.9391 3.42143 16.9217 4.17157 16.1716C4.92172 15.4214 5.93913 15 7 15H11C12.0609 15 13.0783 15.4214 13.8284 16.1716C14.5786 16.9217 15 17.9391 15 19V21M16 3.12988C16.8604 3.35018 17.623 3.85058 18.1676 4.55219C18.7122 5.2538 19.0078 6.11671 19.0078 7.00488C19.0078 7.89305 18.7122 8.75596 18.1676 9.45757C17.623 10.1592 16.8604 10.6596 16 10.8799M21 20.9999V18.9999C20.9949 18.1171 20.6979 17.2607 20.1553 16.5643C19.6126 15.8679 18.8548 15.3706 18 15.1499M5 7C5 8.06087 5.42143 9.07828 6.17157 9.82843C6.92172 10.5786 7.93913 11 9 11C10.0609 11 11.0783 10.5786 11.8284 9.82843C12.5786 9.07828 13 8.06087 13 7C13 5.93913 12.5786 4.92172 11.8284 4.17157C11.0783 3.42143 10.0609 3 9 3C7.93913 3 6.92172 3.42143 6.17157 4.17157C5.42143 4.92172 5 5.93913 5 7Z"
                            stroke="{{ request()->routeIs('employee.index') ? '#14B8AD' : '#9A9A9A' }}"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <span class="link-title">Employee List</span>
            </a>

            <a class="{{ request()->routeIs('assurance.index') ? 'menu-list-active' : 'menu-list' }}"
                href="{{ route('assurance.index') }}">
                <div class="icon float-start">
                    <svg width="25" height="24" viewBox="0 0 32 32" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M28.7913 17.6326C28.4642 17.3806 28.0894 17.1978 27.6894 17.0953C27.2895 16.9928 26.8729 16.9727 26.465 17.0364C28.8125 14.6664 30 12.3101 30 10.0001C30 6.69137 27.3387 4.00012 24.0675 4.00012C23.1995 3.99467 22.3408 4.17927 21.5518 4.54098C20.7627 4.90268 20.0624 5.43271 19.5 6.09387C18.9376 5.43271 18.2373 4.90268 17.4482 4.54098C16.6592 4.17927 15.8005 3.99467 14.9325 4.00012C11.6613 4.00012 9 6.69137 9 10.0001C9 11.3751 9.405 12.7114 10.2575 14.1251C9.5593 14.302 8.92211 14.6649 8.41375 15.1751L5.58625 18.0001H2C1.46957 18.0001 0.960859 18.2108 0.585786 18.5859C0.210714 18.961 0 19.4697 0 20.0001L0 25.0001C0 25.5306 0.210714 26.0393 0.585786 26.4143C0.960859 26.7894 1.46957 27.0001 2 27.0001H15C15.0818 27.0002 15.1632 26.9901 15.2425 26.9701L23.2425 24.9701C23.2935 24.958 23.3433 24.9412 23.3913 24.9201L28.25 22.8526L28.305 22.8276C28.772 22.5943 29.1718 22.2459 29.4669 21.8153C29.7621 21.3847 29.9427 20.8861 29.9918 20.3664C30.041 19.8467 29.957 19.3231 29.7478 18.8448C29.5387 18.3665 29.2112 17.9493 28.7962 17.6326H28.7913ZM14.9325 6.00012C15.707 5.98878 16.4673 6.20871 17.1162 6.63178C17.765 7.05485 18.273 7.66184 18.575 8.37512C18.6503 8.55853 18.7785 8.7154 18.9432 8.8258C19.1079 8.9362 19.3017 8.99515 19.5 8.99515C19.6983 8.99515 19.8921 8.9362 20.0568 8.8258C20.2215 8.7154 20.3497 8.55853 20.425 8.37512C20.727 7.66184 21.235 7.05485 21.8838 6.63178C22.5327 6.20871 23.293 5.98878 24.0675 6.00012C26.1987 6.00012 28 7.83137 28 10.0001C28 12.4389 26.0262 15.1976 22.2925 17.9876L20.9062 18.3064C21.0279 17.7924 21.0317 17.2575 20.9172 16.7418C20.8028 16.2261 20.5731 15.7431 20.2454 15.3288C19.9177 14.9145 19.5005 14.5798 19.0251 14.3497C18.5496 14.1196 18.0282 14.0001 17.5 14.0001H12.585C11.5063 12.5451 11 11.2651 11 10.0001C11 7.83137 12.8013 6.00012 14.9325 6.00012ZM2 20.0001H5V25.0001H2V20.0001ZM27.4287 21.0264L22.6787 23.0489L14.875 25.0001H7V19.4139L9.82875 16.5864C10.0138 16.3998 10.2341 16.252 10.4768 16.1513C10.7195 16.0507 10.9798 15.9993 11.2425 16.0001H17.5C17.8978 16.0001 18.2794 16.1582 18.5607 16.4395C18.842 16.7208 19 17.1023 19 17.5001C19 17.8979 18.842 18.2795 18.5607 18.5608C18.2794 18.8421 17.8978 19.0001 17.5 19.0001H14C13.7348 19.0001 13.4804 19.1055 13.2929 19.293C13.1054 19.4805 13 19.7349 13 20.0001C13 20.2653 13.1054 20.5197 13.2929 20.7072C13.4804 20.8948 13.7348 21.0001 14 21.0001H18C18.0753 20.9999 18.1503 20.9915 18.2237 20.9751L26.5987 19.0489L26.6375 19.0389C26.8932 18.9679 27.166 18.994 27.4036 19.1121C27.6412 19.2302 27.8267 19.432 27.9245 19.6787C28.0222 19.9254 28.0253 20.1995 27.9331 20.4483C27.8409 20.6971 27.6599 20.903 27.425 21.0264H27.4287Z"
                            fill="{{ request()->routeIs('assurance.index') ? '#14B8AD' : '#9A9A9A' }}" />
                    </svg>
                </div>
                <span class="link-title">Assurance</span>
            </a>

            <button type="button" class="menu-list border-0 text-start" data-bs-toggle="modal"
                data-bs-target="#medicalRecord" onclick="medicalRecordShow()">
                <div class="icon float-start ms-2">
                    <svg width="23" height="18" viewBox="0 0 21 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4 2H3C2.46957 2 1.96086 2.21071 1.58579 2.58579C1.21071 2.96086 1 3.46957 1 4V7.5C1 8.95869 1.57946 10.3576 2.61091 11.3891C3.64236 12.4205 5.04131 13 6.5 13C7.95869 13 9.35764 12.4205 10.3891 11.3891C11.4205 10.3576 12 8.95869 12 7.5V4C12 3.46957 11.7893 2.96086 11.4142 2.58579C11.0391 2.21071 10.5304 2 10 2H9M6 13C6 13.7879 6.15519 14.5681 6.45672 15.2961C6.75825 16.0241 7.20021 16.6855 7.75736 17.2426C8.31451 17.7998 8.97595 18.2417 9.7039 18.5433C10.4319 18.8448 11.2121 19 12 19C12.7879 19 13.5681 18.8448 14.2961 18.5433C15.0241 18.2417 15.6855 17.7998 16.2426 17.2426C16.7998 16.6855 17.2417 16.0241 17.5433 15.2961C17.8448 14.5681 18 13.7879 18 13V10M18 10C17.4696 10 16.9609 9.78929 16.5858 9.41421C16.2107 9.03914 16 8.53043 16 8C16 7.46957 16.2107 6.96086 16.5858 6.58579C16.9609 6.21071 17.4696 6 18 6C18.5304 6 19.0391 6.21071 19.4142 6.58579C19.7893 6.96086 20 7.46957 20 8C20 8.53043 19.7893 9.03914 19.4142 9.41421C19.0391 9.78929 18.5304 10 18 10ZM9 1V3M4 1V3"
                            stroke="#9A9A9A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <span class="link-title">Medical Record</span>
            </button>
        </div>
    </div>

    <div class="modal fade" id="medicalRecord" tabindex="-2" aria-labelledby="medicalRecordLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content p-3">
                <div class="p-3 border-bottom">
                    <h1 class="modal-title fs-5" id="medicalRecordLabel">Medica Record</h1>
                    <div class="text-secondary d-block subpoint">Request Employee Medical Record</div>
                    <button type="button" class="btn-close float-end custom-close" data-bs-dismiss="modal"
                        aria-label="Close" onclick="medicalRecordClose()">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mt-2 mb-2">
                        <div class="col-4">
                            <div class="float-start me-3">
                                <img src="https://randomuser.me/api/portraits/men/92.jpg" alt="Profile Image"
                                    class="profile-request" />
                            </div>
                            <div class="fullname">Muhammad Hidayat</div>
                            <div class="employee-id">3209300609050002</div>
                        </div>
                        <div class="col-4">
                            <div class="text-secondary" style="font-size: 13px !important;">
                                <i class="bi bi-envelope me-2"></i>
                                Email
                            </div>

                            <div class="email">withmasday@gmail.com</div>
                        </div>

                        <div class="col-4 text-center">
                            <div class="text-secondary" style="font-size: 10px !important;">Approve Request?</div>
                            <button type="button" class="btn btn-decline mx-2" onclick="rejectionRecordShow()">
                                <i class="bi bi-x"></i>
                            </button>

                            <button type="button" class="btn btn-approve mx-2" onclick="approveRecordShow()">
                                <i class="bi bi-check2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="approveRecord" tabindex="-1" aria-labelledby="approveRecordLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-3">
                <div class="p-3 border-bottom">
                    <h1 class="modal-title fs-5" id="approveRecordLabel">Medical Record Form</h1>
                    <button type="button" class="btn-close float-end custom-close" data-bs-dismiss="modal"
                        aria-label="Close" onclick="approveRecordClose()">
                    </button>
                </div>
                <form class="modal-body">
                    <div class="row mt-2 mb-2">
                        <div class="col-6">
                            <div class="float-start me-3">
                                <img src="https://randomuser.me/api/portraits/men/92.jpg" alt="Profile Image"
                                    class="profile-request" />
                            </div>
                            <div class="fullname">Muhammad Hidayat</div>
                            <div class="employee-id">3209300609050002</div>
                        </div>
                        <div class="col-6">
                            <div class="text-secondary" style="font-size: 13px !important;">
                                <i class="bi bi-envelope me-2"></i>
                                Email
                            </div>
                            <div class="email">withmasday@gmail.com</div>
                        </div>

                        <div class="col-12 mt-3">
                            <label class="text-secondary mb-2 mt-2">Date</label>
                            <input type="date" class="form-control py-2" />
                        </div>

                        <div class="col-12">
                            <label class="text-secondary mb-2 mt-2">Disease Type</label>
                            <input type="text" class="form-control py-2"
                                placeholder="Asthma, Dermatitis, tunnel..." />
                        </div>

                        <div class="col-12">
                            <label class="text-secondary mb-2 mt-2">Disease Detail</label>
                            <textarea class="form-control" rows="3"></textarea>

                            <button type="submit" class="w-100 btn-add-employee border-0 mt-3">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="rejectionRecord" tabindex="-1" aria-labelledby="rejectionRecordLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="p-3 border-bottom">
                    <h1 class="modal-title fs-5" id="rejectionRecordLabel">Rejction Note</h1>
                    <button type="button" class="btn-close float-end custom-close" data-bs-dismiss="modal"
                        aria-label="Close" onclick="rejectionRecordClose()">
                    </button>
                </div>
                <form class="modal-body">
                    <div class="row mb-2">
                        <div class="col-12">
                            <label class="text-secondary mb-2">Note</label>
                            <textarea class="form-control" rows="3"></textarea>

                            <button type="submit" class="w-100 btn-add-employee border-0 mt-3">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <main class="content">
        @yield('content')
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            var offcanvasElement = document.getElementById('offcanvasScrolling');
            var bsOffcanvas = new bootstrap.Offcanvas(offcanvasElement);
            bsOffcanvas.show();
        });

        function medicalRecordShow() {
            let medicalRecord = new bootstrap.Modal(document.getElementById('medicalRecord'), {});
            medicalRecord.show();
        }

        function medicalRecordClose() {
            let medicalRecord = new bootstrap.Modal(document.getElementById('medicalRecord'), {});
            medicalRecord.hide();
            document.querySelectorAll('.modal-backdrop').forEach((backdrop) => backdrop.remove());
        }

        function approveRecordShow() {
            document.querySelectorAll('.modal-backdrop').forEach((backdrop) => backdrop.remove());
            document.querySelectorAll('.modal.show').forEach((modal) => {
                let modalInstance = bootstrap.Modal.getInstance(modal);
                if (modalInstance) {
                    modalInstance.hide();
                }
            });
            let approveRecord = new bootstrap.Modal(document.getElementById('approveRecord'), {});
            approveRecord.show();
        }

        function approveRecordClose() {
            let approveRecord = new bootstrap.Modal(document.getElementById('approveRecord'), {});
            approveRecord.hide();
            document.querySelectorAll('.modal-backdrop').forEach((backdrop) => backdrop.remove());
        }

        function rejectionRecordShow() {
            document.querySelectorAll('.modal-backdrop').forEach((backdrop) => backdrop.remove());
            document.querySelectorAll('.modal.show').forEach((modal) => {
                let modalInstance = bootstrap.Modal.getInstance(modal);
                if (modalInstance) {
                    modalInstance.hide();
                }
            });
            let rejectionRecord = new bootstrap.Modal(document.getElementById('rejectionRecord'), {});
            rejectionRecord.show();
        }

        function rejectionRecordClose() {
            let rejectionRecord = new bootstrap.Modal(document.getElementById('rejectionRecord'), {});
            rejectionRecord.hide();
            document.querySelectorAll('.modal-backdrop').forEach((backdrop) => backdrop.remove());
        }
    </script>

    @if (session('success-add-employee'))
        <script type="text/javascript">
            Swal.fire({
                icon: 'success',
                title: 'Employee was successfully added',
                text: '{{ session('success-add-employee') }}',
            });
        </script>
    @endif

    @if (session('success-manage-assurance'))
        <script type="text/javascript">
            Swal.fire({
                icon: 'success',
                title: 'Manage assurance successfully',
                text: '{{ session('success-manage-assurance') }}',
            });
        </script>
    @endif

    @if (session('success-delete-employee'))
        <script type="text/javascript">
            Swal.fire({
                icon: 'success',
                title: 'Employee was successfully deleted',
                text: '{{ session('success-delete-employee') }}',
            });
        </script>
    @endif

    @if (session('success-update-employee'))
        <script type="text/javascript">
            Swal.fire({
                icon: 'success',
                title: 'Employee was successfully edited',
                text: '{{ session('success-delete-employee') }}',
            });
        </script>
    @endif

    @if (session('error'))
        <script type="text/javascript">
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
            });
        </script>
    @endif

    @yield('scripts')
</body>

</html>
