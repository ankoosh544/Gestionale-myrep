<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tax $tax
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Tax'), ['action' => 'edit', $tax->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tax'), ['action' => 'delete', $tax->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tax->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Taxes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tax'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="taxes view content">
            <h3><?= h($tax->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($tax->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($tax->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Percentage') ?></th>
                    <td><?= $this->Number->format($tax->percentage) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Menus') ?></h4>
                <?php if (!empty($tax->menus)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Price Without Tax') ?></th>
                            <th><?= __('Tax Id') ?></th>
                            <th><?= __('Price With Tax') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($tax->menus as $menus) : ?>
                        <tr>
                            <td><?= h($menus->id) ?></td>
                            <td><?= h($menus->name) ?></td>
                            <td><?= h($menus->description) ?></td>
                            <td><?= h($menus->price_without_tax) ?></td>
                            <td><?= h($menus->tax_id) ?></td>
                            <td><?= h($menus->price_with_tax) ?></td>
                            <td><?= h($menus->updated_at) ?></td>
                            <td><?= h($menus->created_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Menus', 'action' => 'view', $menus->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Menus', 'action' => 'edit', $menus->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Menus', 'action' => 'delete', $menus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menus->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Products') ?></h4>
                <?php if (!empty($tax->products)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Code') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Ean') ?></th>
                            <th><?= __('Price Without Tax') ?></th>
                            <th><?= __('Tax Id') ?></th>
                            <th><?= __('Price With Tax') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($tax->products as $products) : ?>
                        <tr>
                            <td><?= h($products->id) ?></td>
                            <td><?= h($products->code) ?></td>
                            <td><?= h($products->name) ?></td>
                            <td><?= h($products->description) ?></td>
                            <td><?= h($products->ean) ?></td>
                            <td><?= h($products->price_without_tax) ?></td>
                            <td><?= h($products->tax_id) ?></td>
                            <td><?= h($products->price_with_tax) ?></td>
                            <td><?= h($products->updated_at) ?></td>
                            <td><?= h($products->created_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
