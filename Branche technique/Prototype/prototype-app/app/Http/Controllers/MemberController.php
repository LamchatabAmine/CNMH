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
        // Define validation rules
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // If validation passes, continue with storing the member
        $data = $request->all();
        // Hash the password
        $data['password'] = bcrypt($data['password']);

        $this->manageMemberRepository->create($data);

        return redirect()->route('member.index')->with('success', 'Member created successfully');
    }


    public function show(Member $member)
    {
        //
    }


    public function edit(Member $member)
    {
        return view('member.edit', compact('member'));
    }


    public function update(Request $request, Member $member)
    {
         // Define validation rules
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // If validation passes, continue with storing the member
        $data = $request->all();

        $this->manageMemberRepository->update($member, $data);

        return redirect()->route('member.index')->with('success', 'Member updated successfully');
    }


    public function destroy(Member $member)
    {
        $this->manageMemberRepository->delete($member);

        return redirect()->route('member.index')->with('success', 'member supprimé avec succès');

    }
}
