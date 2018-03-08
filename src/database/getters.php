<?php

/**
 * Gets a single resource from the database, given a table and value with the default column matched being id.
 *
 * @param string $table
 * @param mixed $value
 * @param string $key, default = 'id'
 * @return mixed
 */
function get($table, $value, $key = 'id') {
    global $mysqli;

    if ($result = $mysqli->query("SELECT * FROM $table WHERE $key = '$value'")) {
        return $result->fetch_assoc();
    }
    return false;
}

/**
 * Returns an array of resources from the database.
 *
 * @param string $table
 * @param integer $limit, default = 1000
 * @return array $results
 */
function getMany($table, $limit = 1000) {
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

/**
 * Gets many resources from the database matching WHERE criteria.
 *
 * @param string $table
 * @param string $key
 * @param mixed $value
 * @param integer $limit, default = 1000
 * @return array $results
 */
function getManyWhere($table, $key, $value, $limit = 1000) {
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

/**
 * Get many resources from the database ordered by most recent.
 *
 * @param string $table
 * @param integer $limit, default = 1000
 * @return array $results
 */
function getRecent($table, $limit = 1000) {
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

/**
 * Get many resources from the database ordered by most recent matchign WHERE criteria.
 *
 * @param string $table
 * @param string $key
 * @param mixed $value
 * @param integer $limit, default = 1000
 * @return array $results
 */
function getRecentWhere($table, $key, $value, $limit = 1000) {
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

?>