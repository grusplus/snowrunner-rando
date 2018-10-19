<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stat $stat
 */
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <div class="card stats">
                <div class="header">
                    <h4 class="title"><?= h($stat->id) ?></h4>
                    <p class="category"></p>
                </div>
                <div class="content">
                    <table class="table vertical-table bordered-table">
                                                                        <tr>
                            <th scope="row"><?= __('User') ?></th>
                            <td><?= $stat->has('user') ? $this->Html->link($stat->user->id, ['controller' => 'Users', 'action' => 'view', $stat->user->id]) : '' ?></td>
                        </tr>
                                                                        <tr>
                            <th scope="row"><?= __('Total') ?></th>
                            <td><?= h($stat->total) ?></td>
                        </tr>
                                                                        <tr>
                            <th scope="row"><?= __('Retirement Money Needed') ?></th>
                            <td><?= h($stat->retirement_money_needed) ?></td>
                        </tr>
                                                                        <tr>
                            <th scope="row"><?= __('Average Spending Monthly') ?></th>
                            <td><?= h($stat->average_spending_monthly) ?></td>
                        </tr>
                                                                        <tr>
                            <th scope="row"><?= __('Average Spending Yearly') ?></th>
                            <td><?= h($stat->average_spending_yearly) ?></td>
                        </tr>
                                                                        <tr>
                            <th scope="row"><?= __('Notes') ?></th>
                            <td><?= h($stat->notes) ?></td>
                        </tr>
                                                                                                                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($stat->id) ?></td>
                        </tr>
                                                                                        <tr>
                            <th scope="row"><?= __('Retirement Date') ?></th>
                            <td><?= h($stat->retirement_date) ?></td>
                        </tr>
                                        <tr>
                            <th scope="row"><?= __('Created') ?></th>
                            <td><?= h($stat->created) ?></td>
                        </tr>
                                        <tr>
                            <th scope="row"><?= __('Modified') ?></th>
                            <td><?= h($stat->modified) ?></td>
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
                            <li><?= $this->Html->link(__('<i class="fa fa-pencil-square"></i> Edit This Stat'), ['action' => 'edit', $stat->id], ['escape' => false]) ?> </li>
                            <li><?= $this->Form->postLink(__('<i class="fa fa-trash"></i> Delete This Stat'), ['action' => 'delete', $stat->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $stat->id)]) ?> </li>
                            <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Stats'), ['action' => 'index'], ['escape' => false]) ?> </li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New Stat'), ['action' => 'add'], ['escape' => false]) ?> </li>
                                                <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Users'), ['controller' => 'Users', 'action' => 'index'], ['escape' => false]) ?> </li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New User'), ['controller' => 'Users', 'action' => 'add'], ['escape' => false]) ?> </li>
                                            </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>






</div>
