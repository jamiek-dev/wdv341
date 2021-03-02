<?php
function write_log($log, $location) {
    error_log(print_r($log, true) . "\n\r", 3, $location);
}

function set_connection_exception_handler($con, $e) {
    //put a developer defined error message on the PHP log file
    write_log($e->getMessage(), 'debug.log');
    write_log($con, 'debug.log');
    //error_log($con->connect_error."\n\r", 3, 'debug.log');
    //error_log(var_dump(debug_backtrace()));		

    //send control to a User friendly Error display page				
    header('Location: 505_error_response_page_1.php');
}


function set_statement_exception_handler($stmt, $e) {
    //put a developer defined error message on the PHP log file
    write_log($e->getMessage(), 'debug.log');
    write_log($stmt->errno, 'debug.log');
    write_log($stmt->error, 'debug.log');
    //error_log(var_dump(debug_backtrace()));		

    //send control to a User friendly Error display page				
    header('Location: 505_error_response_page_2.php');
}
