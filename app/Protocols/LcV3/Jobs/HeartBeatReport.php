<?php
/**
 * Created by PhpStorm.
 * User: lingf
 * Date: 2017-03-10
 * Time: 14:36
 */

namespace Wormhole\Protocols\LcV3\Jobs;


use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Wormhole\Protocols\LcV3\Controllers\EvseController;
class HeartBeatReport implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string 心跳数据
     */
    protected $data;

    /**
     * @var string 心跳个数
     */
    protected $evse_num;

    /**
     * @var string clientID
     */
    protected $client_id;



    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $evse_num, $clientId)
    {

        $this->data = $data;
        $this->evse_num = $evse_num;
        $this->client_id = $clientId;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $evseController = new EvseController();
        $evseController->heartBeatReport($this->data, $this->evse_num, $this->client_id);

    }



}