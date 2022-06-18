<?php
use Cake\I18n\Number;

$csrfToken = $this->request->getAttribute('csrfToken');

?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.0.0.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<div class="edit_company_block" style="margin-left: 15px;margin-right: 15px;">
    <form action="/companies/edit-company-data" method="POST">
	   <div class="row">
            <div class="col">
			     <div class="form-group">
                    <label> Name</label>
                    <?php if(!empty($companyData->name)) : ?>
                        <input type="text" name="name" class="form-control" value="<?=$companyData->name?>">
                    <?php elseif(!empty($updatecompany->name)): ?>
                        <input type="text" name="name" class="form-control" value="<?=$updatecompany->name?>">
                    <?php else: ?>
                         <input type="text" name="name" class="form-control">
                    <?php endif ; ?>
                </div>

               
               
                <div class="form-group">
                    <label>Address</label>
                    <?php if(!empty($companyData->address)): ?>
                        <input class="form-control" type="text" name="address" value="<?=$companyData->address?>">
                    <?php elseif(!empty($updatecompany->address)) : ?>
                        <input class="form-control" type="text" name="address"  value="<?=$updatecompany->address?>">
                    <?php else: ?>
                        <input class="form-control" type="text" name="address">
                    <?php endif; ?>
                </div>
              

         
                    <div class="form-group">
                       <label><?= __('Province') ?><span class="text-danger">*</span></label>
                            <select class="select2-icon" id="province" name="province" onchange="filtercities(this)">
                                <?php foreach ($cities as $city) : ?>
                                    <?php if(!empty($companyData->province) && $companyData->province == $city->province) : ?>
                                        <option selected value="<?= $city->province ?>"><?= $city->province ?></option>
                                    <?php elseif(!empty($updatecompany->province && $updatecompany->province == $city->province)) : ?>
                                        <option selected value="<?= $updatecompany->province ?>"> <?= $updatecompany->province ?></option>
                                    <?php else: ?>
                                         <option value="<?= $city->province ?>"> <?= $city->province ?></option>
                                    <?php endif ; ?>
                                <?php endforeach; ?>
                            </select>
                    </div>

            
                     <div class="form-group">
                           <label><?= __('City') ?><span class="text-danger">*</span></label>
                            <select class="select2-icon" id="company_city" name="city">
                                <?php if(!empty($companyData->city)): ?>
                                    <option selected value="<?= $companyData->city ?>"><?= $companyData->city ?></option>
                                <?php elseif(!empty($updatecompany->city)) : ?>
                                     <option selected value="<?= $updatecompany->city ?>"><?= $updatecompany->city ?></option>
                                <?php endif ; ?>
                            </select>
                        </div>


                     <div class="form-group">
                        <label><?= __('PostalCode') ?></label>
                       <?php if(!empty($companyData->postal_code)): ?>
                          <input class="form-control" value="<?=$companyData->postal_code?>" type="number" id="company_postalcode" name="postalcode" onkeyup="checkpostalcode(); return false;">
                             <span style="color: red;" id="postalcode_errormessage"></span>
                       <?php elseif(!empty($updatecompany->postal_code)) : ?>
                          <input class="form-control" value="<?=$updatecompany->postal_code?>" type="number" id="company_postalcode" name="postalcode"   onkeyup="checkpostalcode(); return false;">
                          <?php if(!empty($errors['postalcode'])) : ?>
                             <span style="color: red;" id="postalcode_errormessage"> <?=$errors['postalcode']?></span>
                         <?php endif; ?>
                         <?php else: ?>
                              <input class="form-control" placeholder="Postal Code" type="number" id="company_postalcode" name="postalcode"   onkeyup="checkpostalcode(); return false;">
                             <span style="color: red;" id="postalcode_errormessage"> </span>

                       <?php endif ; ?>
                    </div>


                    <div class="form-group">
                        <label>VAT Number</label>
                        <?php if(!empty($companyData->vat)) : ?>
                            <input type="text" name="vat" class="form-control" value="<?=$companyData->vat?>">
                        
                        <?php elseif(!empty($updatecompany->vat)) : ?>
                            <input type="text" name="vat" class="form-control" value="<?=$updatecompany->vat?>">
                            <?php if(!empty($errors['vat'])) : ?>
                              <span style="color: red;" ><?=$errors['vat']?> </span>
                          <?php endif ; ?>
                        <?php else : ?>
                              <input type="text" name="vat" class="form-control">
                        <?php endif; ?>
                    </div>


                    <div class="form-group">
                        <label>PEC Address</label>
                        <?php if(!empty($companyData->pec)) : ?>
                            <input type="text" name="pec" class="form-control" value="<?=$companyData->pec?>">
                         <?php elseif(!empty($updatecompany->pec)) : ?>
                        <input type="text" name="pec" class="form-control" value="<?=$updatecompany->pec?>">
                        <?php if(!empty($errors['pec'])) : ?>
                          <span style="color: red;" ><?=$errors['pec']?> </span>
                      <?php endif ; ?>
                        <?php else: ?>
                            <input type="text" name="pec" class="form-control">
                        <?php endif ; ?> 
                    </div>
            </div>  
        </div>        

       <div class="modal-btn text-center">
            <button type="submit" class="btn btn-primary">Update</button>
                <?php if(!empty($companyData)) : ?>
             	 <input type="hidden" name="company_id" value="<?=$companyData->id ?>">
                <?php elseif(!empty($updatecompany)) : ?>
                     <input type="hidden" name="company_id" value="<?=$updatecompany->id ?>">
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
</script>