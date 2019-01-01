<?php
/**
 * Created by PhpStorm.
 * User: wanxin
 * Date: 2019/1/1
 * Time: 上午11:14
 */

namespace App\Models\Traits;

trait Enum
{
    private function getEnumKey ($field, $value)
    {
        if (isset($this->enum[$field])) {
            $item = collect($this->enum[$field])->first(function ($item) use ($value) {
                return $item['value'] === $value;
            });
            if ($item) {
                return $item['key'];
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    private function getEnumValue($field, $key)
    {
        if (isset($this->enum[$field])) {
            $item = collect($this->enum[$field])->first(function ($item) use ($key) {
                return $item['key'] === $key;
            });
            if ($item) {
                return $item['value'];
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
}