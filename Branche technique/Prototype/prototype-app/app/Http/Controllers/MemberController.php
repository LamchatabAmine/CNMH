<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Imports\MemberImport;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Exports\MemberExport;
use App\Repositories\ManageMemberRepository;
use Maatwebsite\Excel\Facades\Excel;


class MemberController extends Controller
{

    protected $manageMemberRepository;

    public function __construct(ManageMemberRepository $manageMemberRepository)
    {
        $this->manageMemberRepository = $manageMemberRepository;
    }


    public function index()
    {
        $projects = Project::all();
        $members = $this->manageMemberRepository->getAll();
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


    public function export()
    {
        $members = Member::members()->select('firstName', 'lastName', 'email')->get();

        return Excel::download(new MemberExport($members), 'members.xlsx');
    }


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048',
        ]);

        try {
            Excel::import(new MemberImport, $request->file('file'));
        } catch (\Error $e) {
            return redirect()->route('member.index')->withError('Quelque chose s\'est mal passé, vérifiez votre fichier');
        }
        return redirect()->route('member.index')->with('success', 'Membres a ajouté avec succès');
    }





    public function search(Request $request)
    {
        $projects = Project::all();
        $search = trim($request->input('search'));
        ;

        // Check if the search value is empty
        if (empty($search)) {
            $members = Member::members()->paginate(5); // Return the initial state without filtering
        } else {
            $members = Member::members()
                ->where(function ($query) use ($search) {
                    $query->where('firstName', 'like', '%' . $search . '%')
                        ->orWhere('lastName', 'like', '%' . $search . '%');
                })
                ->paginate(5);
        }

        if ($request->ajax()) {
            return response()->json([
                'table' => view('member.table', compact('members', 'projects'))->render(),
                'pagination' => $members->links()->toHtml(), // Get pagination links
            ]);
        }
    }





}
