# NolanTech

A fake company's website.

## Technologies

- [Contenta CMS](https://www.contentacms.org/)
- [Gridsome](https://gridsome.org/)
- [Lando](https://docs.devwithlando.io/) This project was created using version v3.0.0-rc.13

## Local Setup

1. Make sure to have Lando installed
2. Clone this repo
3. Run: `chmod u+x startup` from the root of the directory
4. Then simply run `lando start` from within each the contenta and gridsome folders. (Working on a bash script)
  - __For the first time you set up this site__, navigate to the contenta folder from a command line and run `lando drush si --db-url=mysql://drupal8:drupal8@database/drupal8`
    - This will install the drupal site using the lando's default credentials. Once completed, it will output your admin credentials to the console.
  - __For the first time you set up this site__, navigate to the gridsome folder and run `lando yarn install` to install dependencies.
  - To startup the frontend, run `lando develop`. This will startup gridsome's development server.
  - When necessary, `lando gridsome` has also been made available to run gridsome's cli commands.

### Available URLS
Contenta Backend: [https://nolantech.lndo.site/](https://nolantech.lndo.site/)
Gridsome-generated Site: [https://nolantechapp.lndo.site/](https://nolantechapp.lndo.site/)
GraphSQL Playgroud: [https://nolantechapp.lndo.site/___explore](https://nolantechapp.lndo.site/___explore)
