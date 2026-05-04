<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\About;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Namecompany;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'jarne',
            'username' => 'jarne_',
            'email' => 'jarne@gmail.com',
            'password' => bcrypt('12345'),
            'is_admin' => true
        ]);

        User::factory(3)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name' => 'budi',
        //     'email' => 'budi@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        Category::create([
            'name' => 'skateboard',
            'slug' => 'skateboard'
        ]);

        Category::create([
            'name' => 'surf',
            'slug' => 'surf'
        ]);

        Category::create([
            'name' => 'music',
            'slug' => 'music'
        ]);

        Category::create([
            'name' => 'art',
            'slug' => 'art'
        ]);


        Post::factory(25)->create();

        Namecompany::create([
            'user_id' => 1,
            'namecompany' => 'POUR PICTURE jarne',
            'takeline' => 'Build anything you want with Aperture',
            'deccompany' => 'From bespoke content to international campaigns, our experience covers a range of creative concepts and spans the cultural landscape.'
        ]);

        About::create([
            'user_id' => 1,
            'line_1' => 'With a strong background in street culture, 1993 is a collective of people that all share a passion to create. Its been our motivation since day one and continues to drive our daily efforts.',
            'line_2' => 'Upholding a multidisciplinary nature, we excel at brand identity & design; weve produced countless Global campaigns with web/digital components. Physical retail marketing solutions are our backbone and bespoke print & digital editorial content is the background of many of our team.',
            'line_3' => 'Were known for our live activation events and consultation on comms strategy for a range of European and Global brands. We believe the worlds finest brands all need great stories.',
            'solo_sight' => 'Print is an integral part of our DNA. SOLO and SIGHT magazine are our independent in-house publishing branches.'
        ]);

        // Post::create([
        //     'tittle' => 'judul pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem, ipsum dolor ketiga.',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique enim adipisci harum natus mollitia voluptas sequi eius eligendi aliquam debitis placeat optio quasi tempora consequatur animi vitae omnis nobis eaque, ipsum quos, et nulla accusamus. Distinctio eaque aspernatur voluptatem expedita! Nulla, fugiat consequuntur. Consequuntur sapiente provident tempore, nemo maxime veritatis ea odio possimus quis aperiam veniam atque animi impedit, reiciendis repellat fugiat nam, rem voluptatum magni molestiae eum! Quam, impedit sunt et facere ea harum minus velit esse recusandae, voluptates aliquam soluta eum! Quos modi omnis, esse officia distinctio aperiam.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi officia eos quam eveniet maxime ex perferendis saepe assumenda odit ducimus, placeat dolor eum veniam, optio unde repudiandae incidunt fuga at qui sapiente eaque distinctio. Aspernatur error possimus iure nihil ad eveniet est ipsum, esse reprehenderit quo repudiandae perferendis cumque labore atque praesentium! Maiores laborum aperiam dolore, sed atque, dolorem, qui sapiente obcaecati odit explicabo enim veritatis? Facere ad cumque magnam quo. Rem cum velit aliquid soluta voluptas, saepe eaque quibusdam laudantium mollitia dolorem nisi ipsam tenetur quo suscipit placeat. Vel et facere enim ratione repudiandae magnam natus ipsum molestias labore!</p><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis similique beatae voluptate eos. Cumque, officiis! Deserunt voluptatum iusto quaerat impedit amet odit quidem distinctio ipsam, alias dolorum nihil velit officia officiis mollitia eaque ut voluptates dignissimos maiores nobis quibusdam veniam. Repellat ullam consectetur obcaecati aspernatur, porro tenetur expedita ab in!</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'tittle' => 'judul kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem, ipsum dolor ketiga.',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique enim adipisci harum natus mollitia voluptas sequi eius eligendi aliquam debitis placeat optio quasi tempora consequatur animi vitae omnis nobis eaque, ipsum quos, et nulla accusamus. Distinctio eaque aspernatur voluptatem expedita! Nulla, fugiat consequuntur. Consequuntur sapiente provident tempore, nemo maxime veritatis ea odio possimus quis aperiam veniam atque animi impedit, reiciendis repellat fugiat nam, rem voluptatum magni molestiae eum! Quam, impedit sunt et facere ea harum minus velit esse recusandae, voluptates aliquam soluta eum! Quos modi omnis, esse officia distinctio aperiam.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi officia eos quam eveniet maxime ex perferendis saepe assumenda odit ducimus, placeat dolor eum veniam, optio unde repudiandae incidunt fuga at qui sapiente eaque distinctio. Aspernatur error possimus iure nihil ad eveniet est ipsum, esse reprehenderit quo repudiandae perferendis cumque labore atque praesentium! Maiores laborum aperiam dolore, sed atque, dolorem, qui sapiente obcaecati odit explicabo enim veritatis? Facere ad cumque magnam quo. Rem cum velit aliquid soluta voluptas, saepe eaque quibusdam laudantium mollitia dolorem nisi ipsam tenetur quo suscipit placeat. Vel et facere enim ratione repudiandae magnam natus ipsum molestias labore!</p><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis similique beatae voluptate eos. Cumque, officiis! Deserunt voluptatum iusto quaerat impedit amet odit quidem distinctio ipsam, alias dolorum nihil velit officia officiis mollitia eaque ut voluptates dignissimos maiores nobis quibusdam veniam. Repellat ullam consectetur obcaecati aspernatur, porro tenetur expedita ab in!</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'tittle' => 'judul ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem, ipsum dolor ketiga.',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique enim adipisci harum natus mollitia voluptas sequi eius eligendi aliquam debitis placeat optio quasi tempora consequatur animi vitae omnis nobis eaque, ipsum quos, et nulla accusamus. Distinctio eaque aspernatur voluptatem expedita! Nulla, fugiat consequuntur. Consequuntur sapiente provident tempore, nemo maxime veritatis ea odio possimus quis aperiam veniam atque animi impedit, reiciendis repellat fugiat nam, rem voluptatum magni molestiae eum! Quam, impedit sunt et facere ea harum minus velit esse recusandae, voluptates aliquam soluta eum! Quos modi omnis, esse officia distinctio aperiam.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi officia eos quam eveniet maxime ex perferendis saepe assumenda odit ducimus, placeat dolor eum veniam, optio unde repudiandae incidunt fuga at qui sapiente eaque distinctio. Aspernatur error possimus iure nihil ad eveniet est ipsum, esse reprehenderit quo repudiandae perferendis cumque labore atque praesentium! Maiores laborum aperiam dolore, sed atque, dolorem, qui sapiente obcaecati odit explicabo enim veritatis? Facere ad cumque magnam quo. Rem cum velit aliquid soluta voluptas, saepe eaque quibusdam laudantium mollitia dolorem nisi ipsam tenetur quo suscipit placeat. Vel et facere enim ratione repudiandae magnam natus ipsum molestias labore!</p><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis similique beatae voluptate eos. Cumque, officiis! Deserunt voluptatum iusto quaerat impedit amet odit quidem distinctio ipsam, alias dolorum nihil velit officia officiis mollitia eaque ut voluptates dignissimos maiores nobis quibusdam veniam. Repellat ullam consectetur obcaecati aspernatur, porro tenetur expedita ab in!</p>',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
