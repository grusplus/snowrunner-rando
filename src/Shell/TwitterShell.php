<?php
namespace App\Shell;

use App\Api\ApiDataFetcher;
use Cake\Console\Shell;
use Abraham\TwitterOAuth\TwitterOAuth;

/**
 * Api shell command.
 */
class TwitterShell extends Shell
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
    public function getFriends() {
        /* friends.php - use Twitter API to export data (CSV format) on people you are following

            Installation:
            1. Install Twitter OAuth PHP library (https://github.com/abraham/twitteroauth)
            2. Adjust twitteroauth.php include path below
            3. Create Twitter application (https://dev.twitter.com/apps)
            4. Fill in 4 Twitter app keys below
            5. Adjust $fields array if you want different fields saved

            Usage:
            php friends.php > /tmp/friends.csv

            Written by:
            Brian Cantoni
            <brian AT cantoni DOT org>
            http://www.cantoni.org
        */


        /* Twitter user fields to write out as CSV */
        $fields = array ("name","screen_name","statuses_count","favourites_count","followers_count","friends_count","location","url");

        /* Twitter app keys */
        define ('CONSUMER_KEY', 'Vn9p9uSUa1mTtit4w6DxJg');
        define ('CONSUMER_SECRET', 'CUIsW4jqp1PoyiQRjMUs3dk2ewyCJsxbzJxUd4p4R90');
        define ('OAUTH_TOKEN', '1349371-hiKmFDBRwTokzRewh6rZyvV63sVbAKFCfX7U9eidJC');
        define ('OAUTH_TOKEN_SECRET', 'qiWJjSkatlUK4cwpe1hstEump1yPCMBIDYlcLXSsZjAI5');

        /* create Twitter object, override to use API v1.1 */
        $twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN, OAUTH_TOKEN_SECRET);
        if (!is_object($twitter)) {
            fwrite (STDERR, "Error creating TwitterOAuth object\n");
            exit (-1);
        }
        $twitter->host = "https://api.twitter.com/1.1/";

        /* main loop: fetch friend ids, then details, then write out as CSV */
        fputcsv (STDOUT, $fields);
        $cursor = -1; // first page
        $friend_total = 0;
        while ($cursor != 0) {
            $params = array(
                'stringify_ids' => true,
                'count' => 100,
                'cursor' => $cursor,
            );

            /* pull friend ID numbers, 100 at a time
               docs: https://dev.twitter.com/docs/api/1.1/get/friends/ids
             */
            $friends = $twitter->get("friends/ids", $params);
            if (!is_object($friends) || isset($friends->errors)) {
                fwrite (STDERR, "Error retrieving friends: " . print_r ($friends, 1) . "\n");
                exit (-1);
            }

            $ids = implode (',', $friends->ids);
            $cursor = $friends->next_cursor_str;
            $friend_total += count($friends->ids);
            fprintf (STDERR, "Found %d friends in this batch; cursor=%s\n", count($friends->ids), $cursor);

            /* pull friend details, 100 at a time, using POST
               docs: https://dev.twitter.com/docs/api/1.1/get/users/lookup
             */
            $params = array(
                'user_id' => $ids,
            );
            $users = $twitter->post("users/lookup", $params);
            if (!is_array($users)) {
                fwrite (STDERR, "Error retrieving users: " . print_r ($users, 1) . "\n");
                exit (-1);
            }

            foreach ($users as $u) {
                $csv = array();
                foreach ($fields as $f) {
                    $csv[] = $u->{$f};
                }
                fputcsv (STDOUT, $csv);
            }

            // try to avoid being rate limited
            sleep (2);
        }

        fprintf (STDERR, "Done! Found %d friends\n", $friend_total);

    }
}
