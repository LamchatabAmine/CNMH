<?php

namespace App\Repositories;

use App\Models\Member;

class MemberRepository implements ManageMemberRepository {
    public function getAll() {
        // return Member::orderBy('startDate', 'asc')->paginate(5);
        return  Member::members()->paginate(2);
    }

    public function create(array $data) {
        return Member::create($data);
    }

    public function update( array $data) {
        $member->update($data);
        return $member;
    }


    public function delete(Member $member) {
        return  $member->delete();
    }

}
