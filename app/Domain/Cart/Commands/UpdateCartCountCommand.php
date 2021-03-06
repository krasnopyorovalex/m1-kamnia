<?php

namespace App\Domain\Cart\Commands;

use App\Domain\CatalogProduct\Queries\GetCatalogProductByIdQuery;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateCartCountCommand
 * @package App\Domain\Cart\Commands
 */
class UpdateCartCountCommand
{
    use DispatchesJobs;

    private $product;

    /**
     * @var int
     */
    private $quantity;

    /**
     * UpdateCartCountCommand constructor.
     * @param int $product
     * @param int $quantity
     */
    public function __construct(int $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function handle()
    {
        $product = $this->dispatch(new GetCatalogProductByIdQuery($this->product));

        app('cart')->update($product->id, [
            'quantity' => $this->quantity
        ]);

        return app('cart')->get($product->id);
    }
}
