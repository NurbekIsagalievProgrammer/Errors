<?php

namespace NW\WebService\References\Operations\Notification;

/**
 * @property Seller $Seller
 */
class Contractor
{
    const TYPE_CUSTOMER = 0;
    public $id;
    public $type;
    public $name;

    public static function getById(int $contractorId): self
    {
        return new self($contractorId); // имитация метода getById
    }

    public function getFullName(): string
    {
        return $this->name . ' ' . $this->id;
    }
}

class Seller extends Contractor
{
}

class Employee extends Contractor
{
}

class Status
{
    public $id;
    public $name;

    public static function getName(int $id): string
    {
        $statuses = [
            0 => 'Completed',
            1 => 'Pending',
            2 => 'Rejected',
        ];

        return $statuses[$id];
    }
}

abstract class ReferencesOperation
{
    abstract public function doOperation(): array;

    public function getRequest($paramName)
    {
        return $_REQUEST[$paramName];
    }
}

function getResellerEmailFrom($resellerId)
{
    return 'contractor@example.com';
}

function getEmailsByPermit($resellerId, $event)
{
    return ['someemail@example.com', 'someemail2@example.com'];
}

class NotificationEvents
{
    const CHANGE_RETURN_STATUS = 'changeReturnStatus';
    const NEW_RETURN_STATUS = 'newReturnStatus';
}

class NotificationManager
{
    public static function send(
        $resellerId,
        $clientId,
        $event,
        $notificationSubEvent,
        $templateData,
        &$errorText,
        $locale = null
    ): bool {
        return true; // имитация метода send
    }
}

class MessagesClient
{
    public static function sendMessage(
        $messages,
        $resellerId = 0,
        $customerId = 0,
        $notificationEvent = 0,
        $notificationSubEvent = ''
    ): string {
        return ''; // имитация метода sendMessage
    }
}

