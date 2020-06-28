<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Balance[]|\Cake\Collection\CollectionInterface $balances
 */
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <div class="card balances">
                <div class="header">
                    <h4 class="title"> <?= __('Balances') ?></h4>
                    <p class="category"></p>
                </div>
                <div class="content">
                    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered mb-4">
                        <thead>
                            <tr>
                                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('account_id') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('balance') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($balances as $balance): ?>
                            <tr>
                                                <td><?= $this->Number->format($balance->id) ?></td>
                                                <td><?= $balance->has('account') ? $this->Html->link($balance->account->name, ['controller' => 'Accounts', 'action' => 'view', $balance->account->id]) : '' ?></td>
                                                <td><?= h($balance->balance) ?></td>
                                                <td><?= h($balance->created) ?></td>
                                                <td><?= h($balance->modified) ?></td>
                                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $balance->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $balance->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $balance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $balance->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="paginator">
                        <ul class="pagination mt-0 mb-2">
                            <?= $this->Paginator->prev('<i class="fa fa-chevron-left"></i>', ['escape'=>false]) ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next('<i class="fa fa-chevron-right"></i>', ['escape'=>false]) ?>
                        </ul>
                    </div>
                    <div class="footer">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-columns"></i> <?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="content">
                    <nav class="" id="actions-sidebar">
                        <ul class="nav nav-pills nav-stacked">
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New Balance'), ['action' => 'add'], ['escape' => false]) ?></li>
                                                <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Accounts'), ['controller' => 'Accounts', 'action' => 'index'], ['escape' => false]) ?></li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New Account'), ['controller' => 'Accounts', 'action' => 'add'], ['escape' => false]) ?></li>
                                            </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
