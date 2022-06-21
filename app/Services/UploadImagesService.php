<?php

namespace App\Services;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Http\UploadedFile;
use Storage;

/**
 * Class UploadImagesService
 * @package App\Services
 */
class UploadImagesService
{

    /**
     * @var int
     */
    private $widthThumb = 270;

    /**
     * @var int
     */
    private $heightThumb = 270;

    /**
     * @var UploadedFile
     */
    private $image;

    /**
     * @var int
     */
    private $entityId;

    /**
     * @var string
     */
    private $entity;

    /**
     * @param Request $request
     * @param string $entity
     * @param int $entityId
     * @param bool $addWatermark
     * @return $this
     */
    public function upload(Request $request, string $entity, int $entityId, bool $addWatermark = false): self
    {
        $this->entityId = $entityId;
        $this->entity = $entity;
        $this->image = $request->file('upload');

        $this->image->store($this->getSavePath());
        $this->createThumb();
        if ($addWatermark) {
            $this->createWatermark();
        }

        return $this;
    }

    /**
     * @param int $widthThumb
     * @return UploadImagesService
     */
    public function setWidthThumb(int $widthThumb): self
    {
        $this->widthThumb = $widthThumb;
        return $this;
    }

    /**
     * @param int $heightThumb
     * @return UploadImagesService
     */
    public function setHeightThumb(int $heightThumb): UploadImagesService
    {
        $this->heightThumb = $heightThumb;
        return $this;
    }

    /**
     * @return string
     */
    public function getImageHashName():string
    {
        $chunks = explode('.', $this->image->hashName());

        return strval(array_shift($chunks));
    }

    /**
     * @return string
     */
    public function getExt(): string
    {
        return $this->image->extension();
    }

    /**
     * @return int
     */
    public function getEntityId(): int
    {
        return $this->entityId;
    }

    /**
     * @return string
     */
    private function getSavePath(): string
    {
        return 'public/' . $this->entity . '/' . $this->entityId . '/';
    }

    private function createThumb(): void
    {
        (new ImageManager())
            ->make($this->image)
            ->fit($this->widthThumb, $this->heightThumb)
            ->insert(public_path('images/watermark_thumb.png'), 'top-left', 25, 25)
            ->save(public_path('storage/' . $this->entity . '/' . $this->entityId .'/' . $this->getImageHashName() . '_thumb.' . $this->getExt()));
    }

    private function createWatermark()
    {
        (new ImageManager())
            ->make($this->image)
            ->insert(public_path('images/watermark.png'), 'top-left', 30, 30)
            ->save(public_path('storage/' . $this->entity . '/' . $this->entityId .'/' . $this->getImageHashName() . '.' . $this->getExt()));
    }
}
