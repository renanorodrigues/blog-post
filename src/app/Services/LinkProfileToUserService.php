<?php

namespace App\Services;

use App\Models\ProfileUser;
use App\Models\User;
use App\Models\Profile;

class LinkProfileToUserService {
  public $profile;
  public $user;
  private $profileUser;

  function __construct(Profile $profile, User $user) {
    $this->profileUser;
    $this->profile = $profile;
    $this->user = $user;
  }

  public function call() : bool {
    $this->profileUser = ProfileUser::create([
      'profile_id' => $this->profile->id,
      'user_id' => $this->user->id
    ]);

    if($this->profileUser) return true;

    return false;
  }
}