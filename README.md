# Training PHP CodeIgniter4 Readme and Deployment Guide

Application requirements:
- XAMPP
- Composer

XAMPP configuration:
- XAMPP Control Panel > Apache > Config > Find and edit php.ini file:

```ini
extension=intl
extension=mbstring
extension=zip
```

- (optional, if you want to work on a ci4 framework project other than the "c:/xampp/htdocs" folder) Go to XAMPP Control Panel > Apache > Config > find and change the path as you wish inside httpd.conf configuration file:

```conf
DocumentRoot "C:/xampp/htdocs"

<Directory "C:/xampp/htdocs">
```

Database configuration:
Files used in database settings:
- .env : database.default properties on line 34 (if this gets uncommented, the "Database.php" file will be ignored)
- app/Config/Database.php, look for the section: public array $default = [...

MYSQL section, local database configuration for the first time:
- Title: ci4_db
- Table name: books
-id: int, pk, ai
-title: varchar(250)
-author: varchar(100)
-publisher: varchar(100)
-total_pages: int
-book_cover: varchar(50)
-created_at: datetime
-updated_at: datetime

Database Query Command:
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

(Optional) using the Live Server:
- Invoke command:
```
php spark serve
```
- Start Live Server, then Live Server Web Extension (you can get it from related browser extension store)
- By default, fill Actual Server Address as:
```
http://localhost:8080/
```
- Reload the page with above address to see the effects

-----
# Troubleshooting
Makes 'php' recognizable in either Command Prompt or VSCode Terminal (for Windows):
- (On Windows) Head to "Control Panel > System > Advanced system settings > Advanced Tab > Environment Variables > System variables Table"
- Look for "Path" in Variable column and click it > then choose Edit
- Select "New > Browse > "C:/xampp/php" > OK > OK > OK > Close"
- Restart the VSCode and Command Prompt if those are already opened, to see the effects.

VSCode PHP environment variables settings:
- Open Settings (or by using keyboard shortcut, CTRL + ,)
- fill in the box with: php.validate.executablePath
- Edit the "settings.JSON" file
- If the JSON file don't already have this, then edit to look like this: 
```json
"php.validate.executablePath": "C:/xampp/php/php.exe",
```
- Save the JSON file

(First time only, important.) If working on other devices, please install Composer using default settings (all users, without proxy, etc.), Initialize new CodeIgniter4 appstarter project file using Composer on desired empty directory (requires prior XAMPP config. above):
```
composer create-project codeigniter4/appstarter project-folder-name
```
Then copy the "vendor/" directory into the cloned project directory. And then install the XAMPP control panel with the appropriate configuration above, and start the Apache and MySQL modules to link the framework with the required local database.

Test the CodeIgniter4 project:
- Locate to the directory where "spark" file is present
- Invoke command "php spark serve" without double-quotes
- CTRL + Click the http:// address or fill in your browser (by default) "http://localhost:8080"
- Start the XAMPP Control Panel, then activate the Apache and MySQL modules.

-----
# External links and resources
Used matrix-admin-bootstrap5 as the page template, on the "public/templates/" directory:
- [Link to repo.](https://github.com/wrappixel/matrix-admin-bt5)

-----
# This is the section for those of you who want to know more about the CI4 Framework
URI Controller:
- Saved on the "app/Controllers/" directory
- example page:
-- http://example.com/book/newest/10
-- example is the domain name, book is the controller class name, with function named 'newest' and 10th edition as the arguments

How to create a new URI controller, for example:
- Create your custom php file on the "app/Controllers/" directory.
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

'php spark serve' command flow:
- App.php : baseURL
- Routes.php : get('/', 'Home::index');
- Home.php : index(); view('welcome_message');
- welcome_message.php page.