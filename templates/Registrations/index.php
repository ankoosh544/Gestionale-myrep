<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Registration[]|\Cake\Collection\CollectionInterface $registrations
 */
?>
<div class="registrations index content">
    <?= $this->Html->link(__('New Registration'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Registrations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('company_name') ?></th>
                    <th><?= $this->Paginator->sort('company_address') ?></th>
                    <th><?= $this->Paginator->sort('company_province') ?></th>
                    <th><?= $this->Paginator->sort('company_city') ?></th>
                    <th><?= $this->Paginator->sort('company_cap') ?></th>
                    <th><?= $this->Paginator->sort('company_vat_number') ?></th>
                    <th><?= $this->Paginator->sort('company_pec_address') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registrations as $registration): ?>
                <tr>
                    <td><?= h($registration->email) ?></td>
                    <td><?= h($registration->first_name) ?></td>
                    <td><?= h($registration->last_name) ?></td>
                    <td><?= h($registration->company_name) ?></td>
                    <td><?= h($registration->company_address) ?></td>
                    <td><?= h($registration->company_province) ?></td>
                    <td><?= h($registration->company_city) ?></td>
                    <td><?= $registration->company_cap === null ? '' : $this->Number->format($registration->company_cap) ?></td>
                    <td><?= h($registration->company_vat_number) ?></td>
                    <td><?= h($registration->company_pec_address) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $registration->email]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $registration->email]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $registration->email], ['confirm' => __('Are you sure you want to delete # {0}?', $registration->email)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
