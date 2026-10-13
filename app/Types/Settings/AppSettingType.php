<?php

namespace App\Types\Settings;

use App\Interfaces\SettingInterface;
use App\Traits\SettingTrait;

class AppSettingType implements SettingInterface
{
    use SettingTrait;
    public string $customerAppstoreLink = '';
    public string $customerPlaystoreLink = '';
    public string $customerAppScheme = '';
    public bool $customerViewDeliveryZoneInfo = false;
    public string $sellerAppstoreLink = '';
    public string $sellerPlaystoreLink = '';
    public string $sellerAppScheme = '';
    public string $riderAppstoreLink = '';
    public string $riderPlaystoreLink = '';
    protected static function getValidationRules(): array
    {
        return [
            'customerAppstoreLink' => 'nullable|url',
            'customerPlaystoreLink' => 'nullable|url',
            'customerAppScheme' => ['nullable', 'regex:/^\S+$/'],
            'customerViewDeliveryZoneInfo' => 'nullable|in:0,1,true,false',
            'sellerAppstoreLink' => 'nullable|url',
            'sellerPlaystoreLink' => 'nullable|url',
            'sellerAppScheme' => ['nullable', 'regex:/^\S+$/'],
            'riderAppstoreLink' => 'nullable|url',
            'riderPlaystoreLink' => 'nullable|url',
        ];
    }
}
