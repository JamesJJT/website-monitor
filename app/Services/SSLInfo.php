<?php

namespace App\Services;

use Carbon\Carbon;

class SSLInfo
{
    public function __construct(
        public string $url,
        public $info = null
    ){}

    public function handle()
    {
        $this->getSSLInfo();

        return $this->formatData();
    }

    /**
     * @return resource
     */
    public function getSSLInfo()
    {
        //TODO reformat this
        $g = stream_context_create (array("ssl" => array("capture_peer_cert" => true)));
        $r = stream_socket_client("ssl://".$this->url.":443", $errno, $errstr, 30,
            STREAM_CLIENT_CONNECT, $g);
        $cont = stream_context_get_params($r);
//        dd(openssl_x509_parse($cont["options"]["ssl"]["peer_certificate"]));
        $this->info = openssl_x509_parse($cont["options"]["ssl"]["peer_certificate"]);
    }

    public function formatData()
    {
        return [
            'name' => $this->info['name'],
            'validFrom' => Carbon::parse($this->info['validFrom_time_t'])->toDateTimeString(),
            'validTo' => Carbon::parse($this->info['validTo_time_t'])->toDateTimeString(),
            'SANS' => $this->info['extensions']['subjectAltName']
        ];
    }

}
