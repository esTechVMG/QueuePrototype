<?php
namespace Queue\SQLManager;

use Exception;
use PDO;
use PDOException;

use Queue\QueueServer\User;
//This is a stub implementation made with arrays. Does nothing usefull ATM as it does not store
class SQLManagerImpl implements SQLManager{
    public static $offlineTestMode=false;//Disables SQL Connection to database. Usefull in unit testing. Disable on production
    private $unverifiedQueue;//Array of Unverified QueueClients. This clients are added here before the apps sends the verification in the queue. 
    private $verifiedQueue;// Clients verified in the app
    function __construct()
    {
        if (self::$offlineTestMode){
            self::$unverifiedQueue=[];
            self::$verifiedQueue = [];
        } else {
            //SQL Initialization code
            $dsn = 'mysql:dbname=testdb;host=127.0.0.1';
            $usuario = 'root';
            $contraseña = 'root';

            try {
                $gbd = new PDO($dsn, $usuario, $contraseña);
            } catch (PDOException $e) {
                
                echo 'Falló la conexión: ' . $e->getMessage();
            }
        }
    }
    
    public function getUnVerifiedUsers(): array{
        return self::$verifiedQueue;
    }
    
    function removeUserFromVerifiedQueueByIndex(int $index){
        unset($verifiedQueue[$index]); // remove item at index
        self::$verifiedQueue = array_values(self::$verifiedQueue); // reindex array
    }
    function getUnverifiedUserAtIndex($index) : User{
        return self::$unverifiedQueue[$index];
    }
    function getVerifiedUserAtIndex($index) : User{
        return self::$verifiedQueue[$index];
    }
    function getVerifiedQueueSize(): int{
        return sizeof(self::$verifiedQueue);
    }
    function moveUserToVerifiedQueue($identifier){
        $users =$this->getUnVerifiedUsers();
    }
    function addUserToUnverifiedQueue(User $user){
        array_push(self::$unverifiedQueue,$user);
    }
}
