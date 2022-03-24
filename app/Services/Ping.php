<?php

namespace App\Services;

class Ping
{
    public function pingServer($url)
    {
        $tB = microtime(true);
        $fP = fSockOpen($url, 80, $errno, $errstr, 10);
        if (!$fP){
            return $this->formatError(now());
        }
        $tA = microtime(true);
        return $this->format(round((($tA - $tB) * 1000), 0));
    }

    public function format(int|string $ping)
    {
        return [
            'ping' => $ping
        ];
    }

    public function formatError($error)
    {
        return [
            'error' => $error
        ];
    }
}
