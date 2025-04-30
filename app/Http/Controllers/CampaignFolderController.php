<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\CampaignFolder;
use Illuminate\Http\Request;

class CampaignFolderController extends Controller
{
    public function index()
    {
        $folders = CampaignFolder::all();
        return response()->json([
            'status' => 'success',
            'data' => $folders,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $folder = CampaignFolder::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Campaign folder created successfully',
            'data' => $folder,
        ], 201);
    }

    public function show($id)
    {
        $folder = CampaignFolder::find($id);

        if (!$folder) {
            return response()->json([
                'status' => 'error',
                'message' => 'Folder not found',
            ], 404);
        }

        $campaigns = Campaign::where('campaign_folder_id', $folder->id)->get();

        return response()->json([
            'status' => 'success',
            'data' => [
                'id' => $folder->_id,
                'name' => $folder->name,
                'description' => $folder->description,
                'created_at' => $folder->created_at,
                'updated_at' => $folder->updated_at,
                'campaigns' => $campaigns,
            ]
        ]);
    }

    public function update(Request $request, $id)
    {
        $folder = CampaignFolder::find($id);

        if (!$folder) {
            return response()->json([
                'status' => 'error',
                'message' => 'Folder not found',
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|string',
            'description' => 'nullable|string',
        ]);

        $folder->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Campaign folder updated successfully',
            'data' => $folder,
        ]);
    }

    public function destroy($id)
    {
        $folder = CampaignFolder::find($id);

        if (!$folder) {
            return response()->json([
                'status' => 'error',
                'message' => 'Folder not found',
            ], 404);
        }

        $folder->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Campaign folder deleted successfully',
        ]);
    }
}
