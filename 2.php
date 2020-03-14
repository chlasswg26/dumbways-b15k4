<?php
function arrayMatching($dataKey, $word)
{
    if (is_array($dataKey))
    {
        for ($i = 0; $i < count($dataKey); $i++)
        {
            if (strpos($word, $dataKey[$i]) !== false)
            {
                echo $dataKey[$i] . ' => TRUE <br />';
            } else {
                echo $dataKey[$i] . ' => FALSE <br />';
            }
        }
    } else {
        return '"$dataKey" String must be an ARRAY BRUH!';
    }
}

$dataKey = ['dumb','ways','the','best'];
$word = 'dumbways';

echo arrayMatching($dataKey, $word);