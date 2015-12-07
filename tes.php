<?php

require_once 'penduduk.php';
$data = new Penduduk();
$d = $data->get_penduduk();

echo '<pre>';
print_r($d);
echo '</pre>';
