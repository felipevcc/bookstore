<?php

namespace App\Http\Traits;

use App\Models\Book;
use App\Models\File;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File as FileSystem;

trait UploadFile
{
	// $model is the object provided by id with the model data related to the polymorphic table File
	private function uploadFile($model, $request)
	{
		if (!isset($request->file)) return;
		$random = Str::random(20);
		$path = $this->getRoute($model);
		$this->deleteFile($model);

		// Save image to server storage
		$imageName = "{$random}.{$request->file->clientExtension()}";
		$request->file->move(storage_path("app/public/{$path}"), $imageName);

		// Save image to database
		$file = new File(['route' => "/storage/{$path}/{$imageName}"]);
		$model->file()->save($file);
	}

	// Delete the image if it exists and if it is not the default
	private function deleteFile($model)
	{
		$file = File::where('fileable_id', $model->id)
			->where('fileable_type', get_class($model))
			->first();
		if (!$file) return;
		$fileIsDefault = $file->route == "/storage/{$this->getRoute($model)}/default.png";
		$isSetFile = FileSystem::exists(public_path($file->route));
		if ($isSetFile && !$fileIsDefault) {
			// Delete the image from the server
			FileSystem::delete(public_path($file->route));
		}
		// Delete the record from the server
		$file->delete();
	}

	// Get the image path related to the model of the provided object
	private function getRoute($model)
	{
		$routes = [
			Book::class => 'images/books',
			User::class => 'images/users'
		];
		return $routes[get_class($model)] ?? 'images';
	}
}
