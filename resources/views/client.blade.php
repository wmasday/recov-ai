<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RecovAI</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-white">
    <main class="container">
        <div class="text-center" style="padding-top: 100px;">
            <img src="{{ asset('images/inline-logo-horizontal.png') }}" alt="RecovAI Logo"
                style="width: 274.72px;height: 72px !important;" />
            <h1 style="font-weight: 300;font-size: 15px;" class="mt-5 mb-5">
                Check employee insurance status & Medical Record
            </h1>

            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <input type="text" class="border-0 rounded-3 shadow-sm w-100 p-3" id="search-form"
                        placeholder="Search employee/employee ID, ex: Dicka Taksa, 1234567" style="font-size: 13px;" />

                    <table class="table table-borderless mt-3">
                        <tbody id="employeeTableBody"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#search-form').on('input', function() {
                let searchQuery = $(this).val();
                $.ajax({
                    url: '{{ route('client.search') }}',
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
    @if (session('assurance-avaiable'))
        <script type="text/javascript">
            Swal.fire({
                icon: 'success',
                title: 'Your Insurance Is Available',
                text: '{{ session('assurance-avaiable') }}',
            });
        </script>
    @endif

    @if (session('request-record-success'))
        <script type="text/javascript">
            Swal.fire({
                icon: 'success',
                title: 'Your Request Has Been Delivered',
                text: '{{ session('request-record-success') }}',
            });
        </script>
    @endif
</body>

</html>
