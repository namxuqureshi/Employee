<?php

namespace app\Http\Controllers\Shop;

use app\Http\Controllers\Controller;
use app\Http\Requests\ShopRequest;
use app\Product;
use app\ProductShop;
use app\Shop;
use Illuminate\Http\Request;
use Session;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $shop = Shop::paginate(25);

        return view('shop.index', compact('shop'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {


        return view('shop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $requestData = $request->all();

        Shop::create($requestData);

        Session::flash('message', 'Shop added!');

        return redirect('shop');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $shop = Shop::findOrFail($id);

        return view('shop.show', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $shop = Shop::findOrFail($id);
        $temp = Product::all();

        return view('shop.edit', compact('shop', 'temp'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add($id)
    {
        $shop = Shop::findOrFail($id);
        $product = ProductShop::where('shop_id', '=', $id)->pluck('product_id')->toArray();
        $temp = Product::whereNotIn('id', $product)->get();
        return view('shop.addProduct', compact('shop', 'temp'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id, Request $request)
    {
        $shop = Shop::findOrFail($request->shopId);
        $shop->products()->detach($id);
        Session::flash('message', 'Product Deleted from shop');
        return redirect('shop/' . $shop->id);
    }

    /**
     * @param $id
     * @param ShopRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function added($id, ShopRequest $request)
    {
        $shop = Shop::findOrFail($id);
//        dd($i);
        if (count($request->toArray()) < 2) {
            return redirect('add/' . $id)
                ->withErrors('Please Select the Product!')
                ->withInput();
        } else {
            foreach ($request->except('_token') as $item) {
                $shop->products()->attach($item);
            }
        }

        Session::flash('message', 'Product added to Shop!');
        return redirect('shop');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
//dd($request->all());
        $requestData = $request->all();
        $shop = Shop::findOrFail($id);
        $shop->update($requestData);

//        $shop->products()->attach(1);

        Session::flash('message', 'Shop updated!');

        return redirect('shop');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Shop::destroy($id);

        Session::flash('message', 'Shop deleted!');

        return redirect('shop');
    }
}
