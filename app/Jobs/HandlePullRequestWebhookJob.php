<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Spatie\GitHubWebhooks\Models\GitHubWebhookCall;

class HandlePullRequestWebhookJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public GitHubWebhookCall $gitHubWebhookCall;

    public function __construct(
        public GitHubWebhookCall $webhookCall
    ) {}

    public function handle()
    {
        // do your work here

        // you can access the payload of the webhook call with `$this->webhookCall->payload`
        $data = $this->webhookCall->payload;
    }
}
