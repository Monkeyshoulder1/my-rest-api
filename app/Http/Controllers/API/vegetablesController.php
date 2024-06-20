<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\vegetables;

class vegetablesController extends Controller
{
    /**
     * Display a listing of the item.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return vegetables::get();
    }

    /**
     * Store a newly created item in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $vegetables = new vegetables;
            $vegetables->fill($request->validate())->save();

            return $vegetables;
        }catch(Exception $exception){
            throw new HttpException(400, "Invalid data - {$exception->getMessage}");
        }
    }

    /**
     * Display the specified item.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vegetables = vegetables::findOrfail($id);

        return $vegetables;
    }

    /**
     * Update the specified item in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$id){
            throw new HttpException(400, "Invalid id");
        }

        try {
            $vegetables = vegetables::find($id);
            $vegetables->fill($request->validate())->save();

            return $vegetables;
        } catch(\Exception $exception){
            throw new HttpException(400,"Invalid data - {$exception->getMessage}");
        }
    }
    /**
     * Remove the specified item from storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vegetables = vegetables::findOrfail($id);
        $vegetables->delete();

        return response()->json(null, 204);
    }
}