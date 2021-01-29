<?php

namespace Queue\SQLManager;
use Queue\QueueServer\User;

interface SQLManager{
    //IMPORTANT NOTES
    // - ALL INDEXES START AT 0
    // - Commented functions are not needed right now. 

    function getUnverifiedUsers() : array; //returns a list of User objects from the unverified queue
    //function getVerifiedUsers() : array ; //returns a list of User objects from the verified queue

    function addUserToUnverifiedQueue(User $user); //Adds the user to the last position of the queue
    //function addUserToVerifiedQueue(User $user); //Adds the user to the last position of the queue

    function removeUserFromVerifiedQueueByIndex(int $index);
    //function removeUserFromUnverifiedQueueByIndexInQueue(int $index);

    function getUnverifiedUserAtIndex(int $index) : User;
    function getVerifiedUserAtIndex(int $index) : User;

    function getVerifiedQueueSize(): int;
    //function getVerifiedQueueSize(): int;

    function moveUserToVerifiedQueue(string $identifier);
}
?>