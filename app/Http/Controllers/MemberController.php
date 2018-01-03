<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMembers;
use Symfony\Component\HttpKernel\EventListener\ValidateRequestListener;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::latest()->paginate(10);
        return view('members.index', compact('members'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMembers $request)
    {
        request()->validate([
            'firstname' => 'required | max:190',
            'lastname' => 'required |max: 190',
            'middlename' => 'max:190',
            'email' => 'required | max: 190',
            'phonenumber' => 'required',
        ]);
        Member::create($request->all());
        return redirect()->route('members.index')
            ->with('success', 'Member created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);
        return view('members.show', ['members' => Member::findOrFail($id)], compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::find($id);
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'firstname' => 'required | max:190',
            'lastname' => 'required |max: 190',
            'middlename' => 'max:190',
            'email' => 'required | max: 190',
            'phonenumber' => 'required',
        ]);
        Member::find($id)->update($request->all());
        return redirect()->route('members.index')
            ->with('success', 'Member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::find($id)->delete();
        return redirect()->route('members.index')
            ->with('success', 'Member deleted successfully');
    }
}
