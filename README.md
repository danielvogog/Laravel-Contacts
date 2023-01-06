# Laravel Contacts

A simple Contacts application with basic CRUD.

## Installation

01. Clone the repository
```
git clone https://github.com/danielgogov-github/Laravel_Contacts.git
```

02. Install all composer packages
```
composer install
```

03. Copy the .env.example
```
cp .env.example .env
```

04. Set database, database username and database password
```
DB_DATABASE=laravel_contacts
DB_USERNAME=username
DB_PASSWORD=password
```

05. Generate application key
```
php artisan key:generate
```

06. Do migration
```
php artisan migrate
```

07. Fill the table with data
```
php artisan db:seed
```

08. Run the web server
```
php artisan serve
```

09. Visit http://localhost:8000

## Features
01. Show all contacts
02. Create a new contact
03. Update a contact
04. Delete a contact
05. Set the notifications type

## Screenshots 

`Show all contacts`
![Show all contacts](readme/all_contacts.png)

`Create a new contact`
![Create a new contact](readme/create_contact.png)

`Delete a contact`
![Delete a contact](readme/delete_contact.png)

`Deleted contact`
![Deleted contact](readme/deleted_contact.png)
