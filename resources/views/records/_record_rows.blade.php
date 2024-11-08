@if ($employees)
    <tbody id="table">
        @foreach ($employees as $employee)
            <tr class="border-bottom" style="cursor: pointer !important;">
                <td class="mt-3 mb-3" onclick="compl('{{ $employee->id }}', '{{ $employee->fullname }}')">
                    <img src="{{ $employee->profile ? asset('storage/' . $employee->profile) : 'https://randomuser.me/api/portraits/men/90.jpg' }}"
                        alt="Profile Image" class="float-start circle-profile" />
                    <div class="uname">
                        <div class="fullname">
                            {{ $employee->fullname }}
                        </div>
                        <span class="text-secondary">{{ $employee->identify }}</span>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
@else
    <tbody id="table">
        <tr class="border-bottom"></tr>
    </tbody>
@endif
