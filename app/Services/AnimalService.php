<?php

namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AnimalService
{
    public static function createAnimal(Request $request)
    {
        if ($request->isMethod('post') && $request->file('img')) {
            $request->validate([
                'img' => 'image',
                'img' => 'mimetypes:image/jpeg,image/png',
            ]);
            $file = $request->file('img');
            $upload_folder = 'public/animalImages';
            $filename = $file->getClientOriginalName();

            Storage::putFileAs($upload_folder, $file, $filename);
            chmod('/var/www/storage/app/public/animalImages/' . $filename, octdec('0777'));
            copy('/var/www/storage/app/public/animalImages/' . $filename, '/var/www/public/animalImages/' . $filename);


            $shelter = DB::table('Shelter')
                ->where('ID_user', session()->get('userId'))
                ->first();

            DB::table('Animal')->insert([
                'ID_shelter' => $shelter->id,
                'Name' => $request['name'],
                'Age' => $request['age'],
                'Sex' => $request['sex'],
                'Img_URL' => 'animalImages/' . $filename,
                'Type' => $request['type'],
                'Weight' => $request['weight'],
            ]);
        }


        header('location: /shelter');
    }
    public static function getAnimalsForShelter()
    {
        $shelter = DB::table('Shelter')
            ->where('ID_user', session()->get('userId'))
            ->first();

        return json_encode(DB::table('Animal')
            ->where('ID_shelter' , $shelter->id)
            ->get());
    }
    public static function editAnimal(Request $request, $id)
    {
        if ($request->isMethod('post') && $request->file('img')) {
            $request->validate([
                'img' => 'image',
                'img' => 'mimetypes:image/jpeg,image/png',
            ]);
            $file = $request->file('img');
            $upload_folder = 'public/animalImages';
            $filename = $file->getClientOriginalName();

            Storage::putFileAs($upload_folder, $file, $filename);
            chmod('/var/www/storage/app/public/animalImages/' . $filename, octdec('0777'));
            copy('/var/www/storage/app/public/animalImages/' . $filename, '/var/www/public/animalImages/' . $filename);


            DB::table('Animal')
                ->where('id', $id)
                ->update([
                    'Name' => $request['name'],
                    'Age' => $request['age'],
                    'Weight' => $request['weight'],
                    'Img_URL' => 'animalImages/' . $filename,
                ]);
        }


        header('location: /shelter');
    }

    public static function deleteAnimal($id)
    {
        DB::table('Animal')->delete($id);
        header('location: /shelter');
    }
}
