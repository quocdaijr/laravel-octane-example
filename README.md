
# An example of Laravel Project use Octane and Swoole

## Step
```bash
cd /var/www/html/octane-example/
cp .env.example .env
cp docker/nginx/conf.d/default.conf.example docker/nginx/conf.d/default.conf
```
Update .env file, default.conf to suit your environment
```bash
docker-compose up
```

Try access to http://localhost:8000 or http://localhost:8000/api/example (if not use nginx)

Try access to http://localhost or http://localhost/api/example (if use nginx)

## Note
#### Local Development
Use --watch to auto reload when file change

This repo run on port 8000
```bash
php artisan octane:start --watch --port=8000
```

#### Production
Remove npm install in Dockerfile and if use repo for api 
and no auto reload when file change (no need install ``chokidar`` packages)
```bash
php artisan octane:start
```