<?php
namespace Queue\QueueServer;

use Queue\SQLManager\SQLManagerImpl;
use Queue\ClientTypes;

class QueueServerImpl implements QueueServer{
    //The following lines are intended for testing only
    
    
    
    private $estimatedTimePerClient; //Average time per client
    private $sqlManager; //SQL Object which comunicates with the MySQL database
    public function __construct(){
        self::$sqlManager = new SQLManagerImpl();
        //This example uses minutes but this can be adjusted to use other measures changing code only in client-side
        //These parameters should be read from a settings file or SQL table in a future
        self::$estimatedTimePerClient = 5;
    }

    public function registerClientToUnverifiedQueue() : User{
        $user = new User();
        self::$sqlManager->addUserToUnverifiedQueue($user);
        return $user;
    }
    public function queueUnverifiedQueueUser(User $user) : bool{
        switch($user->type){//Check Client type
            case ClientTypes::CLIENT_APP_USER_UNVERIFIED:
                $user->type = ClientTypes::CLIENT_APP_USER_VERIFIED;
                if(self::verifyUnverifiedQueuedUser($user,self::$sqlManager->getUnVerifiedUsersIdentifiers())){
                    
                    try {
                        self::$sqlManager->removeUserFromVerifiedQueueByIdentifier($user->identifier);
                        self::$sqlManager->addUserToVerifiedQueue($user);
                    } catch (\Exception $e) {
                        
                    }


                    return true;
                }
            default:
                return false;
        }
    }
    public function getEstimatedQueueTime(User $user) : mixed {
        switch($user->type){//Check Client type
            case ClientTypes::CLIENT_APP_USER_VERIFIED:
                return self::$estimatedTimePerClient * (sizeof(self::$sqlManager->getVerifiedQueueSize())-1); //This is the estimated time algorithm
            default:
                return false;
        }
    }
    
    
    private static function verifyUnVerifiedQueuedUser(User $user,array $identifiers){
        foreach ($identifiers as &$identifier) {
            if($identifier == $user->identifier){//Checks the identifier
                return true;
            }
        }
        return false;
    }
    public function dequeueFirstVerifiedQueueUser() : void{
        self::$sqlManager->removeUserFromVerifiedQueueByIndex(0);
    }
    public static function generateQrToken() : String{
        return "ABCDEFGHIJK123456";
    }
}
?>