<?php

$settings = array();

/**
 * Loading page after login
 */
$settings['HOME_PAGE'] = "home";

/**
 * Pagination Data per page
 */
$settings['DATA_PER_PAGE'] = 5;

/**
 * Client Timezone
 */
$settings["TIME_ZONE"] = "Asia/Kolkata";

/**
 * Maximum billing discount amount
 */
$settings["MAX_INVOICE_DISCOUNT_AMOUNT"] = 5;

/**
 * Date Formats
 */
$settings['MYSQL_DATE_FORMAT'] = "%d %b %Y";
$settings['MYSQL_TIME_FORMAT'] = "%H:%i:%s";

/**
 * invoice number prefix text
 */
$settings['INVOICE_NUMBER_PREFIX'] = "INV";

/**
 * invoice number suffix text
 */
$settings['INVOICE_NUMBER_SUFFIX'] = "EEE";


/**
 * Packges enable/disable
 */
$settings['IS_PMS_ENABELD'] = true;
$settings['IS_HR_ENABELD'] = true;