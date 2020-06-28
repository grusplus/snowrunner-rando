<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Account $account
 */
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <div class="card accounts">
                <div class="header">
                    <h4 class="title"><?= h($account->name) ?></h4>
                    <p class="category"></p>
                </div>
                <div class="content">
                    <table class="table vertical-table bordered-table">
                                                                        <tr>
                            <th scope="row"><?= __('User') ?></th>
                            <td><?= $account->has('user') ? $this->Html->link($account->user->id, ['controller' => 'Users', 'action' => 'view', $account->user->id]) : '' ?></td>
                        </tr>
                                                                        <tr>
                            <th scope="row"><?= __('Name') ?></th>
                            <td><?= h($account->name) ?></td>
                        </tr>
                                                                        <tr>
                            <th scope="row"><?= __('Type') ?></th>
                            <td><?= h($account->type) ?></td>
                        </tr>
                                                                                                                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($account->id) ?></td>
                        </tr>
                                                                                        <tr>
                            <th scope="row"><?= __('Created') ?></th>
                            <td><?= h($account->created) ?></td>
                        </tr>
                                        <tr>
                            <th scope="row"><?= __('Modified') ?></th>
                            <td><?= h($account->modified) ?></td>
                        </tr>
                                                                                        <tr>
                            <th scope="row"><?= __('Is Investment') ?></th>
                            <td><?= $account->is_investment ? __('Yes') : __('No'); ?></td>
                        </tr>
                                                    </table>
                                                    <hr>
                    <div class="">
                        <h4><?= __('Description') ?></h4>
                        <?= $this->Text->autoParagraph(h($account->description)); ?>
                    </div>
                                                                    <div class="related">
                        <h4><?= __('Related Balances') ?></h4>
                        <?php if (!empty($account->balances)): ?>
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                                <th scope="col"><?= __('Id') ?></th>
                                                <th scope="col"><?= __('Account Id') ?></th>
                                                <th scope="col"><?= __('Balance') ?></th>
                                                <th scope="col"><?= __('Created') ?></th>
                                                <th scope="col"><?= __('Modified') ?></th>
                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($account->balances as $balances): ?>
                            <tr>
                                <td><?= h($balances->id) ?></td>
                                <td><?= h($balances->account_id) ?></td>
                                <td><?= h($balances->balance) ?></td>
                                <td><?= h($balances->created) ?></td>
                                <td><?= h($balances->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Balances', 'action' => 'view', $balances->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Balances', 'action' => 'edit', $balances->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Balances', 'action' => 'delete', $balances->id], ['confirm' => __('Are you sure you want to delete # {0}?', $balances->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>
                                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="content">
                    <nav class="" id="actions-sidebar">
                        <ul class="nav nav-pills nav-stacked">
                            <li><?= $this->Html->link(__('<i class="fa fa-pencil-square"></i> Edit This Account'), ['action' => 'edit', $account->id], ['escape' => false]) ?> </li>
                            <li><?= $this->Form->postLink(__('<i class="fa fa-trash"></i> Delete This Account'), ['action' => 'delete', $account->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $account->id)]) ?> </li>
                            <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Accounts'), ['action' => 'index'], ['escape' => false]) ?> </li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New Account'), ['action' => 'add'], ['escape' => false]) ?> </li>
                                                <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Users'), ['controller' => 'Users', 'action' => 'index'], ['escape' => false]) ?> </li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New User'), ['controller' => 'Users', 'action' => 'add'], ['escape' => false]) ?> </li>
                                                <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Balances'), ['controller' => 'Balances', 'action' => 'index'], ['escape' => false]) ?> </li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New Balance'), ['controller' => 'Balances', 'action' => 'add'], ['escape' => false]) ?> </li>
                                            </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>






</div>
