<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\RedisSubscribeJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ChatController extends Controller
{
    public function index() {
        Redis::set('name', 'Basri');

        return view('welcome', [
            'name' => Redis::get('name'),
        ]);
    }

    public function publish() 
    {
        Redis::publish('test-channel', json_encode([
            'name' => 'Hasan Basri Akcıl'
        ]));
    }

    public function subscribe() {
        RedisSubscribeJob::dispatch()->onQueue('subscribe');
    }
}
