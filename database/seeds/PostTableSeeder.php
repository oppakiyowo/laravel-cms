<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;
use App\Category;
use App\User;
use Illuminate\Support\Facades\Hash;
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    
    {
        $author1 =App\User::create([
            'name' => 'Edo Cowok',
            'email' => 'JohnDoe@gmail.com',
            'Password' => Hash::make('e2rfak5osr2h')
        ]);
       
        $author2 =App\User::create([
            'name' => 'Edo Cewek',
            'email' => 'JohnDoe1@gmail.com',
            'Password' => Hash::make('e2rfak5osr2h')
        ]);
       
        $tag1 =Tag::create([
            'name' => 'Job',
            'slug' => 'Job'
        ]);
        $tag2 =Tag::create([
            'name' => 'Customer',
            'slug' => 'Customer'
        ]);
        $tag3 =Tag::create([
            'name' => 'Record',
            'slug' => 'Record'
        ]);

        $category1 =Category::create([
            'name' => 'News',
            'slug' => 'News'
            
        ]);
        $category2 =Category::create([
            'name' => 'Marketing',
            'slug' => 'Mareketing'
        ]);
        $category3 =Category::create([
            'name' => 'Design',
            'slug' => 'Design'
        ]);

        $post1 =Post::create([
            'title' => 'We relocated our office to a new garage',
            'description' => 'We relocated our office to a new garage',
            'content'=>"Together. Great. So good was saying, that can't first let called air divide stars male isn't i. Herb third let may fourth divide. Greater gathering land you'll i their beast have. She'd form sea it wherein fowl, spirit creeping living. Likeness creepeth you hath heaven. Likeness, moveth fruitful behold. Open evening a air us behold. Saying above moving second a subdue likeness after also second.",
            'category_id' =>$category1->id,
            'image' =>'posts/1.jpg',
            'user_id' => $author1->id,
            'slug' => 'We-relocated-our-office-to-a-new-garage'
        ]);

        $post2 =$author2->posts()->create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'We relocated our office to a new garage',
            'content'=>"Together. Great. So good was saying, that can't first let called air divide stars male isn't i. Herb third let may fourth divide. Greater gathering land you'll i their beast have. She'd form sea it wherein fowl, spirit creeping living. Likeness creepeth you hath heaven. Likeness, moveth fruitful behold. Open evening a air us behold. Saying above moving second a subdue likeness after also second.",
            'category_id' =>$category2->id,
            'image' =>'posts/2.jpg',
            'slug' => 'We-relocated-our-office-to-a-new-garage-dua'
        ]);

        $post3 =$author1->posts()->create([
            'title' => 'Best practices for minimalist design',
            'description' => 'We relocated our office to a new garage',
            'content'=>"Together. Great. So good was saying, that can't first let called air divide stars male isn't i. Herb third let may fourth divide. Greater gathering land you'll i their beast have. She'd form sea it wherein fowl, spirit creeping living. Likeness creepeth you hath heaven. Likeness, moveth fruitful behold. Open evening a air us behold. Saying above moving second a subdue likeness after also second.",
            'category_id' =>$category3->id,
            'image' =>'posts/3.jpg',
            'slug' => 'We-relocated-our-office-to-a-new-garage-tiga'
        ]);

        $post4 =$author2->posts()->create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => 'We relocated our office to a new garage',
            'content'=>"Together. Great. So good was saying, that can't first let called air divide stars male isn't i. Herb third let may fourth divide. Greater gathering land you'll i their beast have. She'd form sea it wherein fowl, spirit creeping living. Likeness creepeth you hath heaven. Likeness, moveth fruitful behold. Open evening a air us behold. Saying above moving second a subdue likeness after also second.",
            'category_id' =>$category1->id,
            'image' =>'posts/4.jpg',
            'slug' => 'We-relocated-our-office-to-a-new-garage-empat'
        ]);

        $post5 =$author1->posts()->create([
            'title' => 'New published books to read by a product designer',
            'description' => 'We relocated our office to a new garage',
            'content'=>"Together. Great. So good was saying, that can't first let called air divide stars male isn't i. Herb third let may fourth divide. Greater gathering land you'll i their beast have. She'd form sea it wherein fowl, spirit creeping living. Likeness creepeth you hath heaven. Likeness, moveth fruitful behold. Open evening a air us behold. Saying above moving second a subdue likeness after also second.",
            'category_id' =>$category2->id,
            'image' =>'posts/1.jpg',
            'slug' => 'We-relocated-our-office-to-a-new-garage-lima'
        ]);

        $post6 =$author2->posts()->create([
            'title' => 'New published books to read by a product designer',
            'description' => 'We relocated our office to a new garage',
            'content'=>"Together. Great. So good was saying, that can't first let called air divide stars male isn't i. Herb third let may fourth divide. Greater gathering land you'll i their beast have. She'd form sea it wherein fowl, spirit creeping living. Likeness creepeth you hath heaven. Likeness, moveth fruitful behold. Open evening a air us behold. Saying above moving second a subdue likeness after also second.",
            'category_id' =>$category2->id,
            'image' =>'posts/2.jpg',
            'slug' => 'We-relocated-our-office-to-a-new-garage-enam'
        ]);

        $post7 =$author2->posts()->create([
            'title' => 'New published books to read by a product designer',
            'description' => 'We relocated our office to a new garage',
            'content'=>"Together. Great. So good was saying, that can't first let called air divide stars male isn't i. Herb third let may fourth divide. Greater gathering land you'll i their beast have. She'd form sea it wherein fowl, spirit creeping living. Likeness creepeth you hath heaven. Likeness, moveth fruitful behold. Open evening a air us behold. Saying above moving second a subdue likeness after also second.",
            'category_id' =>$category2->id,
            'image' =>'posts/3.jpg',
            'slug' => 'We-relocated-our-office-to-a-new-garage-tujuh'
        ]);

        $post8 =$author2->posts()->create([
            'title' => 'New published books to read by a product designer',
            'description' => 'We relocated our office to a new garage',
            'content'=>"Together. Great. So good was saying, that can't first let called air divide stars male isn't i. Herb third let may fourth divide. Greater gathering land you'll i their beast have. She'd form sea it wherein fowl, spirit creeping living. Likeness creepeth you hath heaven. Likeness, moveth fruitful behold. Open evening a air us behold. Saying above moving second a subdue likeness after also second.",
            'category_id' =>$category2->id,
            'image' =>'posts/4.jpg',
            'slug' => 'We-relocated-our-office-to-a-new-garage-delapan'
        ]);

        $post9 =$author2->posts()->create([
            'title' => 'New published books to read by a product designer',
            'description' => 'We relocated our office to a new garage',
            'content'=>"Together. Great. So good was saying, that can't first let called air divide stars male isn't i. Herb third let may fourth divide. Greater gathering land you'll i their beast have. She'd form sea it wherein fowl, spirit creeping living. Likeness creepeth you hath heaven. Likeness, moveth fruitful behold. Open evening a air us behold. Saying above moving second a subdue likeness after also second.",
            'category_id' =>$category2->id,
            'image' =>'posts/5.jpg',
            'slug' => 'We-relocated-our-office-to-a-new-garage-sembilan'
        ]);

        $post10 =$author1->posts()->create([
            'title' => 'New published books to read by a product designer',
            'description' => 'We relocated our office to a new garage',
            'content'=>"Together. Great. So good was saying, that can't first let called air divide stars male isn't i. Herb third let may fourth divide. Greater gathering land you'll i their beast have. She'd form sea it wherein fowl, spirit creeping living. Likeness creepeth you hath heaven. Likeness, moveth fruitful behold. Open evening a air us behold. Saying above moving second a subdue likeness after also second.",
            'category_id' =>$category2->id,
            'image' =>'posts/1.jpg',
            'slug' => 'We-relocated-our-office-to-a-new-garage-sepuluh'
        ]);

        $post11 =$author2->posts()->create([
            'title' => 'New published books to read by a product designer',
            'description' => 'We relocated our office to a new garage',
            'content'=>"Together. Great. So good was saying, that can't first let called air divide stars male isn't i. Herb third let may fourth divide. Greater gathering land you'll i their beast have. She'd form sea it wherein fowl, spirit creeping living. Likeness creepeth you hath heaven. Likeness, moveth fruitful behold. Open evening a air us behold. Saying above moving second a subdue likeness after also second.",
            'category_id' =>$category2->id,
            'image' =>'posts/2.jpg',
            'slug' => 'We-relocated-our-office-to-a-new-garage-sebelas'
        ]);

        $post12 =$author2->posts()->create([
            'title' => 'New published books to read by a product designer',
            'description' => 'We relocated our office to a new garage',
            'content'=>"Together. Great. So good was saying, that can't first let called air divide stars male isn't i. Herb third let may fourth divide. Greater gathering land you'll i their beast have. She'd form sea it wherein fowl, spirit creeping living. Likeness creepeth you hath heaven. Likeness, moveth fruitful behold. Open evening a air us behold. Saying above moving second a subdue likeness after also second.",
            'category_id' =>$category2->id,
            'image' =>'posts/5.jpg',
            'slug' => 'We-relocated-our-office-to-a-new-garage-duabelas'
        ]);







        $post1->tags()->attach([$tag1->id,$tag2->id]);
        $post2->tags()->attach([$tag2->id,$tag3->id]);
        $post3->tags()->attach([$tag1->id,$tag3->id]);
        $post4->tags()->attach([$tag1->id,$tag2->id]);
        $post4->tags()->attach([$tag1->id]);
    }
}
