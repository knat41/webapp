<?php
function pdo() {
    static $pdo;
    if (!$pdo) {
        $pdo = new PDO(
            "mysql:host=localhost;dbname=test;charset=utf8",
            "root", ""
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
    return $pdo;
}

function all($sql, $p=[]) {
    $s = pdo()->prepare($sql);
    $s->execute($p);
    return $s->fetchAll();
}

function one($sql, $p=[]) {
    $s = pdo()->prepare($sql);
    $s->execute($p);
    return $s->fetch();
}

function execSQL($sql, $p=[]) {
    $s = pdo()->prepare($sql);
    return $s->execute($p);
}
