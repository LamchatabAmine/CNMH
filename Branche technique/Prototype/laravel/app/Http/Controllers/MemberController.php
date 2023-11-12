<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Repositories\ManageMemberRepository;

class MemberController extends Controller
{

    protected $manageMemberRepository;

    public function __construct(ManageMemberRepository $manageMemberRepository) {
        $this->manageMemberRepository = $manageMemberRepository;
    }


    public function index()
    {
        $members = $this->manageMemberRepository->getAll();
        return view('member.index', compact('members'));
    }


    public function create()
    {
        return view('member.create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Member $member)
    {
        //
    }


    public function edit(Member $member)
    {
        return view('member.edit');
    }


    public function update(Request $request, Member $member)
    {
        //
    }


    public function destroy(Member $member)
    {
        //
    }
}
