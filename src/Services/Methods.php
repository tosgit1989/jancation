<?php
namespace Services;
class Methods{
    // getRequestId($reqURL)
    public function getRequestId($reqURL) {
        return array_pop(explode('/', $reqURL));
    }

    // getTabStatus($tab)
    public function getTabStatus($tab) {
        if (!isset($tab)) {
            $tab = 'tab1';
        }
        $TabStatus = ['tab1' => '', 'tab2' => ''];
        $TabStatus[$tab] = 'active';
        return $TabStatus;
    }

    // getContentStatus($tab)
    public function getContentStatus($tab) {
        if (!isset($tab)) {
            $tab = 'tab1';
        }
        $ContentStatus = ['tab1' => 'hidden', 'tab2' => 'hidden'];
        $ContentStatus[$tab] = '';
        return $ContentStatus;
    }
}
?>