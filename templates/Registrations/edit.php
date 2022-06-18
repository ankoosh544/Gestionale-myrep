<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Registration $registration
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $registration->email],
                ['confirm' => __('Are you sure you want to delete # {0}?', $registration->email), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Registrations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="registrations form content">
            <?= $this->Form->create($registration) ?>
            <fieldset>
                <legend><?= __('Edit Registration') ?></legend>
                <?php
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('last_name');
                    echo $this->Form->control('password');
                    echo $this->Form->control('company_name');
                    echo $this->Form->control('company_address');
                    echo $this->Form->control('company_province');
                    echo $this->Form->control('company_city');
                    echo $this->Form->control('company_cap');
                    echo $this->Form->control('company_vat_number');
                    echo $this->Form->control('company_pec_address');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
