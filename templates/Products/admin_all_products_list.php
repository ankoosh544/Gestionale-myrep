<?php
use Cake\I18n\Number;

$this->assign('title', __('Tutti i prodotti'));
$this->assign('page_title', __('Tutti i prodotti'));
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= __('Tutti i prodotti') ?></h3>

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
        <?php if (empty(count($products))) : ?>
            <div class="card-body">
                <p><?= __('Nessun prodotto presente all\'interno del catalogo.') ?></p>
            </div>
        <?php else : ?>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th><?= __('Codice') ?></th>
                            <th><?= __('Titolo') ?></th>
                            <th><?= __('Imponibile') ?></th>
                            <th><?= __('IVA') ?></th>
                            <th><?= __('Prezzo') ?></th>
                            <th><?= __('Azioni') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $product) : ?>
                        <tr>
                            <td><?= $product->code ?></td>
                            <td><?= $product->name ?></td>
                            <td><?= Number::currency($product->price_without_tax, 'EUR', ['locale' => 'it_IT']) ?></td>
                            <td><?= empty($product->tax) ? __('N. D.') : $product->tax->percentage ?></td>
                            <td><?= empty($product->tax) ? Number::currency($product->price_without_tax, 'EUR', ['locale' => 'it_IT']) : Number::currency($product->price_without_tax * (1 + $product->tax->percentage / 100), 'EUR', ['locale' => 'it_IT']) ?></td>
                            <td>
                                <div class="btn-group">
                                    
                                </div>
                            </td>
                        </tr>
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