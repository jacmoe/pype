![](https://raw.githubusercontent.com/jacmoe/pype/master/pype.png)
Personal Yii Page Engine


A live instance of Pype can be seen here: [pype.jacmoe.dk](https://pype.jacmoe.dk)

This is a minimal wrapper application for the [yii2-mdpages-module](https://github.com/jacmoe/yii2-mdpages-module) which serves static markdown documents from a separate Git repository.

The goal is to create a small, fast and versatile flat-file engine that is suitable for serving blogs, wikis and personal websites.

The application should be easy to upgrade and manage.

[Deployer](http://deployer.org/) is used for deployment, and [Flywheel](https://github.com/jamesmoss/flywheel) is used for temporary storage of processed documents.

And, last - but not least: Pype is powered by the [Yii Framework](http://www.yiiframework.com/)


## Work In Progress !!

### Preliminary installation instructions:

Create `deployer/stage/servers.yml` using `deployer/stage/servers.yml.sample`as a guide.

Run `dep deploy production`

Shell into the production server - go to `SITE_ROOT/current/`and run `./yii mdpages/pages/init`

## TODO

Stop hard-coding the yii2-mdpages-module so that other people can install it :)
