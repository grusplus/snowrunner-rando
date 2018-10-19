<?php
/**
 * @var \App\View\AppView $this
 */
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <div class="card users">
                <div class="header">
                    <h4 class="title"> <?= __('Edit User') ?></h4>
                    <p class="category"></p>
                </div>
                <div class="content pb-4">
                <?= $this->Form->create($user) ?>
                        <?php
                                            echo $this->Form->control('username');
                                            echo $this->Form->control('password');
                                            echo $this->Form->control('name');
                                            echo $this->Form->control('active');
                                        ?>
                    <?= $this->Form->button(__('Submit')) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="content">
                    <nav class="" id="actions-sidebar">
                        <ul class="nav nav-pills nav-stacked">
                                                <li><?= $this->Form->postLink(
                                    __('<i class="fa fa-trash"></i> Delete This User'),
                                    ['action' => 'delete', $user->id],
                                    ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'escape' => false]
                                )
                            ?></li>
                                                <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Users'), ['action' => 'index'], ['escape' => false]) ?></li>
                                                <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Accounts'), ['controller' => 'Accounts', 'action' => 'index'], ['escape' => false]) ?></li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New Account'), ['controller' => 'Accounts', 'action' => 'add'], ['escape' => false]) ?></li>
                                                <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Categories'), ['controller' => 'Categories', 'action' => 'index'], ['escape' => false]) ?></li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New Category'), ['controller' => 'Categories', 'action' => 'add'], ['escape' => false]) ?></li>
                                                <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Stats'), ['controller' => 'Stats', 'action' => 'index'], ['escape' => false]) ?></li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New Stat'), ['controller' => 'Stats', 'action' => 'add'], ['escape' => false]) ?></li>
                                                <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Tasks'), ['controller' => 'Tasks', 'action' => 'index'], ['escape' => false]) ?></li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New Task'), ['controller' => 'Tasks', 'action' => 'add'], ['escape' => false]) ?></li>
                                            </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>