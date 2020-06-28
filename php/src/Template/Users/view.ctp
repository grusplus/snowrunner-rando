<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <div class="card users">
                <div class="header">
                    <h4 class="title"><?= h($user->id) ?></h4>
                    <p class="category"></p>
                </div>
                <div class="content">
                    <table class="table vertical-table bordered-table">
                                                                        <tr>
                            <th scope="row"><?= __('Username') ?></th>
                            <td><?= h($user->username) ?></td>
                        </tr>
                                                                        <tr>
                            <th scope="row"><?= __('Password') ?></th>
                            <td><?= h($user->password) ?></td>
                        </tr>
                                                                        <tr>
                            <th scope="row"><?= __('Name') ?></th>
                            <td><?= h($user->name) ?></td>
                        </tr>
                                                                                                                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($user->id) ?></td>
                        </tr>
                                                                                        <tr>
                            <th scope="row"><?= __('Created') ?></th>
                            <td><?= h($user->created) ?></td>
                        </tr>
                                        <tr>
                            <th scope="row"><?= __('Modified') ?></th>
                            <td><?= h($user->modified) ?></td>
                        </tr>
                                                                                        <tr>
                            <th scope="row"><?= __('Active') ?></th>
                            <td><?= $user->active ? __('Yes') : __('No'); ?></td>
                        </tr>
                                                    </table>
                                                    <div class="related">
                        <h4><?= __('Related Accounts') ?></h4>
                        <?php if (!empty($user->accounts)): ?>
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                                <th scope="col"><?= __('Id') ?></th>
                                                <th scope="col"><?= __('User Id') ?></th>
                                                <th scope="col"><?= __('Name') ?></th>
                                                <th scope="col"><?= __('Description') ?></th>
                                                <th scope="col"><?= __('Type') ?></th>
                                                <th scope="col"><?= __('Is Investment') ?></th>
                                                <th scope="col"><?= __('Created') ?></th>
                                                <th scope="col"><?= __('Modified') ?></th>
                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($user->accounts as $accounts): ?>
                            <tr>
                                <td><?= h($accounts->id) ?></td>
                                <td><?= h($accounts->user_id) ?></td>
                                <td><?= h($accounts->name) ?></td>
                                <td><?= h($accounts->description) ?></td>
                                <td><?= h($accounts->type) ?></td>
                                <td><?= h($accounts->is_investment) ?></td>
                                <td><?= h($accounts->created) ?></td>
                                <td><?= h($accounts->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Accounts', 'action' => 'view', $accounts->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Accounts', 'action' => 'edit', $accounts->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Accounts', 'action' => 'delete', $accounts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accounts->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>
                                    <div class="related">
                        <h4><?= __('Related Categories') ?></h4>
                        <?php if (!empty($user->categories)): ?>
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                                <th scope="col"><?= __('Id') ?></th>
                                                <th scope="col"><?= __('Name') ?></th>
                                                <th scope="col"><?= __('Description') ?></th>
                                                <th scope="col"><?= __('User Id') ?></th>
                                                <th scope="col"><?= __('Created') ?></th>
                                                <th scope="col"><?= __('Modified') ?></th>
                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($user->categories as $categories): ?>
                            <tr>
                                <td><?= h($categories->id) ?></td>
                                <td><?= h($categories->name) ?></td>
                                <td><?= h($categories->description) ?></td>
                                <td><?= h($categories->user_id) ?></td>
                                <td><?= h($categories->created) ?></td>
                                <td><?= h($categories->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Categories', 'action' => 'view', $categories->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Categories', 'action' => 'edit', $categories->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Categories', 'action' => 'delete', $categories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categories->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>
                                    <div class="related">
                        <h4><?= __('Related Stats') ?></h4>
                        <?php if (!empty($user->stats)): ?>
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                                <th scope="col"><?= __('Id') ?></th>
                                                <th scope="col"><?= __('User Id') ?></th>
                                                <th scope="col"><?= __('Retirement Date') ?></th>
                                                <th scope="col"><?= __('Total') ?></th>
                                                <th scope="col"><?= __('Retirement Money Needed') ?></th>
                                                <th scope="col"><?= __('Average Spending Monthly') ?></th>
                                                <th scope="col"><?= __('Average Spending Yearly') ?></th>
                                                <th scope="col"><?= __('Notes') ?></th>
                                                <th scope="col"><?= __('Created') ?></th>
                                                <th scope="col"><?= __('Modified') ?></th>
                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($user->stats as $stats): ?>
                            <tr>
                                <td><?= h($stats->id) ?></td>
                                <td><?= h($stats->user_id) ?></td>
                                <td><?= h($stats->retirement_date) ?></td>
                                <td><?= h($stats->total) ?></td>
                                <td><?= h($stats->retirement_money_needed) ?></td>
                                <td><?= h($stats->average_spending_monthly) ?></td>
                                <td><?= h($stats->average_spending_yearly) ?></td>
                                <td><?= h($stats->notes) ?></td>
                                <td><?= h($stats->created) ?></td>
                                <td><?= h($stats->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Stats', 'action' => 'view', $stats->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Stats', 'action' => 'edit', $stats->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Stats', 'action' => 'delete', $stats->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stats->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>
                                    <div class="related">
                        <h4><?= __('Related Tasks') ?></h4>
                        <?php if (!empty($user->tasks)): ?>
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                                <th scope="col"><?= __('Id') ?></th>
                                                <th scope="col"><?= __('Name') ?></th>
                                                <th scope="col"><?= __('Description') ?></th>
                                                <th scope="col"><?= __('Status') ?></th>
                                                <th scope="col"><?= __('Due') ?></th>
                                                <th scope="col"><?= __('User Id') ?></th>
                                                <th scope="col"><?= __('Category Id') ?></th>
                                                <th scope="col"><?= __('Parent Id') ?></th>
                                                <th scope="col"><?= __('Created') ?></th>
                                                <th scope="col"><?= __('Modified') ?></th>
                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($user->tasks as $tasks): ?>
                            <tr>
                                <td><?= h($tasks->id) ?></td>
                                <td><?= h($tasks->name) ?></td>
                                <td><?= h($tasks->description) ?></td>
                                <td><?= h($tasks->status) ?></td>
                                <td><?= h($tasks->due) ?></td>
                                <td><?= h($tasks->user_id) ?></td>
                                <td><?= h($tasks->category_id) ?></td>
                                <td><?= h($tasks->parent_id) ?></td>
                                <td><?= h($tasks->created) ?></td>
                                <td><?= h($tasks->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Tasks', 'action' => 'view', $tasks->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tasks', 'action' => 'edit', $tasks->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tasks', 'action' => 'delete', $tasks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tasks->id)]) ?>
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
                            <li><?= $this->Html->link(__('<i class="fa fa-pencil-square"></i> Edit This User'), ['action' => 'edit', $user->id], ['escape' => false]) ?> </li>
                            <li><?= $this->Form->postLink(__('<i class="fa fa-trash"></i> Delete This User'), ['action' => 'delete', $user->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
                            <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Users'), ['action' => 'index'], ['escape' => false]) ?> </li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New User'), ['action' => 'add'], ['escape' => false]) ?> </li>
                                                <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Accounts'), ['controller' => 'Accounts', 'action' => 'index'], ['escape' => false]) ?> </li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New Account'), ['controller' => 'Accounts', 'action' => 'add'], ['escape' => false]) ?> </li>
                                                <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Categories'), ['controller' => 'Categories', 'action' => 'index'], ['escape' => false]) ?> </li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New Category'), ['controller' => 'Categories', 'action' => 'add'], ['escape' => false]) ?> </li>
                                                <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Stats'), ['controller' => 'Stats', 'action' => 'index'], ['escape' => false]) ?> </li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New Stat'), ['controller' => 'Stats', 'action' => 'add'], ['escape' => false]) ?> </li>
                                                <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Tasks'), ['controller' => 'Tasks', 'action' => 'index'], ['escape' => false]) ?> </li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New Task'), ['controller' => 'Tasks', 'action' => 'add'], ['escape' => false]) ?> </li>
                                            </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>






</div>
