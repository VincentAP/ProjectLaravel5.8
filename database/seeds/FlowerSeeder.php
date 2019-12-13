<?php

use Illuminate\Database\Seeder;

class FlowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flowers')->insert([
            [
                'flower_name' => 'Aconite',
                'flower_price' => 10000,
                'flower_stock' => 123,
                'flower_type' => 'Azalea',
                'flower_image' => 'aconite.jpg',
                'flower_description' => 'Also known as winter aconite. They spread easily and can be planted as tubers or seed. They are often found growing in patches and are spring’s first flower.'
            ],
            [
                'flower_name' => 'Ageratum',
                'flower_price' => 10000,
                'flower_stock' => 123,
                'flower_type' => 'Azalea',
                'flower_image' => 'ageratum.jpg',
                'flower_description' => 'A tough plant that is a favorite for many gardens. Beautiful blue annuals known for their powder puff blooms.'
            ],
            [
                'flower_name' => 'Allium',
                'flower_price' => 10000,
                'flower_stock' => 123,
                'flower_type' => 'Azalea',
                'flower_image' => 'allium.jpg',
                'flower_description' => 'Also known as flowering onion, this plant grows from a bulb or from seed, and produces globes of purple clusters of flowers atop long stems.'
            ],
            [
                'flower_name' => 'Alstromeria',
                'flower_price' => 10000,
                'flower_stock' => 123,
                'flower_type' => 'Azalea',
                'flower_image' => 'alstromeria.jpg',
                'flower_description' => 'A common flower to be found in floral arrangements due to its variation in colors and its ability to be dyed.'
            ],
            [
                'flower_name' => 'Alyssum',
                'flower_price' => 10000,
                'flower_stock' => 123,
                'flower_type' => 'Azalea',
                'flower_image' => 'alyssum.jpg',
                'flower_description' => 'Classified as a perennial, this plant is grown as an annual in cold climates. Its tiny clusters of blooms are attractive at the edge of a bed or in pots with geraniums or other annuals.'
            ],
            [
                'flower_name' => 'Amaryllis',
                'flower_price' => 10000,
                'flower_stock' => 123,
                'flower_type' => 'Azalea',
                'flower_image' => 'amarylis.png',
                'flower_description' => 'Amaryllis flowers are one of the easiest to grow. They do very well indoors or out and come in a variety of colors. Try to plant the largest bulbs you can find because larger bulbs means more flowers!'
            ],
            [
                'flower_name' => 'Anemone',
                'flower_price' => 10000,
                'flower_stock' => 123,
                'flower_type' => 'Azalea',
                'flower_image' => 'anemone.jpg',
                'flower_description' => 'Also known as windflower, these tuberous flowers produce poppy-like blooms in early-to-mid spring.'
            ],
            [
                'flower_name' => 'Angelica',
                'flower_price' => 10000,
                'flower_stock' => 123,
                'flower_type' => 'Azalea',
                'flower_image' => 'angelica.jpg',
                'flower_description' => 'A tall , hardy biennial herb with stalks that can be candied and used on cakes or cookies. Produces green foliage the first year and flowers the second.'
            ],
            [
                'flower_name' => 'Angelonia',
                'flower_price' => 10000,
                'flower_stock' => 123,
                'flower_type' => 'Azalea',
                'flower_image' => 'angelonia.jpg',
                'flower_description' => 'Also know as summer snapdragon, it is a fairly new plant that has only been around since the late 1990s. It is a tough perennial and stands up to heat with no problem.'
            ],
            [
                'flower_name' => 'Artemisia',
                'flower_price' => 10000,
                'flower_stock' => 123,
                'flower_type' => 'Azalea',
                'flower_image' => 'artemisia.jpg',
                'flower_description' => 'This perennial plant is grown more for its silvery, white foliage than for the small, white flowers, but makes an excellent backdrop for more showy flowers in a perennial bed.'
            ],
            [
                'flower_name' => 'Aster',
                'flower_price' => 10000,
                'flower_stock' => 123,
                'flower_type' => 'Azalea',
                'flower_image' => 'aster.jpg',
                'flower_description' => 'Asters bloom in late summer to early fall, when many other perennials have faded. They range from varieties that skim the ground, to those towering 6 feet high. The daisy-like flowers come in many colors; the most common shades are purple, lavender, pink, red, blue and white.'
            ],
            [
                'flower_name' => 'Astilbe',
                'flower_price' => 10000,
                'flower_stock' => 123,
                'flower_type' => 'Azalea',
                'flower_image' => 'astilbe.jpg',
                'flower_description' => 'Know for being a graceful flower that does well in cooler climates in the northern third of the country. It can tolerate full sun as long as it has a constant supple of moisture.'
            ],
            [
                'flower_name' => 'Aubrieta',
                'flower_price' => 10000,
                'flower_stock' => 123,
                'flower_type' => 'Azalea',
                'flower_image' => 'aubrieta.jpg',
                'flower_description' => 'flower_named after the French artist who made them famous from his paintings. They are perfect for rock gardens.'
            ],
            [
                'flower_name' => 'Balloon-flower',
                'flower_price' => 10000,
                'flower_stock' => 123,
                'flower_type' => 'Azalea',
                'flower_image' => 'balloon-flower.jpg',
                'flower_description' => 'Known for being great cut flowers and for having petals that can be popped. In fall, the foliage turns clear gold.'
            ],
            [
                'flower_name' => 'Balsam',
                'flower_price' => 10000,
                'flower_stock' => 123,
                'flower_type' => 'Azalea',
                'flower_image' => 'balsam.jpg',
                'flower_description' => 'An old-fashioned annual that was a favorite of Victorian gardens.'
            ],
            [
                'flower_name' => 'Baneberry',
                'flower_price' => 10000,
                'flower_stock' => 123,
                'flower_type' => 'Azalea',
                'flower_image' => 'baneberry.jpg',
                'flower_description' => 'A white fluffy flower that produces orflower_namental and poisonous red berries. Perfect for cool areas.'
            ]
        ]);
    }
}
