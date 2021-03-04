<?php 
require_once('connection.php');

class Event {
    private $event_conn;

    /**
     * Constructor will always create a connection object to be used, but
     * will not open the connection at instantiation
     */
    function __construct() {
        $this->event_conn = new Connection();
    }

    /**
     * Get events from the DB based on a passed in query and optional arguments
     * @param string $query Query string to be sent with PDO
     * @param array $values Optional Array containing key/value pair arrays to be bound to PDO statement
     * @return $results Fetched DB results
     */
    public function get_events($query, $values = array()) {
        $conn = $this->event_conn->open();
        $statement_obj = $conn->prepare($query);

        /**
         * If bind values are sent, then bind them to the query parameters
         * array( 
         *      array(':presenter', 'Bob'), 
         *      array(':name', 'Cooking') 
         * )
         */
        if($values) {
            foreach($values as $value) {
                $statement_obj->bindValue($value[0], $value[1]);
            }
        }

        /**
         * Execute, fetch and close the connection
         */
        $statement_obj->execute();
        $results = $statement_obj->fetchAll(PDO::FETCH_ASSOC);
        $conn = $this->event_conn->close();
        
        return $results;
    }
}
?>