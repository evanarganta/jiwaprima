<br><p align="center"><img src="public/images/logo.png" alt="jiwaprima" width="90%"></p>

<br>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-13-FF2D20?style=flat&logo=laravel&logoColor=white" alt="Laravel 13">
  <img src="https://img.shields.io/badge/PHP-8.3%2B-777BB4?style=flat&logo=php&logoColor=white" alt="PHP 8.3+">
  <img src="https://img.shields.io/badge/Composer-2.2%2B-885630?style=flat&logo=composer&logoColor=white" alt="Composer 2.2+">
  <img src="https://img.shields.io/badge/MySQL-8.0%2B-4479A1?style=flat&logo=mysql&logoColor=white" alt="MySQL 8.0+">
  <img src="https://img.shields.io/badge/Node.js-%26_NPM-339933?style=flat&logo=node.js&logoColor=white" alt="Node.js & NPM">
  <img src="https://img.shields.io/badge/License-MIT-blue?style=flat" alt="MIT License">
</p>

<br>

<p align="center">A Laravel 13 school management system for managing teachers, students, and subjects, featuring an industrial retro-arcade interface styled after ULTRAKILL.</p><br><br>

<img width="100%" alt="gambar" src="https://github.com/user-attachments/assets/c310f070-3bc1-4c0f-8c8e-301eb20f29a6" />

<br><br><h3>1. Clone the repository.</h3>
<pre><code>git clone https://github.com/evanarganta/jiwaprima.git
cd jiwaprima
</code></pre>

<h3>2. Install dependencies.</h3>
   <pre><code>composer install</code></pre>

<h3>3. Configure the environment.</h3>
<pre><code>cp .env.example .env</code></pre>

   <pre><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=jiwaprima
DB_USERNAME=root
DB_PASSWORD=</code></pre>

<h3>4. Generate the application key.</h3>
<pre><code>php artisan key:generate</code></pre>

<h3>5. Run migrations and seed the database.</h3>
<pre><code>php artisan migrate --seed</code></pre>
<pre><code>php artisan migrate:refresh --seed</code></pre>

<h3>6. Start the server.</h3>
<pre><code>php artisan serve</code></pre>

   <br><p align="center">Open `http://localhost:8000` or `http://127.0.0.1:8000` in your browser.</p>
