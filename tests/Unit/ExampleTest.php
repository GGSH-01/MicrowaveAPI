<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Api\MicrowaveController;

class MicrowaveApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function get_settings()
    {
        $microwaveSettingsMock = $this->createMock(MicrowaveController::class);
        Http::fake([
            'http://microwave/api/settings/1' => Http::response([
                    'data' => [
                        'id' => 1,
                        'name' => 'Samsung',
                        'status' => 'off',
                        'program' => 'meat',
                        'door' => 'close',
                        'power' => 600,
                        'timer' => 180
                    ]
            ], 200)
        ]);

    }
}
