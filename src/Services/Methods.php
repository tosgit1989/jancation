<?php
namespace Services;
class Methods{
    // getRequestId($reqURL)
    public function getRequestId($reqURL) {
        return array_pop(explode('/', $reqURL));
    }
}
?>