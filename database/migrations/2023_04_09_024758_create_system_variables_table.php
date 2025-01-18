<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSystemVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_variables', function (Blueprint $table) {
            $table->id();
            // $table->tinyInteger('language')->default('1')->comment('1 ar, 2 en');
            // $table->decimal('price_room', 8, 2, true);
            $table->string('site_name');
            $table->string('site_phone');
            $table->tinyInteger('currency')->default('1')->comment('1 USD, 2 YER, 3 SAR');
            $table->string('facebook_url')->nullable();
            $table->string('tweeter_url')->nullable();
            $table->string('address')->nullable();
            $table->string('image_logo')->default('logo.png');

            $table->timestamps();
        });

        DB::statement('ALTER TABLE system_variables ADD CONSTRAINT chk_system_variable_curr CHECK (currency in(1, 2, 3));');
        // Add index on created_by and updated_by columns for performance optimization
        // Schema::table('system_variables', function (Blueprint $table) {
        //     $table->index('created_by');
        //     $table->index('updated_by');
        // });

        // Insert initial system variables
        $this->initSystemVariables();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_variables');
    }

    /**
     * Insert initial system variables.
     *
     * @return void
     */
    private function initSystemVariables()
    {
        DB::table('system_variables')->insert([
            'site_name' => 'المسعودي',
            'site_phone' => '775006398',
            'currency' => '1',
            'facebook_url' => '#',
            'tweeter_url' => '#',
            'address' => 'صنعاء',
            'image_logo' => 'logo.png'
        ]);
    }
}
