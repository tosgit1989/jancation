<?php
namespace Services;
class Methods{
    // getRequestId($reqURL)
    public function getRequestId($reqURL) {
        return array_pop(explode('/', $reqURL));
    }

    // getHeaderStatus($sessionId)
    public function getHeaderStatus($sessionId) {
        if (isset($sessionId)) {
            return '';
        } else {
            return 'hidden';
        }
    }

    // getTabOrContentSta($type, $tabNum)
    public function getTabOrContentSta($activeNum, $type) {
        // $activeNum(選択状態の番号)の初期値
        if (!isset($activeNum)) {
            $activeNum = 1;
        }

        // ステータスのArrayを作成
        $staArrForTab = [];
        $staArrForContent = [];
        $i = 1;
        while ($i <= 100) {
            if ($i == $activeNum) {
                // $iが選択状態の番号である場合
                $staArrForTab += [$i => 'active'];
                $staArrForContent += [$i => ''];
            } else {
                // $iが選択状態の番号でない場合
                $staArrForTab += [$i => ''];
                $staArrForContent += [$i => 'hidden'];
            }
            $i ++;
        }

        // $typeがtabならタブステータス、contentならコンテントステータスをArray形式で返す
        if ($type == 'tab') {
            return $staArrForTab;
        } elseif ($type == 'content') {
            return $staArrForContent;
        } else {
            return '';
        }
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