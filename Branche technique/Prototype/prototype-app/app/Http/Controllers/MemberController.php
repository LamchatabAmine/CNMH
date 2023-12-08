<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Exports\MemberExport;
use App\Imports\MemberImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\MemberRepository;
use App\Repositories\ManageMemberRepository;


class MemberController extends AppBaseController
{

    /*

    protected $manageMemberRepository;

    public function __construct(ManageMemberRepository $manageMemberRepository)
    {
        $this->manageMemberRepository = $manageMemberRepository;
    }
*/


    protected $memberRepository;

    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }


    public function index()
    {
        // dd(User::role('member')->get());
        // dd(Member::with('roles')->get());

        $projects = Project::all();
        $members = $this->memberRepository->index();

        // $members = $this->manageMemberRepository->getAll();

        return view('member.index', compact('members', 'projects'));
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
        $validatedData = $request->all();
        // Hash the password
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Member::create($validatedData)->assignRole('member');

        $this->memberRepository->store($validatedData);

        $user = User::latest()->first();
        $user->assignRole('member');

        return redirect()->route('member.index')->with('success', 'Member created successfully');
    }


    public function edit(Member $member)
    {
        $member = $this->memberRepository->edit($member);

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
        $validatedData = $request->all();

        $this->memberRepository->update($validatedData, $member);

        // $this->manageMemberRepository->update($member, $data);

        return redirect()->route('member.index')->with('success', 'Member updated successfully');
    }


    public function destroy(Member $member)
    {
        $this->memberRepository->destroy($member);

        // $this->manageMemberRepository->delete($member);

        return redirect()->route('member.index')->with('success', 'member supprimé avec succès');

    }


    public function export()
    {
        $members = User::role('member')->select('firstName', 'lastName', 'email')->get();

        return Excel::download(new MemberExport($members), 'members.xlsx');
    }


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048',
        ]);

        // dd($request);

        try {
            Excel::import(new MemberImport, $request->file('file'));
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('member.index')->withError('Quelque chose s\'est mal passé, vérifiez votre fichier');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->errors()->all();
            $errorMessage = implode(', ', $errors);
            return redirect()->route('member.index')->withError('Quelque chose s\'est mal passé, vérifiez votre formulaire: ' . $errorMessage);
        } catch (\Exception $e) {
            return redirect()->route('member.index')->withError('Quelque chose s\'est mal passé, vérifiez votre fichier');
        }

        return redirect()->route('member.index')->with('success', 'Membres a ajouté avec succès');
    }





    public function search(Request $request)
    {
        // $projects = Project::all();
        $search = trim($request->input('search'));

        // Check if the search value is empty
        if (empty($search)) {
            $members = $this->memberRepository->index();

            // $members = Member::members()->paginate(5); // Return the initial state without filtering
        } else {

            $members = $this->memberRepository->index(['search' => $search], 'firstName');

            // $members = Member::members()
            //     ->where(function ($query) use ($search) {
            //         $query->where('firstName', 'like', '%' . $search . '%')
            //             ->orWhere('lastName', 'like', '%' . $search . '%');
            //     })
            //     ->paginate(5);
        }

        if ($request->ajax()) {
            return response()->json([
                'table' => view('member.table', compact('members'))->render(),
                'pagination' => $members->links()->toHtml(), // Get pagination links
            ]);
        }
    }





}
