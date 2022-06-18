<?php
$csrfToken = $this->request->getAttribute('csrfToken');
?>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.0.0.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<style type="text/css">
    .register-page{
        width: 50%;
    }
    .registration-card{
        width: 100%;
    }
</style>

<div class="register-page">
    <h2>Registration</h2>
    <div class="card card-outline card-primary registration-card" >
        <div class="card-header text-center">
          <a href="../../index2.html" class="h4"><strong>User Data</strong></a>
        </div>
        <div class="card-body">

    <!-- Account Form -->
    <form action="/registrations/register" method="POST">

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

        <div class="card-header text-center">
          <a href="../../index2.html" class="h4"><strong>Company Data</strong></a>
        </div>
            </br>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label><?= __('CompanyName') ?></label>
                      <?php if(!empty($registration)): ?>
                         <input class="form-control" type="text" name="company_name" value="<?=$registration->company_name?>">
                      <?php else: ?>
                         <input class="form-control" type="text" name="company_name" placeholder="Company Name">
                      <?php endif ; ?>
                </div>
            </div>
           <div class="col-sm-6">
            <div class="form-group">
                <label><?= __('Address') ?></label>
                 <?php if(!empty($registration)): ?>
                     <input class="form-control" type="text" name="company_address" value="<?=$registration->company_address?>">
                 <?php else: ?>
                    <input class="form-control" type="text" name="company_address" placeholder="Address">
                 <?php endif ; ?>
            </div> 
           </div> 
        </div>
        <div class="row">
                <div class="col-sm-6">
                     <label><?= __('Province') ?><span class="text-danger">*</span></label>
                           <?php if(!empty($registration)): ?>
                            <div class="form-group">
                                <select class="select2-icon" id="province" name="province" onchange="filtercities(this)">
                                 <?php foreach ($cities as $city) : ?>
                                    <?php if($registration->company_province == $city->province) : ?>
                                     <option selected value="<?= $city->province ?>"><?= $city->province ?></option>
                                 <?php else : ?>
                                     <option value="<?= $city->province ?>"> <?= $city->province ?></option>
                                 <?php endif ; 
                                 ?>
                                 <?php endforeach; ?>
                                </select>
                            </div>
                           <?php else : ?>
                            <div class="form-group">
                                <select class="select2-icon" id="province" name="province" onchange="filtercities(this)">
                                    <?php foreach ($cities as $city) : ?>
                                        <option value="<?= $city->province ?>"><?= $city->province ?></option>
                                    <?php endforeach; ?>
                                 </select>
                            </div>
                           <?php endif ; ?>
                     
                </div>
                
           
                <div class="col-sm-6">
                     <label><?= __('City') ?></label>
                        <div class="form-group">
                            <select class="select2-icon" id="company_city" name="city">
                                <?php if(!empty($registration)): ?>
                                    <option selected value="<?= $registration->company_city ?>"><?= $registration->company_city ?></option>
                                <?php else: ?>
                                    <?php foreach ($defalutcities as $city) : ?>
                                        <option value="<?= $city->name ?>"><?= $city->name ?></option>
                                    <?php endforeach; ?>
                                <?php endif ; ?>
                            </select>
                        </div>
                </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label><?= __('PostalCode') ?></label>
                       <?php if(!empty($registration)): ?>
                          <input class="form-control" value="<?=$registration->company_cap?>" type="number" id="company_postalcode" name="postalcode" onkeyup="checkpostalcode(); return false;">
                          <?php if(!empty($errors['postalcode'])) : ?>
                             <span style="color: red;" id="postalcode_errormessage"> <?=$errors['postalcode']?></span>
                          <?php endif ; ?>
                       <?php else : ?>
                          <input class="form-control" placeholder="Postal Code" type="number" id="company_postalcode" name="postalcode"   onkeyup="checkpostalcode(); return false;">
                       <?php endif ; ?>
              
                   
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label><?= __('VAT') ?></label>
                     <?php if(!empty($registration)): ?>
                          <input class="form-control" type="text" name="vat" value="<?=$registration->company_vat_number?>">
                     <?php else: ?>
                          <input class="form-control" type="text" name="vat" placeholder="VAT Number">
                     <?php endif; ?>
                </div>
            </div>
           
        </div>
        <div class="row">
            
            <div class="col-sm-6">
                <div class="form-group">
                    <label><?= __('PEC') ?></label>
                    <?php if(!empty($registration)): ?>
                         <input class="form-control" type="text" name="pec"value="<?=$registration->company_pec_address?>">
                    <?php else: ?>
                         <input class="form-control" type="text" name="pec" placeholder=" PEC Number">
                    <?php endif ; ?>

                </div>
            </div>
        </div>
       
        <div class="form-group text-center">
            <button class="btn btn-primary account-btn" type="submit">Register</button>
            <input type="hidden" name="_csrfToken" value="<?=$csrfToken?>">
        </div>
        <div class="account-footer">
            <p>Already have an account? <a href="/users/login">Login</a></p>
        </div>
    </form>
    <!-- /Account Form -->
</div>
</div>

</div>

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

     function filtercities() {
        var province = $('#province').val();
        $.ajax({
            url: '/cities/filtercities?province='+province+'',
            success: function(data) {
                console.log(data, 'data');
                $("#company_city").empty();
                var htmlCode = "";
                data.forEach((city) => {
                    htmlCode += "<option value='" + city.name + "'>" + city.name + " " + "</option>";
                });
                $("#company_city").html(htmlCode);
            },
            error: function() {}
        });

    }

    function checkpostalcode() {
        city = $('#company_city').val();
        postalcode = $('#company_postalcode').val();
        $.ajax({
            url: '/cities/checkpostalcode?city='+city+'&postalcode='+postalcode+'',
            success: function(data) {
                console.log(data, 'data');
                $('#postalcode_errormessage').empty();

                if (data['RESULT'] == "ERROR") {
                    $('#postalcode_errormessage').append(data['MESSAGE']);
                } else {
                    $('#postalcode_errormessage').empty();
                }
            },
            error: function(a, b, c) {
                console.log(a, b, c);
            }
        })
    }

   
    function checkpassword(){
        var password = $('#user_password').val();
        $.ajax({

            url: '/registrations/checkpassword?password='+password+'',
           
            success: function(data) {
                $('#password_errormessage').empty();
                $('#password_errormessage').append(data);
            },
            error: function(data) {}
        });
    }

     function checkrepeatpassword() {
        var password = $('#user_password').val();
        var repeat = $('#user_repeatepassword').val();
         var $str ="Password Missmatch";
      
        $('#repeate_password_errormessage').empty();
        if (password != repeat) {
            $('#repeate_password_errormessage').append($str);
        }
        

    }
</script>
