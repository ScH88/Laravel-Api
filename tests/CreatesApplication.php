<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\TestResponse;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();
        //Create a test response for if assertResource is called
        TestResponse::AssertMacro('assertResource', function($resource) {
          $this->assertJson($resource->response()->getData(true));
        });

        return $app;
    }
}
