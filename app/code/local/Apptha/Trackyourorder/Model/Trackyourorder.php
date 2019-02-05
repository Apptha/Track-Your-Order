<?php
/**
 * Apptha
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.apptha.com/LICENSE.txt
 *
 * ==============================================================
 *                 MAGENTO EDITION USAGE NOTICE
 * ==============================================================
 * This package designed for Magento COMMUNITY edition
 * Apptha does not guarantee correct work of this extension
 * on any other Magento edition except Magento COMMUNITY edition.
 * Apptha does not provide extension support in case of
 * incorrect edition usage.
 * ==============================================================
 *
 * @category    Apptha
 * @package     Apptha_TrackYourOrder
 * @version     0.1.1
 * @author      Apptha Team <developers@contus.in>
 * @copyright   Copyright (c) 2014 Apptha. (http://www.apptha.com)
 * @license     http://www.apptha.com/LICENSE.txt
 *
 * */


class Apptha_Trackyourorder_Model_Trackyourorder extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('trackyourorder/trackyourorder');
    }
    
    public function trackOrderImgHtml($status){
        if ($status == 'complete') {
            $imghtml = '<img src="' . $skinBaseUrl . 'complete.gif" alt="Completed" width="16" height="16" title="Completed" />';

        } elseif ($status == 'closed') {
            $imghtml = '<img src="' . $skinBaseUrl . 'closed.png" width="16" height="16" alt="Closed" title="Closed" />';

        } elseif ($status == 'processing') {
            $imghtml = '<img src="' . $skinBaseUrl . 'process.png" width="16" height="16" alt="Processing" title="Processing" />';

        } elseif ($status == 'holded') {
            $imghtml = '<img src="' . $skinBaseUrl . 'hold.png" width="16" height="16" alt="Processing" title="Processing" />';

        } else {
            $imghtml = '';
        }
        return $imghtml;       
    }
    
    
}