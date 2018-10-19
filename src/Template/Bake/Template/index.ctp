<%
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
%>
<?php
/**
 * @var \<%= $namespace %>\View\AppView $this
 * @var \<%= $entityClass %>[]|\Cake\Collection\CollectionInterface $<%= $pluralVar %>
 */
?>
<%
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return !in_array($schema->columnType($field), ['binary', 'text']);
    });

if (isset($modelObject) && $modelObject->behaviors()->has('Tree')) {
    $fields = $fields->reject(function ($field) {
        return $field === 'lft' || $field === 'rght';
    });
}

if (!empty($indexColumns)) {
    $fields = $fields->take($indexColumns);
}

%>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <div class="card <%= $pluralVar %>">
                <div class="header">
                    <h4 class="title"> <?= __('<%= $pluralHumanName %>') ?></h4>
                    <p class="category"></p>
                </div>
                <div class="content">
                    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered mb-4">
                        <thead>
                            <tr>
                <% foreach ($fields as $field): %>
                                <th scope="col"><?= $this->Paginator->sort('<%= $field %>') ?></th>
                <% endforeach; %>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($<%= $pluralVar %> as $<%= $singularVar %>): ?>
                            <tr>
                <%        foreach ($fields as $field) {
                            $isKey = false;
                            if (!empty($associations['BelongsTo'])) {
                                foreach ($associations['BelongsTo'] as $alias => $details) {
                                    if ($field === $details['foreignKey']) {
                                        $isKey = true;
                %>
                                <td><?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?></td>
                <%
                                        break;
                                    }
                                }
                            }
                            if ($isKey !== true) {
                                if (!in_array($schema->columnType($field), ['integer', 'float', 'decimal', 'biginteger', 'smallinteger', 'tinyinteger'])) {
                %>
                                <td><?= h($<%= $singularVar %>-><%= $field %>) ?></td>
                <%
                                } else {
                %>
                                <td><?= $this->Number->format($<%= $singularVar %>-><%= $field %>) ?></td>
                <%
                                }
                            }
                        }

                        $pk = '$' . $singularVar . '->' . $primaryKey[0];
                %>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', <%= $pk %>]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', <%= $pk %>]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', <%= $pk %>], ['confirm' => __('Are you sure you want to delete # {0}?', <%= $pk %>)]) ?>
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
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New <%= $singularHumanName %>'), ['action' => 'add'], ['escape' => false]) ?></li>
                    <%
                        $done = [];
                        foreach ($associations as $type => $data):
                            foreach ($data as $alias => $details):
                                if (!empty($details['navLink']) && $details['controller'] !== $this->name && !in_array($details['controller'], $done)):
                    %>
                            <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List <%= $this->_pluralHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'index'], ['escape' => false]) ?></li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New <%= $this->_singularHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'add'], ['escape' => false]) ?></li>
                    <%
                                    $done[] = $details['controller'];
                                endif;
                            endforeach;
                        endforeach;
                    %>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
