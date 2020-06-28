<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stats Model
 *
 * @property \CakeDC\Users\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Stat get($primaryKey, $options = [])
 * @method \App\Model\Entity\Stat newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Stat[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Stat|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Stat[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Stat findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StatsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('stats');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->date('retirement_date')
            ->requirePresence('retirement_date', 'create')
            ->notEmpty('retirement_date');

        $validator
            ->scalar('total')
            ->requirePresence('total', 'create')
            ->notEmpty('total');

        $validator
            ->scalar('retirement_money_needed')
            ->requirePresence('retirement_money_needed', 'create')
            ->notEmpty('retirement_money_needed');

        $validator
            ->scalar('average_spending_monthly')
            ->requirePresence('average_spending_monthly', 'create')
            ->notEmpty('average_spending_monthly');

        $validator
            ->scalar('average_spending_yearly')
            ->requirePresence('average_spending_yearly', 'create')
            ->notEmpty('average_spending_yearly');

        $validator
            ->scalar('notes')
            ->requirePresence('notes', 'create')
            ->notEmpty('notes');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
