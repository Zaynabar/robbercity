<?php

$message1 = stream_get_line(STDIN, 500 + 1, "\n");
$message2 = stream_get_line(STDIN, 500 + 1, "\n");
$message3 = stream_get_line(STDIN, 500 + 1, "\n");

function xor_hex($a, $b)
{
    $res = '';

    for ($i = 0; $i < strlen($a); ++$i) {
        $res .= dechex(hexdec($a[$i]) ^ hexdec($b[$i]));
    }

    return $res;
}

$hex_xor = xor_hex(xor_hex($message1, $message2), $message3);
$clear_text = '';

for ($i = 0; $i < strlen($hex_xor); $i += 2) {
    $clear_text .= chr(hexdec(substr($hex_xor, $i, 2)));
}

echo $clear_text;
?>