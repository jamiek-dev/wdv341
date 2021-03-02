<?php 
$test = new SFCC_Auth();

class SFCC_Auth {
    private $auth_url = 'authentication-url.com';
    private $host_server;
    private $account_manager_password;
    private $business_manager_username;
    private $business_manager_password;
    private $base64_data_api_creds;
    private $base64_bm_api_creds;
    private $data_api_auth_token;
    private $bm_api_auth_token;
    private $account_manager_client_id;

    function __construct(
    $host_server, 
    $account_manager_client_id,
    $account_manager_password,
    $business_manager_username,
    $business_manager_password) {
        $this->host_server = $host_server;
        $this->account_manager_client_id = $account_manager_client_id;
        $this->account_manager_password = $account_manager_password;
        $this->business_manager_username = $business_manager_username;
        $this->business_manager_password = $business_manager_password;

        /**
         * API POST calls that require username and password combos to be sent via
         * request headers must be specifically formatted and base64 encoded.
         */
        $this->set_base64_data_api_creds(
            $this->account_manager_client_id,
            $this->account_manager_password
        );

        $this->set_base64_bm_api_creds(
            $this->business_manager_username,
            $this->business_manager_password,
            $this->account_manager_password
        );
    }

    /**
     * Data API access methods
     */
    private function set_base64_data_api_creds($username, $password) {
        $this->base64_data_api_creds = base64_encode($username.':'.$password);
    }
    
    public function get_data_api_auth_token() {
        return $this->data_api_auth_token ?: null;
    }

    public function request_data_api_token($token_only = false) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "{$this->auth_url}/v1/oauth/access_token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/x-www-form-urlencoded',
            "Authorization: Basic {$this->base64_data_api_creds}"
        ));
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'key=value&key2=value2');
        $output = curl_exec($ch);
        curl_close($ch);  

        $token_data = json_decode($output);
        $this->data_api_auth_token = $token_data->access_token;

        if($token_only)
            return $this->data_api_auth_token;

        return $output;
    }

    /**
     * Business Manager API access methods
     */
    private function set_base64_bm_api_creds($username, $password, $am_password) {
        $this->base64_bm_api_creds = base64_encode($username.':'.$password.':'.$am_password);
    }

    public function get_bm_api_auth_token() {
        return $this->bm_api_auth_token ?: null;
    }

    public function request_bm_api_token($token_only = false) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt(
            $ch, 
            CURLOPT_URL, 
            "$this->host_server/v1/oauth/access_token?client_id=$this->account_manager_client_id"
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/x-www-form-urlencoded',
            "Authorization: Basic {$this->base64_bm_api_creds}"
        ));
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'key=calue');
        $output = curl_exec($ch);
        curl_close($ch);  

        $token_data = json_decode($output);
        $this->bm_api_auth_token = $token_data->access_token;

        if($token_only)
            return $this->bm_api_auth_token;

        return $output;
    }
}
?>

<?php 
$sfcc_auth = new SFCC_Auth(
    '<Server Address>',
    '<Account Manager API Client ID>',
    '<Account Manager Password>',
    '<Business Manager Username>',
    '<Business Manager Password>'
);

$data_token_data = $sfcc_auth->request_data_api_token();
$data_token = $data_token_data->get_data_api_auth_token();
// OR
$data_token = $sfcc_auth->request_data_api_token(true); // Get token only

$bm_token_data = $sfcc_auth->request_bm_api_token();
$bm_token = $bm_token_data->get_bm_api_auth_token();
// OR
$bm_token = $sfcc_auth->request_bm_api_token(true); // Get token only
?>