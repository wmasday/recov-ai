<div class="modal-content p-3">
    <div class="p-3 border-bottom">
        <h1 class="modal-title fs-5" id="approveRecordLabel">Medical Record Form</h1>
        <button type="button" class="btn-close float-end custom-close" data-bs-dismiss="modal" aria-label="Close"
            onclick="approveRecordClose()">
        </button>
    </div>
    <form class="modal-body" method="POST" action="{{ route('updateRequestRecord', $req->id) }}">
        @csrf
        <div class="row mt-2 mb-2">
            <div class="col-6">
                <div class="float-start me-3">
                    <img src="https://randomuser.me/api/portraits/men/92.jpg" alt="Profile Image"
                        class="profile-request" />
                </div>
                <div class="fullname">{{ $req->employee->fullname }}</div>
                <div class="employee-id">{{ $req->employee->identify }}</div>
            </div>
            <div class="col-6">
                <div class="text-secondary" style="font-size: 13px !important;">
                    <i class="bi bi-envelope me-2"></i>
                    Email
                </div>
                <div class="email">{{ $req->employee->email }}</div>
            </div>

            <div class="col-12 mt-3">
                <label class="text-secondary mb-2 mt-2">Date</label>
                <input type="date" class="form-control py-2" name="date" />
            </div>

            <div class="col-12">
                <label class="text-secondary mb-2 mt-2">Disease Type</label>
                <input type="text" class="form-control py-2" placeholder="Asthma, Dermatitis, tunnel..."
                    name="disease" />
            </div>

            <div class="col-12">
                <label class="text-secondary mb-2 mt-2">Disease Detail</label>
                <textarea class="form-control" rows="3" name="notes"></textarea>

                <button type="submit" class="w-100 btn-add-employee border-0 mt-3">Submit</button>
            </div>

        </div>
    </form>
</div>
