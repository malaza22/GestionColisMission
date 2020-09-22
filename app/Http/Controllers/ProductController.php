<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $this->validate($request, [
                'name' => ['required', 'max:50'],
            ]);

            $config = ['table' => 'products', 'length' => 12, 'prefix' => 'PRODUIT-'];
            $id = IdGenerator::generate($config);

            $product = new Product;
            $product->id = $id;
            $product->agencies_id = Auth()->user()->agencies_id;
            $product->name = $data['name'];
            if (DB::table('products')->where('name', '=', $data['name'])->exists()) {
                return redirect()->back()->with('error', "<strong>" . $data['name'] . "</strong> est dejà existe!");
            } else {
                $product->save();
                return redirect()->back()->with('success', 'Product Add successfully !');
            }
        }
        return view('body.products.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $product = Product::all()->where('agencies_id', '=', Auth()->user()->agencies_id);
        return view('body.products.liste')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edite(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $this->validate($request, [
                'name' => ['required', 'max:50'],
            ]);
            Product::where(['id' => $id])->update([
                'name' => $data['name']
            ]);
            return redirect('/list-product')->with('success', 'Prouit bien edite');
        }
        $product = Product::where(['id' => $id])->first();
        $products = Product::all()->where('agencies_id', '=', Auth()->user()->agencies_id);
        return view('body.products.edite')->with(['product' => $product, 'products' => $products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($request->id);
        $product->update($request->all());
        return back()->with('success', 'user update successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->delete();
        return back()->with('error', 'product Delete');
    }
}
