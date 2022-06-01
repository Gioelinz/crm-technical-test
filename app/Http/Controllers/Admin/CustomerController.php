<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();

        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = new Customer();
        $tags = Tag::all();
        return view('admin.customers.create', compact('customer', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'email' => 'required|email|unique:customers',
                'telephone' => 'required|string|max:11',
                'vat' => 'required|string|size:11',
                'tags' => 'nullable|exists:tags,id'
            ],
            [
                'required' => 'Il campo :attribute è obbligatorio',
                'email.unique' => "La mail $request->email è già esistente!"
            ]
        );

        $data = $request->all();

        $data['user_id'] = auth()->user()->id;

        $customer = Customer::create($data);

        if (array_key_exists('tags', $data)) $customer->tags()->attach($data['tags']);

        return redirect()->route('admin.customers.index')->with('message', "$customer->name è stato caricato");
    }

    /**
     * Display the specified resource.
     *
     * @param  Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('admin.customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $tags = Tag::all();

        $current_tags = $customer->tags()->pluck('id')->toArray();

        return view('admin.customers.edit', compact('customer', 'tags', 'current_tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Customer $customer   
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'email' => ['required', 'email', Rule::unique('customers')->ignore($customer->id)],
                'telephone' => 'required|string|max:11',
                'vat' => 'required|string|size:11',
                'tags' => 'nullable|exists:tags,id'
            ],
            [
                'required' => 'Il campo :attribute è obbligatorio',
                'email.unique' => "La mail $request->email è già esistente!"
            ]
        );

        $data = $request->all();

        $customer->update($data);

        if (array_key_exists('tags', $data)) $customer->tags()->sync($data['tags']);
        else $customer->tags()->detach();

        return redirect()->route('admin.customers.index')->with('message', "$customer->name modificato con successo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
