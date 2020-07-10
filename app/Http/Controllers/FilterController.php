<?php

namespace App\Http\Controllers;

use App\Item;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilterController extends Controller
{
    /**
     * Возвращает страницу выбора тегов
     *
     * @return \Illuminate\View\View
     */
    public function getStartPage()
    {
        return view('test', [
            'tags' => json_encode(Tag::all()),
            'filterUrl' => route('filtered'),
        ]);
    }

    /**
     * Возвращает ссылку на файл
     * с отфильтрованными товарами по тегам
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFilteredCSV(Request $request)
    {
        $tagQuery = Item::query();
        $tagsIn = json_decode($request->tagsIn);
        $tagsOut = json_decode($request->tagsOut);
        //Фильтруем по входящим тегам
        foreach ($tagsIn as $tag) {
            $tagQuery->filterTagsIn($tag);
        }
        //Фильтруем по не входящим тегам
        foreach ($tagsOut as $tag) {
            $tagQuery->filterTagsOut($tag);
        }
        $items = $tagQuery->get();
        //Создаем файл для выгрузки
        $fp = fopen(storage_path('app/public/file.csv'), 'w');
        foreach ($items as $item) {
            $itemArr = $item->toArray();
            unset($itemArr['show_count']);
            //Записываем результаты
            fputcsv($fp, $itemArr);
        }

        return response()->json([
            'status' => 'OK',
            'url' => Storage::url('public/file.csv'),
        ]);
    }
}
