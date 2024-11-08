<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Record Updated</title>
</head>

<body>
    <h1>Hello, {{ $req->employee->fullname }}</h1>
    <p>Your request record has been updated with the following details:</p>
    <ul>
        <li><strong>Date:</strong> {{ $req->date ?? 'N/A' }}</li>
        <li><strong>Disease:</strong> {{ $req->disease ?? 'N/A' }}</li>
        <li><strong>Notes:</strong> {{ $req->notes ?? 'N/A' }}</li>
        <li><strong>Status:</strong> {{ $req->status ? 'Approved' : 'Pending' }}</li>
    </ul>
    <p>If you have any questions, please contact us.</p>
</body>

</html>
