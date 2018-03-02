<?php

function get($table, $value, $key = 'id')
{
    global $mysqli;

    if ($result = $mysqli->query("SELECT * FROM $table WHERE $key = '$value'")) {
        return $result->fetch_assoc();
    }
    return false;
}

function getMany($table, $limit = 1000)
{
    global $mysqli;
    $results = [];

    if ($result = $mysqli->query("SELECT * FROM $table LIMIT $limit")) {
        while ($each = $result->fetch_assoc()) {
            array_push($results, $each);
        }
        return $results;
    }
    return [];
}

function getManyWhere($table, $key, $value, $limit = 1000)
{
    global $mysqli;
    $results = [];

    if ($result = $mysqli->query("SELECT * FROM $table WHERE $key = $value LIMIT $limit")) {
        while ($each = $result->fetch_assoc()) {
            array_push($results, $each);
        }
        return $results;
    }
    return [];
}

function getRecent($table, $limit = 1000)
{
    global $mysqli;
    $results = [];

    if ($result = $mysqli->query("SELECT * FROM $table ORDER BY created_at desc LIMIT $limit")) {
        while ($each = $result->fetch_assoc()) {
            array_push($results, $each);
        }
        return $results;
    }
    return [];
}

function getRecentWhere($table, $key, $value, $limit = 1000)
{
    global $mysqli;
    $results = [];

    if ($result = $mysqli->query("SELECT * FROM $table WHERE $key = $value ORDER BY created_at desc LIMIT $limit")) {
        while ($each = $result->fetch_assoc()) {
            array_push($results, $each);
        }
        return $results;
    }
    return [];
}
