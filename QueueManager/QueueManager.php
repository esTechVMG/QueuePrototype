<?php
namespace Queue\QueueServer;

interface QueueServer{
    public function registerClientToUnverifiedQueue() : User;//Accesed by the QR terminal Client. Returns the User object with the Identifier to represent in the QR.
    public function queueUnverifiedQueueUser(User $user) : bool; //This function checks if user is in the unverified users queue and adds it to the verified queue.
    public function getEstimatedQueueTime(User $user) : mixed; //Int for verified QueueClients and -1 for UnverifiedQueueClients and unknown clients.
    public function dequeueFirstVerifiedQueueUser() : void; //This is called wehn
}
?>