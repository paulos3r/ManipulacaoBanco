<?php
// data
$date = new DateTime();

echo $date->format('d/m/Y');

// formatar data quantos dias falta para hoje comparação
$today = new DateTime();
$end = new DateTime('2020-01-20');

$diff = $today->diff($end);

echo "<br/>";
echo $diff->format('%y ano, %m meses, %d dias, ');