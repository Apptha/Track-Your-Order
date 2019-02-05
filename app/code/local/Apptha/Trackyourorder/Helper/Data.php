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

class Apptha_Trackyourorder_Helper_Data extends Mage_Core_Helper_Abstract
{
       
   public function salesTrack($increment_id){
       
       $order = Mage::getModel('sales/order')
                ->getCollection()
                ->addFieldToFilter('increment_id', $increment_id);
       
       return $order;
   } 
   
   public function redirectingTo(){
       $historyUrl = Mage::getBaseUrl()."sales/order/history"; 
       return Mage::app()->getFrontController()->getResponse()->setRedirect($historyUrl);
   }
   
   public function _getProductCollection($productId){
       return Mage::getModel('catalog/product')->load($productId);
   }
    #Domain Key for Track your order
    public function domainKey($tkey) {

        $message = "EM-TYOMP0EFIL9XEV8YZAL7KCIUQ6NI5OREH4TSEB3TSRIF2SI1ROTAIDALG-JW";
        $uKey = strlen($tkey);
        for ($i = 0; $i < $uKey; $i++) {
            $key_array[] = $tkey[$i];
        }
        $enc_message = "";
        $kPos = 0;
        $chars_str = "WJ-GLADIATOR1IS2FIRST3BEST4HERO5IN6QUICK7LAZY8VEX9LIFEMP0";
        $lenCharSet = strlen($chars_str);
        for ($i = 0; $i < $lenCharSet; $i++) {
            $chars_array[] = $chars_str[$i];
        }
        $lenMessage = strlen($message);
        $cKeyArr = count($key_array);
        for ($i = 0; $i < $lenMessage; $i++) {
            $char = substr($message, $i, 1);

            $offset = $this->getOffset($key_array[$kPos], $char);
            $enc_message .= $chars_array[$offset];
            $kPos++;
            
            if ($kPos >= $cKeyArr) {
                $kPos = 0;
            }
        }

        return $enc_message;
    }

    public function getOffset($start, $end) {

        $chars_str = "WJ-GLADIATOR1IS2FIRST3BEST4HERO5IN6QUICK7LAZY8VEX9LIFEMP0";
        $strLen = strlen($chars_str);
        for ($i = 0; $i < $strLen ; $i++) {
            $chars_array[] = $chars_str[$i];
        }

        for ($i = count($chars_array) - 1; $i >= 0; $i--) {
            $lookupObj[ord($chars_array[$i])] = $i;
        }

        $sNum = $lookupObj[ord($start)];
        $eNum = $lookupObj[ord($end)];

        $offset = $eNum - $sNum;

        if ($offset < 0) {
            $offset = count($chars_array) + ($offset);
        }

        return $offset;
    }
}