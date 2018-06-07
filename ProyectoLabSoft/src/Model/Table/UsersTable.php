<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('control_man_obra', [
            'foreignkey' => 'user_id'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->notEmpty('id', 'create');

        $validator
            ->requirePresence('user', 'create')
            ->notEmpty('user', 'Rellene este campo');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password', 'Rellene este campo', 'create');

        $validator
            ->requirePresence('user_type', 'create')
            ->notEmpty('user_type', 'Rellene este campo');

        $validator
            ->requirePresence('active', 'create')
            ->notEmpty('active', 'Rellene este campo');

        return $validator;
    }

    public function findAuth(\Cake\ORM\Query $query, array $options)
    {
        $query
            ->select(['id', 'user', 'password', 'user_type'])
            ->where(['Users.active' => 1]);

        return $query;
    }

    public function recoverPassword($id)
    {
        $user = $this->get($id);
        return $user->password;
    }

    public function beforeDelete($event, $entity, $options)
    {
        if ($entity->user_type == 'admin') 
        {
            return false;
        }
        return true;
    }
}
