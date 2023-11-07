<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class PenggunaEnum extends Model
{
    const VERIFIED_STATUS = [
        [
            'label' => 'VERIFIED',
            'value' => '1',
        ],
        [
            'label' => 'NOT_VERIFIED',
            'value' => '0',
        ]
    ];


    public function getEnumVerifiedValue($status)
    {
        return collect(static::VERIFIED_STATUS)->firstWhere('value', $status)['label'] ?? '';
    }
}
?>
