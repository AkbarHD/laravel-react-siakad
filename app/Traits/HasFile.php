<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait HasFile
{
    public function upload_file(Request $request, string $column, string $folder): ?string
    {
        return $request->hasFile($column) ? $request->file($column)->store($folder) : null;
    }

    public function update_file(Request $request, Model $model, string $column, string $folder): ?string
    {
        // jika column tersebut di isi image, pdf dll
        if($request->hasFile($column)) {

            // jika ada file lama, hapus
            if($model->$column) {
                Storage::delete($model->$column);
            }

            // upload file baru
            $thumbnail = $request->file($column)->store($folder);
        }else{
            // jika tidak ada file baru, pake file lama
            $thumbnail = $model->$column;
        }

        return $thumbnail;
    }

    public function delete_file(Model $model, string $column)
    {
        if($model->$column) {
            Storage::delete($model->$column);
        }
    }
}
