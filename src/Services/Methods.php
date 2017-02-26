<?php
namespace Services;
class Methods{
    // getRequestId($reqURL)
    public function getRequestId($reqURL) {
        return array_pop(explode('/', $reqURL));
    }

    // getHeaderStatus($SessionId)
    public function getHeaderStatus($SessionId) {
        if (isset($SessionId)) {
            return '';
        } else {
            return 'hidden';
        }
    }

    // getTabStatus($tab)
    public function getTabStatus($tab) {
        if (!isset($tab)) {
            $tab = 'tab1';
        }
        $tabStatus = ['tab1' => '', 'tab2' => '', 'tab3' => ''];
        $tabStatus[$tab] = 'active';
        return $tabStatus;
    }

    // getContentStatus($tab)
    public function getContentStatus($tab) {
        if (!isset($tab)) {
            $tab = 'tab1';
        }
        $contentStatus = ['tab1' => 'hidden', 'tab2' => 'hidden', 'tab3' => 'hidden'];
        $contentStatus[$tab] = '';
        return $contentStatus;
    }

    // getPanelHtml($heading, $body, $footer)
    public function getPanelHtml($heading, $body, $footer) {
        $headingHtml = sprintf('<div class="panel-heading"><strong>%s</strong></div>', $heading);
        $bodyHtml = sprintf('<div class="panel-body">%s</div>', $body);
        if ($footer == false) {
            $footerHtml = '';
        } else {
            $footerHtml = sprintf('<div class="panel-footer">%s</div>', $footer);
        }
        $panelHtml = '<div class="panel panel-primary">' . $headingHtml . $bodyHtml . $footerHtml . '</div>';
        return $panelHtml;
    }
}
?>