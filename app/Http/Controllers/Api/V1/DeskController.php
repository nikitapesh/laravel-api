<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Desk;
use App\Http\Resources\DeskResource;
use App\Http\Requests\DeskStoreRequest;

class DeskController extends Controller
{
    public function index()
    {
        return DeskResource::collection(Desk::with('lists')->get());
    }

    public function show($id)
    {
        return new DeskResource(Desk::with('lists')->findOrFail($id));
    }

    public function store(DeskStoreRequest $request)
    {
        $created_desk = Desk::create($request->validated());

        return new DeskResource($created_desk);
    }

    public function update(DeskStoreRequest $request, $id)
    {
        $desk = Desk::find($id);
        $desk->update($request->validated());
    
        return new DeskResource($desk);
    }

    public function destroy($id)
    {
        $desk = Desk::find($id)->delete();

        return response(['message' => 'Запись успешно удалена'], 200);
    }
}
