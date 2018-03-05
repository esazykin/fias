<?php

declare(strict_types=1);

namespace Vyuldashev\Fias\Services;

use SoapClient;

class DownloadService
{
    protected $wsdl = 'http://fias.nalog.ru/WebServices/Public/DownloadService.asmx?WSDL';

    protected $client;

    public function __construct()
    {
        $this->client = new SoapClient($this->wsdl, [
            'classmap' => [
                'GetLastDownloadFileInfoResponse' => GetLastDownloadFileInfoResponse::class,
                'DownloadFileInfo' => DownloadFileInfo::class,
            ],
        ]);
    }

    public function getLastDownloadFileInfo(): DownloadFileInfo
    {
        return $this->client->__soapCall('GetLastDownloadFileInfo', [])->GetLastDownloadFileInfoResult;
    }
}
