<?php

namespace App\Repositories;

use App\Models\Member;

interface ManageMemberRepository {
    public function getAll();
    // public function find($id);
    public function create(array $data);
    public function update(array $data);
    public function delete(Member $member);
}
