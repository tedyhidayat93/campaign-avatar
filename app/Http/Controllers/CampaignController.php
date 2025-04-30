<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();

        return response()->json([
            'status' => 'success',
            'data' => $campaigns
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'campaign_folder_id' => 'required|string',
            'name' => 'required|string',
            'overview' => 'string',
            'context' => 'string',
            'objective' => 'string',
            'key_message' => 'string',
            'sentiment' => 'string',
            'account_id' => 'string'
        ]);

        $campaign = Campaign::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Campaign created successfully',
            'data' => $campaign
        ], 201);
    }

    public function show($id)
    {
        $campaign = Campaign::find($id);

        if (!$campaign) {
            return response()->json([
                'status' => 'error',
                'message' => 'Campaign not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $campaign
        ]);
    }

    public function update(Request $request, $id)
    {
        $campaign = Campaign::find($id);

        if (!$campaign) {
            return response()->json([
                'status' => 'error',
                'message' => 'Campaign not found'
            ], 404);
        }

        $validated = $request->validate([
            'campaign_folder_id' => 'sometimes|string',
            'name' => 'sometimes|string',
            'overview' => 'sometimes|string',
            'context' => 'sometimes|string',
            'objective' => 'sometimes|string',
            'key_message' => 'sometimes|string',
            'sentiment' => 'sometimes|string',
            'account_id' => 'sometimes|string'
        ]);

        $campaign->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Campaign updated successfully',
            'data' => $campaign
        ]);
    }

    public function destroy($id)
    {
        $campaign = Campaign::find($id);

        if (!$campaign) {
            return response()->json([
                'status' => 'error',
                'message' => 'Campaign not found'
            ], 404);
        }

        $campaign->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Campaign deleted successfully'
        ]);
    }
}
