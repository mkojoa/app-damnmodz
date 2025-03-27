<?php
use config\Config;

require_once '../config/Config.php';

$config = Config::getInstance();
$pdo = $config->getPDO();
$dbHandler = $config->getDbHandler();
$authUser = $config->getAuthUser();
$utils = $config->getUtils();


$responseData = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($authUser['sub'])) {

        $user = $dbHandler->selectData('users', 'id', $authUser['sub']);

        if (!empty($user)) {
            //Check and process entered data
            $data = json_decode(file_get_contents('php://input'), true);

            if($data) {
                if(isset($data['editUser']) && !empty($data['userName'])){
                    $update = $dbHandler-> updateData('users', 'name', $data['userName'], 'id', $user['id']);
                    if($update){
                        $responseData = [
                            "status"=> true,
                            "message"=> "Name updated successfully",
                            "data"=>[
                                "name"=> $data['userName']
                            ],
                        ];
                    }
                }
            }
            echo json_encode($responseData);
            exit();
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (isset($authUser['sub'])) {

        $user = $dbHandler->selectData('users', 'id', $authUser['sub']);

        if (!empty($user)) {
            $user = $dbHandler->selectData('users', 'id', $user['id']);

            if(!empty($user)){
                $tfa = $user['google_2fa'] != null? true: false;

                $responseData = [
                    "status"=> true,
                    "google_fa"=> $tfa
                ];
            }
            echo json_encode($responseData);
            exit();
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {

    if (isset($authUser['sub'])) {

        $user = $dbHandler->selectData('users', 'id', $authUser['sub']);

        if (!empty($user)) {
            //Check and process entered data
            $data = json_decode(file_get_contents('php://input'), true);

            if($data) {
                if(isset($data['changePassword']) && !empty($data['userPassword']) && $data['userPassword'] === $data['userConPassword']){
                    // Hash the password
                    $hashedPassword = password_hash($data['userPassword'], PASSWORD_DEFAULT);
                    $update = $dbHandler-> updateData('users', 'password', $hashedPassword, 'email', $data['email']);
                    if($update){
                        newLogs('system', "$data[email] changed password successfully",'success');
                        $responseData = [
                            "status"=> true,
                            "message"=> "Password updated successfully",
                        ];
                    }
                }else{
                    newLogs('system', "$data[email] changed password unsuccessful",'error');
                    $responseData = [
                        "status"=> false,
                        "message"=> "Passwords must match",
                    ];
                }
            }

            echo json_encode($responseData);
            exit();
        }
    }
}
