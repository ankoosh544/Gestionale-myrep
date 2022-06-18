<?php
use Cake\I18n\Number;

$csrfToken = $this->request->getAttribute('csrfToken');


$this->assign('title', __('Modifica dati utente'));
$this->assign('page_title', __('Modifica dati utente'));
?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.0.0.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<div class="edit_user_block">
    <form action="/users/edit_user_data" method="POST">
	   <div class="row">
            <div class="col">
			     <div class="form-group">
                <label>First Name</label>
                <?php if(!empty($updateuser)) : ?>
                	 	<input class="form-control" type="text" name="first_name" value="<?=$updateuser->firstname?>">
                <?php elseif(!empty($company_member)) : ?>
                	    <input class="form-control" type="text" name="first_name" value="<?=$company_member->user->firstname?>">
                <?php endif ; ?>	
                </div>

                <div class="form-group">
               <label>Last Name</label>
                <?php if(!empty($updateuser)) : ?>
                	 <input class="form-control" type="text" name="last_name" value="<?=$updateuser->lastname?>">
                  <?php elseif(!empty($company_member)) : ?>
                	 <input class="form-control" type="text" name="last_name" value="<?=$company_member->user->lastname?>">
                <?php endif ; ?>
                </div>

                <div class="form-group">
                <label>TelePhone</label>
                   <?php if(!empty($updateuser)) : ?>
                   	<input type="text" name="telephone" class="form-control"value="<?=$updateuser->telephone?>">
                   	<span style="color: red;" id="telephone_errormessage">
                            <?php if(!empty($errors['telephone'])) : ?>
                            <?=$errors['telephone']?>
                                <?php endif ; ?>
                            </span>
                     <?php elseif(!empty($company_member)) : ?>
                   	<input type="text" name="telephone" class="form-control"value="<?=$company_member->user->telephone?>">
                   <?php endif ; ?> 
                </div>

            </div>

            <div class="col">
                <?php if(!empty($updateuser)) : ?>
                    <div class="form-group">
                        <label><?= __('Company Name') ?><span class="text-danger">*</span></label>
                            <select class="select2-icon" id="companyId" name="company_id" onchange="filtercompanyaddress(this)">
                                <?php foreach ($companies as $company) : ?>
                                    <?php if($company->id == $update_usercompany->id) : ?>
                                        <option selected value="<?= $company->id ?>"><?= $company->name ?></option>
                                    <?php else : ?>
                                        <option   value="<?= $company->id ?>"> <?= $company->name ?></option>
                                    <?php endif ; ?>
                                <?php endforeach; ?>
                            </select>
                    </div>
                <?php elseif(!empty($company_member)) : ?>
                    <div class="form-group">
                        <label><?= __('Company Name') ?><span class="text-danger">*</span></label>
                            <select class="select2-icon" id="companyId" name="company_id" onchange="filtercompanyaddress(this)">
                                <?php foreach ($companies as $company) : ?>
                                    <?php if($company->id == $company_member->company->id) : ?>
                                        <option selected value="<?= $company->id ?>"><?= $company->name ?></option>
                                    <?php else : ?>
                                        <option  value="<?= $company->id ?>"> <?= $company->name ?></option>
                                    <?php endif ; ?>
                                <?php endforeach; ?>
                            </select>
                    </div>
                <?php endif; ?>

                <?php if(!empty($updateuser)): ?>
                    <div class="form-group">
                        <label>Address</label>
                        <input class="form-control" type="text" id="company_address" name="address" value="<?=$update_usercompany->address?>">
                    </div>
                <?php elseif(!empty($company_member)) : ?>
                     <div class="form-group">
                        <label>Address</label>
                        <input class="form-control" type="text" id="company_address" name="address" value="<?=$company_member->company->address?>">
                    </div>
                <?php endif; ?>

                <?php if(!empty($updateuser)) : ?>
                    <div class="form-group">
                       <label><?= __('Province') ?><span class="text-danger">*</span></label>
                            <select class="select2-icon" id="province" name="province" onchange="filtercities(this)">
                             <?php foreach ($cities as $city) : ?>
                                <?php if($update_usercompany->province == $city->province) : ?>
                                 <option selected value="<?= $city->province ?>"><?= $city->province ?></option>
                             <?php else : ?>
                                 <option value="<?= $city->province ?>"> <?= $city->province ?></option>
                             <?php endif ; 
                             ?>
                             <?php endforeach; ?>
                            </select>
                    </div>
                <?php elseif(!empty($company_member)) : ?>
                     <div class="form-group">
                       <label><?= __('Province') ?><span class="text-danger">*</span></label>
                            <select class="select2-icon" id="province" name="province" onchange="filtercities(this)">
                             <?php foreach ($cities as $city) : ?>
                                <?php if($company_member->company->province == $city->province) : ?>
                                 <option selected value="<?= $city->province ?>"><?= $city->province ?></option>
                             <?php else : ?>
                                 <option value="<?= $city->province ?>"> <?= $city->province ?></option>
                             <?php endif ; ?>
                             <?php endforeach; ?>
                            </select>
                    </div>
                <?php endif; ?>


                <?php if(!empty($updateuser)) : ?>
                     <div class="form-group">
                           <label><?= __('City') ?><span class="text-danger">*</span></label>
                            <select class="select2-icon" id="company_city" name="city">
                                <?php if(!empty($update_usercompany)): ?>
                                    <option selected value="<?= $update_usercompany->city ?>"><?= $update_usercompany->city ?></option>
                                <?php else: ?>
                                    <?php foreach ($defalutcities as $city) : ?>
                                        <option value="<?= $city->name ?>"><?= $city->name ?></option>
                                    <?php endforeach; ?>
                                <?php endif ; ?>
                            </select>
                        </div>
                <?php elseif(!empty($company_member)) : ?>
                      <div class="form-group">
                           <label><?= __('City') ?><span class="text-danger">*</span></label>
                            <select class="select2-icon" id="company_city" name="city">
                                <?php if(!empty($company_member->company)): ?>
                                    <option selected value="<?= $company_member->company->city ?>"><?= $company_member->company->city ?></option>
                                <?php else: ?>
                                    <?php foreach ($defalutcities as $city) : ?>
                                        <option value="<?= $city->name ?>"><?= $city->name ?></option>
                                    <?php endforeach; ?>
                                <?php endif ; ?>
                            </select>
                        </div>
                <?php endif ; ?>

                <?php if(!empty($updateuser)) : ?>
                     <div class="form-group">
                        <label><?= __('PostalCode') ?></label>
                       <?php if(!empty($update_usercompany)): ?>
                          <input class="form-control" value="<?=$update_usercompany->postal_code?>" type="number" id="company_postalcode" name="postalcode" onkeyup="checkpostalcode(); return false;">
                          <?php if(!empty($errors['postalcode'])) : ?>
                             <span style="color: red;" id="postalcode_errormessage"> <?=$errors['postalcode']?></span>
                          <?php endif ; ?>
                       <?php else : ?>
                          <input class="form-control" placeholder="Postal Code" type="number" id="company_postalcode" name="postalcode"   onkeyup="checkpostalcode(); return false;">
                             <span style="color: red;" id="postalcode_errormessage"> </span>
                       <?php endif ; ?>
                    </div>
                <?php elseif(!empty($company_member)) : ?>
                      <div class="form-group">
                        <label><?= __('PostalCode') ?></label>
                       <?php if(!empty($company_member->company)): ?>
                          <input class="form-control" value="<?=$company_member->company->postal_code?>" type="number" id="company_postalcode" name="postalcode" onkeyup="checkpostalcode(); return false;">
                          <?php if(!empty($errors['postalcode'])) : ?>
                             <span style="color: red;"> <?=$errors['postalcode']?></span>
                          <?php endif ; ?>
                       <?php else : ?>
                          <input class="form-control" placeholder="Postal Code" type="number" id="company_postalcode" name="postalcode"   onkeyup="checkpostalcode(); return false;">
                           <span style="color: red;" id="postalcode_errormessage"> </span>
                       <?php endif ; ?>
                   </div>
                <?php endif ; ?>
            </div>
            
        </div>        

       <div class="modal-btn text-center">
            <button type="submit" class="btn btn-primary">Update</button>
             <?php if(!empty($updateuser)) : ?>
             	 <input type="hidden" name="user_id" value="<?=$updateuser->id ?>"> 
            <?php endif; ?>
            <?php if(!empty($company_member)) : ?>
             	 <input type="hidden" name="user_id" value="<?=$company_member->user_id ?>"> 
             <?php endif ; ?>
            <input type="hidden" value="<?= $csrfToken ?>"name="_csrfToken">
       </div>
     </form> 

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

    function filtercompanyaddress(){

        var company_id = $('#companyId').val();

          $.ajax({
            url: '/companies/getcompanydata?companyId='+company_id,
            success: function(data) {
                console.log(data, 'data');
           

            $('#company_address').val(data.address);
            $('#province').val(data.province);
            $('#company_city').val(data.city);
            $('#company_postalcode').val(data.postal_code);

            
            },
            error: function(a, b, c) {
                console.log(a, b, c);
            }
        })


    }
</script>