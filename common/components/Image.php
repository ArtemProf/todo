<?php

	namespace common\components;

	use Imagine\Image\Box;
	use Imagine\Image\ImageInterface;
	use Imagine\Image\Point;

	class Image extends \yii\imagine\Image
	{
		public static function thumbnail($filename, $width, $height, $mode = null) {
			if ($mode !== null)
				return parent::thumbnail($filename, $width, $height, $mode);

			$image = self::getImagine()->open($filename);
			$imageSize = $image->getSize();

			if ($imageSize->getWidth() > $imageSize->getHeight()) {
				// Landscaped.. We need to crop image by horizontally
				$w = $imageSize->getWidth() * $width / $imageSize->getHeight();
				$h = $height;
				$cropPoint = new Point(max($w - $width, 0) / 2, 0);
			} else {
				// Portrait..
				$w = $width; // Use target box's width and crop vertically
				$h = $imageSize->getHeight() * $width / $imageSize->getWidth();
				$cropPoint = new Point(0, max($h - $height, 0) / 2);
			}

			return $image->thumbnail(new Box($w, $h), ImageInterface::THUMBNAIL_OUTBOUND)
				->crop($cropPoint, new Box($width, $height));
		}
	}