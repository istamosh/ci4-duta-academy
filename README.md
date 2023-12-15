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