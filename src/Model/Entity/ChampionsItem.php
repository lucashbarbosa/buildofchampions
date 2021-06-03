<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ChampionsItem Entity
 *
 * @property int $id
 * @property int|null $item_id
 * @property int|null $champion_id
 *
 * @property \App\Model\Entity\Item $item
 * @property \App\Model\Entity\Champion $champion
 */
class ChampionsItem extends Entity
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
        'item_id' => true,
        'champion_id' => true,
        'item' => true,
        'champion' => true,
    ];
}
