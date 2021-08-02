# config.php-return-array-value-edit
config.php-return-array-value-edit


index.php
<?php

function updateConstants($primary_key, $secondary_key, $value) {
    $constants = include('constants.php');
    $constants[$primary_key][$secondary_key] = $value;
    $output = '<?php return ' . var_export($constants, true) . ';';
    $patterns = [
        "/array \(/" => '[',
        "/^([ ]*)\)(,?)$/m" => '$1]$2',
        "/=>[ ]?\n[ ]+\[/" => '=> [',
        "/([ ]*)(\'[^\']+\') => ([\[\'])/" => '$1$2 => $3',
        "/\)/" => ']',
    ];
    $output = preg_replace(array_keys($patterns), array_values($patterns), $output);
    file_put_contents('constants.php', $output);
    return $constants; //if you want to get the new config
}
updateConstants('guards', 'expert' ,'other');

constants.php

<?php return [
  'guards' => [
    'admin' => 'admin',
    'expert' => 'expert',
    'client' => 'client',
  ],
  'gender' => [
    1 => 'male',
    2 => 'female',
    3 => 'rather not mention',
  ],
  'is_hourly_pay' => [
    1 => 'yes',
    0 => 'no',
  ],
  'is_lump_sum' => [
    1 => 'yes',
    0 => 'no',
  ],
  'trueFalse' => [
    1 => 'yes',
    0 => 'no',
  ],
  'is_accepted' => [
    0 => 'pending',
    1 => 'yes',
  ],
  'progress_status' => [
    0 => 'pending',
    1 => 'approved',
    2 => 'payment',
    3 => 'task completed',
    4 => 'dispute',
    5 => 'release payment',
  ],
  'countries' => [
    'in' => 'India',
    'us' => 'United States',
  ],
  'currencies' => [
    'inr' => '<i class="fas fa-rupee-sign"></i>',
    'usd' => '<i class="fa fa-usd" aria-hidden="true"></i>',
  ],
  'usertypeslug' => [
    'admin' => 'admins',
    'expert' => 'experts',
    'client' => 'clients',
  ],
  'review_rating' => [
    1 => 1,
    2 => 2,
    3 => 3,
    4 => 4,
    5 => 5,
    6 => 6,
    7 => 7,
    8 => 8,
    9 => 9,
    10 => 10,
  ],
  'status' => [
    0 => 'pending',
    1 => 'completed',
    2 => 'in-progress',
  ],
  'job_types' => [
    'Full-Time' => 'Full-Time',
    'Part-Time' => 'Part-Time',
    'Freelancing' => 'Freelancing',
    'Intership' => 'Intership',
    'Remote' => 'Remote',
  ],
  'payment_types' => [
    'Lumpsum' => 'Lumpsum',
    'Hourly' => 'Hourly',
  ],
  'hide_info_expert' => [
    'email' => '******@****.***',
    'contact' => '+91 **********',
  ],
  'hide_info_client' => [
    'email' => '******@****.***',
    'contact' => '+91 **********',
  ],
  'undefined-field' => [
    'short' => 'undefined',
    'large' => 'Undefined data field',
  ],
  'nodata-list' => [
    'short' => 'no result',
    'large' => 'zero result found.',
  ],
];
