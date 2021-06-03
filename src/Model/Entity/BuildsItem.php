<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BuildsItem Entity
 *
 * @property int $id
 * @property string|null $build_id
 * @property string|null $item_id
 *
 * @property \App\Model\Entity\Build $build
 * @property \App\Model\Entity\Item $item
 */
class BuildsItem extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'build_id' => true,
        'item_id' => true,
        'build' => true,
        'item' => true,
    ];
}
