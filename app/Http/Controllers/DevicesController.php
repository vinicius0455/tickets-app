<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class DevicesController extends Controller
{
    //
    public function index()
    {
        // This method will handle the display of devices
        $devices = $this->getDevices();
        return view('devices.index', compact('devices'));
    }

    public function show($id)
    {
        $device = $this->getDeviceById($id);

        if (!$device) {
            abort(404, 'Device not found');
        }

        //dd($device); // Debugging line to inspect the device data
        return view('devices.show', compact('device'));
    }

    private function getDevices()
    {
        $accessToken = $this->getAccessToken();

        $orgId = env('ACTION1_ORG_ID');

        return Cache::remember('action1_devices', 300, function () use ($accessToken, $orgId) {
            $response = Http::withToken($accessToken)
                ->get("https://app.eu.action1.com/api/3.0/endpoints/managed/{$orgId}");

            return json_decode($response->body());
        });
    }
      private function getDeviceById($id)
    {
        $accessToken = $this->getAccessToken();

        $orgId = env('ACTION1_ORG_ID');
        $cacheKey = "action1_device_{$id}";

        return Cache::remember($cacheKey, 300, function () use ($accessToken, $orgId, $id) {
            $response = Http::withToken($accessToken)
                ->get("https://app.eu.action1.com/api/3.0/endpoints/managed/{$orgId}/{$id}");

            return json_decode($response->body());
        });
    }

    private function getAccessToken()
    {
        return Cache::remember('action1_token', 300, function () {
            $response = Http::post('https://app.eu.action1.com/api/3.0/oauth2/token', [
                'client_id' => env('ACTION1_CLIENT_ID'),
                'client_secret' => env('ACTION1_SECRET'),
            ]);

            return $response->json()['access_token'] ?? null;
        });
    }
}
