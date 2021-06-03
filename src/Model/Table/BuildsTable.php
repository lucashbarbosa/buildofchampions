<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Builds Model
 *
 * @property \App\Model\Table\ChampionBuildsTable&\Cake\ORM\Association\HasMany $ChampionBuilds
 * @property \App\Model\Table\ItemsTable&\Cake\ORM\Association\BelongsToMany $Items
 *
 * @method \App\Model\Entity\Build newEmptyEntity()
 * @method \App\Model\Entity\Build newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Build[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Build get($primaryKey, $options = [])
 * @method \App\Model\Entity\Build findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Build patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Build[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Build|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Build saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Build[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Build[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Build[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Build[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class BuildsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('builds');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('ChampionBuilds', [
            'foreignKey' => 'build_id',
        ]);
        $this->belongsToMany('Items', [
            'foreignKey' => 'build_id',
            'targetForeignKey' => 'item_id',
            'joinTable' => 'builds_items',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->allowEmptyString('name');

        return $validator;
    }
}
