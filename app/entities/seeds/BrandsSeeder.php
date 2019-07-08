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
        for ($i = 0; $i < 5; ++$i) {
            $data[] = [
                'title' => 'brand ' . $i,
                'alias' => 'brand-' . $i,
                'img'   => 'brand_default.jpg',
                'description' => $faker->text($maxNbChars = 200)
            ];
        }
        $this->table('brands')->insert($data)->save();
    }
}
