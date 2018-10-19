<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stat[]|\Cake\Collection\CollectionInterface $stats
 */
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <div class="card stats">
                <div class="header">
                    <h4 class="title"> <?= __('Stats') ?></h4>
                    <p class="category"></p>
                </div>
                <div class="content">
                    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered mb-4">
                        <thead>
                            <tr>
                                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('retirement_date') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('retirement_money_needed') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('average_spending_monthly') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('average_spending_yearly') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('notes') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($stats as $stat): ?>
                            <tr>
                                                <td><?= $this->Number->format($stat->id) ?></td>
                                                <td><?= $stat->has('user') ? $this->Html->link($stat->user->id, ['controller' => 'Users', 'action' => 'view', $stat->user->id]) : '' ?></td>
                                                <td><?= h($stat->retirement_date) ?></td>
                                                <td><?= h($stat->total) ?></td>
                                                <td><?= h($stat->retirement_money_needed) ?></td>
                                                <td><?= h($stat->average_spending_monthly) ?></td>
                                                <td><?= h($stat->average_spending_yearly) ?></td>
                                                <td><?= h($stat->notes) ?></td>
                                                <td><?= h($stat->created) ?></td>
                                                <td><?= h($stat->modified) ?></td>
                                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $stat->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stat->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stat->id)]) ?>
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
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New Stat'), ['action' => 'add'], ['escape' => false]) ?></li>
                                                <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Users'), ['controller' => 'Users', 'action' => 'index'], ['escape' => false]) ?></li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New User'), ['controller' => 'Users', 'action' => 'add'], ['escape' => false]) ?></li>
                                            </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
