<?php
/**
 * @var \App\View\AppView $this
 */
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <div class="card balances">
                <div class="header">
                    <h4 class="title"> <?= __('Edit Balance') ?></h4>
                    <p class="category"></p>
                </div>
                <div class="content pb-4">
                <?= $this->Form->create($balance) ?>
                        <?php
                                            echo $this->Form->control('account_id', ['options' => $accounts]);
                                            echo $this->Form->control('balance');
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
                                    __('<i class="fa fa-trash"></i> Delete This Balance'),
                                    ['action' => 'delete', $balance->id],
                                    ['confirm' => __('Are you sure you want to delete # {0}?', $balance->id), 'escape' => false]
                                )
                            ?></li>
                                                <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Balances'), ['action' => 'index'], ['escape' => false]) ?></li>
                                                <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Accounts'), ['controller' => 'Accounts', 'action' => 'index'], ['escape' => false]) ?></li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New Account'), ['controller' => 'Accounts', 'action' => 'add'], ['escape' => false]) ?></li>
                                            </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>