<?php

namespace App\Services;

use App\Exceptions\Business\SettingKeyNotFoundException;
use App\Models\Setting;
use Exception;

class SettingService
{

    /**
     * @param  string  $key
     * @return string
     * @throws SettingKeyNotFoundException
     */
    public static function get(string $key): string
    {
        try {
            $value = Setting::where('key', $key)->firstOrFail();
        } catch (Exception $exception){
            throw new SettingKeyNotFoundException(sprintf('Key "%s" not found', $key));
        }
        return $value->value;

    }

    public static function set(string $key, string $value): void
    {
        $setting = Setting::where('key', $key)->firstOrNew();
        $setting->key = $key;
        $setting->value = $value;
        $setting->save();
    }

}
