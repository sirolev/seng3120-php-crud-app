# seng3120 php crud app
This application allows you to create and view employee records

#### How to run
1. Clone this repository
    * `git clone https://github.com/sirolev/seng3120-php-crud-app.git`
2. Change directory
    * `cd seng3120-php-crud-app`
3. Launch vagrant
    * `vagrant up`
4. After the vagrant VM's are up an running, open the folowing address in a browser
    * http://localhost:5555/alex
5. After you are done, run the following command to shutdown the app and delete VM's
    * `vagrant destroy` 

#### Other Information
Web files are located in `shared/src/public/alex` 
The reason they are in the shared vagrant folder is to allow for seamless development. You can edit the files from your host machine and they will automatically be updated in the VM. To view changes simply refresh the browser page.