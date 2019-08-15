<?php


use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Company;
use App\Job;
$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'user_type'=>'seeker',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Company::class, function (Faker $faker) {
    return [
        'user_id' =>App\User::all()->random()->id,
        'name'=>$name=$faker->company,
        'slug'=>str_slug($name),
        'address'=>$faker->address,
        'phone'=>$faker->phoneNumber,
        'website'=>$faker->domainName,
        'logo'=>'man.jpg',
        'cover_photo'=>'tumblr-image-sizes-banner.png',
        'slogan'=>'learn-earn and grow',
        'description'=>$faker->paragraph(rand(2,10))

    ];
});

$factory->define(Job::class, function (Faker $faker) {
    return [
        'user_id' =>App\User::all()->random()->id,
        'company_id'=>App\Company::all()->random()->id,
        'title'=>$title=$faker->text,
        'slug'=>str_slug($title),
        'position'=>$faker->jobTitle,
        'address'=>$faker->address,
        'category_id'=> rand(1,5),
        'type'=>'fulltime',
        'status'=>rand(0,1),
        'description'=>$faker->paragraph(rand(2,10)),
        'roles' => $faker->text,
        'last_date'=>$faker->DateTime





    ];
});
