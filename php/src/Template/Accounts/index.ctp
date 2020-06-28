<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Account[]|\Cake\Collection\CollectionInterface $accounts
 */
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <div class="card accounts">
                <div class="header">
                    <h4 class="title"> <?= __('Accounts') ?></h4>
                    <p class="category"></p>
                </div>
                <div class="content">
                    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered mb-4">
                        <thead>
                            <tr>
                                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('is_investment') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($accounts as $account): ?>
                            <tr>
                                                <td><?= $this->Number->format($account->id) ?></td>
                                                <td><?= $account->has('user') ? $this->Html->link($account->user->id, ['controller' => 'Users', 'action' => 'view', $account->user->id]) : '' ?></td>
                                                <td><?= h($account->name) ?></td>
                                                <td><?= h($account->type) ?></td>
                                                <td><?= h($account->is_investment) ?></td>
                                                <td><?= h($account->created) ?></td>
                                                <td><?= h($account->modified) ?></td>
                                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $account->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $account->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $account->id], ['confirm' => __('Are you sure you want to delete # {0}?', $account->id)]) ?>
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
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New Account'), ['action' => 'add'], ['escape' => false]) ?></li>
                                                <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Users'), ['controller' => 'Users', 'action' => 'index'], ['escape' => false]) ?></li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New User'), ['controller' => 'Users', 'action' => 'add'], ['escape' => false]) ?></li>
                                                <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Balances'), ['controller' => 'Balances', 'action' => 'index'], ['escape' => false]) ?></li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New Balance'), ['controller' => 'Balances', 'action' => 'add'], ['escape' => false]) ?></li>
                                            </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
