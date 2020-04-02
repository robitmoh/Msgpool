<?php
namespace Msgpool\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MsgpoolActions Model
 *
 * @property \Msgpool\Model\Table\MsgpoolSubscribeTable|\Cake\ORM\Association\HasMany $MsgpoolSubscribe
 *
 * @method \Msgpool\Model\Entity\MsgpoolAction get($primaryKey, $options = [])
 * @method \Msgpool\Model\Entity\MsgpoolAction newEntity($data = null, array $options = [])
 * @method \Msgpool\Model\Entity\MsgpoolAction[] newEntities(array $data, array $options = [])
 * @method \Msgpool\Model\Entity\MsgpoolAction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Msgpool\Model\Entity\MsgpoolAction|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Msgpool\Model\Entity\MsgpoolAction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Msgpool\Model\Entity\MsgpoolAction[] patchEntities($entities, array $data, array $options = [])
 * @method \Msgpool\Model\Entity\MsgpoolAction findOrCreate($search, callable $callback = null, $options = [])
 */
class MsgpoolActionsTable extends Table
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

        $this->setTable('msgpool_actions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('MsgpoolSubscribe', [
            'foreignKey' => 'msgpool_action_id',
            'className' => 'Msgpool.MsgpoolSubscribe'
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
            ->scalar('name')
            ->maxLength('name', 45)
            ->allowEmpty('name');

        return $validator;
    }
}
