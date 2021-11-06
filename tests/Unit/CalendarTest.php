<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Holiday;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\Databasetransactions;

class CalendarTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        // ダミーで利用するデータ
        factory(User::class)->create([
            'name' => 'AAA',
            'email' => 'BBB@CCC.COM',
            'password' => 'ABCABC',
        ]);

        factory(User::class, 10)->create();

        $this->assertDataBaseHas('users', [
            'name' => 'AAA',
            'email' => 'BBB@CCC.COM',
            'password' => 'ABCABC',
        ]);

        // ダミーで利用するデータ
        factory(Holiday::class)->create([
        'day' => 'YY-mm-jj',
        'description' => 'ABCABC',
        ]);

        factory(Holiday::class, 10)->create();

        $this->assertDataBaseHas('holidays', [
            'day' => 'YY-mm-jj',
            'description' => 'ABCABC',
        ]);





    }
}
