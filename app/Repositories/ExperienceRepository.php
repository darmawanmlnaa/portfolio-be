<?php

namespace App\Repositories;

use App\Interfaces\ExperienceRepositoryInterface;
use App\Models\Experience;

class ExperienceRepository implements ExperienceRepositoryInterface
{
    public function getAllExperiences() 
    {
        return Experience::all();
    }

    public function getExperienceById($experienceId) 
    {
        return Experience::findOrFail($experienceId);
    }

    public function deleteExperience($experienceId) 
    {
        Experience::destroy($experienceId);
    }

    public function createExperience(array $experienceDetails) 
    {
        return Experience::create($experienceDetails);
    }

    public function updateExperience($experienceId, array $newDetails) 
    {
        return Experience::whereId($experienceId)->update($newDetails);
    }
}
