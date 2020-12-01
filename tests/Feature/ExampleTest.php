<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */ 
    public function testBasicTest()
    {  
        $Num=A;
        if($Num==0)
        {
        echo("Neutro");
        $this->assertTrue(true);
        }
        else{
            if($Num%2>0)
            {
                echo("Impar");
                $this->assertTrue(true);
            }
            else{
                echo("Par");
                $this->assertTrue(true);
            }
        }       
    }
}
