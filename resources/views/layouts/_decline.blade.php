<div class="modal-content p-3">
    <div class="p-3 border-bottom">
        <h1 class="modal-title fs-5" id="rejectionRecordLabel">Rejction Note</h1>
        <button type="button" class="btn-close float-end custom-close" data-bs-dismiss="modal" aria-label="Close"
            onclick="rejectionRecordClose()">
        </button>
    </div>
    <form class="modal-body" method="POST" action="{{ route('updateRequestRecordDECLINE', $req->id) }}">
        @csrf
        <div class="row mb-2">
            <div class="col-12">
                <label class="text-secondary mb-2">Note</label>
                <textarea class="form-control" rows="3"></textarea>

                <button type="submit" class="w-100 btn-add-employee border-0 mt-3">Submit</button>
            </div>

        </div>
    </form>
</div>
