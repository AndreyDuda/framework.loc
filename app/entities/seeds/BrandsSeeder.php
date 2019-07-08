<?php


use Phinx\Seed\AbstractSeed;

class BrandsSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $data = [];
        $dir = dirname(__DIR__, 3) . '/public/images/brands';
        for ($i = 0; $i < 5; ++$i) {
            $title = $faker->word;
            $data[] = [
                'title' => $faker->word,
                'alias' => $faker->word,
                'img'   => $faker->image($dir, 640, 480),
                'description' => $faker->text($maxNbChars = 255)
            ];
        }
        $this->table('brands')->insert($data)->save();
    }
}
