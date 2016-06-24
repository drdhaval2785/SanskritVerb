#SanskritVerb

Verb declension for Sanskrit

To understand how the code is organized, please read [this](https://github.com/drdhaval2785/SanskritVerb/blob/master/Documentations/understandcode.md).

Please note that as of v1.2.0, the code from [`drdhaval2785/SanskritSubanta`](https://github.com/drdhaval2785/SanskritSubanta) for subanta generation is now actively maintained here.

Research paper on subanta generator presented at 16th World Sanskrit Conference - [Here](http://www.sanskritworld.in/index/detailview/book_id/prakriyapradarshini).

##For using the code online:

* Use http://www.sanskritworld.in/sanskrittool/SanskritVerb/tiGanta.html for tiGanta generation (Verb conjugation.)
* Use http://www.sanskritworld.in/sanskrittool/subanta.html for subanta generation.
* Use http://www.sanskritworld.in/sanskrittool/sandhi.html for sandhi generation.

##For using the code offline on your computer:

1. Download the latest version of XAMPP from https://www.apachefriends.org/index.html

2. Install XAMPP.

3. Install Git from https://git-scm.com/downloads.

4. Locate XAMPP directory. Usually it is `c://xampp`.

5. Right-click on `xampp-control.exe` and select 'Run As Administrator'. (For steps 5-8, if in doubt, please see [this](http://stackoverflow.com/questions/20960296/how-to-start-apache-and-mysql-automatically-when-windows-8-comes-up))

6. In the right-top corner, click on '**Config**'.

7. Tick **Apache**, **FileZilla**, **Tomcat**, **MySQL** and **Mercury** in '**Autostart of modules**' section.

8. Click '**Save**'.

9. Close '**XAMPP Control Panel**'.

10. go to `xampp/htdocs` directory.

11. Copy [`install.sh`](https://github.com/drdhaval2785/SanskritVerb/blob/master/install.sh) in that directory.

12. Click on `install.sh`. This will fetch the latest code and data for local usage.

This is a one time exercise. Once you have installed the code, you should only open your browser (Firefox, Chrome, Internet Explorer, etc.) and type `localhost/Sanskrit/tiGanta.html`.

This will give you frontend to interact with the machine.

##Changelog

**v1.0.0** - 2 August 2015 - Initial release

**v1.0.1** - 5 October 2015 - Major Bug Fixes

**v1.1.0** - 17 October 2015 - Time Optimization

**v1.1.1** - 26 October 2015 - All inline issues from `tiGanta.php` and `function.php` noted as Github issues for easier tracking.

**v1.1.2** - 7 November 2015 - Code separated into Data, Documentations, scripts, testing and output folders and necessary corrections made in the code.

**v1.2.0** - 12 January 2016 - Merged SanskritSubanta code into SanskritVerb. Now there is only one code `panini.php` which gives subanta / tiGanta / sandhi etc depending on the input HTML file.

**v1.3.0** - 22 January 2016 - Commentaries available for local viewing.

**v1.4.0** - 3 February 2016 - Option to deactivate some sUtras of Paninian grammar, to understand its importance in the structure of **aSTAdhyAyI**.

**v1.5.0** - 21 February 2016 - The code is tested for representative verbs and suspect verb forms are corrected.

**v1.6.0** - 21 February 2016 - The code now has three commentaries — **mAdhavIyadhAtuvRtti**, **kSIrataraGgiNI** and **dhAtupradIpa** — for offline viewing.

**v1.6.1** - 12 March 2016 - The code is tested for representative verbs from **siddhAntakaumudI** (round 2) and suspect verb forms are corrected.

**v1.7.0** - 13 March 2016 - Decide which sUtra bars which sUtras.

**v1.8.0** - 20 March 2016 - Added **bhAvavAcya**, **karmavAcya**, **karmakartRvAcya**, **Nijanta** and **yaGanta** forms.

**v1.9.0** - 26 March 2016 - Added **yaGluganta** and **sannanta** forms.

**v1.10.0** - 19 June 2016 - Tested the output against [UoHyd](http://sanskrit.uohyd.ac.in/scl/) and [INRIA](http://sanskrit.inria.fr/DATA/XML/SL_morph.tar.gz) databases. All differences accounted for.
