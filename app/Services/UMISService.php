<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class UMISService
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('services.umis.base_url', env('UMIS_API_URL'));
        $this->apiKey = config('services.umis.api_key', env('UMIS_API_KEY'));
    }

    /**
     * Get all areas data from UMIS
     *
     * @return array|null
     */
    public function getAreas()
    {
        try {
            // Log the attempt to connect to UMIS
            Log::info('Attempting to connect to UMIS API', [
                'url' => $this->baseUrl . '/erp-data-areas',
                'has_api_key' => !empty($this->apiKey),
                'api_key' => $this->apiKey ? substr($this->apiKey, 0, 5) . '...' : null,
            ]);

            // Create a headers array for better debugging
            $headers = [
                'Accept' => 'application/json',
                'UMIS-Api-Key' => $this->apiKey,
                'X-ERP-System' => 'ZCMC-ERP',
            ];

            Log::info('Request headers', ['headers' => $headers]);

            $response = Http::withoutVerifying() // Skip SSL verification for development
                ->timeout(30) // Increase timeout to 30 seconds
                ->withHeaders($headers);

            // Make the request
            $response = $response->get($this->baseUrl . '/erp-data-areas');

            if ($response->successful()) {
                Log::info('UMIS API - Successfully fetched areas');
                return $response->json();
            }

            Log::error('UMIS API - Failed to get areas', [
                'url' => $this->baseUrl . '/erp-data-areas',
                'status' => $response->status(),
                'response' => $response->body()
            ]);

            return null;
        } catch (Exception $e) {
            Log::error('UMIS API - Exception while getting areas', [
                'url' => $this->baseUrl . '/erp-data-areas',
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return null;
        }
    }

    /**
     * Get a specific area from UMIS
     *
     * @param int $areaId
     * @return array|null
     */
    public function getArea($areaId)
    {
        try {
            // Log the attempt to fetch a specific area
            Log::info('Attempting to fetch area from UMIS API', [
                'url' => $this->baseUrl . '/assign-area/' . $areaId,
                'area_id' => $areaId,
                'has_api_key' => !empty($this->apiKey),
                'api_key' => $this->apiKey ? substr($this->apiKey, 0, 5) . '...' : null,
            ]);

            // Create a headers array for better debugging
            $headers = [
                'Accept' => 'application/json',
                'UMIS-Api-Key' => $this->apiKey,
                'X-ERP-System' => 'ZCMC-ERP',
            ];

            Log::info('Request headers', ['headers' => $headers]);

            $response = Http::withoutVerifying() // Skip SSL verification for development
                ->timeout(30) // Increase timeout to 30 seconds
                ->withHeaders($headers);

            // Make the request
            $response = $response->get($this->baseUrl . '/assign-area/' . $areaId);

            if ($response->successful()) {
                Log::info('UMIS API - Successfully fetched area', [
                    'area_id' => $areaId
                ]);
                return $response->json();
            }

            Log::error('UMIS API - Failed to get area', [
                'url' => $this->baseUrl . '/assign-area/' . $areaId,
                'area_id' => $areaId,
                'status' => $response->status(),
                'response' => $response->body()
            ]);

            return null;
        } catch (Exception $e) {
            Log::error('UMIS API - Exception while getting area', [
                'url' => $this->baseUrl . '/assign-area/' . $areaId,
                'area_id' => $areaId,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return null;
        }
    }

    public function getOrganizationStructure()
    {
        try {
            // Log the attempt to connect to UMIS
            Log::info('Attempting to connect to UMIS API', [
                'url' => $this->baseUrl . '/erp-data-areas',
                'has_api_key' => !empty($this->apiKey),
                'api_key' => $this->apiKey ? substr($this->apiKey, 0, 5) . '...' : null,
            ]);

            // Create a headers array for better debugging
            $headers = [
                'Accept' => 'application/json',
                'UMIS-Api-Key' => $this->apiKey,
                'X-ERP-System' => 'ZCMC-ERP',
            ];

            Log::info('Request headers', ['headers' => $headers]);

            $response = Http::withoutVerifying() // Skip SSL verification for development
                ->timeout(30) // Increase timeout to 30 seconds
                ->withHeaders($headers);

            // Make the request
            $response = $response->get($this->baseUrl . '/erp-data-areas');

            if ($response->successful()) {
                Log::info('UMIS API - Successfully fetched areas');
                return $response->json();
            }

            Log::error('UMIS API - Failed to get areas', [
                'url' => $this->baseUrl . '/erp-data-areas',
                'status' => $response->status(),
                'response' => $response->body()
            ]);

            return null;
        } catch (Exception $e) {
            Log::error('UMIS API - Exception while getting areas', [
                'url' => $this->baseUrl . '/erp-data-areas',
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return null;
        }
    }

    public function getDesignations()
    {
        try {
            // Log the attempt to connect to UMIS
            Log::info('Attempting to connect to UMIS API', [
                'url' => $this->baseUrl . '/erp-data-designations',
                'has_api_key' => !empty($this->apiKey),
                'api_key' => $this->apiKey ? substr($this->apiKey, 0, 5) . '...' : null,
            ]);

            // Create a headers array for better debugging
            $headers = [
                'Accept' => 'application/json',
                'UMIS-Api-Key' => $this->apiKey,
                'X-ERP-System' => 'ZCMC-ERP',
            ];

            Log::info('Request headers', ['headers' => $headers]);

            $response = Http::withoutVerifying() // Skip SSL verification for development
                ->timeout(30) // Increase timeout to 30 seconds
                ->withHeaders($headers);

            // Make the request
            $response = $response->get($this->baseUrl . '/erp-data-designations');

            if ($response->successful()) {
                Log::info('UMIS API - Successfully fetched designations');
                return $response->json();
            }

            Log::error('UMIS API - Failed to get designations', [
                'url' => $this->baseUrl . '/erp-data-designations',
                'status' => $response->status(),
                'response' => $response->body()
            ]);

            return null;
        } catch (Exception $e) {
            Log::error('UMIS API - Exception while getting designations', [
                'url' => $this->baseUrl . '/erp-data-designations',
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return null;
        }
    }

    public function getUsers()
    {
        try {
            // Log the attempt to connect to UMIS
            Log::info('Attempting to connect to UMIS API', [
                'url' => $this->baseUrl . '/erp-data-users',
                'has_api_key' => !empty($this->apiKey),
                'api_key' => $this->apiKey ? substr($this->apiKey, 0, 5) . '...' : null,
            ]);

            // Create a headers array for better debugging
            $headers = [
                'Accept' => 'application/json',
                'UMIS-Api-Key' => $this->apiKey,
                'X-ERP-System' => 'ZCMC-ERP',
            ];

            Log::info('Request headers', ['headers' => $headers]);

            $response = Http::withoutVerifying() // Skip SSL verification for development
                ->timeout(30) // Increase timeout to 30 seconds
                ->withHeaders($headers);

            // Make the request
            $response = $response->get($this->baseUrl . '/erp-data-users');

            if ($response->successful()) {
                Log::info('UMIS API - Successfully fetched users');
                return $response->json();
            }

            Log::error('UMIS API - Failed to get users', [
                'url' => $this->baseUrl . '/erp-data-users',
                'status' => $response->status(),
                'response' => $response->body()
            ]);

            return null;
        } catch (Exception $e) {
            Log::error('UMIS API - Exception while getting users', [
                'url' => $this->baseUrl . '/erp-data-users',
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return null;
        }
    }

    public function getAssignedAreas()
    {
        try {
            // Log the attempt to connect to UMIS
            Log::info('Attempting to connect to UMIS API', [
                'url' => $this->baseUrl . '/erp-data-assigned-areas',
                'has_api_key' => !empty($this->apiKey),
                'api_key' => $this->apiKey ? substr($this->apiKey, 0, 5) . '...' : null,
            ]);

            // Create a headers array for better debugging
            $headers = [
                'Accept' => 'application/json',
                'UMIS-Api-Key' => $this->apiKey,
                'X-ERP-System' => 'ZCMC-ERP',
            ];

            Log::info('Request headers', ['headers' => $headers]);

            $response = Http::withoutVerifying() // Skip SSL verification for development
                ->timeout(30) // Increase timeout to 30 seconds
                ->withHeaders($headers);

            // Make the request
            $response = $response->get($this->baseUrl . '/erp-data-assigned-areas');

            if ($response->successful()) {
                Log::info('UMIS API - Successfully fetched assigned areas');
                return $response->json();
            }

            Log::error('UMIS API - Failed to get assigned areas', [
                'url' => $this->baseUrl . '/erp-data-assigned-areas',
                'status' => $response->status(),
                'response' => $response->body()
            ]);

            return null;
        } catch (Exception $e) {
            Log::error('UMIS API - Exception while getting assigned areas', [
                'url' => $this->baseUrl . '/erp-data-assigned-areas',
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return null;
        }
    }
}
