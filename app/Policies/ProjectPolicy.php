<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\Modeler;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the project.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Project  $project
     * @return mixed
     */
    public function view(User $user, Project $project)
    {
        return $user->id === $project->user_id;
    }

    /**
     * Determine whether the user can update the project.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Project  $project
     * @return mixed
     */
    public function update(User $user, Project $project)
    {
        return $user->id === $project->user_id;
    }
    public function delete(User $user, Project $project)
    {
        return $user->id === $project->user_id;
    }
    /**
     * Determine whether the user can create a modeler for the project.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Project  $project
     * @return mixed
     */
    public function createModeler(User $user, Project $project)
    {
        return $user->id === $project->user_id;
    }
}
