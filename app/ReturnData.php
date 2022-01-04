<?php

namespace app;

trait ReturnData
{
    public function success($data = null, $msg = 'success')
    {
        $result['code'] = 0;
        if (!empty($data['data'])) {
            $result['data'] = $data['data'];
        } else {
            $result['data'] = $data;
        }

        if (!empty($data['total'])) {
            $result['total'] = $data['total'];
        }

        // if (!empty($data['current_page'])) {
        //     $result['page'] = $data['current_page'];
        // }

        if (!empty($data['last_page'])) {
            $result['page'] = $data['last_page'];
        }

        if ($msg) {
            $result['msg'] = $msg;
        }
        return json($result);
    }

    public function error($msg = 'error')
    {
        $result['code'] = 400;
        $result['msg'] = $msg;
        return json($result);
    }
}