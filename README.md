# ObservationFailureFilter
#### BA Project by Meret Fischli
- Concept, Design and Project by [Meret Fischli](https://www.instagram.com/meretfischli/)
- Interaction Design & Development by [Fernando Obieta](https://fernando-obieta.com)

![OFF](https://be.fernando-obieta.com/wp-content/uploads/2019/09/off01.png)
![OFF - animated](https://be.fernando-obieta.com/wp-content/uploads/2019/09/off.gif)

## Installation

To deploy this site, your server needs:

- [Git](https://git-scm.com/)
- [php](https://php.net/) (7.1 or greater)
- [mySQL](https://www.mysql.com/)

To work on this project, your computer needs:

- [NodeJS](https://nodejs.org/en/) (0.12 or greater)
- [Git](https://git-scm.com/)
- [php](https://php.net/) (7.1 or greater)
- [mySQL](https://www.mysql.com/)

### Setup Server
Create a mySQL database with a table named `offuploads`. The needed model you'll find in the `db-setup.sql` file.
Clone the project on the server, duplicate the `secret-example.php` file, rename it to `secret.php` and fill in the needed credentials:

```php
$DB_URL = "";
$DB_USER = "";
$DB_PW = "";
$DB_NAME = "";
```

### Setup Project

To manually set up the template, first download it with Git:

```bash
git clone git@github.com:blank-tree/offfffffffffff.git
```

Then open the folder in your command line, and install the needed dependencies:

```bash
cd offfffffffffff
npm install
```

Finally, run `npm start` to run the Sass compiler. It will re-run every time you save a Sass file.
