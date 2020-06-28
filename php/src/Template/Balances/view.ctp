<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Balance $balance
 */
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <div class="card balances">
                <div class="header">
                    <h4 class="title"><?= h($balance->id) ?></h4>
                    <p class="category"></p>
                </div>
                <div class="content">
                    <table class="table vertical-table bordered-table">
                                                                        <tr>
                            <th scope="row"><?= __('Account') ?></th>
                            <td><?= $balance->has('account') ? $this->Html->link($balance->account->name, ['controller' => 'Accounts', 'action' => 'view', $balance->account->id]) : '' ?></td>
                        </tr>
                                                                        <tr>
                            <th scope="row"><?= __('Balance') ?></th>
                            <td><?= h($balance->balance) ?></td>
                        </tr>
                                                                                                                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($balance->id) ?></td>
                        </tr>
                                                                                        <tr>
                            <th scope="row"><?= __('Created') ?></th>
                            <td><?= h($balance->created) ?></td>
                        </tr>
                                        <tr>
                            <th scope="row"><?= __('Modified') ?></th>
                            <td><?= h($balance->modified) ?></td>
                        </tr>
                                                                    </table>
                                                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="content">
                    <nav class="" id="actions-sidebar">
                        <ul class="nav nav-pills nav-stacked">
                            <li><?= $this->Html->link(__('<i class="fa fa-pencil-square"></i> Edit This Balance'), ['action' => 'edit', $balance->id], ['escape' => false]) ?> </li>
                            <li><?= $this->Form->postLink(__('<i class="fa fa-trash"></i> Delete This Balance'), ['action' => 'delete', $balance->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $balance->id)]) ?> </li>
                            <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Balances'), ['action' => 'index'], ['escape' => false]) ?> </li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New Balance'), ['action' => 'add'], ['escape' => false]) ?> </li>
                                                <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Accounts'), ['controller' => 'Accounts', 'action' => 'index'], ['escape' => false]) ?> </li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New Account'), ['controller' => 'Accounts', 'action' => 'add'], ['escape' => false]) ?> </li>
                                            </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>






</div>
