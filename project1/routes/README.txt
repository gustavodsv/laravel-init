// REQUISITOS

- Instalação do PHP 7.2+
- Instalação do Composer (path)
- Instalação do Laravel
	1ª opção (instalar laravel global e criar pasta dos projetos individualmente
	instalação: composer global require laravel/installer
	criação do projeto: laravel new {nome da nova pasta}

	2ª opção (instalar laravel e criar pasta do projeto com suas dependências
	baixar e instalar: composer create-project laravel/laravel {nome da nova pasta}

	execução do projeto: php artisan serve

// extenções necessarias 

- bcmath, ctype, json, mbstring*, openssl, pdo*, tokenizer, xml*, fileinfo 

// execução do php

- WAMP, WAMPP, MAMP ou Homestead que roda junto com (vagrant + VirtualBox/WMware)
- o próprio PHP usado na linha de comando também é uma opção. (path)


// generate key
É necessario gerar uma chave após a criação de um novo projeto
	comando: php artisan key:generate

	cria um hash(APP_KEY) na pasta .env

// Criação de Controller
	- cria um novo controller que extends Controller.php
	- precisa do composer 
		comando: composer install

	comando: php artisan make:controller [name]Controller
	code:	Route::get('/{name}', [App\Http\Controllers\{name}Controller::class, 'index'])->name('home');

// DADOS GLOBAIS
 app\Providers\ AppServiceProvider.php [ function boot() ]

// CONFIGURAÇÃO DE LOGIN NO DATABASE
 arquivo .env

// Controller --resource
	cria um controller com estrutura do crud ja montada

	comando: php artisan make:controller [name]Controller --resource
	linha de código{Route}: Route::resource('[name]', '[name]Controller');

// Controllers pré definidos para Autenticação
	comando1: composer require laravel/ui --dev
	comando2: php artisan ui vue --auth
	
	create-> HomeController/ home.blade.php/ route[/home]
	create-> layouts/ app.blade
	create-> View[auth] / Controller[auth]
		
// Route [middleware] ->middleware("auth");
	direciona o usuario para a Route '/login',  caso nao exista nenhuma sessão


// REQUEST
	$request->url(); -> url [/config]
        $request->method(); -> method [GET]

            # ALL - pega do Body e da URL
            
            # INPUT - prioriza os dados do Body, se não tiver, ele pega da URL

            # QUERY - não pega dados do Body, apenas da URL

            # if data not exist
            $dataQueryCity = $request->query('city', 'São Paulo');
            print_r($dataQueryCity);

            # HAS - if it was set
            if($request->has('city')) {
                echo "HAS State <br>";
            } else {
                echo "DONT has State <br>";
            }

            # FILLED - if it was set AND if it is filled
            if($request->filled('age')) {
                echo "HAS age";
            } else {
                echo "DONT has age";
            }

            # MISSING - if it was set And if it is not filled in
            if($request->missing('state')) {
                echo "<br>State = São Paulo";
            }

	    # ONLY - take only - []

            # EXCEPT - take all, except - []

// CSRF
	- (CSRF) - Cross site request forgery 
	- METHOD - post
	- [_token] - new item array 

// Dados Globais
	folder [providers]

// condicionais [~blade]
  ______________________________________________________________________________
 |if. elseif. else.	|if exist		| if exist and if filled	|
 |			|			|				|
 |	@if(...)	|	@isset(...)	| 	@empty(...)		|
 | 	 - ...		|	 - ...		|  	 - ...			|
 |	@elseif(...)	| 	@endisset	|	@endempty		|
 |	 - ...		|			|				|
 |	@else		|_______________________|_______________________________|				
 |	 - ...		|
 |	@endif		|
 |______________________|

// loops [~blade]
	
  ______________________________________________________________________________________________________________
 | WHILE		|FOR			|FOREACH			|FORELSE			|
 |	@while		|	@for(...)	|	@foreach(... as ....)	|	@forelse(... as ....)	|
 |	 - ...		|	 - ... <br>	|	 - ...			|	 - ...			|
 |	@endwhile	|	@endfor		|	@endforeach		|	@empty			|
 |______________________|_______________________|_______________________________|	 - ...			|
										|	@endforelse		|
										|_______________________________|

// Requireds - validate forms
________________________________________________________________________________________________________
@Controller					|@blade							|
	$request->validate([ 			|	@if($errors->any())				|
            'title' => ['required', 'string']	|	<x-alert>					|
        ]);					|		@foreach($errors->all() as $error)	|
						|			{{ $error }} <br>		|
						|		@endforeach				|
						|	</x-alert>					|
        					|	@endif						|
________________________________________________|_______________________________________________________|
            
   
_________________________________________________________________________________________________________________

LARAVEL CRUD - Query Builder

# CREATE
	DB::insert("INSERT INTO todo (title, date) VALUES (:title, :date)", [$title, $timestamp]);

# READ
	DB::select('SELECT * FROM todo');

	DB::select('SELECT * FROM todo WHERE status = ? OR status = ?', [0, 1]);

	DB::select('SELECT * FROM todo WHERE status = status', [
		'status' => 0
	]);

# UPDATE
	DB::update('UPDATE todo SET title = :title WHERE id = :id', [
                'id' => $id,
                'title' => $title
        ]);

# DELETE
	DB::delete('DELETE FROM todo WHERE id = :id', [
            'id'=>$id
        ]);

_________________________________________________________________________________________________________________

Eloquent ORM
* nome da tabela no singular
* comand: php artisan make:model Todo
* definir configurações do banco de dados no model.Todo
	protected $table = 'todo'; //default (table): Todos
    	protected $primaryKey = 'id'; //default (PK): 'id'
    	public $incrementing = true; // default (incrementing PK): true
    	protected $keyType = 'string'; //default (type PK): 'int' 

    	# created_at, updated_at
    	public $timestamps = false; // default: true

    	# replace name of existing columns
    	const CREATED_AT = 'date_created';
    	const UPDATED_AT = 'date_updated';

@controller
	Todo::all(); // use foreach
	Todo::find(2); // id 2(PK)
	Todo::where('status', 0)->get(); // use foreach
	Todo::where('status', 0)->orWhere('title', 0)->first(); // use foreach
	Todo::where('status', 0)->first(); // 1 item
	Todo::where('status', 0)->count; //count items = 0

LARAVEL Eloquent
* import: use App\Models\Todo;

# CREATE
	$newTodo = new Todo;
	$newTodo->title = $title;
	$newTodo->save();

# READ
	$list = Todo::all();	
	$list = [ 'list' => $list ];

# UPDATE
	Todo::find($id)->update(['title' => $title]);

# DELETE
	@model-> protected $fillable = ['title'];
	Todo::find($id)->delete();





