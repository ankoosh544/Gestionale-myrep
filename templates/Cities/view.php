<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City $city
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit City'), ['action' => 'edit', $city->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete City'), ['action' => 'delete', $city->id], ['confirm' => __('Are you sure you want to delete # {0}?', $city->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New City'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cities view content">
            <h3><?= h($city->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($city->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Region') ?></th>
                    <td><?= h($city->region) ?></td>
                </tr>
                <tr>
                    <th><?= __('Province') ?></th>
                    <td><?= h($city->province) ?></td>
                </tr>
                <tr>
                    <th><?= __('Province Code') ?></th>
                    <td><?= h($city->province_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cadastral Code') ?></th>
                    <td><?= h($city->cadastral_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Postcodes') ?></th>
                    <td><?= h($city->postcodes) ?></td>
                </tr>
                <tr>
                    <th><?= __('Country') ?></th>
                    <td><?= h($city->country) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($city->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
