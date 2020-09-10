<?php

$mysqli = new mysqli(
    "d82731.mysql.zonevs.eu",
    "d82731_fav",
    "kool on tore1",
    "d82731_fav"
);

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}