<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MenusProduct $menusProduct
 * @var string[]|\Cake\Collection\CollectionInterface $menus
 * @var string[]|\Cake\Collection\CollectionInterface $products
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $menusProduct->menu_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $menusProduct->menu_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Menus Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="menusProducts form content">
            <?= $this->Form->create($menusProduct) ?>
            <fieldset>
                <legend><?= __('Edit Menus Product') ?></legend>
                <?php
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
