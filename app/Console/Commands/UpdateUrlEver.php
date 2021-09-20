<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Url;
use App\Http\Middleware\GetHttpStatus;
use Illuminate\Support\Facades\DB;

class UpdateUrlEver extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:url';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para atualizar as urls no banco de dados';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(GetHttpStatus $get_status)
    {
        $urls = Url::all();
        $status = '';

        foreach ($urls as $url) {
            $status = $get_status->getHTTPResponseStatusCode($url['url']);

            $code_status = explode(" ", $status);

            if($status == null) {
                $code_status[0] = '500';
                $code_status[1] = 'Server Error';
            }

            DB::table('urls')->where('id', $url['id'])->update(['status' => $code_status[0], 'body_request' => $code_status[1]]);
        }
    }
}
