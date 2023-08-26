<?php

namespace App\Enums;

final class CallResult
{
    const UNREACHABLE = 1;  // 電話不通
    const ABSENT      = 2;  // 担当者不在
    const PENDING     = 3;  // 保留・検討
    const SUCCESS     = 4;  // アポ成功
    const DECLINED    = 5;  // 見送り

    /**
     * ラベルと定数の関連付け
     *
     * @return array
     */
    public static function labels(): array
    {
        return [
            self::UNREACHABLE   => '電話不通',
            self::ABSENT        => '担当者不在',
            self::PENDING       => '保留・検討',
            self::SUCCESS       => 'アポ成功',
            self::DECLINED      => '見送り',
        ];
    }

    /**
     * 指定された定数のラベルを取得する
     *
     * @param int $value
     * @return string|null
     */
    public static function getLabel(int $value): ?string
    {
        return self::labels()[$value] ?? null;
    }
}
