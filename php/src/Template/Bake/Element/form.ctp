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
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    });

if (isset($modelObject) && $modelObject->hasBehavior('Tree')) {
    $fields = $fields->reject(function ($field) {
        return $field === 'lft' || $field === 'rght';
    });
}
%>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <div class="card <%= $pluralVar %>">
                <div class="header">
                    <h4 class="title"> <?= __('<%= Inflector::humanize($action) %> <%= $singularHumanName %>') ?></h4>
                    <p class="category"></p>
                </div>
                <div class="content pb-4">
                <?= $this->Form->create($<%= $singularVar %>) ?>
                        <?php
                <%
                        foreach ($fields as $field) {
                            if (in_array($field, $primaryKey)) {
                                continue;
                            }
                            if (isset($keyFields[$field])) {
                                $fieldData = $schema->column($field);
                                if (!empty($fieldData['null'])) {
                %>
                            echo $this->Form->control('<%= $field %>', ['options' => $<%= $keyFields[$field] %>, 'empty' => true]);
                <%
                                } else {
                %>
                            echo $this->Form->control('<%= $field %>', ['options' => $<%= $keyFields[$field] %>]);
                <%
                                }
                                continue;
                            }
                            if (!in_array($field, ['created', 'modified', 'updated'])) {
                                $fieldData = $schema->column($field);
                                if (in_array($fieldData['type'], ['date', 'datetime', 'time']) && (!empty($fieldData['null']))) {
                %>
                            echo $this->Form->control('<%= $field %>', ['empty' => true]);
                <%
                                } else {
                %>
                            echo $this->Form->control('<%= $field %>');
                <%
                                }
                            }
                        }
                        if (!empty($associations['BelongsToMany'])) {
                            foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
                %>
                            echo $this->Form->control('<%= $assocData['property'] %>._ids', ['options' => $<%= $assocData['variable'] %>]);
                <%
                            }
                        }
                %>
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
                    <% if (strpos($action, 'add') === false): %>
                            <li><?= $this->Form->postLink(
                                    __('<i class="fa fa-trash"></i> Delete This <%= $singularHumanName %>'),
                                    ['action' => 'delete', $<%= $singularVar %>-><%= $primaryKey[0] %>],
                                    ['confirm' => __('Are you sure you want to delete # {0}?', $<%= $singularVar %>-><%= $primaryKey[0] %>), 'escape' => false]
                                )
                            ?></li>
                    <% endif; %>
                            <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List <%= $pluralHumanName %>'), ['action' => 'index'], ['escape' => false]) ?></li>
                    <%
                            $done = [];
                            foreach ($associations as $type => $data) {
                                foreach ($data as $alias => $details) {
                                    if ($details['controller'] !== $this->name && !in_array($details['controller'], $done)) {
                    %>
                            <li><?= $this->Html->link(__('<i class="fa fa-list-ul"></i> List <%= $this->_pluralHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'index'], ['escape' => false]) ?></li>
                            <li><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> New <%= $this->_singularHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'add'], ['escape' => false]) ?></li>
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