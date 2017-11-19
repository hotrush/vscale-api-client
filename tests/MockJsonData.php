<?php

namespace Hotrush\Vscale\Tests;

class MockJsonData
{
    private $response = [
//        'snapshot/list' => '{
//            "5359435d28b9a": {
//                "SNAPSHOTID": "5359435d28b9a",
//                "date_created": "2014-04-18 12:40:40",
//                "description": "Test snapshot",
//                "size": "42949672960",
//                "status": "complete"
//            },
//            "5359435dc1df3": {
//                "SNAPSHOTID": "5359435dc1df3",
//                "date_created": "2014-04-22 16:11:46",
//                "description": "",
//                "size": "10000000",
//                "status": "complete"
//            }
//        }',
    ];

    /**
     * Mock api responses from Vscale api
     *
     * @param array $args
     * @param string $url
     * @return string
     */
    public function getResponse($url, array $args)
    {
        $response = '{}';

        switch ($url) {
//            case 'server/list':
//                if (isset($args['SUBID'])) {
//                    $response = json_decode($this->response[$url], true);
//                    $response = json_encode($response[$args['SUBID']]);
//                }
//                break;
//            case 'plans/list':
//                if (isset($args['type']) && $args['type'] != 'all') {
//                    $response = json_decode($this->response[$url], true);
//                    foreach ($response as $pos => $row) {
//                        if (strtolower($row['plan_type']) != $args['type']) {
//                            unset($response[$pos]);
//                        }
//                    }
//                    $response = json_encode($response);
//                }
//                break;
        }
        if ($response === '{}' && isset($this->response[$url])) {
            $response = $this->response[$url];
        }
        return $response;
    }
}