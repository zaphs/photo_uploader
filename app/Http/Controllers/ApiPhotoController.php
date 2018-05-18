<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPUnit\Runner\Exception;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ApiPhotoController extends Controller
{
	const DIRECTORY = 'photos';

	public function upload(Request $request){

		try {
			$this->validate($request, [
				'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
			]);

			$photo = $request->file('image');
			if ($photo){
				$name = $photo->getClientOriginalName();
				Storage::putFileAs(self::DIRECTORY, $photo, $name);


				return response()->json(null, 200);
			}else {
				return response()->json(null, 400);
			}

		} catch (Exception $e){
			return response()->json(null, 400);
		}
	}

	public function changeName(Request $request) {
		try {
			$source = $request->input('source');
			$target = $request->input('target');
			if (Storage::disk(self::DIRECTORY)->move($source, $target)) {
				return response()->json(null, 200);
			}
		} catch (Exception $e){
			return response()->json([$e->getMessage()], 400);
		}

		return response()->json(null, 400);
	}

	public function remove(Request $request) {
		if (Storage::disk(self::DIRECTORY)->delete($request->input('name'))){
			return response()->json(null, 204);
		} else {
			return response()->json(null, 400);
		}
	}

	public function all(Request $request) {
		$files = Storage::disk(self::DIRECTORY)->files();
		return response()->json($files, 200);
	}

}
