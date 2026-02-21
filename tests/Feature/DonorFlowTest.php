<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DonorFlowTest extends TestCase
{
    use \Illuminate\Foundation\Testing\RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class);
    }

    /**
     * A basic feature test example.
     */
    public function test_can_view_home_page()
    {
        $response = $this->get('/');
        $response->assertStatus(302); // Redirect to donors
        $response->assertRedirect('/donors');

        $response = $this->get('/donors');
        $response->assertStatus(200);
        $response->assertSee('Cari Data Donor');
    }

    public function test_can_search_donor_not_found()
    {
        $response = $this->get('/donors?day=1&month=1&year=2000');
        $response->assertStatus(200);
        $response->assertSee('Maaf, data dengan tanggal lahir tersebut tidak ditemukan');
    }

    public function test_can_create_donor()
    {
        $response = $this->post('/donors', [
            'name' => 'John Doe',
            'birth_date' => '1990-01-01',
            'gender' => 'male',
            'address' => 'Jl. Test No. 123',
            'house_number' => '123',
            'rt_rw' => '01/02',
            'village' => 'Kelurahan Test',
            'district' => 'Kecamatan Test',
            'region' => 'Bandung',
            'phone' => '08123456789',
            'occupation' => 'PEGAWAI NEGERI/SWASTA',
        ]);

        $response->assertStatus(302); // Redirect to edit
        $donor = \App\Models\Donor::first();
        $this->assertNotNull($donor);
        $this->assertEquals('John Doe', $donor->name);
        $response->assertRedirect(route('donors.edit', $donor));
    }

    public function test_can_search_donor_found()
    {
        \App\Models\Donor::create([
            'name' => 'Jane Doe',
            'birth_date' => '1995-05-05',
            'gender' => 'female',
            'address' => 'Jl. Test 2',
        ]);

        $response = $this->get('/donors?day=5&month=5&year=1995');
        $response->assertStatus(200);
        $response->assertSee('1 data pendonor ditemukan');
        $response->assertDontSee('Maaf, data dengan tanggal lahir tersebut tidak ditemukan');
    }

    public function test_can_queue_donor()
    {
        $donor = \App\Models\Donor::create([
            'name' => 'Queue User',
            'birth_date' => '1985-10-10',
            'gender' => 'male',
            'address' => 'Jl. Queue',
        ]);

        $response = $this->post(route('queues.store'), [
            'donor_id' => $donor->id,
        ]);

        $response->assertStatus(302);
        $queue = \App\Models\Queue::first();
        $this->assertNotNull($queue);
        $this->assertEquals($donor->id, $queue->donor_id);
        $response->assertRedirect(route('queues.print', $queue));
    }

    public function test_can_print_queue()
    {
        $donor = \App\Models\Donor::create([
            'name' => 'Print User',
            'birth_date' => '1980-08-08',
            'gender' => 'female',
            'address' => 'Jl. Print',
        ]);
        $queue = \App\Models\Queue::create(['donor_id' => $donor->id]);

        $response = $this->get(route('queues.print', $queue));
        $response->assertStatus(200);
        $response->assertSee('Mencetak Nomor Antrian');

        $pdfResponse = $this->get(route('queues.print_pdf', $queue));
        $pdfResponse->assertStatus(200);
        $pdfResponse->assertHeader('content-type', 'application/pdf');
    }
}
