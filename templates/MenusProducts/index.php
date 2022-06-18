<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MenusProduct[]|\Cake\Collection\CollectionInterface $menusProducts
 */
?>
<div class="menusProducts index content">
    <?= $this->Html->link(__('New Menus Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Menus Products') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('menu_id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($menusProducts as $menusProduct): ?>
                <tr>
                    <td><?= $menusProduct->has('menu') ? $this->Html->link($menusProduct->menu->name, ['controller' => 'Menus', 'action' => 'view', $menusProduct->menu->id]) : '' ?></td>
                    <td><?= $menusProduct->has('product') ? $this->Html->link($menusProduct->product->name, ['controller' => 'Products', 'action' => 'view', $menusProduct->product->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $menusProduct->menu_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $menusProduct->menu_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $menusProduct->menu_id], ['confirm' => __('Are you sure you want to delete # {0}?', $menusProduct->menu_id)]) ?>
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
