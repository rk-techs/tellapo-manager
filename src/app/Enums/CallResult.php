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

    /**
     * 定数の値から対応する定数名を取得する.
     * 状態などの定数をもとに動的にCSSクラス名を生成する際に使用する（ex. status-label-success）
     *
     * @param int $value
     * @return string|null
     */
    public static function getConstantName(int $value): ?string
    {
        $reflection = new \ReflectionClass(__CLASS__);
        $constants = $reflection->getConstants();

        $constantName = array_search($value, $constants, true);
        return $constantName !== false ? $constantName : null;
    }
}
