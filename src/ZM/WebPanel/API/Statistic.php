<?php

declare(strict_types=1);

namespace ZM\WebPanel\API;

use Swoole\Http\Request;
use ZM\Annotation\Http\Controller;
use ZM\Annotation\Http\Middleware;
use ZM\Annotation\Http\RequestMapping;
use ZM\API\ZMRobot;

#[Controller('/panel/api/stats')]
#[Middleware('cors')]
class Statistic
{
    /**
     * Get the statistics of the server.
     *
     * @return int[]
     */
    #[RequestMapping('server')]
    public function server(): array
    {
        $cpu = sys_getloadavg();
        $memory = [
            'total' => memory_get_usage(true),
            'free' => memory_get_usage(false),
        ];

        return [
            'cpu' => [
                'loads' => $cpu,
                'avg' => round($cpu[0] / swoole_cpu_num() * 100, 2),
            ],
            'memory' => $memory,
        ];
    }

    /**
     * Get the statistics of the database(s).
     *
     * @return array
     */
    #[RequestMapping('/database')]
    public function database(): array
    {
        return [
            'type' => 'none',
            'size' => 0,
        ];
    }

    /**
     * Get the statistics of the connected bot(s).
     *
     * @return array
     */
    #[RequestMapping('/bot')]
    public function bot(): array
    {
        return [
            'count' => count($bots = ZMRobot::getAllRobot()),
            'bots' => $bots,
        ];
    }

    /**
     * Get the statistics of the messages.
     *
     * @return int[]
     */
    #[RequestMapping('/message')]
    public function message(): array
    {
        return [
            'total' => 0,
            'today' => 0,
            'average' => 0,
        ];
    }

    /**
     * Get the statistics of the fetched user(s).
     *
     * @return int[]
     */
    #[RequestMapping('/user')]
    public function user(): array
    {
        $user_count = 0;
        foreach (ZMRobot::getAllRobot() as $bot) {
            $user_count += count($bot->getFriendList()['data']);
        }
        return [
            'total' => $user_count,
        ];
    }

    /**
     * Get the statistics of the fetched group(s).
     *
     * @return int[]
     */
    #[RequestMapping('/group')]
    public function group(): array
    {
        $group_count = 0;
        foreach (ZMRobot::getAllRobot() as $bot) {
            $group_count += count($bot->getGroupList()['data']);
        }
        return [
            'total' => $group_count,
        ];
    }

    /**
     * Get the specific statistics at once.
     *
     * @param Request $request
     * @return array
     */
    #[RequestMapping('/batch')]
    public function batchGet(Request $request): array
    {
        $request = $request->get;
        $available = ['server', 'database', 'bot', 'message', 'user', 'group'];
        $result = [];
        if (isset($request['get'])) {
            $get = explode(',', $request['get']);
            foreach ($get as $item) {
                if (in_array($item, $available, false)) {
                    $result[$item] = $this->$item();
                }
            }
        } else {
            foreach ($available as $type) {
                $result[$type] = $this->{$type}();
            }
        }
        return $result;
    }
}
