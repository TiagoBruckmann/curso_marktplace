<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->has('cart') ? session()->get('cart') : [];

        return view('cart', compact('cart'));
    }

    public function add(Request $request)
    {
        $product = $request->get('product');
        
        //verificar se existe sessão para os produtos
        if(session()->has('cart')){

            $products = session()->get('cart');
            $productsSlugs = array_column($products, 'slug');

            //se o produto adicionado tiver o mesmo slug de um prod já add então ele sera incrementado aquele já inserido no carrinho
            if( in_array( $product['slug'], $productsSlugs)){
                $products = $this->productIncrement($product['slug'], $product['amount'], $products);
                session()->put('cart', $products);
            }else{

                //existindo add na sessão existente
                session()->push('cart', $product);

            }
            
        }else {
            //não existindo criar a sessão com o primeiro produto
            $products[] = $product;

            session()->put('cart', $products);
        }        

        flash('Produto adicionado no carrinho!')->success();
        return redirect()->route('product.single', ['slug' => $product['slug']]);
    }

    public function remove($slug)
    {
        if(!session()->has('cart'))
            return redirect()->route('cart.index');

        $products = session()->get('cart');

        $products = array_filter($products, function($line) use($slug){ 
            return $line['slug'] != $slug;
        });

        session()->put('cart', $products);

        flash("Produto removido do carrinho com sucesso")->success();
        return redirect()->route('cart.index');

    }

    public function cancel()
    {
        session()->forget('cart');

        flash('Compra cancelada com sucesso')->success();
        return redirect()->route('cart.index');
    }

    private function productIncrement($slug, $amount, $products)
    {
        $products = array_map(function($line) use($slug, $amount){
            if($slug == $line['slug']){
                $line['amount'] += $amount;
            }
            return $line;
        }, $products);

        return $products;
    }
}
