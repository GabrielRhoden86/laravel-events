---------------------------------------------JOBS QUEUE-----------------------------------
Indicados para filas grandes executadas em segundo plano

## 1 - em config\queue.php e .ENV
database
'default' => env('QUEUE_CONNECTION', 'sync') para isso: 'default' => env('QUEUE_CONNECTION', 'database')
.env QUEUE_CONNECTION=database

ou redis
'default' => env('QUEUE_CONNECTION', 'redis'),
QUEUE_CONNECTION=redis
REDIS_HOST=127.0.0.1
REDIS_PORT=6379

## 2 -  criar tabelas jobs
php artisan queue:table

## 3 - php atisan migrate

## 4 - criar uma job
php artisan make:job EnviarEmailUser

## 5- Crie a view emails.blade.php (conteúdo email)

## 6 - criar um controller para cadastrar usuario do sistema
php artisan make:controller ControllerUser
                                                                                                                                             
## 7- implemente seu codigo no controller e no jobs

## 8 - php artisan queue:work database --tries=5

daemon:melhora performance de processamento (cpu)
--tries=5: tentativas após falha

obs: para visualizar a fila trabalhando é só cadastrar os usuários depois roda a fila->
php artisan queue:work --queue=emailBoleto --tries=5

php artisan queue:clear database --queue=emailBoleto  -> limpa fila
