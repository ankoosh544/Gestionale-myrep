<?php
use Cake\I18n\Number;

$csrfToken = $this->request->getAttribute('csrfToken');
?>
<style type="text/css">
	.row{
		display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
	}
	.profile-widget {
    background-color: #fff;
    border: 1px solid #ededed;
    border-radius: 4px;
    margin-bottom: 30px;
    padding: 20px;
    text-align: center;
    position: relative;
    box-shadow: 0 1px 1px 0 rgb(0 0 0 / 20%);
    overflow: hidden;
}

.dropdown.profile-action {
    position: absolute;
    right: 5px;
    text-align: right;
    top: 10px;
}

</style>


<div class="content container-fluid" style="padding: 30px;">
    <div class="row staff-grid-row">
	   <?php foreach($allcompanies as $company) : ?>
	       <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
	           <div class="profile-widget">
	               <div class="dropdown profile-action">
		              <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_company_<?=$company->id?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_company_<?=$company->id?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                            <a class="dropdown-item" href="/companies/company-employees?company_id=<?=$company->id?>" ><i class="fa fa-trash-o m-r-5"></i> Employees </a>
                        </div>
	               </div>
			       <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="/companies/company-profile?company_id=<?=$company->id?>"><?=$company->name?></a></h4>
			       <span>
				        <h5>Address</h5><p><?=$company->address?>,<?=$company->province?>,<?=$company->city?>,<?=$company->cap?></p>
			      </span>
		      </div>
	       </div>
            <?= $this->element('edit_company',[
                'company_member' => null,
                'csrfToken' => $csrfToken,
                'company' => $company,
                'cities' => $cities
            ]) ?>

            <?= $this->element('delete_company',[
                'company_member' => null,
                'company' => $company
            ]) ?>
	   <?php endforeach ; ?>
    </div>
</div>