<!-- Delete User Modal -->

<div class="modal custom-modal fade" id="delete_user_<?= $user->id ?>" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

           
                <div class="modal-body">
                    <div class="form-header text-center">
                        <?php if(!empty($employee)) : ?>
                        <h3>Delete Employee from Company</h3>
                        <p>Are you sure want to delete?</p>
                        <?php else: ?>
                        <h3>Delete User</h3>
                        <p>Are you sure want to delete?</p>
                        <?php endif ; ?>
                    </div>

                    <div class="modal-btn delete-action text-center">
                        <div class="row">
                            <div class="col">
                            <?php if(!empty($employee)) : ?>
                                 <a href="/companies/delete-employee?user_id=<?=$user->id?>&company_id=<?=$employee->company_id?>" style="width:100%" class="btn btn-primary continue-btn">Delete</a>
                            <?php else: ?>
                                   <a href="/users/deleteuser?user_id=<?=$user->id?>" style="width:100%" class="btn btn-primary continue-btn">Delete</a>
                            <?php endif ; ?>
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
