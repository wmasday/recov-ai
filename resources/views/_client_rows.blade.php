@if ($employees)
    @foreach ($employees as $employee)
        <tr>
            <td style="width: 30%;">
                <img src="{{ $employee->profile ? asset('storage/' . $employee->profile) : 'https://randomuser.me/api/portraits/men/90.jpg' }}"
                    alt="Profile Image" class="float-start circle-profile" />
                <div class="uname text-start">
                    <div class="fullname">
                        {{ $employee->fullname }}
                    </div>
                    <span class="text-secondary">{{ $employee->identify }}
                    </span>
                </div>
            </td>
            <td class="text-start" style="width: 30%;">
                <div class="text-secondary" style="font-size: 13px !important;">
                    <i class="bi bi-envelope me-2"></i>
                    Email
                </div>

                <div class="email">{{ $employee->email }}</div>
            </td>
            <td class="text-center">
                <a href="{{ route('client.requestRecord', $employee->id) }}" class="btn text-decoration-none"
                    style="color: #14B8AD;font-size:13px;">
                    Request Medical Record
                </a>
            </td>
            <td>
                <a href="{{ route('client.assuranceCheck', $employee->id) }}"
                    class="btn text-decoration-none text-white" style="background-color: #14B8AD;font-size:13px;">
                    Check Insurance
                </a>
            </td>
        </tr>
    @endforeach
@else
    <tbody id="table">
        <tr class="border-bottom"></tr>
    </tbody>
@endif
