<?php

declare(strict_types=1);

namespace Vyuldashev\Fias\Console;

use Storage;
use Illuminate\Console\Command;
use Vyuldashev\Fias\Services\DownloadService;
use GrahamCampbell\GuzzleFactory\GuzzleFactory;

class FiasDownloadDeltaCommand extends Command
{
    protected $signature = 'fias:download-delta';
    protected $description = 'Скачать последнюю дельту ФИАС';

    public function handle(DownloadService $service): void
    {
        $lastDownloadFileInfo = $service->getLastDownloadFileInfo();
        $version = $lastDownloadFileInfo->VersionId;
        $fileName = 'delta_'.$version.'.rar';

        if (Storage::exists($fileName)) {
            $this->error($lastDownloadFileInfo->TextVersion.' уже скачана.');

            return;
        }

        $client = GuzzleFactory::make();
        $url = $lastDownloadFileInfo->FiasDeltaXmlUrl;

        $totalSize = $client->head($url)->getHeaderLine('Content-Length');
        $totalSize = $this->convertToMegabytes((int) $totalSize);

        $progressBar = $this->output->createProgressBar($totalSize);

        $client->get($url, [
            'sink' => Storage::path($fileName),
            'progress' => function ($totalSize, $downloaded) use (&$progressBar) {
                $progressBar->setProgress((int) round($downloaded / 1024 / 1024));
            },
        ]);

        $progressBar->clear();

        $this->info($lastDownloadFileInfo->TextVersion.' ('.$version.') скачана.');
    }

    private function convertToMegabytes(int $bytes)
    {
        $base = log($bytes) / log(1024);

        return round(1024 ** ($base - floor($base)), 1);
    }
}
