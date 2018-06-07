<?php
namespace App\Model\Table;

use App\Model\Entity\ControlManObra;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ControlManObra Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 */
class ControlManObraTable extends Table
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

        $this->table('control_man_obra');
        $this->displayField('id');
        $this->primaryKey('id');

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
            ->dateTime('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmpty('fecha');

        $validator
            ->scalar('producto')
            ->maxLength('producto', 30)
            ->requirePresence('producto', 'create')
            ->notEmpty('producto');

        $validator
            ->scalar('color')
            ->maxLength('color', 50)
            ->requirePresence('color', 'create')
            ->notEmpty('color');

        $validator
            ->scalar('material')
            ->maxLength('material', 20)
            ->requirePresence('material', 'create')
            ->notEmpty('material');

        $validator
            ->scalar('talla')
            ->maxLength('talla', 10)
            ->requirePresence('talla', 'create')
            ->notEmpty('talla');

        $validator
            ->integer('cantidad')
            ->requirePresence('cantidad', 'create')
            ->notEmpty('cantidad');

        $validator
            ->scalar('ref')
            ->maxLength('ref', 15)
            ->requirePresence('ref', 'create')
            ->notEmpty('ref');

        $validator
            ->scalar('cliente')
            ->maxLength('cliente', 60)
            ->requirePresence('cliente', 'create')
            ->notEmpty('cliente');

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
