# Training PHP CodeIgniter4 Readme and Deployment Guide

Application requirements:
- XAMPP
- Composer

XAMPP configurations:
- XAMPP Control Panel > Apache > Config > Find and edit like these in php.ini:

```ini
extension=intl
extension=mbstring
extension=zip
```

- (optional for customizing document path) XAMPP Control Panel > Apache > Config > Find and edit these as you prefer in httpd.conf:

```conf
DocumentRoot "C:/xampp/htdocs"
<Directory "C:/xampp/htdocs">
```

Makes 'php' recognizable in either Command Prompt or VSCode Terminal (for Windows):
- Control Panel > System > Advanced system settings > Advanced Tab > Environment Variables > System variables Table
- Look for "Path" in Variable column and click it > Edit
- New > Browse > "C:/xampp/php" > OK > OK > OK > Close
- Restart the VSCode and Command Prompt if those are opened

VSCode PHP environment variables settings:
- Open Settings (CTRL + ,)
- fill the box with: php.validate.executablePath
- Edit the settings.JSON file
- Change to look like this: "php.validate.executablePath": "C:/xampp/php/php.exe",
- Save

(First time only, important.) If working on other devices, please install Composer using default settings (all users, without proxy, etc.), Initialize new CodeIgniter4 appstarter project file using Composer on desired empty directory (requires prior XAMPP config. above):
```
composer create-project codeigniter4/appstarter project-folder-name
```
then copy the vendor/ directory into the cloned project directory.

Test the CodeIgniter4 project:
- Locate to the directory where "spark" file is present
- Invoke command "php spark serve" without double-quotes
- CTRL + Click the http:// address or fill in your browser (by default) "http://localhost:8080"

Spark serve direction:
- App.php : baseURL
- Routes.php : get('/', 'Home::index');
- Home.php : index(); view('welcome_message');
- welcome_message.php page.

Database settings used:
- .env : database.default properties (if this uncommented, Database.php will be ignored)
- Database.php : public array $default = []

URI Controller:
- Saved on app/Controllers/ directory
- example page:
-- http://example.com/book/newest/10
-- example is the domain name, book is the controller class name, with function named 'newest' and 10th edition as the arguments

Creating new URI controller example:
- Create php file on app/Controllers/ dir.
```php
<?php

namespace App\Controllers; //as your current dir.

//using your custom class name (as file name) and extending from BaseController as its base
class Book extends BaseController {
    //using index function
    public function index() {
        return view('welcome_message');
    }
}
?>
```

Creating database memo:
- Title: ci4_db
- Table name: books
-id: int, pk, ai
-title: varchar(50)
-author: varchar(50)
-publisher: varchar(50)
-total_pages: int
-book_cover: varchar(50)
-created_at: datetime
-updated_at: datetime

DB Query Command:
```sql
CREATE TABLE `books` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `title` VARCHAR(250) NOT NULL , 
    `author` VARCHAR(100) NOT NULL , 
    `publisher` VARCHAR(100) NOT NULL , 
    `total_pages` INT NOT NULL , 
    `book_cover` VARCHAR(50) , 
    `created_at` DATETIME NOT NULL , 
    `updated_at` DATETIME NOT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
```

(Optional) using Live Server:
- Invoke command:
```
php spark serve
```
- Start Live Server, then Live Server Web Extension
- By default, fill Actual Server Address as:
```
http://localhost:8080/
```
- Reload the page with above address

Using matrix-admin-bootstrap5 on public/templates/ dir:
- [Link to repo.](https://github.com/wrappixel/matrix-admin-bt5)