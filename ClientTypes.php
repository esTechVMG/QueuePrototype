<?php
namespace Queue;
//This is a pseudo-Enum Implementation. This identifies the user type
class ClientTypes{
    public const CLIENT_QR_USER = "CLIENT_QR_USER";
    public const CLIENT_APP_USER_VERIFIED = "CLIENT_APP_USER_VERIFIED";
    public const CLIENT_APP_USER_UNVERIFIED = "CLIENT_APP_USER_UNVERIFIED";
    public const  CLIENT_WEB_USER =  "CLIENT_WEB_USER";
    public const CLIENT_WEB_ADMIN = "CLIENT_WEB_ADMIN";
    public const CLIENT_WEB_DEPENDENT = "CLIENT_WEB_DEPENDENT";
}
?>