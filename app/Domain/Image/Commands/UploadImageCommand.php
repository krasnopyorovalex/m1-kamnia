<?php

namespace App\Domain\Image\Commands;

use App\CatalogProduct;
use App\Http\Requests\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Intervention\Image\ImageManager;
use Storage;

/**
 * Class UploadImageCommand
 * @package App\Domain\Image\Commands
 */
class UploadImageCommand
{
    use DispatchesJobs;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var int
     */
    private $imageableId;

    /**
     * @var string
     */
    private $imageableType;

    /**
     * UploadImageCommand constructor.
     * @param Request $request
     * @param int $imageableId
     * @param string $imageableType
     */
    public function __construct(Request $request, int $imageableId, string $imageableType)
    {
        $this->request = $request;
        $this->imageableId = $imageableId;
        $this->imageableType = $imageableType;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $path = $this->request->file('image')->store('public/images');

        if ($this->imageableType === CatalogProduct::class) {
            $extension = pathinfo($path, PATHINFO_EXTENSION);

            (new ImageManager())
                ->make(Storage::path($path))
                ->fit(360, 360)
                ->insert(public_path('images/watermark_thumb.png'), 'top-left', 25, 25)
                ->save(storage_path('app/'.str_replace('.'.$extension, '_thumb.' . $extension, $path)));
        }

        (new ImageManager())
            ->make(Storage::path($path))
            ->insert(public_path('images/watermark.png'), 'top-left', 30, 30)
            ->save(storage_path('app/'.$path));

        return $this->dispatch(new CreateImageCommand([
            'path' => Storage::url($path),
            'imageable_id' => $this->imageableId,
            'imageable_type' => $this->imageableType
        ]));
    }

}
