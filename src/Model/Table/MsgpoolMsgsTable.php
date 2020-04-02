<?php
namespace Msgpool\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Time;
/**
 * MsgpoolMsgs Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\OwnersTable|\Cake\ORM\Association\BelongsTo $Owners
 * @property \App\Model\Table\TicketsTable|\Cake\ORM\Association\BelongsTo $Entities
 *
 * @method \Msgpool\Model\Entity\MsgpoolMsg get($primaryKey, $options = [])
 * @method \Msgpool\Model\Entity\MsgpoolMsg newEntity($data = null, array $options = [])
 * @method \Msgpool\Model\Entity\MsgpoolMsg[] newEntities(array $data, array $options = [])
 * @method \Msgpool\Model\Entity\MsgpoolMsg|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Msgpool\Model\Entity\MsgpoolMsg|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Msgpool\Model\Entity\MsgpoolMsg patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Msgpool\Model\Entity\MsgpoolMsg[] patchEntities($entities, array $data, array $options = [])
 * @method \Msgpool\Model\Entity\MsgpoolMsg findOrCreate($search, callable $callback = null, $options = [])
 */
class MsgpoolMsgsTable extends Table
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

        $this->setTable('msgpool_msgs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'className' => 'Users'
        ]);
        $this->belongsTo('Owners', [
            'foreignKey' => 'owner_id',
            'className' => 'Owners'
        ]);
        $this->belongsTo('Entities', [
            'foreignKey' => 'entity_id',
            'className' => 'Tickets'
        ]);

     /*   $this->belongsTo('MsgpoolSubscribes', [
            'foreignKey' => 'source',
            'bindingKey' =>'source',
            'className' => 'Msgpool.MsgpoolSubscribes'
        ]);
    */
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
            ->dateTime('date')
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
            ->scalar('msg')
            ->allowEmpty('msg');

        $validator
            ->scalar('msg_type')
            ->maxLength('msg_type', 45)
            ->allowEmpty('msg_type');

        $validator
            ->integer('state')
            ->allowEmpty('state');

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
        $rules->add($rules->existsIn(['owner_id'], 'Owners'));
        $rules->add($rules->existsIn(['entity_id'], 'Entities'));

        return $rules;
    }

    public function addticketmsg( $msg_header=array(),$msg=array()) {

        $sender_point =$msg_header['sender_point'];
        $source  =$msg_header['source'];
        $type =$msg_header['type'];
        $user_id =$msg_header['user_id'];
        $owner_id =$msg_header['owner_id'];
        $msg =$msg_header['msg'];
        //$msg_type =$msg_header['msg_type'];

        $get_target_user=[6]; //$user_id

        foreach ($get_target_user as $key => $value) {
            

            $msg= $this->newEntity([
                'date'=>Time::now(),
                'sender_point'=>$msg_header['sender_point'],
                'source'=>$msg_header['source'],
                'type'=>$msg_header['type'],
                'user_id'=>$msg_header['user_id'],
                'owner_id'=>$msg_header['owner_id'],
                'entity_id'=>$msg_header['entity_id'],
                'target_user_id'=>$get_target_user
            ]);

            if ( is_array($msg_header['msg']) ) {
                $msg= $this->patchEntity($msg,[
                    'msg'=>json_encode($msg_header['msg']),
                    'msg_type'=>'json'
                    ]);
            } 
            else {
                $msg= $this->patchEntity($msg,[
                    'msg'=>$msg_header['msg'],
                    'msg_type'=>'txt'
                    ]);
            }
            
            $this->save($msg);
            /*debug($msg);
            die();
            */
            /*insert mindenkinek akinek van feliratkozása

            sender_point -owner
                          writer
                          all
            msg template ből
            # code...
            */
        }
    }
}
