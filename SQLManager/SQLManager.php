<?php

namespace Queue\SQLManager;
use Queue\QueueServer\User;

interface SQLManager{
    //IMPORTANT NOTES
    // - ALL INDEXES START AT 0
    // - Commented functions are not needed right now. 
    //This class does not provides any logic, only a wrapper for accessing SQL data in a structured way.
    //SELECT id FROM unverified_users;
    function getUnVerifiedUsersIdentifiers() : array; 
    //SELECT id FROM verified_users;
    function getVerifiedUsersIdentifiers() : array; 

    //SELECT * FROM unverified_users;
    function getUnVerifiedUsers() : array ;//returns a list of User objects from the unverified queue
    //SELECT * FROM verified_users;
    function getVerifiedUsers() : array ; //returns a list of User objects from the verified queue


    function addUserToUnVerifiedQueue(User $user); //Adds the user to the last position of the queue
    function addUserToVerifiedQueue(User $user); //Adds the user to the last position of the queue


    /**
     * @throws Exception
     */
    function removeUserFromVerifiedQueueByIdentifier(string $identifier);
    /**
     * @throws Exception
     */
    function removeUserFromUnVerifiedQueueByIdentifier(string $identifier);

    //SELECT * FROM unverified_users WHERE index="?" 
    function getUnVerifiedUserAtIndex(int $index) : User;
    //SELECT * FROM verified_users WHERE index="?" 
    function getVerifiedUserAtIndex(int $index) : User;

    /**
     * @throws Exception
     */
    //SELECT *  FROM verified_users WHERE id="?"
    function getVerifiedUserByIdentifier(string $identifier) : User;
    /**
     * @throws Exception
     */
    //SELECT *  FROM unverified_users WHERE id="?"
    function getUnVerifiedUserByIdentifier(string $identifier) : User;

    //SELECT COUNT(*) FROM verified_users;
    function getVerifiedQueueSize(): int;
}
?>