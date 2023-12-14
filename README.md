# Training PHP CodeIgniter4 Readme

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

Initialize new CodeIgniter4 appstarter project file using Composer (requires prior XAMPP config. above):
```
composer create-project codeigniter4/appstarter project-folder-name
```
