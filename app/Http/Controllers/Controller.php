<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Intervention\Image\Facades\Image;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/**
	 * Crop and Store Image
	 *
	 * @param mixed $image
	 * @param mixed $path
	 * @param mixed $dimentions
	 * @return void
	 */
	protected function cropAndStoreImage($image, $path, $dimentions = 100)
	{
		$public_path = public_path($path);

		if (!file_exists(dirname($public_path))) {
			mkdir(dirname($public_path));
		}

		$thumbnailImage = Image::make($image);

		$thumbnailImage->resize($dimentions, $dimentions);

		$thumbnailImage->save($public_path);
	}
}
