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
        $TabStatus = ['tab1' => '', 'tab2' => '', 'tab3' => ''];
        $TabStatus[$tab] = 'active';
        return $TabStatus;
    }

    // getContentStatus($tab)
    public function getContentStatus($tab) {
        if (!isset($tab)) {
            $tab = 'tab1';
        }
        $ContentStatus = ['tab1' => 'hidden', 'tab2' => 'hidden', 'tab3' => 'hidden'];
        $ContentStatus[$tab] = '';
        return $ContentStatus;
    }

    // getPanelHtml($heading, $body, $footer)
    public function getPanelHtml($heading, $body, $footer) {
        $HeadingHtml = sprintf('<div class="panel-heading"><strong>%s</strong></div>', $heading);
        $BodyHtml = sprintf('<div class="panel-body">%s</div>', $body);
        if ($footer == false) {
            $FooterHtml = '';
        } else {
            $FooterHtml = sprintf('<div class="panel-footer">%s</div>', $footer);
        }
        $PanelHtml = '<div class="panel panel-primary">' . $HeadingHtml . $BodyHtml . $FooterHtml . '</div>';
        return $PanelHtml;
    }
}
?>