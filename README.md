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