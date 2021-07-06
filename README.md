# INSTALLATION FOR MAC OS X
- Apache and PHP are included in Mac OS X
- These can be activated using Terminal command prompt

# COMMANDS TO ACTIVATE APACHE ON MAC OS
```bash
    $ sudo su -
    $ apachectl start       # Start httpd service
    $ apachectl stop        # Stop httpd service

```
> or
 ```bash
    $ sudo apachectl start
    $ sudo apachectl stop
    $ sudo apachectl restart # Stops and starts service immediately
 ```

 * Another way of getting it done
    * : Firse navigate to apache directory
        ```bash 
        $ cd /etc/apache2
        $ vi httpd.conf
        ```
        Search "Server Name" in opened vim editor by typing ?Server Name and pressing enter/return
        Then change www.example.com:80 to localhost and remove # sign to uncomment the line starting with searched string
        Now type :wq and hit return. This will exit you from vim editor and now type below command (read comments first).
        ```bash
        $ sudo apachectl restart    # if not a root user
        $ apachectl restart         # if root user
        ```
    * : Then go to your favourite browser and type localhost or 127.0.0.1 and hit return
    * : If you see It works!, then you have successfully activated Apache on Mac OS and if not then, read error resolving file.
