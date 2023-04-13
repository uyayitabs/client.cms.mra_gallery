<?php

namespace App\Policies;

use TCG\Voyager\Contracts\User;
use TCG\Voyager\Policies\BasePolicy;

class PhotographerPolicy extends BasePolicy
{
   //does User can display details
   public function read(User $user, $model)
   {
       // Does this post belong to the current user?
       $current = $user->id === $model->author_id;

       return $current || $this->checkPermission($user, $model, 'read');
   }

   //does User can update model
   public function edit(User $user, $model)
   {
       if ($this->checkPermission($user, $model, 'edit')) {
           return true;
       }

       // current user and news not published or user with publishing permission
       // return $user->id === $model->author_id && (News::PUBLISHED !== $model->status || $this->checkPermission($user, $model, 'publish'));
   }

   //does User can delete model
   public function delete(User $user, $model)
   {
       if ($this->checkPermission($user, $model, 'delete')) {
           return true;
       }

       // current user and news not published
       // return $user->id === $model->author_id && News::PUBLISHED !== $model->status;
   }

   //does User can publish model
   public function publish(User $user, $model)
   {
       return $this->checkPermission($user, $model, 'edit') || $this->checkPermission($user, $model, 'publish');
   }
}