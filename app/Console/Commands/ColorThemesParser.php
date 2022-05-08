<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Image;
use App\OurService;
use App\OurServiceItem;
use App\OurServiceItemImage;
use File;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Storage;
use Symfony\Component\DomCrawler\Crawler;

class ColorThemesParser extends Command
{
    private const BASE_URL = "http://xn----7sbommbmdg1acm1dza6c.xn--p1ai";

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:color-themes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * @throws \Exception
     */
    public function handle()
    {
        $this->parseItems();

        $this->info('Well done!');
    }

    /**
     * @throws \Exception
     */
    private function parseItems(): void
    {
        $document = file_get_contents(self::BASE_URL . '/czenyi.html');
        $crawler = new Crawler($document);

        $products = $crawler->filter('.container .col-md-3.blokifast')->each(function (Crawler $node) {
           return [
               'link' => $node->filter('a')->first()->attr('href'),
               'img' => $node->filter('img')->first()->attr('src'),
               'name' => $node->filter('p > span')->first()->text()
           ];
        });

        $products = array_pop($products);

        $i = 1;
        foreach ([$products] as $product) {
            $this->parseCatalogProduct($i, $product);
            $i++;
        }
    }

    private function parseCatalogProduct(int $id, $link)
    {
        if ($document = file_get_contents(self::BASE_URL . '/' . $link['link'])) {
            $crawler = new Crawler($document);

            $this->info($link['name']);

            $name = $link['name'];

            $ourServiceItem = new OurServiceItem();
            $ourServiceItem->our_service_id = 2;
//            $ourServiceItem->our_service_id = $id > 9 ? 2 : 1;
            $ourServiceItem->name = $name;
            $ourServiceItem->title = $name;
            $ourServiceItem->description = $name;

            $alias = Str::slug($ourServiceItem->name);

            $ourServiceItem->alias = $alias;

            $colors = $crawler->filter('.galeryy .col-md-3.palitragal')->each(function (Crawler $node) {
                return [
                    'link' => $node->filter('a.fancybox-thumb')->first()->attr('href'),
                    'name' => $node->filter('p')->first()->text()
                ];
            });

            $image = $link['img'];

            if (!OurServiceItem::whereAlias($alias)->exists() && $ourServiceItem->save() && $image) {
                $imageNew = explode('/', $image);

                $name = Str::random(40);

                $ext = explode('.', end($imageNew));

                $path = Storage::path('public/test') . '/' . $name . '.' . end($ext);

                try {
                    if (File::copy(self::BASE_URL . $image, $path)) {
                        $newImage = new Image();
                        $newImage->path = '/storage/images/' . $name . '.' . end($ext);
                        $newImage->imageable_type = OurServiceItem::class;
                        $newImage->imageable_id = $ourServiceItem->id;
                        $newImage->alt = $ourServiceItem->name;
                        $newImage->save();
                    }
                } catch (\Exception $exception) {
                    $this->info($exception->getMessage());
                }
            }

            $ourServiceItem = OurServiceItem::query()->where('alias', $alias)->firstOrFail();

            foreach ($colors as $color) {
                $imageNewColor = explode('/', $color['link']);

                $name = Str::random(40);

                $ext = explode('.', end($imageNewColor));

                Storage::makeDirectory('public/our_service_item' . '/' . $ourServiceItem->id);
                $path = Storage::path('public/our_service_item') . '/' . $ourServiceItem->id . '/' . $name . '.' . end($ext);

                if (OurServiceItemImage::query()->where('name', $color['name'])->where('our_service_item_id', $ourServiceItem->id)->exists()) {
                    continue;
                }

                if (File::copy(self::BASE_URL . $color['link'], $path)) {
                    $ourServiceItemImage = new OurServiceItemImage();
                    $ourServiceItemImage->name = $color['name'];
                    $ourServiceItemImage->title = $color['name'];
                    $ourServiceItemImage->basename = $name;
                    $ourServiceItemImage->ext = end($ext);
                    $ourServiceItemImage->our_service_item_id = $ourServiceItem->id;

                    $ourServiceItemImage->save();

                    $this->info($color['name']);
                }
            }
        }
    }
}
