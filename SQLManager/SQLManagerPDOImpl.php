<?php
namespace Queue\SQLManager;

use Exception;
use Queue\QueueServer\User;

//Stub classs that 
class SQLManagerArrayImpl implements SQLManager{
    function getUnVerifiedUsersIdentifiers() : array{
        return [];
    }
    //SELECT id FROM verified_users;
    function getVerifiedUsersIdentifiers() : array{
        return [];
    } 

    //SELECT * FROM unverified_users;
    function getUnVerifiedUsers() : array {//returns a list of User objects from the unverified queue
        return[];
    }
    //SELECT * FROM verified_users;
    function getVerifiedUsers() : array {//returns a list of User objects from the verified queue
        return[];
    } 


    function addUserToUnVerifiedQueue(User $user){
        
    } //Adds the user to the last position of the queue
    function addUserToVerifiedQueue(User $user){
        
    } //Adds the user to the last position of the queue


    /**
     * @throws Exception
     */
    function removeUserFromVerifiedQueueByIdentifier(string $identifier){

    }
    /**
     * @throws Exception
     */
    function removeUserFromUnVerifiedQueueByIdentifier(string $identifier){

    }

    //SELECT * FROM unverified_users WHERE index="?" 
    function getUnVerifiedUserAtIndex(int $index) : User{
        return new User();
    }
    //SELECT * FROM verified_users WHERE index="?" 
    function getVerifiedUserAtIndex(int $index) : User{
        return new User();
    }

    /**
     * @throws Exception
     */
    //SELECT *  FROM verified_users WHERE id="?"
    function getVerifiedUserByIdentifier(string $identifier) : User{
        return new User();
    }
    /**
     * @throws Exception
     */
    //SELECT *  FROM unverified_users WHERE id="?"
    function getUnVerifiedUserByIdentifier(string $identifier) : User{
        throw new Exception("Not Implemented");
    }

    //SELECT COUNT(*) FROM verified_users;
    function getVerifiedQueueSize(): int{
        return 0;
    }
}
?>