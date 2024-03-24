<?php

namespace App\Interfaces;

interface ExperienceRepositoryInterface
{
    public function getAllExperiences();
    public function getExperienceById($experienceId);
    public function deleteExperience($experienceId);
    public function createExperience(array $experienceDetails);
    public function updateExperience($experienceId, array $newDetails);
}
