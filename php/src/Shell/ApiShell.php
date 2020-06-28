<?php
namespace App\Shell;

use App\Api\ApiDataFetcher;
use Cake\Console\Shell;

/**
 * Api shell command.
 */
class ApiShell extends Shell
{

    /**
     * Whatever bg processes you need to handle the APIs you use.
     *
     * @return bool|int|null Success or error code.
     */
    public function main()
    {
        $this->warmCaches();
    }

    /**
     * Warm the caches of the current API requests.
     *
     * @return bool|int|null Success or error code.
     */
    public function warmCaches()
    {
        $apiFetcher = new ApiDataFetcher();

        $this->out("Warming caches");
        foreach(ApiDataFetcher::URLS as $key => $url)
        {
            $apiFetcher->warmCache($key);
            $this->out("Warmed '" . $key . "' api cache");
        }

        return true;
    }
}
