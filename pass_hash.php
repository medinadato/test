<?php

echo \password_hash("medina", PASSWORD_DEFAULT)."\n";

$options = [
    'cost' => 7,
    'salt' => 'BCryptRequires22Chrcts',
];

echo \password_hash("medina", PASSWORD_BCRYPT, $options)."\n";