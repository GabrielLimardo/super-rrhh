<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\DocumentType;
use Illuminate\Support\Facades\Factory;
use App\Models\User;

class DocumentTypeControllerTest extends TestCase
{

    public function test_example()
    {
        $documentTypes = DocumentType::factory()->count(1)->make();
        
        $response = $this->get(route('document-types.index'));

        $response->assertRedirect(route('login'));
    
        $this->actingAs(User::factory()->create());
    
        $response = $this->get(route('document-types.index'));
    
        $response->assertStatus(200)
            ->assertViewIs('document-type.index')
            ->assertViewHas('documentTypes', $documentTypes);

        // $response = $this->get(route('document-types.index'));

        // $response->assertOk();
        // $response->assertViewIs('document-type.index')
        //     ->assertViewHas('documentTypes', $documentTypes);
    }
}
