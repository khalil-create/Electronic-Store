<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    use apiResponseTrait;
    public function index()
    {
        try {
            $items = ItemResource::collection(Item::get());

            return $this->apiResponse($items, 200, 'ok');
        } catch (Exception $e) {
            return $this->apiResponse(null, 400, $e->getMessage());
        }
    }
    public function show(Item $item)
    {
        try {
            // $item = new ItemResource(Item::find($id));
            if (!$item)
                return $this->apiResponse(null, 404, 'There is no data for this');

            return $this->apiResponse(new ItemResource($item), 200, 'ok');
        } catch (Exception $e) {
            return $this->apiResponse(null, 400, $e->getMessage());
        }
    }
    public function store(Request $request)
    {
        try {
            // $request->validate([
            //     'user_id' => 'bail|required|numeric',
            //     'title' => 'bail|required|string|max:255',
            //     'content' => 'bail|required',
            // ]);
            $validator = Validator::make($request->all(), [
                'user_id' => 'bail|required|numeric',
                'title' => 'bail|required|string|max:255',
                'content' => 'bail|required',
            ]);
            if($validator->fails())
                return $this->apiResponse(null, 400, $validator->errors());
            $item = Item::create($request->all());
            if (!$item)
                return $this->apiResponse(null, 400, 'Added Unsuccessfull');

            return $this->apiResponse(new ItemResource($item), 200, 'Added Successfully');
        } catch (Exception $e) {
            return $this->apiResponse(null, 400, $e->getMessage());
        }
    }
    public function update(Request $request, $id)
    {
        try {
            // $request->validate([
            //     'user_id' => 'bail|required|numeric',
            //     'title' => 'bail|required|string|max:255',
            //     'content' => 'bail|required',
            // ]);
            $validator = Validator::make($request->all(), [
                'user_id' => 'bail|required|numeric',
                'title' => 'bail|required|string|max:255',
                'content' => 'bail|required',
            ]);
            if($validator->fails())
                return $this->apiResponse(null, 400, $validator->errors());

            $item = Item::find($id);
            if (!$item)
                return $this->apiResponse(null, 400, 'This item not found');
            $item->update($request->all());
            if (!$item)
                return $this->apiResponse(null, 400, 'Modified Unsuccessfull');

            return $this->apiResponse(new ItemResource($item), 200, 'Modified Successfully');
        } catch (Exception $e) {
            return $this->apiResponse(null, 400, $e->getMessage());
        }
    }
    public function delete($id)
    {
        try {
            $item = Item::find($id);
            if (!$item)
                return $this->apiResponse(null, 400, 'This item not found');

            $item->delete();
            if ($item)
                return $this->apiResponse(new ItemResource($item), 200, 'Deleted Successfully');

            return $this->apiResponse(null, 400, 'Deleted Unsuccessfull');
        } catch (Exception $e) {
            return $this->apiResponse(null, 400, $e->getMessage());
        }
    }
}
