<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MenusProduct $menusProduct
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Menus Product'), ['action' => 'edit', $menusProduct->menu_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Menus Product'), ['action' => 'delete', $menusProduct->menu_id], ['confirm' => __('Are you sure you want to delete # {0}?', $menusProduct->menu_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Menus Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Menus Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="menusProducts view content">
            <h3><?= h($menusProduct->Array) ?></h3>
            <table>
                <tr>
                    <th><?= __('Menu') ?></th>
                    <td><?= $menusProduct->has('menu') ? $this->Html->link($menusProduct->menu->name, ['controller' => 'Menus', 'action' => 'view', $menusProduct->menu->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $menusProduct->has('product') ? $this->Html->link($menusProduct->product->name, ['controller' => 'Products', 'action' => 'view', $menusProduct->product->id]) : '' ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
