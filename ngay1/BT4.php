<?php
$settings = [
    'memory_limit',
    'upload_max_filesize',
    'post_max_size',
    'max_execution_time',
    'error_reporting',
    'display_errors',
    'log_errors',
    'log_errors_max_len',
    'date.timezone'
];

foreach ($settings as $setting) {
    $value = ini_get($setting);
    if ($value === false) {
        $value = 'Không có thông tin';
    }
    echo "$setting : $value <br>";
}
?> 