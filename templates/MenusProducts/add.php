<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MenusProduct $menusProduct
 * @var \Cake\Collection\CollectionInterface|string[] $menus
 * @var \Cake\Collection\CollectionInterface|string[] $products
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Menus Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="menusProducts form content">
            <?= $this->Form->create($menusProduct) ?>
            <fieldset>
                <legend><?= __('Add Menus Product') ?></legend>
                <?php
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
