<?php

namespace Tests\Feature;

use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Models\User;

class BonusTest extends TestCase
{

    public function testSettingUp() :void {

        DB::connection()->getPdo()->exec("DROP DATABASE IF EXISTS `evidentia`;");
        DB::connection()->getPdo()->exec("CREATE DATABASE IF NOT EXISTS `evidentia`");
        DB::connection()->getPdo()->exec("ALTER SCHEMA `evidentia`  DEFAULT CHARACTER SET utf8mb4  DEFAULT COLLATE utf8mb4_unicode_ci");
        exec("php artisan migrate");
        exec("php artisan db:seed");
        exec('php artisan db:seed --class=InstancesTableSeeder');

        $this->assertTrue(true);

    }


    private function loginWithSecreatario1(){
        $request = [
            'username' => 'secretario1',
            'password' => 'secretario1'
        ];
        $response = $this->post('login',$request);
    }


    private function createBonusPositive(){

        $this->loginWithSecretario1();

        $request = [
            'reason' => 'Esto es una prueba',
            'hours'  => '1',
            'users'  => User::all()  
        ];

        
        $response = $this->post('/secretary/bonus/create',$request);
        $response->assertStatus(302);


    }


    private function createBonusNegative(){

        $this->loginWithSecretario1();

        $request = [
            'reason' => '',
            'hours'  => '1',
            'users'  => User::all()  
        ];

        
        $response = $this->post('/secretary/bonus/create',$request);
        $response->assertStatus(400);

    }


    private function editBonusPositive(){
        $this->loginWithSecretario1();

        $requestCreate = [
            'reason' => 'Esto es una prueba',
            'hours'  => '1',
            'users'  => User::all()  
        ];

        $this->post('/secretary/bonus/create',$request);

        $requestEdit = [
            'reason' => 'Esto es una prueba para editar',
            'hours'  => '1',
            'users'  => User::all()  
        ];

        $response = $this->post('/secretary/bonus/save',$requestEdit);
        $response->assertStatus(302);
        
    }

    private function editBonusNegative(){

        $this->loginWithSecretario1();

        $requestCreate = [
            'reason' => 'Esto es una prueba',
            'hours'  => '1',
            'users'  => User::all()  
        ];

        $this->post('/secretary/bonus/create',$request);

        $requestEdit = [
            'reason' => '',
            'hours'  => '1',
            'users'  => User::all()  
        ];

        $response = $this->post('/secretary/bonus/save',$requestEdit);
        $response->assertStatus(302);
        
    }


}