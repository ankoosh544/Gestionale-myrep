<!-- Edit Company Data Modal -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.0.0.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


<div id="edit_company_<?=$company->id ?>" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Company Information </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form action="/companies/update-companydata" method="POST">
                  <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="text" name="name" value="<?=$company->name?>">
                   </div>

                   <div class="form-group">
                       <label>Address</label>
                       <input class="form-control" type="text" name="address" value="<?=$company->address?>">
                   </div>
                    <div class="form-group">
                        <label>Province</label>
                        <select class="select2-icon" id="province" name="province" onchange="filtercities(this)">
                         <?php foreach ($cities as $city) : ?>
                            <?php if($company->province == $city->province) : ?>
                             <option selected value="<?= $city->province ?>"><?= $city->province ?></option>
                         <?php else : ?>
                             <option value="<?= $city->province ?>"> <?= $city->province ?></option>
                         <?php endif ; 
                         ?>
                         <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <select class="select2-icon" id="company_city" name="city">
                            <option selected value="<?= $company->city ?>"><?= $company->city ?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Postal Code</label>
                         <input class="form-control" value="<?=$company->postal_code?>" type="number" id="company_postalcode" name="postalcode"   onkeyup="checkpostalcode(); return false;">
                          <span style="color: red;" id="postalcode_errormessage"></span>
                    </div>
                    <div class="form-group">
                        <label>VAT</label>
                        <input type="text" name="vat" value="<?=$company->vat?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>PEC</label>
                        <input type="text" name="pec" value="<?=$company->pec?>" class="form-control">
                    </div>
                   <div class="modal-btn text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <input type="hidden" name="company_id" value="<?=$company->id?>">
                        <input type="hidden" value="<?= $csrfToken ?>"name="_csrfToken">
                   </div>
               </form>
            </div>
        </div>
    </div>
</div>

<!-- /Edit CompanyData Modal -->
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