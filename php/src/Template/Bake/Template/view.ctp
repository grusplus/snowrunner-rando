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
 * @var \<%= $entityClass %> $<%= $singularVar %>
 */
?>
<%
use Cake\Utility\Inflector;

$associations += ['BelongsTo' => [], 'HasOne' => [], 'HasMany' => [], 'BelongsToMany' => []];
$immediateAssociations = $associations['BelongsTo'];
$associationFields = collection($fields)
    ->map(function($field) use ($immediateAssociations) {
        foreach ($immediateAssociations as $alias => $details) {
            if ($field === $details['foreignKey']) {
                return [$field => $details];
            }
        }
    })
    ->filter()
    ->reduce(function($fields, $value) {
        return $fields + $value;
    }, []);

$groupedFields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    })
    ->groupBy(function($field) use ($schema, $associationFields) {
        $type = $schema->columnType($field);
        if (isset($associationFields[$field])) {
            return 'string';
        }
        if (in_array($type, ['decimal', 'biginteger', 'integer', 'float', 'smallinteger', 'tinyinteger'])) {
            return 'number';
        }
        if (in_array($type, ['date', 'time', 'datetime', 'timestamp'])) {
            return 'date';
        }
        return in_array($type, ['text', 'boolean']) ? $type : 'string';
    })
    ->toArray();

$groupedFields += ['number' => [], 'string' => [], 'boolean' => [], 'date' => [], 'text' => []];
$pk = "\$$singularVar->{$primaryKey[0]}";
%>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <div class="card <%= $pluralVar %>">
                <div class="header">
                    <h4 class="title"><?= h($<%= $singularVar %>-><%= $displayField %>) ?></h4>
                    <p class="category"></p>
                </div>
                <div class="content">
                    <table class="table vertical-table bordered-table">
                <% if ($groupedFields['string']) : %>
                <% foreach ($groupedFields['string'] as $field) : %>
                <% if (isset($associationFields[$field])) :
                            $details = $associationFields[$field];
                %>
                        <tr>
                            <th scope="row"><?= __('<%= Inflector::humanize($details['property']) %>') ?></th>
                            <td><?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?></td>
                        </tr>
                <% else : %>
                        <tr>
                            <th scope="row"><?= __('<%= Inflector::humanize($field) %>') ?></th>
                            <td><?= h($<%= $singularVar %>-><%= $field %>) ?></td>
                        </tr>
                <% endif; %>
                <% endforeach; %>
                <% endif; %>
                <% if ($associations['HasOne']) : %>
                    <%- foreach ($associations['HasOne'] as $alias => $details) : %>
                        <tr>
                            <th scope="row"><?= __('<%= Inflector::humanize(Inflector::singularize(Inflector::underscore($alias))) %>') ?></th>
                            <td><?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?></td>
                        </tr>
                    <%- endforeach; %>
                <% endif; %>
                <% if ($groupedFields['number']) : %>
                <% foreach ($groupedFields['number'] as $field) : %>
                        <tr>
                            <th scope="row"><?= __('<%= Inflector::humanize($field) %>') ?></th>
                            <td><?= $this->Number->format($<%= $singularVar %>-><%= $field %>) ?></td>
                        </tr>
                <% endforeach; %>
                <% endif; %>
                <% if ($groupedFields['date']) : %>
                <% foreach ($groupedFields['date'] as $field) : %>
                        <tr>
                            <th scope="row"><%= "<%= __('" . Inflector::humanize($field) . "') %>" %></th>
                            <td><?= h($<%= $singularVar %>-><%= $field %>) ?></td>
                        </tr>
                <% endforeach; %>
                <% endif; %>
                <% if ($groupedFields['boolean']) : %>
                <% foreach ($groupedFields['boolean'] as $field) : %>
                        <tr>
                            <th scope="row"><?= __('<%= Inflector::humanize($field) %>') ?></th>
                            <td><?= $<%= $singularVar %>-><%= $field %> ? __('Yes') : __('No'); ?></td>
                        </tr>
                <% endforeach; %>
                <% endif; %>
                    </table>
                <% if ($groupedFields['text']) : %>
                <% foreach ($groupedFields['text'] as $field) : %>
                    <hr>
                    <div class="">
                        <h4><?= __('<%= Inflector::humanize($field) %>') ?></h4>
                        <?= $this->Text->autoParagraph(h($<%= $singularVar %>-><%= $field %>)); ?>
                    </div>
                <% endforeach; %>
                <% endif; %>
                <%
                $relations = $associations['HasMany'] + $associations['BelongsToMany'];
                foreach ($relations as $alias => $details):
                    $otherSingularVar = Inflector::variable($alias);
                    $otherPluralHumanName = Inflector::humanize(Inflector::underscore($details['controller']));
                    %>
                    <div class="related">
                        <h4><?= __('Related <%= $otherPluralHumanName %>') ?></h4>
                        <?php if (!empty($<%= $singularVar %>-><%= $details['property'] %>)): ?>
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                <% foreach ($details['fields'] as $field): %>
                                <th scope="col"><?= __('<%= Inflector::humanize($field) %>') ?></th>
                <% endforeach; %>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($<%= $singularVar %>-><%= $details['property'] %> as $<%= $otherSingularVar %>): ?>
                            <tr>
                            <%- foreach ($details['fields'] as $field): %>
                                <td><?= h($<%= $otherSingularVar %>-><%= $field %>) ?></td>
                            <%- endforeach; %>
                            <%- $otherPk = "\${$otherSingularVar}->{$details['primaryKey'][0]}"; %>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => '<%= $details['controller'] %>', 'action' => 'view', <%= $otherPk %>]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => '<%= $details['controller'] %>', 'action' => 'edit', <%= $otherPk %>]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => '<%= $details['controller'] %>', 'action' => 'delete', <%= $otherPk %>], ['confirm' => __('Are you sure you want to delete # {0}?', <%= $otherPk %>)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>
                <% endforeach; %>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="content">
                    <nav class="" id="actions-sidebar">
                        <ul class="nav nav-pills nav-stacked">
                            <li><?= $this->Html->link(__('<i class="fa fa-pencil-square"></i> Edit This <%= $singularHumanName %>'), ['action' => 'edit', <%= $pk %>], ['escape' => false]) ?> </li>
                            <li><?= $this->Form->postLink(__('<i class="fa fa-trash"></i> Delete This <%= $singularHumanName %>'), ['action' => 'delete', <%= $pk %>], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', <%= $pk %>)]) ?> </li>
                            <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List <%= $pluralHumanName %>'), ['action' => 'index'], ['escape' => false]) ?> </li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New <%= $singularHumanName %>'), ['action' => 'add'], ['escape' => false]) ?> </li>
                    <%
                        $done = [];
                        foreach ($associations as $type => $data) {
                            foreach ($data as $alias => $details) {
                                if ($details['controller'] !== $this->name && !in_array($details['controller'], $done)) {
                    %>
                            <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List <%= $this->_pluralHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'index'], ['escape' => false]) ?> </li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New <%= Inflector::humanize(Inflector::singularize(Inflector::underscore($alias))) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'add'], ['escape' => false]) ?> </li>
                    <%
                                    $done[] = $details['controller'];
                                }
                            }
                        }
                    %>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>






</div>
