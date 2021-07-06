# DEFAULT DIRECTORY OF APACHE : DOCUMENTS FOLDER
- This directory is where you will place all your files and folders of your PHP project
    ```bash
       $ cd /Library/WebServer/Documents/
       $ chmod 777 /Library/WebServer/Documents     # This will unlock default directory to user directories
    ```

- Now to put your personal files into default directory of Apache i.e Documents folder, follow below steps:
* Navigate to home directory and create a new directory Sites
    * : Commands should be executed after reading comments
        ```bash
            $ cd ~          # Navigate to home directory
            $ mkdir Sites   # Reserved folder name and safari icon will come on folder
            $ cd Sites      # Navigate to Sites folder
            $ touch index.html.en   # Create a default index html file with english language
        ```
    * : Now edit httpd.conf file to configure apache as a super user
        ```bash
            $ sudo vi /etc/apache2/httpd.conf   # Use your computer password to enter vim as super user
        ```
        > Now, Search for 'mod_userdir.so' by using <strong>?mod_userdir.so</strong> staying in command mode and uncomment the line by entering to insert mode by pressing <strong>"i"</strong> on keyboard and removing # from starting of line.
        **NOTE** : If --INSERT-- is written at the bottom of the screen inside vim editor, then you are in insert mode. To get in command mode, press "Esc" key.
        > Search again for a different string 'httpd-userdir.conf' using same steps as above and uncomment the line by remove # sign again.
        > Exit insert mode and type :wq to write changes to the httpd.conf file and exit it after saving the changes.
        Now, you need to edit one more file
        ```bash
            $ sudo vi /etc/apache2/extra/httpd-userdir.conf     # Enter your password after giving this command
        ```
        and search for '*.conf'. Uncomment this line and save the file as mentioned above for httpd.conf file.
        ```bash
            $ cd /etc/apache2/users         # To create a user config file
            $ ls                            # To check if any user is present
            $ sudo vi your_username.conf    # in my case its sunny.conf
            # Your user name will be visible on Terminal after tild (~) sign
        ```
        > Copy the text below and paste it but please note "Edit your custom directory path" before saving
        ```text
        <Directory "Your/Path/to/project/directory/starting/from/Users/directory">
            Options Indexes Multiviews
            AllowOverride None
            Require all granted
        </Directory>
        ```
        > Exit insert/edit mode and type ":wq" to save your changes and exit vim editor.
        > Restart apache
        ```bash
            $ sudo apachectl restart    # To reset all settings changed
        ```
        And you are done. These are the only changes you need to activate user defined directory project.
        > Go to your browser now and type in localhost/~user_name and hit return
    * : Edit your index.html.en file using Text Editor or your favourite code editor and changes will be reflected on your browser.