<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVpcecmComplianceTables extends Migration
{
    /**
     * Run the migrations for VPCCECM statutory, governance, and institutional modules.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('governance_committees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('board_name');
            $table->string('member_name');
            $table->string('designation');
            $table->string('affiliation')->nullable();
            $table->timestamps();
        });

        Schema::create('institutional_mous', function (Blueprint $table) {
            $table->increments('id');
            $table->string('partner_name');
            $table->string('date_signed')->nullable();
            $table->string('validity')->nullable();
            $table->text('scope');
            $table->timestamps();
        });

        Schema::create('extension_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('activity_title');
            $table->string('resource_person')->nullable();
            $table->string('venue')->nullable();
            $table->string('category')->default('NSS');
            $table->timestamps();
        });

        Schema::create('rankers_placements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('record_type'); // Academic Ranker, Sports Laurel, Placement
            $table->string('name');
            $table->string('programme')->nullable();
            $table->string('year_cohort')->nullable();
            $table->string('achievement');
            $table->string('organization')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rankers_placements');
        Schema::dropIfExists('extension_activities');
        Schema::dropIfExists('institutional_mous');
        Schema::dropIfExists('governance_committees');
    }
}
