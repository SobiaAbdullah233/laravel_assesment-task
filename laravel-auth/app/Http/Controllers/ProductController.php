<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public $http;

    public function __construct()
    {
        $this->http = Http::baseUrl(env('PRODUCT_MICROSERVICE_URL'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!auth()->user()->can('view products')) {
            return back()->with('error', 'You do not have permission to view products.');
        }

        $products = $this->http->get('api/products')->object();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->can('create products')) {
            return back()->with('error', 'You do not have permission to create products.');
        }
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('create products')) {
            return back()->with('error', 'You do not have permission to create products.');
        }

        $this->http->post('api/products', $request->all())->object();

        return to_route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!auth()->user()->can('view products')) {
            return back()->with('error', 'You do not have permission to view products.');
        }

        $product = $this->http->get("api/products/$id")->object();

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!auth()->user()->can('edit products')) {
            return back()->with('error', 'You do not have permission to create products.');
        }

        $product = $this->http->get("api/products/$id")->object();

        return view('products.create', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!auth()->user()->can('edit products')) {
            return back()->with('error', 'You do not have permission to create products.');
        }

        $this->http->put("api/products/$id", $request->all())->object();

        return to_route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!auth()->user()->can('delete products')) {
            return back()->with('error', 'You do not have permission to create products.');
        }

        $this->http->delete("api/products/$id")->object();

        return to_route('products.index')->with('success', 'Product deleted successfully.');
    }
}
