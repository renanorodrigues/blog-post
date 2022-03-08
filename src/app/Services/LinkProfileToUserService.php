<?php

namespace App\Services;

use App\Models\ProfileUser;
use App\Models\User;
use App\Models\Profile;
use DB;

class LinkProfileToUserService {
  public $profile;
  public $user;

  function __construct(array $profile, User $user) {
    $this->profile = $profile;
    $this->user = $user;
  }

  public function call() :bool {
    if(empty($this->createProfileUser())) return false;

    return true;
  }

  private function createProfileUser() :array {
    $profiles = [];

    foreach($this->profile as $profile_id){
      DB::transaction( function () use(&$profiles, $profile_id){
        $profileUser = ProfileUser::create([
          'profile_id' => $profile_id,
          'user_id' => $this->user->id
        ]);

        array_push($profiles, $profileUser);
      });
    };

    return $profiles;
  }
}