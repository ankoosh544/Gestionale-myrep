 <?php
$csrfToken = $this->request->getAttribute('csrfToken');
?>

<div class="container-fluid">
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
    <div class="form-group text-center">
        <button class="btn btn-primary account-btn" type="submit">Add employee</button>
        <input type="hidden" name="_csrfToken" value="<?=$csrfToken?>">
        <input type="hidden" name="company_id" value="<?=$company_id?>">
    </div>
    </form>
</div>    
       