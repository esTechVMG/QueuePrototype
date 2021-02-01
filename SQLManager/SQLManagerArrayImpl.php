<?php
namespace Queue\SQLManager;

use Exception;

use Queue\QueueServer\User;
//This is a stub implementation made with arrays. Does nothing usefull ATM as it does not store
class SQLManagerArrayImpl implements SQLManager{
    private $unverifiedQueue;//Array of Unverified QueueClients. This clients are added here before the apps sends the verification in the queue. 
    private $verifiedQueue;// Clients verified in the app
    function __construct()
    {
        self::$unverifiedQueue=[];
        self::$verifiedQueue = [];
    }
    //SELECT * FROM unverified_users WHERE index="?" 
    public function getUnVerifiedUsersIdentifiers(): array{
        $list=[];
        foreach (self::$unverifiedQueue as $user){
            if($user instanceof User){
                array_push($list,$user->identifier);
            }
        }
        return $list;
    }
    
    function removeUserFromVerifiedQueueByIndex(int $index){
        unset($verifiedQueue[$index]); // remove item at index
        self::$verifiedQueue = array_values(self::$verifiedQueue); // reindex array
    }
    //SELECT * FROM unverified_users WHERE index="?" 
    function getUnVerifiedUserAtIndex($index) : User{
        return self::$unverifiedQueue[$index];
    }
    //SELECT * FROM verified_users WHERE index="?" 
    function getVerifiedUserAtIndex($index) : User{
        return self::$verifiedQueue[$index];
    }
    //SELECT COUNT(*) FROM verified_users;
    function getVerifiedQueueSize(): int{
        return sizeof(self::$verifiedQueue);
    }

    
    function addUserToUnVerifiedQueue(User $user){//Adds the user to the last position of the queue
        array_push(self::$unverifiedQueue,$user);
    }
    function addUserToVerifiedQueue(User $user){ //Adds the user to the last position of the queue
        array_push(self::$unverifiedQueue,$user);
    }

    //SELECT id FROM verified_users;
    function getVerifiedUsersIdentifiers() : array{
        $list=[];
        foreach (self::$verifiedQueue as $user){
            if($user instanceof User){
                array_push($list,$user->identifier);
            }
        }
        return $list;
    }
    

    //SELECT * FROM unverified_users;
    function getUnVerifiedUsers() : array {//returns a list of User objects from the unverified queue
        return self::$unverifiedQueue;
    }
    //SELECT * FROM verified_users;
    function getVerifiedUsers() : array {
        return self::$verifiedQueue;
    }


    


    function removeUserFromVerifiedQueueByIdentifier(string $identifier){
        throw new Exception("jfh");
    }

    function removeUserFromUnVerifiedQueueByIndexInQueue(string $identifier){
        throw new Exception("et");
    }

    

    
    

    //SELECT *  FROM verified_users WHERE id="?"
    function getVerifiedUserByIdentifier(string $identifier) : User{
        foreach(self::$verifiedQueue as $user){
            if ($user instanceof User){
                if($user->identifier==$identifier){
                    return $user;
                }
            }
        }
        throw new Exception("Error: User Not Found");
    }
    //SELECT *  FROM unverified_users WHERE id="?"
    function getUnVerifiedUserByIdentifier(string $identifier) : User{
        foreach(self::$unverifiedQueue as $user){
            if ($user instanceof User){
                if($user->identifier==$identifier){
                    return $user;
                }
            }
        }
        throw new Exception("Error: User Not Found");
    }
    public function removeUserFromUnVerifiedQueueByIdentifier(string $identifier)
    {
        
    }
}
