<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'massive';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = [
    [ 'db' => 'id',         'dt' => 0 ],
    [ 'db' => 'firstname',  'dt' => 1 ],
    [ 'db' => 'surname',    'dt' => 2 ],
    [ 'db' => 'zip',        'dt' => 3 ],
    [ 'db' => 'country',    'dt' => 4 ],
];

// SQL server connection information
$sqlDetails = [
    'user' => '',
    'pass' => '',
    'db'   => '',
    'host' => '',
];

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require('../../../../examples/server_side/scripts/ssp.class.php');

echo json_encode(
    SSP::simple($_GET, $sqlDetails, $table, $primaryKey, $columns)
);
