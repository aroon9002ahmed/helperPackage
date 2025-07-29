<?php

namespace Qit\Helper\functions;

class HelperShop
{
   /**
     * Get the name of the order status based on the status code.
     *
     * @param int|null $statusCode The status code of the order.
     * @param bool $select Whether to return an array of statuses or a single status name.
     * @return string|array The name of the status or an array of all statuses.
     */
    public static function getOrderStatusName($statusCode=null, $select = false)
    {
        $statuses = [
            0 => 'Pending',
            1 => 'Confirmed',
            2 => 'Processing',
            3 => 'Shipped',
            4 => 'Cancelled',
            5 => 'Delivered',
            // Add more statuses as needed
        ];

        if ($select === true) {
            return $statuses;
        }

        return $statuses[$statusCode] ?? 'Unknown Status';
    }
}