<?php
namespace Msgpool\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MsgpoolSubscribes Model
 *
 * @property \Msgpool\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \Msgpool\Model\Table\MsgpoolActionsTable|\Cake\ORM\Association\BelongsTo $MsgpoolActions
 *
 * @method \Msgpool\Model\Entity\MsgpoolSubscribe get($primaryKey, $options = [])
 * @method \Msgpool\Model\Entity\MsgpoolSubscribe newEntity($data = null, array $options = [])
 * @method \Msgpool\Model\Entity\MsgpoolSubscribe[] newEntities(array $data, array $options = [])
 * @method \Msgpool\Model\Entity\MsgpoolSubscribe|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Msgpool\Model\Entity\MsgpoolSubscribe|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Msgpool\Model\Entity\MsgpoolSubscribe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Msgpool\Model\Entity\MsgpoolSubscribe[] patchEntities($entities, array $data, array $options = [])
 * @method \Msgpool\Model\Entity\MsgpoolSubscribe findOrCreate($search, callable $callback = null, $options = [])
 */
class MsgpoolSubscribesTable extends Table
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

        $this->setTable('msgpool_subscribes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'className' => 'Msgpool.Users'
        ]);
        $this->belongsTo('MsgpoolActions', [
            'foreignKey' => 'msgpool_action_id',
            'className' => 'Msgpool.MsgpoolActions'
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
            ->scalar('date')
            ->maxLength('date', 45)
            ->allowEmpty('date');

        $validator
            ->scalar('sender_point')
            ->maxLength('sender_point', 45)
            ->allowEmpty('sender_point');

        $validator
            ->scalar('source')
            ->maxLength('source', 45)
            ->allowEmpty('source');

        $validator
            ->scalar('type')
            ->maxLength('type', 45)
            ->allowEmpty('type');

        $validator
            ->scalar('level')
            ->maxLength('level', 45)
            ->allowEmpty('level');

        $validator
            ->scalar('grouping')
            ->maxLength('grouping', 45)
            ->allowEmpty('grouping');

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
        $rules->add($rules->existsIn(['msgpool_action_id'], 'MsgpoolActions'));

        return $rules;
    }
}
