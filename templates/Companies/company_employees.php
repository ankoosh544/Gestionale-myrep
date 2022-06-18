<?php
use Cake\I18n\Number;

$csrfToken = $this->request->getAttribute('csrfToken');


$this->assign('title', __('Tutti i Dipendenti dell azienda'));
$this->assign('page_title', __('Tutti i Dipendenti dell azienda'));
?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= __('Tutti i Dipendenti dell azienda') ?></h3>
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
            
            <!-- /.card-header -->
        <?php if (empty(count($company_members))) : ?>
            <div class="card-body">
                <p><?= __('Nessun utenti presente all\'interno del catalogo.') ?></p>
            </div>
        <?php else : ?>
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
                    <?php foreach ($company_members as $employee) : ?>
                        <tr>
                            <td><?= $employee->user->firstname ?> <?= $employee->user->lastname ?></td>
                            <td><?=$employee->user->email?></td>
                            <td class="text-right">
                                  <span>
                                    <a class="btn" href="/users/edit_user_data?user_id=<?= $employee->user->id ?>"><i class="fa fa-pencil m-r-5"></i></a>  
                                    <a class="btn" href="" data-toggle="modal" data-target="#delete_user_<?= $employee->user->id ?>"><i class="fa fa-close"></i></a> 
                                </span>
                            </td>
                        </tr>

                            <?= $this->element('delete_user',[
                            'user' => $employee->user,
                            'employee' => $employee,
                            'company_member' => null,

                          ]) ?>

                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        <?php endif; ?>
        </div>
        <!-- /.card -->
    </div>
</div>
