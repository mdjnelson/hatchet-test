<?php

namespace App\Http\Controllers\APIs;

use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class OfficeController extends Controller
{
    /**
     * Returns a list of offices based on certain search criteria.
     *
     * @param Request $request
     * @return Response
     */
    public function get(Request $request): Response
    {
        $query = $request->get('query');

        if (is_null($query)) {
            return response(Office::all()->toArray(), 200);
        }

        $columnsToSearch = [
            'name',
            'price',
            'offices',
            'tables',
            'sqm'
        ];

        $builder = (new Office())->newQuery();
        foreach ($columnsToSearch as $column) {
            $builder->where($column, 'like', "%{$query}%", 'or');
        }

        $result = $builder->get()->toArray();

        if (!empty($result)) {
            return response($result, 200);
        }

        return response(['Errors' => 'Sorry cannot find any office matching that criteria.'], 400);
    }
}
