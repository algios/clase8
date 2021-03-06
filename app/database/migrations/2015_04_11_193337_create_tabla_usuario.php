<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaUsuario extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuario', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->string('correo');
			$table->string('password');
			$table->timestamps();
                        $table->rememberToken();
                        
                        
		});
		Schema::create('publicacion', function(Blueprint $table)
		{
			$table->increments('id');
			$table->longText('publicacion');
			$table->boolean('tipo');
			$table->integer('padre')->unsigned()->nullable();
                        $table->integer('user_id')->unsigned();
                        $table->integer('receptor')->unsigned();
			$table->timestamps();
                        $table->foreign('user_id')->references('id')->on('usuario');
                        $table->foreign('receptor')->references('id')->on('usuario');
                        $table->foreign('padre')->references('id')->on('publicacion');
                        
		});
		Schema::create('me_gusta', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->integer('user_id')->unsigned();
                        $table->integer('publicacion_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('usuario');
			$table->foreign('publicacion_id')->references('id')->on('publicacion');
                        $table->timestamps();
                        
                        
		});
                
                DB::table('usuario')
                        ->insert([
                            'nombre'=>'Alejo',
                            'correo'=>'luisospina15@gmail.com',
                            'password'=>Hash::make('123')
                            
                            
                        ]);
                DB::table('usuario')
                        ->insert([
                            'nombre'=>'Luis',
                            'correo'=>'laospinag@unal.edu.co',
                            'password'=>Hash::make('456')
                            
                            
                        ]);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('me_gusta');
		Schema::drop('publicacion');
		Schema::drop('usuario');
		{
			//
		};
	}

}
