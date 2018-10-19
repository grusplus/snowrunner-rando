<?php
/**
 * @var \App\View\AppView $this
 */
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <div class="card stats">
                <div class="header">
                    <h4 class="title"> <?= __('Edit Stat') ?></h4>
                    <p class="category"></p>
                </div>
                <div class="content pb-4">
                <?= $this->Form->create($stat) ?>
                        <?php
                                            echo $this->Form->control('user_id', ['options' => $users]);
                                            echo $this->Form->control('retirement_date');
                                            echo $this->Form->control('total');
                                            echo $this->Form->control('retirement_money_needed');
                                            echo $this->Form->control('average_spending_monthly');
                                            echo $this->Form->control('average_spending_yearly');
                                            echo $this->Form->control('notes');
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
                                    __('<i class="fa fa-trash"></i> Delete This Stat'),
                                    ['action' => 'delete', $stat->id],
                                    ['confirm' => __('Are you sure you want to delete # {0}?', $stat->id), 'escape' => false]
                                )
                            ?></li>
                                                <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Stats'), ['action' => 'index'], ['escape' => false]) ?></li>
                                                <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List Users'), ['controller' => 'Users', 'action' => 'index'], ['escape' => false]) ?></li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New User'), ['controller' => 'Users', 'action' => 'add'], ['escape' => false]) ?></li>
                                            </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>