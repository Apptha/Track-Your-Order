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
class Apptha_Trackyourorder_IndexController extends Mage_Core_Controller_Front_Action {
    /* initiates the apptha product track  */

    public function indexAction() {
        $this->loadLayout();
        $this->renderLayout();
    }

    /* ajax action for tracking orders */
    public function trackordersummaryAction() {
        $this->loadLayout();
        $this->renderLayout();
    }
    
    public function trackSummaryAjaxAction(){
        $block = $this->getLayout()->createBlock('trackyourorder/trackyourorderajax')
                                   ->setTemplate('trackyourorder/trackyourordersummaryajax.phtml');
        $summaryContent =  $block->renderView();
        $this->getResponse()->setBody($summaryContent);
    }

}