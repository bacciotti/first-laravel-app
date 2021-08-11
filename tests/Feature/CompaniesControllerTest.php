<?php

namespace Tests\Unit;

use App\Http\Controllers\CompaniesController;
use Tests\TestCase;
use App\Company;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompaniesControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateCompany()
    {
        $createCompany = new CompaniesController();
        $createdComp = $createCompany->create('Test1', 'Email1@email1.com', 'test.com');

//        $this->assertInstanceOf(Company::class, $createdComp);
        $this->assertDatabaseHas('companies', ['name' => 'Test1']);

    }
}
