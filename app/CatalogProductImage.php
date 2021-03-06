<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CatalogProductImage extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $guarded = [];

    protected $with = ['catalogProduct'];

    /**
     * @return BelongsTo
     */
    public function catalogProduct(): BelongsTo
    {
        return $this->belongsTo(CatalogProduct::class);
    }

    /**
     * @return string
     */
    public function getThumb(): string
    {
        return asset('storage/catalog_products/' . $this->catalog_product_id . '/' . $this->basename . '_thumb.' . $this->ext);
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return asset('storage/catalog_products/' . $this->catalog_product_id . '/' . $this->basename . '.' . $this->ext);
    }

    /**
     * @param int $index
     * @return string
     */
    public function getAlt(int $index): string
    {
        return $this->alt ?: sprintf('%s - изображение %s', $this->catalogProduct->name, $index + 1);
    }
}
