<?php
/**
 * @var \App\View\AppView $this
 */
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <div class="card accounts">
                <div class="header">
                    <h4 class="title"> <?= __('Add Account') ?></h4>
                    <p class="category"></p>
                </div>
                <div class="content pb-4">
                <?= $this->Form->create($account) ?>
                        <?php
                                            echo $this->Form->control('user_id', ['options' => $users]);
                                            echo $this->Form->control('name');
                                            echo $this->Form->control('description');
                                            echo $this->Form->control('type');
                                            echo $this->Form->control('is_investment');
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
                                                <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Accounts'), ['action' => 'index'], ['escape' => false]) ?></li>
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