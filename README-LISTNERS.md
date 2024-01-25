
---------------------------------EVENT LISTNERS-----------------------------------
implemente essa classe no listener: implements ShouldQueue 

## 1 - em config\queue.php
## 2 'default' => env('QUEUE_CONNECTION', 'sync') para isso: 'default' => env('QUEUE_CONNECTION', 'database')
## 3 .env QUEUE_CONNECTION=database
## 4 php artisan queue:table   
    Cria a tabela jobs 
## 5 php artisan migrate       
    Implementa no db
## 6  php artisan queue:work    

 Obs: é possivel criar mais de um listener para um evento
 Obs: Em produção execute event:cache e para limpar o cache event:clear


