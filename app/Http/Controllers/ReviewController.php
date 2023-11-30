<?php

namespace App\Http\Controllers;
use App\Review;
use App\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();

        return view('reviews.index', compact('reviews'));
    }

    

    public function store(Request $request)
    {
        if ($request->image) {
            //Proses Membahkan File Image Secara Lokal
            $fileName = $request->name . '.jpg';
            $request->file('image')->storeAs('public/images', $fileName);


            Review::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'desc' => $request->desc,
                'price' => $request->price,
                'image' => $fileName
            ]);
        } 

     

        // Redirect to the review page
        return redirect('reviews/');
    }

    public function show($id)
    {
        $review = Review::findOrFail($id);

        return view('reviews.show', compact('review'));
    }

    

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->name = $request->input('name');
        $review->category_id = $request->input('category_id');
        $review->price = $request->input('price');
        $review->desc = $request->input('desc');

        if ($request->hasFile('image')) {
            $review->image = $request->file('image')->store('public/images');
        }

        $review->save();

        return redirect('/reviews');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect('/reviews');
    }
}
