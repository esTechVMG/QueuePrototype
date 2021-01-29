<?php
namespace Queue\QueueServer;
//This is just a generic class used by the QueueManager class. We may extend its use to represent every line of a SQL Request too.
use Queue\ClientTypes;
class User{
    public $type = ClientTypes::CLIENT_APP_USER_UNVERIFIED;
    public $identifier = "ABCDEFGHIJK123456";
}
?>