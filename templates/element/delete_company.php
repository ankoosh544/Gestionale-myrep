<!-- Delete Company Data Modal -->
<div class="modal custom-modal fade" id="delete_company_<?= $company->id ?>" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header text-center">
                        <h3>Delete Company</h3>
                        <p>Are you sure want to delete?</p>
                    </div>

                    <div class="modal-btn delete-action text-center">
                        <div class="row">
                            <div class="col">
                                <a href="/companies/delete-company?company_id=<?=$company->id?>" style="width:100%" class="btn btn-primary continue-btn">Delete</a>
                            </div>
                            <div class="col">
                                <a href="javascript:void(0);" style="width:100%" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
           
        </div>
    </div>
</div>
<!-- /Delete User Modal -->
