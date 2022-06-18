<!-- add Employee Modal -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.0.0.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<div id="add_employee" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Employee </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form action="/companies/add-employee" method="POST">
                   <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><?= __('FirstName') ?><span class="text-danger">*</span></label>
                            <?php if(!empty($registration)): ?>
                                <input class="form-control" placeholder="First Name" type="text" name="first_name" value="<?=$registration->first_name?>" required>
                            <?php else: ?>
                                <input class="form-control" placeholder="First Name" type="text" name="first_name" required>
                            <?php endif ; ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label><?= __('LastName') ?><span class="text-danger">*</span></label>
                     <?php if(!empty($registration)): ?>
                         <input class="form-control"  type="text" name="last_name" value="<?=$registration->last_name?>" required>
                    <?php else: ?>
                        <input class="form-control" type="text" placeholder="Last Name" name="last_name" required>
                    <?php endif ; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                 <div class="form-group">
                    <label><?= __('E-mail') ?><span class="text-danger">*</span></label>
                     <?php if(!empty($registration)): ?>
                        <input class="form-control" type="text"  name="email" value="<?=$registration->email ?>" required>
                          <span style="color: red;" id="email_errormessage">
                            <?php if(!empty($errors['email'])) : ?>
                            <?=$errors['email']?>
                                <?php endif ; ?>
                            </span>
                    <?php else: ?>
                        <input class="form-control" type="text" placeholder="Enter E-mail" name="email" id="emailid"required>
                    <?php endif ; ?>
                   
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label><?= __('Telephone Number') ?></label>
                      <?php if(!empty($registration)): ?>
                        <input class="form-control" type="text" name="telephone" value="<?=$registration->telephone?>">
                            <span style="color: red;" id="telephone_errormessage">
                            <?php if(!empty($errors['telephone'])) : ?>
                            <?=$errors['telephone']?>
                                <?php endif ; ?>
                            </span>
                      <?php else: ?>
                        <input class="form-control" type="text" name="telephone" placeholder="Telephone Number">
                      <?php endif; ?>
                    
                </div>
                
            </div>
             
        </div>
          <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                <label><?= __('Password') ?><span class="text-danger">*</span></label>
                  <?php if(!empty($registration)): ?>
                     <input class="form-control" type="password" name="password" value="<?=$registration->password?>" id="user_password" onkeyup="checkpassword()" required>
                     <?php if(!empty($errors['password'])) : ?>
                      <span style="color: red;" id="password_errormessage"><?=$errors['password']?></span>
                  <?php endif ; ?>
                  <?php else: ?>
                     <input class="form-control" type="password" name="password" placeholder="Enter Password" id="user_password" onkeyup="checkpassword()" required>
                  <?php endif ; ?>
                </div>
            </div>
           
            <div class="col-sm-6">
                 <div class="form-group">
                    <label><?= __('RepeatPassword') ?><span class="text-danger">*</span></label>
                    <?php if(!empty($registration)): ?>
                          <input class="form-control" type="password" name="repeatpassword" value="<?=$registration->password?>" id="user_repeatepassword" onkeyup="checkrepeatpassword()">
                          <?php if(!empty($errors['password'])): ?>
                            <span style="color: red;" id="repeate_password_errormessage"><?=$errors['password']?></span>
                          <?php endif; ?>

                    <?php else: ?>
                         <input class="form-control" type="password" name="repeatpassword" placeholder="Enter Repeat Password" id="user_repeatepassword" onkeyup="checkrepeatpassword()" required>
                    <?php endif ; ?>
                   
                      
                </div>
            </div>
        </div>
                   <div class="modal-btn text-center">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <input type="hidden" name="company_id" value="<?=$company_id?>">
                        <input type="hidden" value="<?= $csrfToken ?>"name="_csrfToken">
                   </div>
               </form>
            </div>
        </div>
    </div>
</div>

<!-- /Add employee Modal -->
<script type="text/javascript">

    
    function formatText(icon) {
        return $('<span><i class="fas ' + $(icon.element).data('icon') + '"></i> ' + icon.text + '</span>');
        console.log("hh")
    };

    $('.select2-icon').select2({

        width: "100%",
        templateSelection: formatText,
        templateResult: formatText
    });
</script>

