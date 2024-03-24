<?php

namespace App\Http\Controllers\Web;

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

    public function index(): JsonResponse 
    {
        return response()->json([
            'data' => $this->experienceRepository->getAllExperiences()
        ]);
    }

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

    public function show(Request $request): JsonResponse 
    {
        $experienceId = $request->route('id');

        return response()->json([
            'data' => $this->experienceRepository->getExperienceById($experienceId)
        ]);
    }

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

    public function destroy(Request $request): JsonResponse 
    {
        $experienceId = $request->route('id');
        $this->experienceRepository->deleteExperience($experienceId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
