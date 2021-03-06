# **INSTALLATION FOR MAC OS X**
- Apache and PHP are included in Mac OS X
- These can be activated using Terminal command prompt

## Commands and Steps to activate APACHE on MAC OS
```bash
$ sudo su -
$ apachectl start       # Start httpd service
$ apachectl stop        # Stop httpd service

```
or
```bash
$ sudo apachectl start
$ sudo apachectl stop
$ sudo apachectl restart # Stops and starts service immediately
```

 * Another way of getting it done
    * : First navigate to apache directory
        ```bash 
        $ cd /etc/apache2
        $ vi httpd.conf
        ```
        - Search "Server Name" in opened vim editor by typing ?Server Name and pressing enter/return.
        - Then change www.example.com:80 to localhost and remove # sign to uncomment the line starting with searched string.
        - Now type :wq and hit return. This will exit you from vim editor and now type below command (read comments first).
        ```bash
        $ sudo apachectl restart    # if not a root user
        $ apachectl restart         # if root user
        ```
    * : Then go to your favourite browser and type localhost or 127.0.0.1 and hit return
    * : If you see It works!, then you have successfully activated Apache on Mac OS and if not then, read error resolving file.

## Commands and Steps to activate PHP on MAC OS
- The first thing you have to do is to edit a file called `httpd.conf` as super user using below command:
    ```bash
    $ sudo vi /etc/apache2/httpd.conf   # This is a vim editor that comes with Mac OS pre-installed
    ```
- In this file, search the keyword `php` by pressing **?** followed by the word php --> `?php` <-- like this.
- Uncomment the line by removing pound(#) sign at the beginning by pressing **i** to get into insert mode. It should look like this example below:
    ```text
    # LoadModule php7_module libexec/apache2/libphp7.so
    ```
- Now press `Esc` and enter `:wq` to close while saving the changes to the file.
- Next we need a configuration file inside /private/etc
- Now copy the file `php.ini.default` to the new file named `php.ini`, which can be done using Terminal command as a super user
    ```bash
    $ sudo cp php.ini.default php.ini   # This will create a new file php.ini and copy the content of .default
    ```
- To output your error on the screen of your browser: (Optional)
    ```bash
    $ sudo vi php.ini
    ```
- Search for the keyword `display_errors` and press `n` if it does not equals off, that means we are searching next occurrence of `display_errors = off` and switch to `on`
- Save the changes to file using same vim command mentioned earlier.
- Restart the apache server and you are done.
> **NOTE:** You can now place your PHP files in either system wide `/Library/WebServer/Documents` folder or inside your personal folder that we named `Sites`.

# **INSTALLATION FOR WINDOWS**
- Go to url https://apachelounge.com/download and download fully compiled installer zip file according to your architecture type i.e. x86 or x64 or arm64.
- Also download latest Visual Studio Redistributable from this link https://support.microsoft.com/en-us/topic/the-latest-supported-visual-c-downloads-2647da03-1eea-4433-9aff-95f26a218cc0.
> **NOTE:** Visual Studio Redistributable provided here in the link takes you to latest version available for download. If you see any other version except latest, then please Google it.

## Installation of Visual Studio Redistributable
- Open the zip file or the file you have just downloaded and double-click the icon with name starting "vc_redist_x86/x64/arm64.exe" and you will see Install button. 
> **NOTE:** If you see repair or Uninstall button, then you already have it on your system. You can upgrade previously installed version if it is not latest.
- Click on Install and you are done.

## Installation of APACHE on WINDOWS
1. Open your zip file and open another window with ` C: ` drive opened.
2. Drag Apache folder into the C: drive folder and rename it as `apache`.
> **NOTE:** You can leave folder name unchanged too. It doesn't matter a lot.
3. This installs apache on your windows system. Follow next steps to Configure apache.

## Configuration of APACHE on WINDOWS
- Go to `conf` directory in apache directory and look for file httpd.
- Open the file in your favourite editor.
- Now search for `Apache24`, and replace it with the directory name you placed in Step 2 from `Installation Steps on Windows`.
- Next, search for `ServerName`. Remove pound(#) sign at the beginning and replace www.example.com:80 with `localhost` and save the file `httpd`.
- To run apache server you just installed and configured, right click on windows icon in bottom-left corner, and select PowerShell with admin option.
- Now, run httpd.exe file using this command
    ```bash
    PS C:\apache\bin> .\httpd.exe       # Navigate using command cd apache\bin if in C: drive
    ```
- If you are not in `C:` drive, then change directory to `C:` to navigate further to apache folder using command
    ```bash
    PS C:\Windows\System32> cd C:\      
    ```
    > **NOTE:** This may or may not be your current directory but this command will change your directory to `C:` drive
    
- Now, Go to your favourite browser and enter address `http://localhost`. Hit enter and you will see `It works!`, which means your apache server is running.
- To stop the server, go to command prompt and press `Ctrl+C`. This will stop the apache server.
- If you don't want to start your server everytime by going to bin directory again and again, you can install it in your system services.
- Follow these steps to install the apache service to your system:
    1. Open powershell (Right-click windows icon in taskbar and select powershell admin) and change directory to `apache\bin` as mentioned above and write below command:
        ```bash
        PS C:\apache\bin> .\httpd.exe -k install    # use uninstall to remove
        ```
    2. To start the apache service now, open your powershell(Admin) and enter command:
        ```bash
        C:\> net start Apache2.4    # Check the service name in Control pannel's View Service option
        ```
    3. To stop the apache service, enter command:
        ```bash
        C:\> net stop Apache2.4
        ```
    `OR`
- Open directory `apache` in `C:` drive, open `bin` directory in it and click on Address bar below Tool bar in windows explorer.
- Now type in Address bar `cmd` and hit enter. This will open a command prompt with bin directory as its current directory. You will see something like this:
    ```sh
    C:\apache\bin>
    ```
- Now, run httpd.exe file using this command
    ```bash
    C:\apache\bin> .\httpd.exe
    ```
- Go to your favourite browser, type `http://localhost` and hit enter. If it displays **`It works!`**, then you have successully installed and configured your apache server.


## Installation of PHP on WINDOWS
- Go to url `https://windows.php.net/download/` and download thread safe zip file and extract to `C:\php` folder.
- Open the extracted folder and find `php8apachex_x.dll`. Copy the path of this file by clicking on address bar and pressing `Ctrl+C`.
- Open `httpd.conf` file inside `C:\apache\conf` folder in a text editor of your choice and add these lines at the end of the file:
    ```text
    LoadModule php_module "path/to/.dll/file/copied/above"
    AddHandler application/x-httpd-php .php
    PHPIniDir "C:/php"
    ```
- If your directory of php is same as mentioned in here then `php_module` path will be `C:/php/php8apache2_4.dll`. Double quotes will not be removed.
- Add these lines exactly at the end of file. Just copy paste these lines and edit the first line only. Save and close the file now.
- Go to php directory in `C:` drive and find `php.ini-development` file. Copy the file using `Ctrl+C`, paste it using `Ctrl+V` in the same folder you are currently in and rename the file to **`php.ini`**. If promted, press Yes button. This is a starting initialisation file.
- Create a new file using any editor inside any folder and paste this code inside it. Name the file `phpinfo.php`
   ```php
   <?php phpinfo(); ?>
   ```
- This is will install PHP on your Windows machine. Now you can test your php files by running Apache server using command prompt and placing php files inside htdocs folder in `C:\apache\` directory. Then go to browser and open `http://localhost/phpinfo.php` to test above code and hit enter. You will see a lot of PHP info inside blue-white table.
