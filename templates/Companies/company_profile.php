

<style type="text/css">
	.profile-view .pro-edit {
    	position: absolute;
    	right: 0;
    	top: 0;
	}
	.edit-icon {
    	background-color: #eee;
    	border: 1px solid #e3e3e3;
    	border-radius: 24px;
    	color: #bbb;
    	float: right;
    	font-size: 12px;
    	line-height: 24px;
    	min-height: 26px;
    	text-align: center;
    	width: 26px;
    	}
	.company-info {
    	list-style: none;
    	margin-bottom: 0;
    	padding: 0;
	}
	.company-info li .title {
    	color: #4f4f4f;
    	float: left;
    	font-weight: 500;
   		margin-right: 30px;
    	width: 25%;
	}
	.company-info-left .profile-img {
    	width: 120px;
    	height: 120px;
	}
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="card mb-0">
    <div class="card-header">
               
                  <a href="/companies/add-employee?company_id=<?=$company_id?>"  class="btn btn-primary m-r-5">Add employee</a>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="<?= __('Cerca...') ?>">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    <div class="card-body">
    	 <div class="row">

                <div class="col-md-12">

                	 <div class="profile-view">

                	 	  <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="company-info-left">
                                        	<div class="profile-img">
												<a href="#"><img style="width:100%" alt="" src="/webroot/img/cake.icon.png"></a>
											</div>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                    	<h3><a href=""><?= $companyData->name ?></a></h3>
                                    	
                                    </div>
                                    <div class="col-md-7">
                                    	<ul class="company-info">
                                    		<li>
                                                <div class="title">Name:</div>
                                                <div class="text"><a href=""><?= $companyData->name ?></a></div>
                                            </li>
                                            <li>
                                            	<div class="title"> E-Mail</div>
                                            	<div class="text">
                                            		<?php if($companyData->email) : ?>
                                            			<?=$companyData->email?>
                                            		<?php else : ?>
                                            			--------------
                                            		<?php endif; ?>		
                                            	</div>
                                            </li>
                                            <li>
                                            	<div class="title">Address</div>
                                            	<div class="text"><?=$companyData->address?>, <?=$companyData->province?>, <?=$companyData->city?>,<?=$companyData->postal_code?></div>
                                            </li>
                                            <li>
                                            	<div class="title">VAT Number</div>
                                            	<div class="text"> <?=$companyData->vat?></div>
                                            </li>
                                            <li>
                                            	<div class="title"> PEC Address</div>
                                            	<div class="text"><?=$companyData->pec?></div>
                                            </li>
                                    	</ul>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-edit"><a href="/companies/edit-company-data?company_id=<?=$company_id?>" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>

                	 </div>
                </div>
        </div>
	</div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
             <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                           
                            <th><?= __('nome') ?></th>
                            <th><?= __('e-mail') ?></th>
                            <th class="text-right"><?=__('Action')?></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($company_members as $company_member) : ?>
                        <tr>
                            <td><?= $company_member->user->firstname ?> <?= $company_member->user->lastname ?></td>
                            <td><?=$company_member->user->email?></td>
                            <td class="text-right">
                                <span>
                                    <a class="btn" href="/users/edit_user_data?user_id=<?=$company_member->user->id?>"><i class="fa fa-pencil m-r-5"></i></a>  
                                    <a class="btn" href="" data-toggle="modal" data-target="#delete_user_<?=$company_member->user->id?>"><i class="fa fa-close"></i></a> 
                                </span>
                              
                            </td>
                        </tr>

                            <?= $this->element('delete_user',[
                            'company_member' => array(),
                            'user' => $company_member->user
                          ]) ?>

                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>