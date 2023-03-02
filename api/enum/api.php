<?php

use MyCLabs\Enum\Enum;

final class ApiEnum extends Enum {
    private const Status0 = 'Status0';
    private const Status1 = 'Status1';

    private const ElementStatusError = '
        <h5>Example Error Status <span class="badge bg-secondary">New</span></h5>
    ';

    private const ElementStatus0 = '
        <h5>Example Status0 <span class="badge bg-secondary">New</span></h5>
    ';

    private const ElementStatus1 = '
        <h5>Example Status1 <span class="badge bg-secondary">New</span></h5>
    ';

    public static function getStatus($status) {
        if ($status == self::Status0){
            return new ApiEnum(self::ElementStatus0);
        } elseif ($status == self::Status1){
            return new ApiEnum(self::ElementStatus1);
        } else {
            return new ApiEnum(self::ElementStatusError);
        }
    }

    public static function Status1() {
        return new ApiEnum(self::Status1);
    }
}
?>