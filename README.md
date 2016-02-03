SanskritVerb
============

Verb declention for Sanskrit

#For using the code online: 

Use http://www.sanskritworld.in/sanskrittool/SanskritVerb/tiGanta.html for tiGanta generation (Verb conjugation).

#For using the code offline on your computer: 

1. Download the latest version of XAMPP from https://www.apachefriends.org/index.html 

2. Install XAMPP. 

3. Install Git from https://git-scm.com/downloads .

4. Locate XAMPP directory. Usually it is c://xampp 

5. Right-click on xampp-control.exe and select 'Run As Administrator'. (For steps 5-8, if in doubt, please see [this](http://stackoverflow.com/questions/20960296/how-to-start-apache-and-mysql-automatically-when-windows-8-comes-up))

6. In the right-top corner, click on 'Config'.

7. Tick Apache, FileZilla, Tomcat, MySQL and Mercury in 'Autostart of modules' section.

8. Click 'Save'.

9. Close 'XAMPP Control Panel'.

10. go to xampp/htdocs directory. 

11. Copy [install.sh](https://github.com/drdhaval2785/SanskritVerb/blob/master/install.sh) in that directory.

12. Click on install.sh. 

13. This will fetch the latest code and data for local usage.

This is a one time exercise. Once you have installed the code, you should only open your browser (Mozilla / Chrome / IE etc.) and type localhost/Sanskrit/tiGanta.html.

This will give you frontend to interact with the machine.

##For offline usage - 

Please run localhost/Sanskrit/tiGanta.html from your browser.

# Versions

v1.0.0 - 2 August 2015 - Initial release

v1.0.1 - 5 October 2015 - Major Bug Fixes

v1.1.0 - 17 October 2015 - Time Optimization

v1.1.1 - 26 October 2015 - All inline issues from tiGanta.php and function.php noted as Github issues for easier tracking.

v1.1.2 - 7 November 2015 - Code separated into Data, Documentations, scripts, testing and output folders and necessary corrections made in the code.

v1.2.0 - 12 january 2016 - Merged SanskritSubanta code into SanskritVerb. Now there is only one code 'panini.php' which gives subanta / tiGanta / sandhi etc depending on the input HTML file.

v1.3.0 - 22 January 2016 - Commentaries available for local viewing.

v1.4.0 - 3 February 2016 - Option to deactivate some sUtras of Paninian grammar, to understand its importance in the structure of Astadhyayi.

# For understanding the code

Read [this](https://github.com/drdhaval2785/SanskritVerb/Documentations/blob/master/understandcode.md)
