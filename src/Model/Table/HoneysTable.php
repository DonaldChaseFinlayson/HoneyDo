<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Honeys Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Honey get($primaryKey, $options = [])
 * @method \App\Model\Entity\Honey newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Honey[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Honey|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Honey patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Honey[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Honey findOrCreate($search, callable $callback = null)
 */
class HoneysTable extends Table
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

        $this->table('honeys');
        $this->displayField('userfrom_id');
        $this->primaryKey(['userfrom_id', 'userto_id']);

        $this->belongsTo('Users', [
            'foreignKey' => 'userfrom_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'userto_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['userfrom_id'], 'Users'));
        $rules->add($rules->existsIn(['userto_id'], 'Users'));

        return $rules;
    }
}
