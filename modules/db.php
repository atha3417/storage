<?php

require_once __DIR__ . '/config.php';

$db = null;
$stmt = null;

function db_connect()
{
    global $configs, $db;
    try {
        $conn = new PDO($configs['db']['driver'] . ':host=' . $configs['db']['host'] . ';dbname=' . $configs['db']['name'] . ';charset=utf8', $configs['db']['user'], $configs['db']['pass']);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $db = $conn;
        return $conn;
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}

function prepare($query)
{
    global $db, $stmt;
    if (!$db) return;
    $stmt = $db->prepare($query);
}

function execute($variables = [])
{
    global $stmt;
    if (!$stmt) return;
    return $stmt->execute($variables);
}

function fetch()
{
    global $db, $stmt;
    if (!$db || !$stmt) return;
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

db_connect();
