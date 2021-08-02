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