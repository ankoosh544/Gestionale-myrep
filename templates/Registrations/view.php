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
            <?= $this->Html->link(__('Edit Registration'), ['action' => 'edit', $registration->email], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Registration'), ['action' => 'delete', $registration->email], ['confirm' => __('Are you sure you want to delete # {0}?', $registration->email), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Registrations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Registration'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="registrations view content">
            <h3><?= h($registration->email) ?></h3>
            <table>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($registration->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($registration->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($registration->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Company Name') ?></th>
                    <td><?= h($registration->company_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Company Address') ?></th>
                    <td><?= h($registration->company_address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Company Province') ?></th>
                    <td><?= h($registration->company_province) ?></td>
                </tr>
                <tr>
                    <th><?= __('Company City') ?></th>
                    <td><?= h($registration->company_city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Company Vat Number') ?></th>
                    <td><?= h($registration->company_vat_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Company Pec Address') ?></th>
                    <td><?= h($registration->company_pec_address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Company Cap') ?></th>
                    <td><?= $registration->company_cap === null ? '' : $this->Number->format($registration->company_cap) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
