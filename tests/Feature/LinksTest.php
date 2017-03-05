<?php

namespace Tests\Feature;

use App\Link;
use App\TuxBoy\Priority;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LinksTest extends TestCase
{

  public function setUp()
  {
    parent::setUp();
    Artisan::call('migrate');
  }

  /**
   * @return void
   */
  public function testSaveLink()
  {
    $link = factory(Link::class, 2)->create();
    $this->assertEquals(2, Link::count());
  }

  /**
   * @return void
   */
  public function testSaveLinkWithFavory()
  {
    $link = factory(Link::class)->create();
    $this->assertEquals(1, Link::count());
  }

  public function testShowPrirotyWithNormal()
  {
    $normal = Priority::$ACTION[Priority::NORMAL];
    $link   = factory(Link::class)->create();
    $this->assertEquals($normal, $link->showPriority());
  }

  public function testShowPrirotyWithHight()
  {
    $hight = Priority::$ACTION[Priority::HIGHT];
    $link  = factory(Link::class)->create(['priority' => Priority::HIGHT]);
    $this->assertEquals($hight, $link->showPriority());
  }

  public function testSaveValidFormatLinks()
  {
    $link        = factory(Link::class)->create(['url' => 'monlien.html']);
    $first_link  = $link->first();
    $this->assertEquals('http://monlien.html', $first_link->url);
  }

  public function testSaveWithPrexixLinks()
  {
    $link        = factory(Link::class)->create(['url' => 'http://monlien.html']);
    $first_link  = $link->first();
    $this->assertEquals('http://monlien.html', $first_link->url);
  }

}
