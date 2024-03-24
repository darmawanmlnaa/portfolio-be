<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Interfaces\ExperienceRepositoryInterface;

class ExperienceController extends Controller
{
    private ExperienceRepositoryInterface $experienceRepository;

    public function __construct(ExperienceRepositoryInterface $experienceRepository) 
    {
        $this->experienceRepository = $experienceRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse 
    {
        return response()->json([
            'data' => $this->experienceRepository->getAllExperiences()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse 
    {
        $experienceDetails = $request->only([
            'start_year',
            'end_year',
            'company',
            'position',
            'summary',
            'tags',
            'link',
        ]);

        return response()->json(
            [
                'data' => $this->experienceRepository->createExperience($experienceDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request): JsonResponse 
    {
        $experienceId = $request->route('id');

        return response()->json([
            'data' => $this->experienceRepository->getExperienceById($experienceId)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): JsonResponse 
    {
        $experienceId = $request->route('id');
        $experienceDetails = $request->only([
            'start_year',
            'end_year',
            'company',
            'position',
            'summary',
            'tags',
            'link',
        ]);

        return response()->json([
            'data' => $this->experienceRepository->updateExperience($experienceId, $experienceDetails)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): JsonResponse 
    {
        $experienceId = $request->route('id');
        $this->experienceRepository->deleteExperience($experienceId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
