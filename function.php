<?php
/* This code is developed by Dr. Dhaval Patel (drdhaval2785@gmail.com) of www.sanskritworld.in and Ms. Sivakumari Katuri.
  * Layout assistance by Mr Marcis Gasuns.
  * Available under GNU licence.
  * Version 1.1 date 17/11/2013
  * The latest source code is available at https://github.com/drdhaval2785/sanskrit
  * For setup, copy and paste sandhi.html, sandhi.php, function.php, mystyle.css, slp-dev.php and dev-slp.php to your localhost and server and run sandhi.html.
  * sandhi.html is the frontend for the code.
  * function.php stores the frequently used functions in this code (The description on how to use the code is there in function.php.
  * slp-dev.php is for converting SLP1 data to Devanagari. dev-slp.php is for converting Devanagari data to SLP1.
  * Mystyle.css is stylesheet where you can change your preferences.
  */

/* Defining grammatical arrays */
$shiv=array("a","i","u","-R","f","x","-k","e","o","-N","E","O","-c","h","y","v","r","-w","l","-R","Y","m","N","R","n","-m","J","B","-Y","G","Q","D","-z","j","b","g","q","d","-S","K","P","C","W","T","c","w","t","-v","k","p","-y","S","z","s","-r","h","-l");
$kantha = array("a","A","k","K","g","G","N","h","H"); // kanThya letters
$talu = array("i","I","c","C","j","J","Y","y","S"); // tAlavya letters
$murdha = array("f","F","w","W","q","Q","R","r","z"); // mUrdhanya letters
$danta = array("x","X","t","T","d","D","n","l","s"); // dantavya letters
$oshtha = array("u","U","p","P","b","B","m"); // oSThya letters
$nasika = array("N","Y","R","n","m","M"); // anunAsika letters
$kanthatalu = array ("e","E"); // kanThatAlu letters
$kanthoshtha = array("o","O"); // kanThauSThya letters
$dantoshtha = array("v"); // dantauSThya letters
$sparsha = array("k","K","g","G","N","c","C","j","J","Y","w","W","q","Q","R","t","T","d","D","n","p","P","b","B","m"); // sparza letters
$sprushta = array("k","K","g","G","N","c","C","j","J","Y","w","W","q","Q","R","t","T","d","D","n","p","P","b","B","m",); // spRSTa letters
$ishatsprushta = array("y","r","l","v"); // iSatspRSTa letters
$vivruta = array("S","z","s","h","a","A","i","I","u","U","f","F","x","X","e","E","o","O"); // vivRta letters
$samvruta = array("a"); // saMvRta letter
$vivara = array("k","K","c","C","w","W","t","T","p","P","H","S","z","s"); // vivAra letters
$shvasa = array("k","K","c","C","w","W","t","T","p","P","H","S","z","s"); // zvAsa letters
$aghosha = array("k","K","c","C","w","W","t","T","p","P","H","S","z","s"); // aghoSa letters
$samvara = array("g","G","N","j","J","Y","q","Q","R","d","D","n","b","B","m","y","r","l","v","h"); // saMvAra letters
$nada = array("g","G","N","j","J","Y","q","Q","R","d","D","n","b","B","m","y","r","l","v","h"); // nAda letters
$ghosha = array("g","G","N","j","J","Y","q","Q","R","d","D","n","b","B","m","y","r","l","v","h"); // ghoSa letters
$alpaprana = array("k","g","c","j","w","q","t","d","p","b","y","r","l","v"); // alpaprANa letters
$mahaprana = array("K","G","C","J","W","Q","T","D","P","B","S","z","s","h"); // mahAprANa letters
$ru = array("f","F","x","X"); // R, RR, lR and lRR
$ac = array("a","A","i","I","u","U","f","F","x","X","e","o","E","O",); // vowels - 'ac' letters
$hl = array("k","K","g","G","N","c","C","j","J","Y","w","W","q","Q","R","t","T","d","D","n","p","P","b","B","m","y","r","l","v","S","z","s","h"); // consonants - hal letters
$al = array("a","A","i","I","u","U","f","F","x","X","e","o","E","O","k","K","g","G","N","c","C","j","J","Y","w","W","q","Q","R","t","T","d","D","n","p","P","b","B","m","y","r","l","v","S","z","s","h","M","H");
$e = array("e","E","o","O"); // 'ec' letters
$dirgha = array("A","I","U","F","X","e","E","o","O"); // dIrgha letters
$hrasva = array("a","i","u","f","x"); // hrasva letters
$guna = array ("e","o"); // guNa letters
$vruddhi = array("E","O"); // vRddhi letters
$aa = array("a","A"); // a, A
$upasarga = array("pra","prati","api","parA","apa","upa","pari","anu","ava","vi","saM","su","ati","ni","nir","ut","aDi","dur","aBi","A"); // upasargas
$verbs_ru = array("fkz","fc","fC","fj","fYj","fR","ft","fd","fD","fn","fP","fBukz","fmP","fS","fz","fh"); // verbs starging with R.
$verbs_changed = array("kz","c","C","j","Yj","R","t","d","D","n","P","Bukz","mP","S","z","h"); // verbs with removal of R.
$ku = array("k","K","g","G","N"); // kavarga letters
$cu = array("c","C","j","J","Y"); // cavarga letters
$Tu = array("w","W","q","Q","R"); // Tavarga letters 
$tu = array("t","T","d","D","n"); // tavarga letters
$pu = array("p","P","b","B","m"); // pavarga letters 
$antastha = array("y","r","l","v"); // antaHstha letters
$ushma = array("S","z","s","h"); // uSma letters
$iN = array("i","I","u","U"); // 'iN' pratyAhAra
$pratya =  array("aR","ak","ik","uk","eN","ac","ic","ec","Ec","aw","aR","iR","yaR","am","yam","Yam","Nam","yaY","Jaz","Baz","aS","haS","vaS","JaS","jaS","vaS","Cav","yay","may","Jay","Kay","cay","yar","Jar","Kar","car","Sar","al","hal","val","ral","Jal","Sal"); // valid pratyAhAras according to pANinIya vyAkaraNa
$sup = array("su!","Ow","jas","am","O","Sas","wA","ByAm","Bis","Ne","ByAm","Byas","Nasi!","ByAm","Byas","Nas","os","Am","Ni","os","sup"); // sup pratyayas
$acsup = array("O","jas","am","Ow","Sas","wA","Ne","Nasi!","Nas","os","Am","Ni","os"); // sup pratyayas which start with a vowel
$hlsup = array("su!","ByAm","Bis","Byas","sup"); // sup pratyayas which start with a consonant
$prathama = array("su!","O","jas","am","Ow","Sas"); // sup pratyayas of first two vibhaktis
$sarvanama = array("sarva","viSva","uBa","uBaya","atara","atama","anya","anyatara","itara","tvat","tva","nema","sima","tyad","tad","yad","etad","idam","adas","eka","dvi","yuzmad","asmad","Bavat","kim","idakam","etara"); // sarvanAmas
$zasadi = array("Sas","wA","ByAm","Bis","Ne","ByAm","Byas","Nasi!","ByAm","Byas","Nas","os","Am","Ni","os","sup"); // sup pratyayas, starting from zas
$sarvanamasthana = array("su!","O","jas","am","Ow","Si"); // sarvanAmasthAna pratyayas
$yacibham = array("Sas","wA","Ne","Nasi!","Nas","os","Am","os","Ni"); // sup pratyayas which mandate bha saJjJA subject to some conditions
$tRtIyAdiSvaci = array("wA","Ne","Nasi!","Nas","os","Am","Ni","os"); // sup pratyayas tRtIyA vibhakti onwards and starting with vowel
$tRtIyAdi = array("wA","ByAm","Bis","Ne","ByAm","Byas","Nasi!","ByAm","Byas","Nas","os","Am","Ni","os","sup"); // sup pratyayas tRtIyA vibhakti onwards
$eksup = array("su!","am","wA","Ne","Nasi!","Nas","Ni",); // ekavacana sup pratyayas
$dvisup = array("O","Ow","ByAm","ByAm","ByAm","os","os",); // dvivacana sup pratyayas
$bahusup = array("jas","Sas","Bis","Byas","Byas","Am","sup"); // bahuvacana sup pratyayas
$diksamAsa = array("uttarapUrvA","dakziRapUrvA","uttarapaScimA","dakziRapaScimA"); // diksamAsa array
$sarvanamastri = array("sarvA","viSvA","uBA","uBayA","qatarA","qatamA","anyA","anyatarA","itarA","tvA","nemA","simA","pUrvA","parA","avarA","dakziRA","uttarA","aparA","aDarA","svA","antarA","ekA","dvA","kA","idA"); // sarvanAmas feminine gender
$svasrAdi = array("svasf","tisf","catasf","nanAndf","duhitf","yAtf","mAtf"); // svasrAdi gaNa
$tyadadi = array("dvi","tyad","tad","yad","etad","idam","adas","eka","idakam"); // tyadAdi gaNa
$acdir = array("A","A","I","I","U","U","F","F","F","F","e","o","E","O",); // dIrgha of vowels
$ak1 = array("a","a","A","A","i","i","I","I","u","u","U","U","f","f","F","F","f","f","F","F","x","x","X","X","x","x","X","X");
$ak2 = array("a","A","a","A","i","I","i","I","u","U","u","U","f","F","f","F","x","X","x","X","f","F","f","F","x","X","x","X");
// For gaNapATha, we take gaNapATha taken after SK as base. Sometimes other words are supplied from gaNaratnamahodadhi of vardhamAna.
$TitprAtipadika = array("nada","Baza","gara","plava","cara","tara","cora","grAha","sUda","deva","moda"); // this list is carved out of gaNapATha.
$TiDDhA=array("dvayasa","daDna","mAtra","taya","AdfSa","itvara","naSvara","sftvara","Itvara","etvara","taruRa","taluna","cara","puraHsara","agrataHsara","agresara","purassara","pUrvasara","kara","dAsa","dASa","Palguna","Sakraga","sAmaga","surApa","SIDupa","jAyAhan","patihan","jAyAGna","patiGna","hastiGna","hastihan","kapAwahan","kapAwaGna","pARiGa","rAjaGa","tAqaGa","rAja","saKa","Aha","mahAha","paramAha","dIrghAha","gava","orasa","Anasa","ASma","Ayasa","sarasa","grAmatakza","kOwatakza","atiSva","AkarzaSva","PalakaSva","uttarasakTa","mftasakTa","pUrvasakTa","PalakasakTa","nAva","KAra","Jjala","surAzwrabrahma","avantibrahma","kubrahma","mahadbrahma","SrARika","mAMsOdanika","kaMsika","kArSApaRika","pratika","mahiza","vArkeRya","sOmya","sAyantana","cirantana","prAhRetana","pragetana","dozAtana","divAtana","pUrvAhRetana","aparAhRetana","SAmIla","stra","gAyana","daSa","viMSa","triMSa","paYcama","saptama","azwama","navama","daSama","zazWa","katiTa","katipayaTa","bahutiTa","pUgatiTa","gaRatiTa","saNGatiTa","titama","Witama","samamaya","viSamamaya","maya","ISvara","SaRQa",);
$aJwords=array("Otsa","OdapAna","vEkara","vEnoda","mAhAnada","mAhAnasa","mAhAprARa","tAruRa","tAluna","DEnava","pArTiva","pANkta","jAgata","tErzwupa","Anuzwupa","jAnapada","BArata","OSInara","grEzma","pElava","kOla","BAllakIya","rATAntara","mADyandina","bfrhat","mfhat","sAttvantava","kOrava","pAYcAla","EndrAvasAna","OzRih","kAkuB","sOvarRa","dEva","grEzma","bEda","Orva","kASyapa","kOSika","BAradvAja","Opamanyava","kElAlapa","kEdarBa","vESvAnara","ArwizeRa","ArtaBAga","hAryaSva","prEyaka","Apastamba","kOcavAra","SAradvat","SOnaka","DEnava","gOpavana","SEgrava","bEndava","BAjana","ASvAvatAna","SyAmAka","SyAmAka","SyAparRa","hArita","kEndAsa","vAhyaska","ArkalUza","vADyoza","vEzRuvfdDa","prAtiboDa","rATAntara","rATItara","gAvizWira","nEzAda","mAWara","mArda","pOnarBava","pOtra","dOhitra","nAnAndra","pArastrya","pAraSava","mAhAkula","mAnuza","hAridra","mAhArajana","dvEpa","vEyAGra","kApota","mAyUra","tEttira","KARqika","vAqava","kzOdraka","mAlava","sEna","BEkzuka","SOka","OlUka","SvAna","yOga","Ahana","vAratra","hAlabanDa","kAWaka","kAlApaka","CAndogya","OkTikya","ATarvaRa","mOdaka","pEppalAdaka","dErGavastra","kApilavastra","dAtta","gOpta","sANkala","pOzkala","Odvapa","Oqupa","Otpuwa","kOmBa","vEDAna","sOdakza","sOdatta","sOBUta","sOnetra","sOpiNgala","sEkata","pOtIka","pOlasa","kOlAsa","pAlASa","nEveSa","gAveza","gAmBIra","Etara","Sarma","aha","loma","vema","vAruRa","bAhula","sAdyoja","ABizikta","gOBft","rAjaBft","gArha","BArta","BAlla","mAla","vfta","dAttAmitra","vEDUmAgna","kAkanda","mAkanda","maRicara","jAruza","pOrvamadra","Aparamadra","SEvapura","mARqavapura","pOrvArDa","dAkziRArDa","OttarArDa","Apakara","sEnDava","vArRava","gAnDAra","maDumat","kAmboja","kASmIra","sAlva","kEzkinDa","gAdika","Orasa","darat","tAkzaSila","vAtsodDaraRa","kOmedura","kARqavAraRa","grAmaRI","sArAlaka","kAMsa","kEnnara","sAMkucita","sEMhakozWa","kArRakozWa","bArbara","AvasAna","ASvaraTa","OzwraraTa","gArdaBaraTa","ASva","Ozwra","gArdaBa","ADvarya","pArizada","rAjata","lOha","sEsa","sEsaka","Odumbara","nEladArava","rOhitaka","bEBItaka","pEtadAsa","tEvradArava","trEkaRwaka","kARwakAra","dADitTa","kApitTa","mAhitTa","pAlASa","KAdira","SEMSipa","spAndana","kArIra","SErIza","yAvAsa","vEkaNkata","vARDra","vAratra","SOrpa","sArvaBOma","pArTiva","kOmAra","kESora","OdgAtra","Onnetra","prAtihartra","rATagaRaka","pAkzigaRaka","sOzWava","dOzWava","ADvaryava","vADava","sOBaga","vyAvakroSa","vyAvaleKa","vyAvahAsa","vyAvacora","vyAvacarca",);
$aNwords=array("lAva","dAya","kAra","Aya","pAra","ASvapata","SAtapata","DAnapata","gARapata","rAzwrapata","kOlapata","gArhapata","DAnyapata","pASupata","DArmapata","sABApata","prARapata","kzEtrapata","SEva","prOzWa","prOzWika","cARqa","jAmBa","mOna","sAnDa","BOra","kOWAra","AnaBimlAna","kAkutsTa","kAhoqa","lEKa","rODa","KAYjana","kOhaqa","pEzwa","hEhaya","KAYjAra","KAYjAla","sOrohika","pArRa","kAhUza","pArila","vAtaRqa","tArRa","kArRa","kzErahrada","jAlahrada","pArizika","jAwilika","gOPilika","bADirikA","mAYjIraka","vArzRika","rEKa","AleKana","vESravaRa","rAvaRa","vArtanAkza","pEwaka","pEwAka","tArkzAka","nABAka","OrRanABa","jratkArava","Otkzipa","rOhitika","AryaSveta","sOpizwa","KArjUrakarRa","mAsUrakarRa","tURakarRa","mAyUrakarRa","KAqaraka","takza","ArwizeRa","gANga","vEpASa","yAska","lAhya","drOGa","AyaHsTURa","BAlandana","vErUpAkza","BOma","Ela","sApatna","trEveRa","trEvaRa","ErAvata","vEtasta","nArmada","SEkzita","cEntita","yAmuna","vAsizWa","vESvAmitra","SvAPalka","rAnDasa","vAsudeva","AnirudDa","sAhadeva","nAkula","kAnIna","vEkarRa","SONga","CAgala","pEla","mARwuka","ANga","vANga","sOhma","mAgaDa","kAliNga","sOramasa","kAzAya","mAYjizWa","kOsumBa","pOza","mAGa","kOmAra","SArAva","mAllika","kArpara","sTARwila","GArta","BrAzwra","kAlaSa","kOmBa","Aditya","bArhaspatya","prAjApatya","Endra","kAya","vEzRava","mAhendra","kAka","bAka","guRagrAma","karaRagrAma","tattvagrAma","SabdagrAma","indriyagrAma","BEkza","gArBiRa","SEba","Ozwra","pANkta","pragATa","AnuzwuBa","jAgata","gAyatra","trEzwuBa","sOBadra","gOrimitra","AhimAla","syAndanASva","CAndasa","vEyAkaraRa","nErukta","nEmitta","mOhUrta","OtpAta","Odumbara","bAlbaja","pArvata","sAhasra","kOSAmba","ArjunAva","SudizWa","vEdiSa","hEmavata","sOvAstava","vESaNka","cAkzuza","SrAvaRa","Opanizada","dArzada","OlUKala","cAtura","cAturdaSa","pAlada","pArizada","yAkflloma","rOmaka","kAlakUwa","pAwaccara","vAhIka","kAlakIwa","mAlakIwa","kAmalakIwa","kAmalaBida","gOzWa","kAmalakIra","bAhukIta","nEtaka","pAriKa","SOrasena","gOmata","OdayAna","dAkza","plAkza","mAhaka","pAnnAgAra","kOrava","yOganDara","EkzvAka","mAhizika","kAcCa","sEnDava","vArRava","gAnDAra","mADumata","kAmboja","kASmIra","sAlva","kOrava","rANkava","ARava","KARqa","dvEpa","AnUpa","AjavAha","vEjApaka","kOlUna","pArvata","yOzmAka","AsmAka","tAvaka","mAmaka","sAndivela","sAMDya","grEzma","SESira","tEza","pOza","sAnDivela","sAnDya","AmAvAsya","trAyodaSa","cAturdaSa","pAYcadaSa","pOrRamasa","prAtipada","sMavatsara","SArada","vArza","hEmana","vAsanta","sEnDava","Apakara","AmAvAsya","AmAvasya","vAtsaSAla","ABihjita","ASvayuja","SAtaBizaja","rOhiRa","mArgaSIrza","srOGna","mATura");
// karmaNyaN is difficult to do. 
$Titpratyaya = array("lyuw",); // Only lyuw is pending for scrutiny. Rest all are included in TiDDhA.
$ajAdi = array("aja","eqaka","aSva","cawaka","mUzika","bAla","vatsa","hoQa","manda","bilAta","uzRih","devaviS","jyezWa","kanizWa","maDyama","kokila","pUrvApahARa","aparAhARa","triPala","tryanIka","paraBfta","bAla","amba","hoqa","mugDa","daMzwra","saMprahARa","pUrvApahAyaRa","aparApahAyaRa","samprahAyaRa","saMprahAyaRa","diS","dfS","kzuD","vAc","gir","balAka","vaqava");
$bahvAdi=array("bahu","padDati","aNkati","aYcati","aMhati","vaMhati","Sakawi","Sakti","SAri","vAri","gati","ahi","kapi","muni","yazwi","caRqa","arAla","kamala","kfpARa","vikawa","viSAla","viSaNkawa","Baruja","Dvaja","kalyARa","udAra","purARa","ahan","cAndraBAga","candraBAga",);
$svAGga=array("keSa","kaca","muKa","stana","naKa","RaKa","nAsika");
$kroDAdi=array("kalyARakroqa","kalyARaKura","kalyARoKa","kalyARabAla","kalyARaSaPa","kalyARaguda","kalyARaGoRa","kalyARanaKa","kalyARamuKa","suBaga","sugala","pfTujaGana","mahAlalAwa","kalyARakroqA","kalyARAKurA","kalyARoKA","kalyARabAlA","kalyARaSaPA","kalyARagudA","kalyARaGoRA","kalyARanaKA","kalyARamuKA","kroqAdirAkftigaRaH","suBagA","sugalA","pfTujaGanA","mahAlalAwA","BAvyaBAlA","BavyaBAla","SrImaduKA","SrImaduKa","kalyARagoKa","kalyANagoKA","pavitraSaPa","pavitraSaPA","mfRAlaBujA","mfRAlaBuja","kalyARaguda","kalyARagudA","unnataGoRa","unnataGoRA","kisalayakarA","kisalayakara","suraNga","suraNga");
$bahvacasvAGga=array("jaGana");
$aupagava=array("Opagava","kaWa","kalApa","bahvfca",);
$Sidwords=array("dvimUrDa","trimUrDa","SatapaTika","zazwipaTika","pfTiva","sAmiDenya","paTika","kusidika","daSEkAdaSika","pOroqASika","Bastrika","Barawika","BaraRika","SIrzaBArika","SIrzeBArika","aMsaBArika","aMseBArika","vivaDika","vIvaDika","parpika","aSvika","aSvatTika","raTika","jAlika","nyAsika","vyAlika","pAdika","paYcika","padika","SvagaRika","kiSarika","naradika","naladika","sumaNgalika","tagarika","gugguluka","uSIrika","haridrika","haridrAyaRIka","SalAluka","kAsUtara","gORItara","Akarzika","AvasaTika","DAtra","dAtra","Sastra","netra","yotra","yoktra","stotra","totra","setra","sektra","meQra","patra","nadDa","potra","kApiSyAyana","karbara","karvara","garbara","garbara","nizadvara","Citvara","Catvara","nartaka","Kanaka","rajaka"); // kurvAdi pending
$gaurAdi=array("gOra","matsya","manuzya","SfNga","haya","gavaya","mukaya","fzya","puwa","druRa","droRa","hariRa","kaRa","pawara","ukaRa","Amalaka","kuvala","badara","bamba","tarkAra","SarkAra","puzkara","SiKaRqa","suzama","salanda","gaquja","Ananda","sfpAwa","sfgeWa","AQaka","Sazkula","sUrma","suba","sUrya","pUza","mUza","GAtaka","sakalUka","sallaka","mAlaka","mAlata","sAlvaka","vetasa","atasa","pfsa","maWa","Ceda","Svan","takzan","anaquh","ezaRa","deha","kAkAdana","gavAdana","tejana","rajana","lavaRa","pAna","meDa","gOtama","AyasTURa","BOri","BOliki","BOliNgi","OdgAhamAni","AliNgi","ApicCika","Arawa","wowa","nawa","nAwa","malAwa","SAtana","pAtana","savana","Astarana","ADikaraRa","eta","aDikAra","AgrahAyaRI","pratyavarohiRI","sevana","sumaNgalAt saMjYAyAm","sundara","maRqala","piRqa","viwaka","kurda","gUrda","pawa","pARwa","loPARwa","kandara","kandala","bfhat","mahat","sODarma","rohiRI nakzatre","revatI nakzatre","vikala","nizPala","puzkala","kawa","pippala","harItaka","koSAtaka","Sama","karIra","pfTiva","krozwra","mAtAmaha","pitAmaha"); // removed taruRa and taluna, because they have a separate vArtika mandating GIp and not GIz.
$itmanuSyajAti=array("dAkzi","Odameyi");
$zArGgaravAdi=array("SArNgarava","kApawava","gOgulava","brAhmaRa","gOtama","kAmaRqaleya","brAhamakfteya","Aniceya","AniDeya","ASokeya","vAtsyAyana","mOYjAyana","kEkaseya","kAvya","SEvya","ehi","paryehi","ASmaraTya","OdapAna ","arAla","caRqAla","vataRqa","jAti","bEda");
$kvanipwords=array("prAtaritvan","DIvan","pIvan","suDIvan","supIvan","BUridAvan","GftapAvan","SIvan","kruSvan","ruhvan","jitvan","kzitvan","sftvan","Dftvan","dfSvan");
$Gvanipwords=array("sutvan","yajvan"); // also hrasva-tvan combination.
$vanipwords=array("DIvan","pIvan","suDIvan","supIvan","snAvan","nadvan","padvan","arvan","parvan","Sakvan","BUridAvan","GftapAvan","vijAvan","agregAvan");
$vanoracawords= array_merge($kvanipwords,$Gvanipwords,$vanipwords);
$tiG=array("tip","tas","Ji","sip","Tas","Ta","mip","vas","mas","ta","AtAm","Ja","TAs","ATAm","Dvam","iw","vahi","mahiN");
$tis=array("tip","tas","Ji","sip","Tas","Ta","mip","vas","mas",);
$taG=array("ta","AtAm","Ja","TAs","ATAm","Dvam","iw","vahi","mahiN");
$tiGprathama=array("tip","tas","Ji","ta","AtAm","Ja",);
$tiGmadhyama=array("sip","Tas","Ta","TAs","ATAm","Dvam",);
$tiGuttama=array("mip","vas","mas","iw","vahi","mahiN");
$shitpratyaya=array("Sap","Syan","Snu","Sa","Snam","SnA","SAyac","SAnac");
$navibhaktau=array("jas","am","Sas","ByAm","Bis","Byas","os","Am","Ni","tas","Tas","vas","mas","AtAm","TAs","ATAm","Dvam",);
$inbetweenpratyaya=array("ap");
$inbetweeenreplace=array("a");
// list of 10 gaNas and some upagaNas.
$bhvAdi=array("ahi!","aka!","akzU!","aga!","aki!","agi!","aGi!","acu!","aja!","aci!","aYcu!","aYcu!","awa!","awwa!","aqa!","aqqa!","aRa!","aWi!","ata!","aqqa!","ati!","adi!","aBra!","ama!","abi!","aBi!","aya!","aya!","arGa!","arca!","arja!","arda!","arba!","arva!","arha!","ala!","ava!","aza!","asa!","ACi!","ASasi","iKa!","iKi!","igi!","iwa!","idi!","ivi!","Ikza!","IKi!","IKi!","Ija","Iji!","Irkzya!","Irzya!","Iza!","Iza!","Iha!","uN","ukza!","uKa!","uKi!","uCI!","uCi!","uWa!","uWa!","urda!","urvI!","uza!","uhi!r","UWa!","UyI!","Uza!","Uha!","f","fja!","fji!","ejf!","ejf!","eWa!","eDa!","ezf!","ezf!","oKf!","oRf!","kaka!","kaKa!","kaKe!","kage!","kaki!","kaca!","kaja!","kaci!","kawI!","kawe!","kaWa!","kaqa!","kaqqa!","kaRa!","kaRa!","kaWi!","kaqi!","kaqi!","katTa!","kada!","kaqqa!","kanI!","kadi!","kadi!","kapa!","kabf!","kamu!","kapi!","karja!","karda!","karba!","karva!","kala!","kalla!","kaza!","kasa!","kAkzi!","kAci!","kASf!","kAsf!","kiwa!","kiwa!","kita!","kIla!","kuN","kuka!","kuca!","kuca!","kuju!","kuYca!","kuji!","kuwi!","kuWi!","kuqi!","kuqi!","kuTi!","kubi!","kurda","kula!","kUja!","kUla!","kfY","kfvi!","kfpa!","kfpU!","kfza!","kfpU!","kepf!","kelf!","kevf!","kE","knaTa!","knUyI!","kmara!","kraTa!","krada!","kradi!","kradi!","krapa!","kramu!","krIqf!","kruYca!","kruSa!","klaTa!","klada!","kladi!","kladi!","klidi!","klidi!","klIbf!","kluN","kleSa!","kvaRa!","kvaTe!","kzaji!","kzapayaSca","kzamU!z","kzara!","kzi","kzivu!","kzIja!","kzIbf!","kzIvf!","kzuBa!","kzura!","kzevu!","kzE","kzmAyI!","kzmIla!","YikzvidA!","YikzvidA!","kzvelf!","Kaja!","Kaji!","Kawa!","Kaqi!","Kada!","Kanu!","Karja!","Karda!","Karba!","Karva!","Kala!","Kaza!","KAdf!","Kiwa!","KuN","Kuju!","Kurda","Kelf!","Kevf!","KE","Korf!","Kolf!","gaja!","gaji!","gaqa!","gaqi!","gaqi!","gada!","gamx!","garja!","garda!","garba!","garva!","garha!","gala!","galBa!","galha!","gAN","gADf!","gAhU!","guN","guN","guja!","guji!","guda!","gupa!","gupU!","gurda","gurvI!","guhU!","gfhU!","gf","gfja!","gfji!","gepf!","gevf!","gezf!","gE","gozwa!","graTi!","grasu!","grucu!","glasu!","glaha!","glucu!","gluYca!","glepf!","glepf!","glevf!","glezf!","glE","GagGa!","GaGa!","Gawa!","Gawwa!","Gaza!","Gasx!","GiRi!","GuN","Guzi!","Guwa!","GuRa!","GuRi!","Guzi!r","GUrRa!","Gf","GfRi!","Gfzu!","GrA","DrAGf!","NuN","caka!","caka!","caYcu!","cawe!","caRa!","caqi!","cate!","cade!","cana!","cadi!","capa!","camu!","caya!","cara!","carca!","carba!","carva!","cala!","caza!","caha!","cAyf!","ciwa!","citI!","cilla!","cIbf!","cIBf!","cIvf!","cucya!","cuqqa!","cuqi!","cuqqa!","cupa!","cubi!","culla!","cUza!","celf!","cezwa!","cyuti!r","Camu!","Caza!","jaja!","jaji!","jawa!","japa!","jaBI!","jamu!","jartsa!","jartsa!","jartsa!","jala!","jalpa!","jaza!","ji","ji!","jivi!","jimu!","jizu!","jIva!","juN","ju","jugi!","jutf!","jUza!","jfBi!","jezf!","jehf!","jE","jyuN","jyuti!r","jri","jvara!","jvala!","jvala!","Jawa!","Jamu!","Jartsa!","Jartsa!","Jartsa!","Jaza!","Jaza!","wala!","wikf!","wIkf!","wvala!","qIN","QOkf!","tasi!","taka!","takzU!","takza!","taki!","tagi!","taYcu!","tawa!","taqi!","tapa!","taya!","tarja!","tarda!","tAyf!","tikf!","tija!","tipf!","tila!","tilla!","tIkf!","tIva!","tuja!","tuji!","tuqf!","tuqi!","tupa!","tuPa!","tuBa!","tumpa!","tumPa!","tubi!","turvI","tusa!","tuhi!r","tUqf!","tUla!","tUza!","tfkza!","tF","teja!","tepf!","tevf!","tyaja!","trakza!","traKa!","traki!","tragi!","tradi!","trapU!z","triKi!","trupa!","truPa!","trumpa!","trumPa!","trEN","trOkf!","tvakzU!","tvagi!","tvaYcu!","YitvarA!","tviza!","tsara!","Taki!","TurvI","daMSa!","dakza!","dakza!","daGi!","dada!","daDa!","daya!","dala!","daha!","dAR","dAna!","dASf!","dAsf!","divi!","dIkza!","du","durvI!","duhi!r","dfhi!","dfha!","dF","deN","devf!","dEp","dfSi!r","dyuta!","dyE","drama!","drAKf!","drAGf!","drAkzi!","drAqf!","drAhf!","dru","drekf!","drE","dvf","DaRa!","Davi!","DAvu!","Dikza!","Divi!","Dukza!","DurvI!","DUpa!","DfN","DfY","Dfja!","Dfji!","Dew","Depf!","Dorf!","DmA","DmAkzi!","DyE","Draja!","Draji!","DraRa!","DrAKf!","DrAkzi!","DrAqf!","Drija!","Dru","Drekf!","DrE","DvaMsu!","Dvaja!","Dvaji!","DvaRa!","Dvana!","Dvana!","DvAkzi!","Dvf","Rakza!","RaKa!","RaKi!","Rawa!","Rawa!","Rada!","wunadi!","RaBa!","Rama!","Raya!","narda!","Rala!","Rasa!","nATf!","nADf!","RAsf!","Rikza!","Ridf!","Ridi!","Rivi!","RiSa!","Rizu!","RIY","RIla!","RIva!","nF","Redf!","Rezf!","pakza!","qupaca!z","paci!","pawa!","paWa!","paRa!","paqi!","patx!","paTe!","pana!","paya!","parda!","parpa!","parba!","parva!","pala!","pelf!","pA","piwa!","piWa!","piqi!","pivi!","pisf!","pIla!","pIva!","puwa!","puqa!","puqi!","puTi!","purva!","pula!","puza!","pUN","pUyI!","purva!","pUla!","pUza!","pfzu!","pelf!","pevf!","pezf!","pesf!","pE","pERf!","o!pyAyI!","pyEN","praTa!","prasa!","pruN","pruzu!","prezf!","prERf!","proTf!","plakza!","pliha!","pluN","pluzu!","plevf!","Pakka!","PaRa!","Pala!","YiPalA!","Pulla!","Pelf!","bahi!","baWa!","baRa!","bawi!","bada!","baDa!","vaBra!","barba!","barha!","bala!","balha!","bAqf","bADf!","bAhf!","biwa!","bidi!","bisa!","bIBf!","bukka!","bugi!","buDa!","buDi!r","u!bundi!r","bfhi!","bfha!","besa!","vehf!","vraRa!","Bakza!","Baja!","Bawa!","Bawa!","BaRa!","Baqi!","Badi!","Barba!","BarBa!","Barva!","Bala!","Balla!","Baza!","BAma!","BAza!","BAsf!","Bikza!","YimidA!","Bidi!","BU","BUza!","BfY","BfjI!","Bezf!","Byasa!","BraMSu!","BraMsu!","Brakza!","BraRa!","Bramu!","wuBrAjf!","BrAjf!","wuBrASf!","Brejf!","Brezf!","Blakza!","wuBlASf!","Blezf!","mahi!","maKa!","maki!","maKi!","magi!","maGi!","maGi!","maca!","maci!","maWa!","maRa!","maWi!","maqi!","maqi!","maTe!","manTa!","maTi!","madi!","maBra!","maya!","marba!","marva!","mala!","malla!","mava!","mavya!","maSa!","maza!","maska!","maska!","maha!","mAkzi!","mAna!","mAhf!","miTf!","midf!","miDf!","mivi!","miSa!","mizu!","miha!","mImf!","mIla!","mIva!","muKi!","muja!","muci","muji!","muwa!","muqa!","muWi!","muqi!","muqi!","muda!","murCA!","murvI!","mUN","mUla!","mUza!","mfkza!","mfDu!","mfzu!","meN","meTf!","medf!","meDf!","mepf!","mevf!","mnA","mrakza!","mrada!","mrucu!","mruYcu!","mrewf!","mreqf!","mlucu!","mluYcu!","mleCa!","mlewf!","mlevf!","mlE","yaja!","yatI!","yaBa!","yama!","wuyAcf!","yugi!","yuCa!","yutf!","yUza!","yezf!","yOwf!","rahi!","rakza!","raKa!","rage!","raKi!","ragi!","raGi!","raYja!","rawa!","rawa!","raWa!","raRa!","raRa!","ravi!","rada!","rapa!","raPa!","raBa!","ramu!","raPi!","rabi!","raBi!","raya!","rasa!","raha!","rAKf!","rAGf!","rAjf!","rAsf!","riKa!","riKi!","rigi!","rivi!","riza!","ruN","ruca!","ruwa!","ruWa!","ruwi!","ruWi!","ruWi!","ruqi!","ruza!","ruha!","rUza!","rekf!","rejf!","rewf!","repf!","reBf!","revf!","rezf!","rE","roqf!","rOqf!","laKa!","lage!","laKi!","lagi!","laGi!","laGi!","laCa!","laja!","laji!","lawa!","laqa!","lapa!","qulaBa!z","labi!","labi!","laBi!","laya!","larba!","lala!","laza!","lasa!","lAKf!","lAGf!","lAja!","lACi!","lAji!","liKa!","liKi!","ligi!","luYca!","luwa!","luwa!","luWa!","luWa!","luqa!","luwi!","luWi!","luWi!","luWi!","luqi!","luTi!","lubi!","lUza!","lepf!","lokf!","locf!","loqf!","lozwa!","vakza!","vaKa!","vaki!","vaki!","vaKi!","vagi!","vaGi!","vaja!","vaYcu!","vawa!","vawa!","vaWa!","vaRa!","vawi!","vaWi!","vaqi!","vada!","vana!","vanu!","vana!","vadi!","quvapa!","vaBra!","wuvama!","vaya!","varca!","varza!","varha!","vala","valga!","valBa!","valla!","valha!","vaza!","vaska!","vasa!","vaska!","vaha!","vAkzi!","vACi!","vAqf","bAhf!","viwa!","viTf!","vizu!","visa!","vIja!","vugi!","bfhi!","vfka!","vfkza!","vftu!","vfDu!","vfzu!","bfha!","veY","veRf!","veTf!","venf!","wuvepf","velf!","vella!","vezwa!","vesa!","vehf!","vella!","o!vE","vyaTa!","vyaya!","vyeY","vraja!","vraja!","vraji!","vraRa!","SaMsu!","Saki!","Saca!","Sawa!","SaWa!","SaRa!","Saqi!","Sadx!","Sapa!","Sarba!","Sarva!","Sala!","Sala!","SalBa!","Sava!","SaSa!","Saza!","Sasu!","SAKf!","SAqf!","SAna!","Sikza!","SiKi!","SiGi!","Siwa!","Siza!","SIkf!","SIBf!","SIla!","Suka!","Suca!","Sucya!","SuWa!","SuWi!","SuWi!","SunDa!","SuBa!","SuBa!","SumBa!","SUla!","SUza!","SfDu!","SfDu!","Self!","Sevf!","SE","SoRf!","SOwf!","Scuti!r","Scyuti!r","SnaTa!","SmIla!","syandU!","cyuN","SyEN","sraMsu!","sraMsu!","Sraki!","Sragi!","SraRa!","SraTa!","SraTi!","SramBu!","SrA","SriY","Srizu!","Sru","SrE","SroRf!","Slaki!","Slagi!","SlaTa!","SlAKf!","SlAGf!","Slizu!","Slokf!","SloRf!","Svaki!","Sragi!","Svaca!","Svaci!","Svala!","Svalla!","wuo!Svi","SvitA!","Svidi!","zwyE","zWivu!","zvaska!","zvaska!","zage!","zaca!","zaca!","zasja!","zaYja!","zawa!","zadx!","zana!","zapa!","zama!","zarkza!","zarja!","zarba!","zarva!","zala!","zasja!","zaha!","ziwa!","ziDa!","ziDU!","zivi!","ziBu!","zimBu!","sIkf!","zu","zUda!","sUrkza!","zUrkzya!","sUza!","sf","sfpx!","zfBu!","zfmBu!","sekf!","zelf!","zevf!","zE","skandi!r","skaBi!","skudi!","sKada!","sKala!","zwaka!","zwana!","zwama!","zwaBi!","zWala!","zwipf!","zwuca!","zwuBu!","zwfkza!","zwepf!","zwE","styE","zwrakza!","zWage!","zWA","zRE","spadi!","sparDa!","spaSa!","sPAyI!","sPuwa!","sPuwi!r","sPuwi!","sPuqi!","sPurCA!","wuo!sPUrjA!","zmiN","smIla!","smf","smf","syamu!","sraMsu!","sraki!","sramBu!","sramBu!","sru","srekf!","srE","srokf!","zvaki!","Sragi!","zvaYja!","zvada!","svana!","svana!","svarda!","zvaska!","zvaska!","svAda!","YizvidA!","svf","hawa!","haWa!","hada!","hamma!","harya!","haya!","hala!","hase!","hikka!","hiwa!","hiqi!","hivi!","huqf!","huqi!","huqi!","hurCA!","hula!","hula!","hUqf!","hfY","hfzu!","hrasa!","heWa!","heWa!","heqf!","heqa!","hepf!","hezf!","hoqf!","hoqf!","hmala!","hrage!","hrasa!","hrAda!","hrICa!","hrezf!","hlage!","hlasa!","hlAdI!","hvala!","hvf","hvf","hveY");
$divAdi=array("aRa!","anuruDa!","ana!","asu!","iza!","IN","uca!","fDu!","kASf!","kuMSa!","kuMsa!","kuTa!","kupa!","kuSa!","kusa!","kfSa!","knasu!","kruDa!","klamu!","klidU!","kliSa!","kzamU!","kzipa!","kzuDa!","kzuBa!","YikzvidA!","Kida!","guDa!","gupa!","gUrI!","gfDu!","GUrI","cUrI!","Co","janI!","jasu!","jUrI!","jFz","JFz","qipa!","qIN","tapa!","tamu!","tasu!","tima!","tIma!","tuBa!","tuza!","tUrI!","tfpa!","Yitfza!","trasI!","damu!","dasu!","divu!","dIN","dIpI!","duza!","dUN","dfpa!","do","druha!","DIN","DUrI","RaBa!","RaSa!","Raha!","nftI!","pada!","pIN","puTa!","puza!","puza!","puzpa!","pUrI!","pyuza!","pyusa!","prIN","pluza!","pluza!","basu!","visa!","buDa!","busa!","busa!","byusa!","Basu!","BfMSu!","BfSu!","BraMSu!","Bramu!","madI!","mana!","masI!","mAN","YimidA!","mIN","musa!","muha!","mfza!","yasu!","yuja!","yuDa!","yupa!","raYja!","raDa!","rADaH","riza!","rIN","rupa!","ruza!","liSa!","lIN","luwa!","luWa!","lupa!","luBa!","vasu!","vAvftu!","vASf!","vida!","bisa!","vusa!","vftu!","vfSa!","vyaDa!","vyuza!","vyuza!","vyusa!","vrIN","vrIqa!","Saka!","Sapa!","Samu!","I!Suci!r","SuDa!","Suza!","SUrI!","So","Sramu!","Sliza!","zWivu!","samI!","zaha!","ziDu!","zivu!","zuha!","zUN","sfja!","zo","zwima!","zwIma!","zwupa!","zwUpa!","zRasu!","zRiha!","zRusu!","zRuha!","srivu!","zvidA!","hfza!");
$tudAdi=array("ila!","iza!","uCI!","ujJa!","uCi!","ujJa!","ubja!","uBa!","umBa!","fca!","fCa!","fPa!","fmPa!","fzI!","kaqa!","kila!","kuN","kuca!","kuwa!","kuqa!","kuRa!","kura!","kUN","kfqa!","kftI!","kfza!","kF","kruqa!","kzi","kzipa!","kzura!","Kida!","Kuqa!","Kura!","gu","guja!","guqa!","guPa!","gumPa!","gurI!","gF","Guwa!","GuRa!","Gura!","GUrRa!","carca!","cala!","cila!","cuwa!","cuqa!","cftI!","Cuwa!","Cuqa!","Cupa!","Cura!","jarja!","juwa!","juqa!","juqa!","juna!","juzI!","JarJa!","qipa!","tila!","tuwa!","tuqa!","tuRa!","tuda!","tupa!","tuPa!","tumpa!","tumPa!","tfMhU!","tfpa!","tfPa!","tfmpa!","tfmPa!","tfhU!","truwa!","tvaca!","Tuqa!","diSa!","dfN","dfpa!","dfPa!","dfBI!","dfmpa!","dfmPa!","druRa!","Di","DU","DU","DfN","Dru","Rila!","RU","Ruda!","Ruda!","RU","pi","piSa!","puwa!","puqa!","puRa!","pura!","pfN","pfqa!","pfRa!","praCa!","bila!","bfhU!","Bujo!","Bfqa!","Brasja!","Brasja!","wumasjo!","wumasjo!","miCa!","mila!","mila!","miza!","mucx!","muwa!","muRa!","mura!","mfN","mfqa!","mfRa!","mfSa!","ri","riPa!","riSa!","riha!","rujo!","ruSa!","o!lajI!","o!lasjI!","o!lasjI!","liKa!","lipa!","liSa!","luwa!","luWa!","luqa!","lupx!","luBa!","viCa!","o!vijI!","vidx!","viDa!","vila!","viSa!","vfRa!","vfhU!","vyaca!","o!vraScU!","vruqa!","Sadx!","Sila!","Suna!","SuBa!","SumBa!","zadx!","zica!","zila!","zura!","zU","sfja!","stfhU!","sTuqa!","spfSa!","sPara!","sPala!","sPuwa!","sPuqa!","sPura!","sPula!","hila!","huqa!");
$curAdi=array("aMsa!","ahi!","aNka!","aNga!","aYcu!","aji!","awwa!","anDa!","ama!","arka!","arca!","arja!","arTa!","arda!","arha!","arha!","Akranda!","Apx!","Azada!","ila!","Iqa!","Ira!","kaWi!","uGrasa!","Una!","Urja!","o!laqi!","kaRa!","kaWi!","kaqi!","katra!","katra!","kaTa!","karRa!","karta!","kala!","kala!","kAla!","kIwa!","kuSi!","kusi!","kuwa!","kuwwa!","kuwwa!","kuRa!","kuWi!","kuqi!","kuqi!","kutsa!","kudf!","kudri!","kupa!","kumAra!","kubi!","kuBi!","kusma!","kuha!","kUwa!","kUwa!","kURa!","kURa!","kfpa!","kfpeSca","kFta!","keta!","klapa!","kzaji!","kzapa!","kzapi!","kzala!","kzowa!","Kawwa!","Kaqa!","Kaqi!","Kuqi!","Kewa!","Keqa!","Kowa!","gaja!","gaRa!","gadI!","ganDa!","garja!","garda!","garDa!","garva!","garha!","gala!","gaveza!","guRa!","guWi!","guqi!","gupa!","gurda!","gUra!","gfha!","gF","goma!","granTa!","granTa!","grasa!","grAma!","Gawa!","Gawa!","Gawwa!","Gawi!","Guzi!r","Gf","cakka!","cawa!","caqi!","cana!","capa!","capi!","cara!","carca!","cala!","caha!","caha!","ci","ciY","cita!","citra!","citi!","cIka!","cIva!","cIva!","cukka!","cuwa!","cuwwa!","cuwi!","cuda!","cubi!","cura!","cula!","cUrRa!","cUrRa!","cfpa!","cyu","Caji!","Cada!","Cada!","Cada!","Cadi!","Carda","Cidra!","CfdI!","Cfpa!","Ceda!","jasi!","jaBi!","jala!","jasu!","jasu!","ji","ci","ci","juqa!","juza!","jF","jYapa!","jYA","jri","waki!","qapa!","qipa!","qipa!","tasi!","taqa!","taqa!","tanu!","tatri!","tapa!","tarka!","tarja!","tala!","tija!","tila!","tIra!","tuja!","tuji!","tuji!","tuqi!","tutTa!","tubi!","tula!","tURa!","tfpa!","tfpa!","trasi!","trasa!","truwa!","daSi!","daSi!","dasi!","dasi!","daRqa!","dala!","dasa!","divu!","divu!","duHKa!","dula!","dfpa!","dfBI!","dfBa!","Dakka!","DUpa!","DUY","DUpa!","DUSa!","DUza!","DUsa!","Dfza!","u!Drasa!","Dvana!","nakka!","nawa!","nawa!","Raqa!","nala!","nivAsa!","nizka!","pasi!","pasi!","pakza!","paci!","pawa!","pawa!","paqi!","pata!","paTa!","pada!","paTi!","parRa!","pala!","palyUla!","paSa!","paza!","pAra!","pAla!","pisi!","piCa!","pija!","piji!","piji!","piWi!","piqi!","piSa!","pisa!","pIqa!","puMsa!","puwa!","puwa!","puwwa!","puRa!","puwi!","puTa!","pula!","puza!","pusta!","pUja!","pUrI!","pUrRa!","pUrva!","pUla!","pfca!","pfTa!","pF","praTa!","prIY","baDa!","banDa!","barha!","barha!","bala!","balha!","bazka!","basta!","bila!","bukka!","busta!","bfhi!","brUsa!","Bakza!","Baja!","Baji!","Baqi!","Bartsa!","Bala!","BAja!","BAma!","BU","BU","BUza!","BfSi!","BrURa!","mahi!","maqi!","mada!","mAna!","matri!","marca!","maha!","mana!","mAna!","mArga!","mArja!","miji!","mida!","midi!","miSra!","mI","muca!","muwa!","muda!","musta!","mUtra!","mUla!","mfga!","mfjU!","mfqi!","mfza!","mokza!","mrakza!","mrakza!","mraCa!","mleCa!","yakza!","yata!","yatri!","yama!","yu","yuja!","rahi!","raka!","raga!","raGa!","raNga!","raGi!","raca!","rawa!","rasa!","raha!","raha!","rica!","ruSi!","rusi!","ruja!","ruwa!","ruwa!","ruza!","rUkza!","rUpa!","lakza!","lakza!","laga!","laGi!","laGi!","laja!","laja!","laji!","laji!","laji!","laqa!","laqi!","o!laqi!","lala!","lasa!","lABa!","ligi!","liji!","lI","luji!","luji!","luwa!","luRwa!","luRWa!","lubi!","lUza!","lokf!","locf!","vaca!","vaYcu!","vawa!","vawa!","vawi!","vawi!","vaqi!","vada!","vara!","varRa!","varRa!","varDa!","barha!","varha!","valka!","balha!","vasa!","vasa!","vasta!","vAta!","vAsa!","viCa!","vida!","vipa!","vila!","vizka!","vizka!","vIra!","vfY","bfhi!","vfjI!","vftu!","vfDu!","vfza!","vela!","vyapa!","vyaya!","vyaya!","vyusa!","vraja!","vraRa!","vrUza!","vrUsa!","SaWa!","SaWa!","SaWa!","Sabda!","Sama!","Samba!","SAntva!","Siza!","SIka!","SIka!","SIla!","SuWa!","SuWi!","SunDa!","Sulka!","Sulba!","SUra!","SUrpa!","SfDu!","SraRa!","SraTa!","SraTa!","SraTa!","SranTa!","Sliza!","SvaWa!","SvaWa!","SvaWi!","SvaBra!","Svarta!","Svalka!","saNketa!","saNgrAma!","zawwa!","satra!","satra!","saBAja!","zamba!","sAra!","zaha!","zAntva!","sAma!","sAmba!","sAra!","suKa!","zuwwa!","sUca!","sUtra!","zUda!","stana!","zwupa!","zwUpa!","stena!","stoma!","sTUla!","zRiha!","spaSa!","spfha!","sPiwa!","sPiwwa!","sPuwa!","sPuwi!","sPuqi!","zmiN","smiwa!","syama!","zvada!","svara!","svarta!","svAda!","hasta!","hisi!","hizka!","hrapa!","hlapa!");
$adAdi=array("ada!","iN","ik","ana!","asa!","ASAsu!","Asa!","iN","iR","ik","Iqa!","Ira!","ISa!","UrRuY","kasi!","kaSa!","kasa!","ku","wukzu","kzRu","KyA","cakAsf!","cakzi!N","jakza!","jAgf","tu","daridrA","dAp","diha!","dIDIN","duha!","dyu","drA","dviza!","Risi!","Riji!","Ru","pA","piji!","pfcI!","pfji!","prA","psA","brUY","BA","mA","mfjU!","yA","yu","rA","ru","rudi!r","lA","liha!","vaca!","vaSa!","vasa!","vA","vida!","vI","vfjI!","vfji!","vevIN","SAsu!","Siji!","SIN","SrA","Svasa!","zasti!","zasa!","zu","zUN","zwuY","zRA","zRu","Yizvapa!","hana!","hnuN");
$juhotyAdi=array("ki","kita!","gA","Gf","jana!","tura!","qudAY","Dana!","quDAY","Diza!","Riji!r","pf","pF","Basa!","YiBI","quBfY","mAN","viji!r","vizx!","sf","o!hAN","o!hAk","hu","hf","hrI");
$svAdi=array("aSU!","aha!","Apx!","f","fDu!","kfY","kzi","kzI","camu!","ciY","ciri","jiri","tika!","tiga!","tfpa!","daGa!","damBu!","dASa!","wudu","dF","DuY","DUY","YiDfzA!","pf","qumiY","rADa!","ri","vfY","Sakx!","SiY","zaGa!","sADa!","ziY","zuY","zwiGa!","stfY","spf","smf","hi");
$rudhAdi=array("aYjU!","YiinDI!","undI!","kftI!","kzudi!r","Kida!","Cidi!r","u!Cfdi!r","taYcU!","u!tfdi!r","tfha!","pizx!","pfcI!","BaYjo!","Bidi!r","Buja!","yuji!r","rici!r","ruDi!r","vici!r","o!vijI!","vida!","vfjI!","Sizx!","hisi!");
$tanAdi=array("fRu!","qukfY","kzaRu!","kziRu!","GfRu!","tanu!","tfRu!","manu!","vanu!","zanu!");
$kryAdi=array("aSa!","iza!","F","kunTa!","kuza!","kFY","kF","knUY","qukrIY","kliSU!","kzIz","kzuBa!","Kaca!","Kava!","guDa!","gF","granTa!","graha!","jF","jYA","jyA","JF","tuBa!","dF","drUY","DUY","DF","u!Drasa!","RaBa!","nF","puza!","pUY","pF","prIY","pruza!","plI","pluza!","banDa!","blI","BF","BrI","manTa!","mIY","muza!","mUY","mfqa!","mfda!","mF","yuY","rI","lI","lUY","viza!","vfN","vFY","vF","vrI","vlI","SF","SranTa!","SranTa!","SrIY","ziY","skamBu!","skuY","skumBu!","stamBu!","stumBu!","stFY","heWa!","heQa!");
// list of 10 gaNas and some upagaNas. With accent, devanagari
$bhvAdi1=array("अ॑हिँ॒","अ॑कँ॑","अ॑क्षूँ॑","अ॑गँ॑","अ॑किँ॒","अ॑गिँ॑","अ॑घिँ॒","अ॑चुँ॒॑","अ॑जँ॑","अ॑चिँ॑","अ॑ञ्चुँ॑","अ॑ञ्चुँ॒॑","अ॑टँ॑","अ॑ट्टँ॒","अ॑डँ॑","अ॑ड्डँ॑","अ॑णँ॑","अ॑ठिँ॒","अ॑तँ॑","अ॑ड्डँ॑","अ॑तिँ॑","अ॑दिँ॑","अ॑भ्रँ॑","अ॑मँ॑","अ॑बिँ॒","अ॑भिँ॒","अ॑यँ॒","अ॑यँ॒॑","अ॑र्घँ॑","अ॑र्चँ॑","अ॑र्जँ॑","अ॑र्दँ॑","अ॑र्बँ॑","अ॑र्वँ॑","अ॑र्हँ॑","अ॑लँ॑","अ॑वँ॑","अ॑षँ॒॑","अ॑सँ॒॑","आ॑छिँ॑","आ॑शसि","इ॑खँ॑","इ॑खिँ॑","इ॑गिँ॑","इ॑टँ॑","इ॑दिँ॑","इ॑विँ॑","ई॑क्षँ॒","ई॑खिँ॑","ई॑खिँ॑","ई॑ज॒","ई॑जिँ॒","ई॑र्क्ष्यँ॑","ई॑र्ष्यँ॑","ई॑षँ॑","ई॑षँ॒","ई॑हँ॒","उ॒ङ्","उ॑क्षँ॑","उ॑खँ॑","उ॑खिँ॑","उ॑छीँ॑","उ॑छिँ॑","उ॑ठँ॑","उ॑ठँ॒","उ॑र्दँ॒","उ॑र्वीँ॑","उ॑षँ॑","उ॑हिँ॑र्","ऊ॑ठँ॑","ऊ॑यीँ॒","ऊ॑षँ॑","ऊ॑हँ॒","ऋ॒","ऋ॑जँ॒","ऋ॑जिँ॒","ए॑जृँ॒","ए॑जृँ॑","ए॑ठँ॒","ए॑धँ॒","ए॑षृँ॒","ए॑षृँ॒","ओ॑खृँ॑","ओ॑णृँ॑","क॑कँ॒","क॑खँ॑","क॑खेँ॑","क॑गेँ॑","क॑किँ॒","क॑चँ॒","क॑जँ॑","क॑चिँ॒","क॑टीँ॑","क॑टेँ॑","क॑ठँ॑","क॑डँ॑","क॑ड्डँ॑","क॑णँ॑","क॑णँ॑","क॑ठिँ॒","क॑डिँ॑","क॑डिँ॒","क॑त्थँ॒","क॑दँ॒","क॑ड्डँ॑","क॑नीँ॑","क॑दिँ॑","क॑दिँ॒","क॑पँ॒","क॑बृँ॒","क॑मुँ॒","क॑पिँ॒","क॑र्जँ॑","क॑र्दँ॑","क॑र्बँ॑","क॑र्वँ॑","क॑लँ॒","क॑ल्लँ॒","क॑षँ॑","क॑सँ॑","का॑क्षिँ॑","का॑चिँ॒","का॑शृँ॒","का॑सृँ॒","कि॑टँ॑","कि॑टँ॑","कि॑तँ॑","की॑लँ॑","कु॒ङ्","कु॑कँ॒","कु॑चँ॑","कु॑चँ॑","कु॑जुँ॑","कु॑ञ्चँ॑","कु॑जिँ॑","कु॑टिँ॑","कु॑ठिँ॑","कु॑डिँ॒","कु॑डिँ॑","कु॑थिँ॑","कु॑बिँ॑","कु॑र्द॒","कु॑लँ॑","कू॑जँ॑","कू॑लँ॑","कृ॒ञ्","कृ॑विँ॑","कृ॑पँ॒","कृ॑पूँ॒","कृ॒षँ॑","कृ॑पूँ॒","के॑पृँ॒","के॑लृँ॑","के॑वृँ॒","कै॒","क्न॑थँ॑","क्नू॑यीँ॒","क्म॑रँ॑","क्र॑थँ॑","क्र॑दँ॒","क्र॑दिँ॑","क्र॑दिँ॒","क्र॑पँ॒","क्र॑मुँ॑","क्री॑डृँ॑","क्रु॑ञ्चँ॑","क्रु॒शँ॑","क्ल॑थँ॑","क्ल॑दँ॒","क्ल॑दिँ॑","क्ल॑दिँ॒","क्लि॑दिँ॒","क्लि॑दिँ॑","क्ली॑बृँ॒","क्लु॒ङ्","क्ले॑शँ॒","क्व॑णँ॑","क्व॑थेँ॑","क्ष॑जिँ॒","क्ष॒प॑य॒॑श्च॑","क्ष॑मूँ॒ष्","क्ष॑रँ॑","क्षि॒","क्षि॑वुँ॑","क्षी॑जँ॑","क्षी॑बृँ॒","क्षी॑वृँ॒","क्षु॑भँ॒","क्षु॑रँ॑","क्षे॑वुँ॑","क्षै॒","क्ष्मा॑यीँ॒","क्ष्मी॑लँ॑","ञिक्ष्वि॑दाँ॑","ञिक्ष्वि॑दाँ॑","क्ष्वे॑लृँ॑","ख॑जँ॑","ख॑जिँ॑","ख॑टँ॑","ख॑डिँ॒","ख॑दँ॑","ख॑नुँ॒॑","ख॑र्जँ॑","ख॑र्दँ॑","ख॑र्बँ॑","ख॑र्वँ॑","ख॑लँ॑","ख॑षँ॑","खा॑दृँ॑","खि॑टँ॑","खु॒ङ्","खु॑जुँ॑","खु॑र्द॒","खे॑लृँ॑","खे॑वृँ॒","खै॒","खो॑रृँ॑","खो॑लृँ॑","ग॑जँ॑","ग॑जिँ॑","ग॑डँ॑","ग॑डिँ॑","ग॑डिँ॑","ग॑दँ॑","ग॒मॢँ॑","ग॑र्जँ॑","ग॑र्दँ॑","ग॑र्बँ॑","ग॑र्वँ॑","ग॑र्हँ॒","ग॑लँ॑","ग॑ल्भँ॒","ग॑ल्हँ॒","गा॒ङ्","गा॑धृँ॒","गा॑हूँ॒","गु॒ङ्","गु॒ङ्","गु॑जँ॑","गु॑जिँ॑","गु॑दँ॒","गु॑पँ॒","गु॑पूँ॑","गु॑र्द॒","गु॑र्वीँ॑","गु॑हूँ॒॑","गृ॑हूँ॒","गृ॒","गृ॑जँ॑","गृ॑जिँ॑","गे॑पृँ॒","गे॑वृँ॒","गे॑षृँ॒","गै॒","गो॑ष्टँ॒","ग्र॑थिँ॒","ग्र॑सुँ॒","ग्रु॑चुँ॑","ग्ल॑सुँ॒","ग्ल॑हँ॒","ग्लु॑चुँ॑","ग्लु॑ञ्चँ॑","ग्ले॑पृँ॒","ग्ले॑पृँ॒","ग्ले॑वृँ॒","ग्ले॑षृँ॑","ग्लै॒","घ॑ग्घँ॑","घ॑घँ॑","घ॑टँ॒","घ॑ट्टँ॒","घ॑षँ॒","घ॑सॢँ॑","घि॑णिँ॒","घु॒ङ्","घु॑षिँ॒","घु॑टँ॒","घु॑णँ॒","घु॑णिँ॒","घु॑षिँ॑र्","घू॑र्णँ॒","घृ॒","घृ॑णिँ॒","घृ॑षुँ॑","घ्रा॒","ध्रा॑घृँ॒","ङु॑ङ्","च॑कँ॑","च॑कँ॒","च॑ञ्चुँ॑","च॑टेँ॑","च॑णँ॑","च॑डिँ॒","च॑तेँ॒॑","च॑देँ॒॑","च॑नँ॑","च॑दिँ॑","च॑पँ॑","च॑मुँ॑","च॑यँ॒","च॑रँ॑","च॑र्चँ॑","च॑र्बँ॑","च॑र्वँ॑","च॑लँ॑","च॑षँ॒॑","च॑हँ॑","चा॑यृँ॒॑","चि॑टँ॑","चि॑तीँ॑","चि॑ल्लँ॑","ची॑बृँ॒॑","ची॑भृँ॒","ची॑वृँ॒॑","चु॑च्यँ॑","चु॑ड्डँ॑","चु॑डिँ॑","चु॑ड्डँ॑","चु॑पँ॑","चु॑बिँ॑","चु॑ल्लँ॑","चू॑षँ॑","चे॑लृँ॑","चे॑ष्टँ॒","च्यु॑तिँ॑र्","छ॑मुँ॑","छ॑षँ॒॑","ज॑जँ॑","ज॑जिँ॑","ज॑टँ॑","ज॑पँ॑","ज॑भीँ॒","ज॑मुँ॑","ज॑र्त्सँ॑","ज॑र्त्सँ॑","ज॑र्त्सँ॑","ज॑लँ॑","ज॑ल्पँ॑","ज॑षँ॑","जि॒","जिँ॒","जि॑विँ॑","जि॑मुँ॑","जि॑षुँ॑","जी॑वँ॑","जु॒ङ्","जु॒","जु॑गिँ॑","जु॑तृँ॒","जू॑षँ॑","जृ॑भिँ॒","जे॑षृँ॒","जे॑हृँ॒","जै॒","ज्यु॒ङ्","ज्यु॑तिँ॑र्","ज्रि॒","ज्व॑रँ॑","ज्व॑लँ॑","ज्व॑लँ॑","झ॑टँ॑","झ॑मुँ॑","झ॑र्त्सँ॑","झ॑र्त्सँ॑","झ॑र्त्सँ॑","झ॑षँ॑","झ॑षँ॒॑","ट॑लँ॑","टि॑कृँ॒","टी॑कृँ॒","ट्व॑लँ॑","डी॑ङ्","ढौ॑कृँ॒","त॑सिँ॑","त॑कँ॑","त॑क्षूँ॑","त॑क्षँ॑","त॑किँ॑","त॑गिँ॑","त॑ञ्चुँ॑","त॑टँ॑","त॑डिँ॒","त॒पँ॑","त॑यँ॒","त॑र्जँ॑","त॑र्दँ॑","ता॑यृँ॒","ति॑कृँ॒","ति॑जँ॒","ति॒पृँ॒","ति॑लँ॑","ति॑ल्लँ॑","ती॑कृँ॒","ती॑वँ॑","तु॑जँ॑","तु॑जिँ॑","तु॑डृँ॑","तु॑डिँ॒","तु॑पँ॑","तु॑फँ॑","तु॑भँ॒","तु॑म्पँ॑","तु॑म्फँ॑","तु॑बिँ॑","तु॑र्वी॑","तु॑सँ॑","तु॑हिँ॑र्","तू॑डृँ॑","तू॑लँ॑","तू॑षँ॑","तृ॑क्षँ॑","तॄ॑","ते॑जँ॑","ते॑पृँ॒","ते॑वृँ॒","त्य॒जँ॑","त्र॑क्षँ॑","त्र॑खँ॑","त्र॑किँ॒","त्र॑गिँ॑","त्र॑दिँ॑","त्र॑पूँ॒ष्","त्रि॑खिँ॑","त्रु॑पँ॑","त्रु॑फँ॑","त्रु॑म्पँ॑","त्रु॑म्फँ॑","त्रै॒ङ्","त्रौ॑कृँ॒","त्व॑क्षूँ॑","त्व॑गिँ॑","त्व॑ञ्चुँ॑","ञित्व॑राँ॒","त्वि॒षँ॒॑","त्स॑रँ॑","थ॑किँ॑","थु॑र्वी॑","दं॒शँ॑","द॑क्षँ॒","द॑क्षँ॒","द॑घिँ॑","द॑दँ॒","द॑धँ॒","द॑यँ॒","द॑लँ॑","द॒हँ॑","दा॒ण्","दा॑नँ॒॑","दा॑शृँ॒॑","दा॑सृँ॒॑","दि॑विँ॑","दी॑क्षँ॒","दु॒","दु॑र्वीँ॑","दु॑हिँ॑र्","दृ॑हिँ॑","दृ॑हँ॑","दॄ॑","दे॒ङ्","दे॑वृँ॒","दै॒प्","दृ॒शिँ॑र्","द्यु॑तँ॒","द्यै॒","द्र॑मँ॑","द्रा॑खृँ॑","द्रा॑घृँ॒","द्रा॑क्षिँ॑","द्रा॑डृँ॒","द्रा॑हृँ॒","द्रु॒","द्रे॑कृँ॒","द्रै॒","द्वृ॒","ध॑णँ॑","ध॑विँ॑","धा॑वुँ॒॑","धि॑क्षँ॒","धि॑विँ॑","धु॑क्षँ॒","धु॑र्वीँ॑","धू॑पँ॑","धृ॒ङ्","धृ॒ञ्","धृ॑जँ॑","धृ॑जिँ॑","धे॒ट्","धे॑पृँ॒","धो॑रृँ॑","ध्मा॒","ध्मा॑क्षिँ॑","ध्यै॒","ध्र॑जँ॑","ध्र॑जिँ॑","ध्र॑णँ॑","ध्रा॑खृँ॑","ध्रा॑क्षिँ॑","ध्रा॑डृँ॒","ध्रि॑जँ॑","ध्रु॒","ध्रे॑कृँ॒","ध्रै॒","ध्वं॑सुँ॒","ध्व॑जँ॑","ध्व॑जिँ॑","ध्व॑णँ॑","ध्व॑नँ॑","ध्व॑नँ॑","ध्वा॑क्षिँ॑","ध्वृ॒","ण॑क्षँ॑","ण॑खँ॑","ण॑खिँ॑","ण॑टँ॑","ण॑टँ॑","ण॑दँ॑","टुन॑दिँ॑","ण॑भँ॒","ण॒मँ॑","ण॑यँ॒","न॑र्दँ॑","ण॑लँ॑","ण॑सँ॒","ना॑थृँ॒","ना॑धृँ॒","णा॑सृँ॒","णि॑क्षँ॑","णि॑दृँ॒॑","णि॑दिँ॑","णि॑विँ॑","णि॑शँ॑","णि॑षुँ॑","णी॒ञ्","णी॑लँ॑","णी॑वँ॑","नॄ॑","णे॑दृँ॒॑","णे॑षृँ॒","प॑क्षँ॑","डुप॒चँ॒॑ष्","प॑चिँ॒","प॑टँ॑","प॑ठँ॑","प॑णँ॒","प॑डिँ॒","प॑तॢँ॑","प॑थेँ॑","प॑नँ॒","प॑यँ॒","प॑र्दँ॒","प॑र्पँ॑","प॑र्बँ॑","प॑र्वँ॑","प॑लँ॑","पे॑लृँ॑","पा॒","पि॑टँ॑","पि॑ठँ॑","पि॑डिँ॒","पि॑विँ॑","पि॑सृँ॑","पी॑लँ॑","पी॑वँ॑","पु॑टँ॑","पु॑डँ॑","पु॑डिँ॑","पु॑थिँ॑","पु॑र्वँ॑","पु॑लँ॑","पु॑षँ॑","पू॑ङ्","पू॑यीँ॒","पु॑र्वँ॑","पू॑लँ॑","पू॑षँ॑","पृ॑षुँ॑","पे॑लृँ॑","पे॑वृँ॒","पे॑षृँ॒","पे॑सृँ॑","पै॒","पै॑णृँ॑","ओँ॑प्या॑यीँ॒","प्यै॒ङ्","प्र॑थँ॒","प्र॑सँ॒","प्रु॒ङ्","प्रु॑षुँ॑","प्रे॑षृँ॒","प्रै॑णृँ॑","प्रो॑थृँ॒॑","प्ल॑क्षँ॒॑","प्लि॑हँ॒","प्लु॒ङ्","प्लु॑षुँ॑","प्ले॑वृँ॒","फ॑क्कँ॑","फ॑णँ॑","फ॑लँ॑","ञिफ॑लाँ॑","फु॑ल्लँ॑","फे॑लृँ॑","ब॑हिँ॒","ब॑ठँ॑","ब॑णँ॑","ब॑टिँ॑","ब॑दँ॑","ब॑धँ॒","व॑भ्रँ॑","ब॑र्बँ॑","ब॑र्हँ॒","ब॑लँ॑","ब॑ल्हँ॒","बा॑डृ॒","बा॑धृँ॒","बा॑हृँ॒","बि॑टँ॑","बि॑दिँ॑","बि॑सँ॑","बी॑भृँ॒","बु॑क्कँ॑","बु॑गिँ॑","बु॑धँ॑","बु॑धिँ॒॑र्","उँ॑बु॑न्दिँ॒॑र्","बृ॑हिँ॑","बृ॑हँ॑","बे॑सँ॑","वे॑हृँ॒","व्र॑णँ॑","भ॑क्षँ॒॑","भ॒जँ॒॑","भ॑टँ॑","भ॑टँ॑","भ॑णँ॑","भ॑डिँ॒","भ॑दिँ॒","भ॑र्बँ॑","भ॑र्भँ॑","भ॑र्वँ॑","भ॑लँ॒","भ॑ल्लँ॒","भ॑षँ॑","भा॑मँ॒","भा॑षँ॒","भा॑सृँ॒","भि॑क्षँ॒","ञिमि॑दाँ॒","भि॑दिँ॑","भू॑","भू॑षँ॑","भृ॒ञ्","भृ॑जीँ॒","भे॑षृँ॒॑","भ्य॑सँ॒","भ्रं॑शुँ॑","भ्रं॑सुँ॒","भ्र॑क्षँ॒॑","भ्र॑णँ॑","भ्र॑मुँ॑","टुभ्रा॑जृँ॒","भ्रा॑जृँ॒","टुभ्रा॑शृँ॒","भ्रे॑जृँ॒","भ्रे॑षृँ॒॑","भ्ल॑क्षँ॒॑","टुभ्ला॑शृँ॒","भ्ले॑षृँ॒॑","म॑हिँ॒","म॑खँ॑","म॑किँ॒","म॑खिँ॑","म॑गिँ॑","म॑घिँ॒","म॑घिँ॑","म॑चँ॒","म॑चिँ॒","म॑ठँ॑","म॑णँ॑","म॑ठिँ॒","म॑डिँ॒","म॑डिँ॑","म॑थेँ॑","म॑न्थँ॑","म॑थिँ॑","म॑दिँ॒","म॑भ्रँ॑","म॑यँ॒","म॑र्बँ॑","म॑र्वँ॑","म॑लँ॒","म॑ल्लँ॒","म॑वँ॑","म॑व्यँ॑","म॑शँ॑","म॑षँ॑","म॑स्कँ॒","म॑स्कँ॒","म॑हँ॑","मा॑क्षिँ॑","मा॑नँ॒","मा॑हृँ॒॑","मि॑थृँ॒॑","मि॑दृँ॒॑","मि॑धृँ॒॑","मि॑विँ॑","मि॑शँ॑","मि॑षुँ॑","मि॒हँ॑","मी॑मृँ॑","मी॑लँ॑","मी॑वँ॑","मु॑खिँ॑","मु॑जँ॑","मु॑चि॒","मु॑जिँ॑","मु॑टँ॑","मु॑डँ॑","मु॑ठिँ॒","मु॑डिँ॑","मु॑डिँ॒","मु॑दँ॒","मु॑र्छाँ॑","मु॑र्वीँ॑","मू॑ङ्","मू॑लँ॑","मू॑षँ॑","मृ॑क्षँ॑","मृ॑धुँ॒॑","मृ॑षुँ॑","मे॒ङ्","मे॑थृँ॒॑","मे॑दृँ॒॑","मे॑धृँ॒॑","मे॑पृँ॒","मे॑वृँ॒","म्ना॒","म्र॑क्षँ॑","म्र॑दँ॒","म्रु॑चुँ॑","म्रु॑ञ्चुँ॑","म्रे॑टृँ॑","म्रे॑डृँ॑","म्लु॑चुँ॑","म्लु॑ञ्चुँ॑","म्ले॑छँ॑","म्ले॑टृँ॑","म्ले॑वृँ॒","म्लै॒","य॒जँ॒॑","य॑तीँ॒","य॒भँ॑","य॒मँ॑","टुया॑चृँ॒॑","यु॑गिँ॑","यु॑छँ॑","यु॑तृँ॒","यू॑षँ॑","ये॑षृँ॒","यौ॑टृँ॑","र॑हिँ॑","र॑क्षँ॑","र॑खँ॑","र॑गेँ॑","र॑खिँ॑","र॑गिँ॑","र॑घिँ॒","र॒ञ्जँ॒॑","र॑टँ॑","र॑टँ॑","र॑ठँ॑","र॑णँ॑","र॑णँ॑","र॑विँ॑","र॑दँ॑","र॑पँ॑","र॑फँ॑","र॒भँ॒","र॒मुँ॒","र॑फिँ॑","र॑बिँ॒","र॑भिँ॒","र॑यँ॒","र॑सँ॑","र॑हँ॑","रा॑खृँ॑","रा॑घृँ॒","रा॑जृँ॒॑","रा॑सृँ॒","रि॑खँ॑","रि॑खिँ॑","रि॑गिँ॑","रि॑विँ॑","रि॑षँ॑","रु॒ङ्","रु॑चँ॒","रु॑टँ॒","रु॑ठँ॑","रु॑टिँ॑","रु॑ठिँ॑","रु॑ठिँ॑","रु॑डिँ॑","रु॑षँ॑","रु॒हँ॑","रू॑षँ॑","रे॑कृँ॒","रे॑जृँ॒","रे॑टृँ॒॑","रे॑पृँ॒","रे॑भृँ॒","रे॑वृँ॒","रे॑षृँ॒","रै॒","रो॑डृँ॑","रौ॑डृँ॑","ल॑खँ॑","ल॑गेँ॑","ल॑खिँ॑","ल॑गिँ॑","ल॑घिँ॒","ल॑घिँ॑","ल॑छँ॑","ल॑जँ॑","ल॑जिँ॑","ल॑टँ॑","ल॑डँ॑","ल॑पँ॑","डुल॒भँ॒ष्","ल॑बिँ॒","ल॑बिँ॒","ल॑भिँ॒","ल॑यँ॒","ल॑र्बँ॑","ल॑लँ॑","ल॑षँ॒॑","ल॑सँ॑","ला॑खृँ॑","ला॑घृँ॒","ला॑जँ॑","ला॑छिँ॑","ला॑जिँ॑","लि॑खँ॑","लि॑खिँ॑","लि॑गिँ॑","लु॑ञ्चँ॑","लु॑टँ॒","लु॑टँ॑","लु॑ठँ॒","लु॑ठँ॑","लु॑डँ॑","लु॑टिँ॑","लु॑ठिँ॑","लु॑ठिँ॑","लु॑ठिँ॑","लु॑डिँ॑","लु॑थिँ॑","लु॑बिँ॑","लू॑षँ॑","ले॑पृँ॒","लो॑कृँ॒","लो॑चृँ॒","लो॑डृँ॑","लो॑ष्टँ॒","व॑क्षँ॑","व॑खँ॑","व॑किँ॒","व॑किँ॒","व॑खिँ॑","व॑गिँ॑","व॑घिँ॒","व॑जँ॑","व॑ञ्चुँ॑","व॑टँ॑","व॑टँ॑","व॑ठँ॑","व॑णँ॑","व॑टिँ॑","व॑ठिँ॒","व॑डिँ॒","व॑दँ॑","व॑नँ॑","व॑नुँ॑","व॑नँ॑","व॑दिँ॒","डुव॒पँ॒॑","व॑भ्रँ॑","टुव॑मँ॑","व॑यँ॒","व॑र्चँ॒","व॑र्षँ॒","व॑र्हँ॒","व॑ल॒","व॑ल्गँ॑","व॑ल्भँ॒","व॑ल्लँ॒","व॑ल्हँ॒","व॑षँ॑","व॑स्कँ॒","व॒सँ॑","व॑स्कँ॒","व॒हँ॒॑","वा॑क्षिँ॑","वा॑छिँ॑","वा॑डृ॒","बा॑हृँ॒","वि॑टँ॑","वि॑थृँ॒","वि॑षुँ॑","वि॑सँ॑","वी॑जँ॒","वु॑गिँ॑","बृ॑हिँ॑","वृ॑कँ॒","वृ॑क्षँ॒","वृ॑तुँ॒","वृ॑धुँ॒","वृ॑षुँ॑","बृ॑हँ॑","वे॒ञ्","वे॑णृँ॒॑","वे॑थृँ॒","वे॑नृँ॒॑","टुवे॑पृ॒","वे॑लृँ॑","वे॑ल्लँ॑","वे॑ष्टँ॒","वे॑सँ॑","वे॑हृँ॒","वे॑ल्लँ॑","ओँ॑वै॑","व्य॑थँ॒","व्य॑यँ॒॑","व्ये॒ञ्","व्र॑जँ॑","व्र॑जँ॑","व्र॑जिँ॑","व्र॑णँ॑","शं॑सुँ॑","श॑किँ॒","श॑चँ॒","श॑टँ॑","श॑ठँ॑","श॑णँ॑","श॑डिँ॒","श॒दॢँ॑","श॒पँ॒॑","श॑र्बँ॑","श॑र्वँ॑","श॑लँ॑","श॑लँ॒","श॑ल्भँ॒","श॑वँ॑","श॑शँ॑","श॑षँ॑","श॑सुँ॑","शा॑खृँ॑","शा॑डृँ॒","शा॑नँ॒॑","शि॑क्षँ॒","शि॑खिँ॑","शि॑घिँ॑","शि॑टँ॑","शि॑षँ॑","शी॑कृँ॒","शी॑भृँ॒","शी॑लँ॑","शु॑कँ॑","शु॑चँ॑","शु॑च्यँ॑","शु॑ठँ॑","शु॑ठिँ॑","शु॑ठिँ॑","शु॑न्धँ॑","शु॑भँ॑","शु॑भँ॒","शु॑म्भँ॑","शू॑लँ॑","शू॑षँ॑","शृ॑धुँ॒॑","शृ॑धुँ॒","शे॑लृँ॑","शे॑वृँ॒","शै॒","शो॑णृँ॑","शौ॑टृँ॑","श्चु॑तिँ॑र्","श्च्यु॑तिँ॑र्","श्न॑थँ॑","श्मी॑लँ॑","स्य॑न्दूँ॒","च्यु॒ङ्","श्यै॒ङ्","स्रं॑सुँ॒","स्रं॑सुँ॒","श्र॑किँ॒","श्र॑गिँ॑","श्र॑णँ॑","श्र॑थँ॑","श्र॑थिँ॒","श्र॑म्भुँ॒","श्रा॑","श्रि॑ञ्","श्रि॑षुँ॑","श्रु॒","श्रै॒","श्रो॑णृँ॑","श्ल॑किँ॒","श्ल॑गिँ॑","श्ल॑थँ॑","श्ला॑खृँ॑","श्ला॑घृँ॒","श्लि॑षुँ॑","श्लो॑कृँ॒","श्लो॑णृँ॑","श्व॑किँ॒","श्र॑गिँ॑","श्व॑चँ॒","श्व॑चिँ॒","श्व॑लँ॑","श्व॑ल्लँ॑","टुओँश्वि॑","श्वि॑ताँ॑","श्वि॑दिँ॒","ष्ट्यै॒","ष्ठि॑वुँ॑","ष्व॑स्कँ॒","ष्व॑स्कँ॒","ष॑गेँ॑","ष॑चँ॒॑","ष॑चँ॒","ष॑स्जँ॑","ष॒ञ्जँ॑","ष॑टँ॑","ष॒दॢँ॑","ष॑नँ॑","ष॑पँ॑","ष॑मँ॑","ष॑र्क्षँ॑","ष॑र्जँ॑","ष॑र्बँ॑","ष॑र्वँ॑","ष॑लँ॑","ष॑स्जँ॑","ष॑हँ॒","षि॑टँ॑","षि॑धँ॑","षि॑धूँ॑","षि॑विँ॑","षि॑भुँ॑","षि॑म्भुँ॑","सी॑कृँ॒","षु॒","षू॑दँ॒","सू॑र्क्षँ॑","षू॑र्क्ष्यँ॑","सू॑षँ॑","सृ॒","सृ॒पॢँ॑","षृ॑भुँ॑","षृ॑म्भुँ॑","से॑कृँ॒","षे॑लृँ॑","षे॑वृँ॒","षै॒","स्क॒न्दिँ॑र्","स्क॑भिँ॒","स्कु॑दिँ॒","स्ख॑दँ॒","स्ख॑लँ॑","ष्ट॑कँ॑","ष्ट॑नँ॑","ष्ट॑मँ॑","ष्ट॑भिँ॒","ष्ठ॑लँ॑","ष्टि॑पृँ॒","ष्टु॑चँ॒","ष्टु॑भुँ॒","ष्टृ॑क्षँ॑","ष्टे॑पृँ॒","ष्टै॒","स्त्यै॒","ष्ट्र॑क्षँ॑","ष्ठ॑गेँ॑","ष्ठा॒","ष्णै॒","स्प॑दिँ॒","स्प॑र्धँ॒","स्प॑शँ॒॑","स्फा॑यीँ॒","स्फु॑टँ॒","स्फु॑टिँ॑र्","स्फु॑टिँ॑","स्फु॑डिँ॒","स्फु॑र्छाँ॑","टुओँस्फू॑र्जाँ॑","ष्मि॒ङ्","स्मी॑लँ॑","स्मृ॑","स्मृ॒","स्य॑मुँ॑","स्रं॑सुँ॒","स्र॑किँ॒","स्र॑म्भुँ॒","स्र॑म्भुँ॒","स्रु॒","स्रे॑कृँ॒","स्रै॒","स्रो॑कृँ॒","ष्व॑किँ॒","श्र॑गिँ॑","ष्व॒ञ्जँ॒","ष्व॑दँ॒","स्व॑नँ॑","स्व॑नँ॑","स्व॑र्दँ॒","ष्व॑स्कँ॒","ष्व॑स्कँ॒","स्वा॑दँ॒","ञिष्वि॑दाँ॒","स्वृ॒","ह॑टँ॑","ह॑ठँ॑","ह॒दँ॒","ह॑म्मँ॑","ह॑र्यँ॑","ह॑यँ॑","ह॑लँ॑","ह॑सेँ॑","हि॑क्कँ॒॑","हि॑टँ॑","हि॑डिँ॒","हि॑विँ॑","हु॑डृँ॑","हु॑डिँ॒","हु॑डिँ॒","हु॑र्छाँ॑","हु॑लँ॑","हु॑लँ॑","हू॑डृँ॑","हृ॒ञ्","हृ॑षुँ॑","ह्र॑सँ॑","हे॑ठँ॒","हे॑ठँ॑","हे॑डृँ॒","हे॑डँ॑","हे॑पृँ॒","हे॑षृँ॒","हो॑डृँ॒","हो॑डृँ॑","ह्म॑लँ॑","ह्र॑गेँ॑","ह्र॑सँ॑","ह्रा॑दँ॒","ह्री॑छँ॑","ह्रे॑षृँ॒","ह्ल॑गेँ॑","ह्ल॑सँ॑","ह्ला॑दीँ॒","ह्व॑लँ॑","ह्वृ॒","ह्वृ॒","ह्वे॒ञ्");
$divAdi1=array("अ॑णँ॒","अ॑नुरु॒धँ॒","अ॑नँ॒","अ॑सुँ॑","इ॑षँ॑","ई॒ङ्","उ॑चँ॑","ऋ॑धुँ॑","का॑शृँ॒","कुं॑शँ॑","कुं॑सँ॑","कु॑थँ॑","कु॑पँ॑","कु॑शँ॑","कु॑सँ॑","कृ॑शँ॑","क्न॑सुँ॑","क्रु॒धँ॑","क्ल॑मुँ॑","क्लि॑दूँ॑","क्लि॑शँ॒","क्ष॑मूँ॑","क्षि॒पँ॑","क्षु॒धँ॑","क्षु॑भँ॑","ञिक्ष्वि॑दाँ॑","खि॒दँ॒","गु॑धँ॑","गु॑पँ॑","गू॑रीँ॒","गृ॑धुँ॑","घू॑री॒","चू॑रीँ॒","छो॒","ज॑नीँ॒","ज॑सुँ॑","जू॑रीँ॒","जॄ॑ष्","झॄ॑ष्","डि॑पँ॑","डी॒ङ्","त॒पँ॒","त॑मुँ॑","त॑सुँ॑","ति॑मँ॑","ती॑मँ॑","तु॑भँ॑","तु॒षँ॑","तू॑रीँ॒","तृ॒पँ॑","ञितृ॑षँ॑","त्र॑सीँ॑","द॑मुँ॑","द॑सुँ॑","दि॑वुँ॑","दी॑ङ्","दी॑पीँ॒","दु॒षँ॑","दू॑ङ्","दृ॒पँ॑","दो॒","द्रु॒हँ॑","धी॒ङ्","धू॑री॒","ण॑भँ॑","ण॒शँ॑","ण॒हँ॒॑","नृ॑तीँ॑","प॒दँ॒","पी॒ङ्","पु॑थँ॑","पु॑षँ॑","पु॒षँ॑","पु॑ष्पँ॑","पू॑रीँ॒","प्यु॑षँ॑","प्यु॑सँ॑","प्री॒ङ्","प्लु॑षँ॑","प्लु॑षँ॑","ब॑सुँ॑","वि॑सँ॑","बु॒धँ॒","बु॑सँ॑","बु॑सँ॑","ब्यु॑सँ॑","भ॑सुँ॑","भृं॑शुँ॑","भृ॑शुँ॑","भ्रं॑शुँ॑","भ्र॑मुँ॑","म॑दीँ॑","म॒नँ॒","म॑सीँ॑","मा॒ङ्","ञिमि॑दाँ॑","मी॒ङ्","मु॑सँ॑","मु॒हँ॑","मृ॑षँ॒॑","य॑सुँ॑","यु॒जँ॒","यु॒धँ॒","यु॑पँ॑","र॒ञ्जँ॒॑","र॒धँ॑","रा॒धः","रि॑षँ॑","री॒ङ्","रु॑पँ॑","रु॑षँ॑","लि॒शँ॒","ली॒ङ्","लु॑टँ॑","लु॑ठँ॑","लु॑पँ॑","लु॑भँ॑","व॑सुँ॑","वा॑वृ॑तुँ॒","वा॑शृँ॒","वि॒दँ॒","बि॑सँ॑","वु॑सँ॑","वृ॑तुँ॒","वृ॑शँ॑","व्य॒धँ॑","व्यु॑षँ॑","व्यु॑षँ॑","व्यु॑सँ॑","व्री॒ङ्","व्री॑डँ॑","श॒कँ॒॑","श॒पँ॒॑","श॑मुँ॑","ईँ॑शु॑चिँ॒॑र्","शु॒धँ॑","शु॒षँ॑","शू॑रीँ॒","शो॒","श्र॑मुँ॑","श्लि॒षँ॑","ष्ठि॑वुँ॑","स॑मीँ॑","ष॑हँ॑","षि॒धुँ॑","षि॑वुँ॑","षु॑हँ॑","षू॑ङ्","सृ॒जँ॒","षो॒","ष्टि॑मँ॑","ष्टी॑मँ॑","ष्टु॑पँ॑","ष्टू॑पँ॑","ष्ण॑सुँ॑","ष्णि॒हँ॑","ष्णु॑सुँ॑","ष्णु॒हँ॑","स्रि॑वुँ॑","ष्वि॒दाँ॑","हृ॑षँ॑");
$tudAdi1=array("इ॑लँ॑","इ॑षँ॑","उ॑छीँ॑","उ॑ज्झँ॑","उ॑छिँ॑","उ॑ज्झँ॑","उ॑ब्जँ॑","उ॑भँ॑","उ॑म्भँ॑","ऋ॑चँ॑","ऋ॑छँ॑","ऋ॑फँ॑","ऋ॑म्फँ॑","ऋ॑षीँ॑","क॑डँ॑","कि॑लँ॑","कु॑ङ्","कु॑चँ॑","कु॑टँ॑","कु॑डँ॑","कु॑णँ॑","कु॑रँ॑","कू॑ङ्","कृ॑डँ॑","कृ॑तीँ॑","कृ॒षँ॒॑","कॄ॑","क्रु॑डँ॑","क्षि॒","क्षि॒पँ॒॑","क्षु॑रँ॑","खि॒दँ॑","खु॑डँ॑","खु॑रँ॑","गु॒","गु॑जँ॑","गु॑डँ॑","गु॑फँ॑","गु॑म्फँ॑","गु॑रीँ॒","गॄ॑","घु॑टँ॑","घु॑णँ॑","घु॑रँ॑","घू॑र्णँ॑","च॑र्चँ॑","च॑लँ॑","चि॑लँ॑","चु॑टँ॑","चु॑डँ॑","चृ॑तीँ॑","छु॑टँ॑","छु॑डँ॑","छु॒पँ॑","छु॑रँ॑","ज॑र्जँ॑","जु॑टँ॑","जु॑डँ॑","जु॑डँ॑","जु॑नँ॑","जु॑षीँ॒","झ॑र्झँ॑","डि॑पँ॑","ति॑लँ॑","तु॑टँ॑","तु॑डँ॑","तु॑णँ॑","तु॒दँ॒॑","तु॑पँ॑","तु॑फँ॑","तु॑म्पँ॑","तु॑म्फँ॑","तृं॑हूँ॑","तृ॑पँ॑","तृ॑फँ॑","तृ॑म्पँ॑","तृ॑म्फँ॑","तृ॑हूँ॑","त्रु॑टँ॑","त्व॑चँ॑","थु॑डँ॑","दि॒शँ॒॑","दृ॒ङ्","दृ॑पँ॑","दृ॑फँ॑","दृ॑भीँ॑","दृ॑म्पँ॑","दृ॑म्फँ॑","द्रु॑णँ॑","धि॒","धू॑","धू॑","धृ॒ङ्","ध्रु॒","णि॑लँ॑","णू॑","णु॒दँ॑","णु॒दँ॒॑","णू॑","पि॒","पि॑शँ॑","पु॑टँ॑","पु॑डँ॑","पु॑णँ॑","पु॑रँ॑","पृ॒ङ्","पृ॑डँ॑","पृ॑णँ॑","प्र॒छँ॑","बि॑लँ॑","बृ॑हूँ॑","भु॒जोँ॑","भृ॑डँ॑","भ्र॒स्जँ॒॑","भ्र॒स्जँ॒॑","टुम॒स्जोँ॑","टुम॒स्जोँ॑","मि॑छँ॑","मि॑लँ॑","मि॑लँ॒॑","मि॑षँ॑","मु॒चॢँ॒॑॑","मु॑टँ॑","मु॑णँ॑","मु॑रँ॑","मृ॒ङ्","मृ॑डँ॑","मृ॑णँ॑","मृ॒शँ॑","रि॒","रि॑फँ॑","रि॒शँ॑","रि॑हँ॑","रु॒जोँ॑","रु॒शँ॑","ओँ॑ल॑जीँ॒","ओँ॑ल॑स्जीँ॒","ओँ॑ल॑स्जीँ॒","लि॑खँ॑","लि॒पँ॒॑","लि॒शँ॑","लु॑टँ॑","लु॑ठँ॑","लु॑डँ॑","लु॒पॢँ॒॑॑","लु॑भँ॑","वि॑छँ॑","ओँ॑वि॑जीँ॒","वि॑दॢँ॒॑॑","वि॑धँ॑","वि॑लँ॑","वि॒शँ॑","वृ॑णँ॑","वृ॑हूँ॑","व्य॑चँ॑","ओँ॑व्र॑श्चूँ॑","व्रु॑डँ॑","श॒दॢँ॑","शि॑लँ॑","शु॑नँ॑","शु॑भँ॑","शु॑म्भँ॑","ष॒दॢँ॑","षि॒चँ॒॑","षि॑लँ॑","षु॑रँ॑","षू॑","सृ॒जँ॑","स्तृ॑हूँ॑","स्थु॑डँ॑","स्पृ॒शँ॑","स्फ॑रँ॑","स्फ॑लँ॑","स्फु॑टँ॑","स्फु॑डँ॑","स्फु॑रँ॑","स्फु॑लँ॑","हि॑लँ॑","हु॑डँ॑");
$curAdi1=array("अं॑सँ॑","अ॑हिँ॑","अ॑ङ्कँ॑","अ॑ङ्गँ॑","अ॑ञ्चुँ॑","अ॑जिँ॑","अ॑ट्टँ॑","अ॑न्धँ॑","अ॑मँ॑","अ॑र्कँ॑","अ॑र्चँ॑","अ॑र्जँ॑","अ॑र्थँ॒","अ॑र्दँ॑","अ॑र्हँ॑","अ॑र्हँ॑","आ॑क्रन्दँ","आ॑पॢँ॑","आ॒षदँ","इ॑लँ॑","ई॑डँ॑","ई॑रँ॑","क॑ठिँ॑","उ॑घ्र॑सँ॑","ऊ॑नँ॑","ऊ॑र्जँ॑","ओँ॑ल॑डिँ॑","क॑णँ॑","क॑ठिँ॑","क॑डिँ॑","क॑त्रँ॑","क॑त्रँ॑","क॑थँ॑","क॑र्णँ॑","क॑र्तँ॑","क॑लँ॑","क॑लँ॑","का॑लँ॑","की॑टँ॑","कु॑शिँ॑","कु॑सिँ॑","कु॑टँ॒","कु॑ट्टँ॑","कु॑ट्टँ॒","कु॑णँ॑","कु॑ठिँ॑","कु॑डिँ॑","कु॑डिँ॑","कु॑त्सँ॒","कु॑दृँ॑","कु॑द्रिँ॑","कु॑पँ॑","कु॑मा॑रँ॑","कु॑बिँ॑","कु॑भिँ॑","कु॑स्मँ॒","कु॑हँ॒","कू॑टँ॑","कू॑टँ॒","कू॑णँ॑","कू॑णँ॒","कृ॑पँ॑","कृ॒पे॑श्च॒॑","कॄ॑तँ॑","के॑तँ॑","क्ल॑पँ॑","क्ष॑जिँ॑","क्ष॑पँ॑","क्ष॑पिँ॑","क्ष॑लँ॑","क्षो॑टँ॑","ख॑ट्टँ॑","ख॑डँ॑","ख॑डिँ॑","खु॑डिँ॑","खे॑टँ॑","खे॑डँ॑","खो॑टँ॑","ग॑जँ॑","ग॑णँ॑","ग॑दीँ॑","ग॑न्धँ॒","ग॑र्जँ॑","ग॑र्दँ॑","ग॑र्धँ॑","ग॑र्वँ॒","ग॑र्हँ॑","ग॑लँ॒","ग॑वे॑षँ॑","गु॑णँ॑","गु॑ठिँ॑","गु॑डिँ॑","गु॑पँ॑","गु॑र्दँ॑","गू॑रँ॒","गृ॑हँ॒","गॄ॑","गो॑मँ॑","ग्र॑न्थँ॑","ग्र॑न्थँ॑","ग्र॑सँ॑","ग्रा॑मँ॑","घ॑टँ॑","घ॑टँ॑","घ॑ट्टँ॑","घ॑टिँ॑","घु॑षिँ॑र्","घृ॑","च॑क्कँ॑","च॑टँ॑","च॑डिँ॑","च॑नँ॑","च॑पँ॑","च॑पिँ॑","च॑रँ॑","च॑र्चँ॑","च॑लँ॑","च॑हँ॑","च॑हँ॑","चि॑","चि॑ञ्","चि॑तँ॒","चि॑त्रँ॑","चि॑तिँ॑","ची॑कँ॑","ची॑वँ॑","ची॑वँ॑","चु॑क्कँ॑","चु॑टँ॑","चु॑ट्टँ॑","चु॑टिँ॑","चु॑दँ॑","चु॑बिँ॑","चु॑रँ॑","चु॑लँ॑","चू॑र्णँ॑","चू॑र्णँ॑","चृ॑पँ॑","च्यु॑","छ॑जिँ॑","छ॑दँ॑","छ॑दँ॑","छ॑दँ॑","छ॑दिँ॑","छ॑र्द॑","छि॑द्रँ॑","छृ॑दीँ॑","छृ॑पँ॑","छे॑दँ॑","ज॑सिँ॑","ज॑भिँ॑","ज॑लँ॑","ज॑सुँ॑","ज॑सुँ॑","जि॑","चि॑","चि॑","जु॑डँ॑","जु॑षँ॑","जॄ॑","ज्ञ॑पँ॑","ज्ञा॑","ज्रि॑","ट॑किँ॑","ड॑पँ॒","डि॑पँ॑","डि॑पँ॒","त॑सिँ॑","त॑डँ॑","त॑डँ॑","त॑नुँ॑","त॑त्रिँ॒","त॑पँ॑","त॑र्कँ॑","त॑र्जँ॒","त॑लँ॑","ति॑जँ॑","ति॑लँ॑","ती॑रँ॑","तु॑जँ॑","तु॑जिँ॑","तु॑जिँ॑","तु॑डिँ॑","तु॑त्थँ॑","तु॑बिँ॑","तु॑लँ॑","तू॑णँ॒","तृ॑पँ॑","तृ॑पँ॑","त्र॑सिँ॑","त्र॑सँ॑","त्रु॑टँ॒","द॑शिँ॑","द॑शिँ॒","द॑सिँ॑","द॑सिँ॒","द॑ण्डँ॑","द॑लँ॑","द॑सँ॒","दि॑वुँ॒","दि॑वुँ॑","दुः॑खँ॑","दु॑लँ॑","दृ॑पँ॑","दृ॑भीँ॑","दृ॑भँ॑","ध॑क्कँ॑","धू॑पँ॑","धू॑ञ्","धू॑पँ॑","धू॑शँ॑","धू॑षँ॑","धू॑सँ॑","धृ॑षँ॑","उँ॑ध्र॑सँ॑","ध्व॑नँ॑","न॑क्कँ॑","न॑टँ॑","न॑टँ॑","ण॑डँ॑","न॑लँ॑","नि॑वा॑सँ॑","नि॑ष्कँ॒","प॑सिँ॑","प॑सिँ॑","प॑क्षँ॑","प॑चिँ॑","प॑टँ॑","प॑टँ॑","प॑डिँ॑","प॑तँ॑","प॑थँ॑","प॑दँ॒","प॑थिँ॑","प॑र्णँ॑","प॑लँ॑","प॑ल्यू॑लँ॑","प॑शँ॑","प॑षँ॑","पा॑रँ॑","पा॑लँ॑","पि॑सिँ॑","पि॑छँ॑","पि॑जँ॑","पि॑जिँ॑","पि॑जिँ॑","पि॑ठिँ॑","पि॑डिँ॑","पि॑शँ॑","पि॑सँ॑","पी॑डँ॑","पुं॑सँ॑","पु॑टँ॑","पु॑टँ॑","पु॑ट्टँ॑","पु॑णँ॑","पु॑टिँ॑","पु॑थँ॑","पु॑लँ॑","पु॑षँ॑","पु॑स्तँ॑","पू॑जँ॑","पू॑रीँ॑","पू॑र्णँ॑","पू॑र्वँ॑","पू॑लँ॑","पृ॑चँ॑","पृ॑थँ॑","पॄ॑","प्र॑थँ॑","प्री॑ञ्","ब॑धँ॑","ब॑न्धँ॑","ब॑र्हँ॑","ब॑र्हँ॑","ब॑लँ॑","ब॑ल्हँ॑","ब॑ष्कँ॑","ब॑स्तँ॒","बि॑लँ॑","बु॑क्कँ॑","बु॑स्तँ॑","बृ॑हिँ॑","ब्रू॑सँ॑","भ॑क्षँ॑","भ॑जँ॑","भ॑जिँ॑","भ॑डिँ॑","भ॑र्त्सँ॒","भ॑लँ॒","भा॑जँ॑","भा॑मँ॑","भू॑","भू॑","भू॑षँ॑","भृ॑शिँ॑","भ्रू॑णँ॒","म॑हिँ॑","म॑डिँ॑","म॑दँ॒","मा॑नँ॒","म॑त्रिँ॒","म॑र्चँ॑","म॑हँ॑","म॑नँ॒","मा॑नँ॑","मा॑र्गँ॑","मा॑र्जँ॑","मि॑जिँ॑","मि॑दँ॑","मि॑दिँ॑","मि॑श्रँ॑","मी॑","मु॑चँ॑","मु॑टँ॑","मु॑दँ॑","मु॑स्तँ॑","मू॑त्रँ॑","मू॑लँ॑","मृ॑गँ॒","मृ॑जूँ॑","मृ॑डिँ॑","मृ॑षँ॒॑","मो॑क्षँ॑","म्र॑क्षँ॑","म्र॑क्षँ॑","म्र॑छँ॑","म्ले॑छँ॑","य॑क्षँ॒","य॑तँ॑","य॑त्रिँ॑","य॑मँ॑","यु॑","यु॑जँ॑","र॑हिँ॑","र॑कँ॑","र॑गँ॑","र॑घँ॑","र॑ङ्गँ॑","र॑घिँ॑","र॑चँ॑","र॑टँ॑","र॑सँ॑","र॑हँ॑","र॑हँ॑","रि॑चँ॑","रु॑शिँ॑","रु॑सिँ॑","रु॑जँ॑","रु॑टँ॑","रु॑टँ॑","रु॑षँ॑","रू॑क्षँ॑","रू॑पँ॑","ल॑क्षँ॒","ल॑क्षँ॑","ल॑गँ॑","ल॑घिँ॑","ल॑घिँ॑","ल॑जँ॑","ल॑जँ॑","ल॑जिँ॑","ल॑जिँ॑","ल॑जिँ॑","ल॑डँ॑","ल॑डिँ॑","ओँ॑ल॑डिँ॑","ल॑लँ॒","ल॑सँ॑","ला॑भँ॑","लि॑गिँ॑","लि॑जिँ॑","ली॑","लु॑जिँ॑","लु॑जिँ॑","लु॑टँ॑","लु॑ण्टँ॑","लु॑ण्ठँ॑","लु॑बिँ॑","लू॑षँ॑","लो॑कृँ॑","लो॑चृँ॑","व॑चँ॑","व॑ञ्चुँ॒","व॑टँ॑","व॑टँ॑","व॑टिँ॑","व॑टिँ॑","व॑डिँ॑","व॑दँ॒॑","व॑रँ॑","व॑र्णँ॑","व॑र्णँ॑","व॑र्धँ॑","ब॑र्हँ॑","व॑र्हँ॑","व॑ल्कँ॑","ब॑ल्हँ॑","व॑सँ॑","व॑सँ॑","व॑स्तँ॒","वा॑तँ॑","वा॑सँ॑","वि॑छँ॑","वि॑दँ॒","वि॑पँ॑","वि॑लँ॑","वि॑ष्कँ॑","वि॑ष्कँ॒","वी॑रँ॒","वृ॑ञ्","बृ॑हिँ॑","वृ॑जीँ॑","वृ॑तुँ॑","वृ॑धुँ॑","वृ॑षँ॒","वे॑लँ॑","व्य॑पँ॑","व्य॑यँ॑","व्य॑यँ॑","व्यु॑सँ॑","व्र॑जँ॑","व्र॑णँ॑","व्रू॑षँ॑","व्रू॑सँ॑","श॑ठँ॑","श॑ठँ॑","श॑ठँ॒","श॑ब्दँ॑","श॑मँ॒","श॑म्बँ॑","शा॑न्त्वँ॑","शि॑षँ॑","शी॑कँ॑","शी॑कँ॑","शी॑लँ॑","शु॑ठँ॑","शु॑ठिँ॑","शु॑न्धँ॑","शु॑ल्कँ॑","शु॑ल्बँ॑","शू॑रँ॒","शू॑र्पँ॑","शृ॑धुँ॑","श्र॑णँ॑","श्र॑थँ॑","श्र॑थँ॑","श्र॑थँ॑","श्र॑न्थँ॑","श्लि॑षँ॑","श्व॑ठँ॑","श्व॑ठँ॑","श्व॑ठिँ॑","श्व॑भ्रँ॑","श्व॑र्तँ॑","श्व॑ल्कँ॑","स॑ङ्के॑तँ॑","स॑ङ्ग्रा॑मँ॒","ष॑ट्टँ॑","स॑त्रँ॒","स॑त्रँ॒","स॑भा॑जँ॑","ष॑म्बँ॑","सा॑रँ॑","ष॑हँ॑","षा॑न्त्वँ॑","सा॑मँ॑","सा॑म्बँ॑","सा॑रँ॑","सु॑खँ॑","षु॑ट्टँ॑","सू॑चँ॑","सू॑त्रँ॑","षू॑दँ॑","स्त॑नँ॑","ष्टु॑पँ॑","ष्टू॑पँ॑","स्ते॑नँ॑","स्तो॑मँ॑","स्थू॑लँ॒","ष्णि॑हँ॑","स्प॑शँ॒","स्पृ॑हँ॑","स्फि॑टँ॑","स्फि॑ट्टँ॑","स्फु॑टँ॑","स्फु॑टिँ॑","स्फु॑डिँ॑","ष्मि॑ङ्","स्मि॑टँ॑","स्य॑मँ॒","ष्व॑दँ॑","स्व॑रँ॑","स्व॑र्तँ॑","स्वा॑दँ॑","ह॑स्तँ॒","हि॑सिँ॑","हि॑ष्कँ॒","ह्र॑पँ॑","ह्ल॑पँ॑");
$adAdi1=array("अ॒दँ॑","इ॒ङ्","इ॒क्","अ॑नँ॑","अ॑सँ॑","आ॑शासुँ","आ॑सँ॒","इ॒ङ्","इ॒ण्","इ॒क्","ई॑डँ॒","ई॑रँ॒","ई॑शँ॒","ऊ॑र्णु॑ञ्","क॑सिँ॒","क॑शँ॒","क॑सँ॒","कु॒","टु॑क्षु॑","क्ष्णु॑","ख्या॒","च॑का॑सृँ॑","च॒क्षिँ॒ङ्","ज॑क्षँ॑","जा॑गृ॑","तु॑","द॑रि॑द्रा॑","दा॒प्","दि॒हँ॒॑","दी॑धी॑ङ्","दु॒हँ॒॑","द्यु॒","द्रा॒","द्वि॒षँ॒॑","णि॑सिँ॒","णि॑जिँ॒","णु॑","पा॒","पि॑जिँ॒","पृ॑चीँ॒","पृ॑जिँ॒","प्रा॒","प्सा॒","ब्रू॑ञ्","भा॒","मा॒","मृ॑जूँ॑","या॒","यु॑","रा॒","रु॑","रु॑दिँ॑र्","ला॒","लि॒हँ॒॑","व॒चँ॑","व॑शँ॑","व॑सँ॒","वा॒","वि॑दँ॑","वी॒","वृ॑जीँ॒","वृ॑जिँ॒","वे॑वी॑ङ्","शा॑सुँ॑","शि॑जिँ॒","शी॑ङ्","श्रा॒","श्व॑सँ॑","ष॑स्तिँ॑","ष॑सँ॑","षु॒","षू॑ङ्","ष्टु॒ञ्","ष्णा॒","ष्णु॑","ञिष्व॒पँ॑","ह॒नँ॑","ह्नु॒ङ्");
$juhotyAdi1=array("ऋ॒","कि॒","कि॑तँ॑","गा॒","घृ॒","ज॑नँ॑","तु॑रँ॑","डुदा॒ञ्","ध॑नँ॑","डुधा॒ञ्","धि॑षँ॑","णि॒जिँ॒॑र्","पृ॒","पॄ॒","भ॑सँ॑","ञिभी॒","डुभृ॒ञ्","मा॒ङ्","वि॒जिँ॒॑र्","वि॒षॢँ॒॑॑","सृ॒","ओँ॑हा॒ङ्","ओँ॑हा॒क्","हु॒","हृ॒","ह्री॒");
$svAdi1=array("अ॑शूँ॒","अ॑हँ॑","आ॒पॢँ॑","ऋ॑","ऋ॑धुँ॑","कृ॒ञ्","क्षि॑","क्षी॑","च॑मुँ॑","चि॒ञ्","चि॑रि॑","जि॑रि॑","ति॑कँ॑","ति॑गँ॑","तृ॑पँ॑","द॑घँ॑","द॑म्भुँ॑","दा॑शँ॑","टु॑दु॒","दॄ॑","धु॒ञ्","धू॑ञ्","ञिधृ॑षाँ॑","पृ॒","डुमि॒ञ्","रा॒धँ॑","रि॑","वृ॑ञ्","श॒कॢँ॑","शि॒ञ्","ष॑घँ॑","सा॒धँ॑","षि॒ञ्","षु॒ञ्","ष्टि॑घँ॒","स्तृ॒ञ्","स्पृ॒","स्मृ॒","हि॒");
$rudhAdi1=array("अ॑ञ्जूँ॑","ञिइ॒न्धीँ॑","उ॑न्दीँ॑","कृ॑तीँ॑","क्षु॒दिँ॒॑र्","खि॒दँ॒","छि॒दिँ॒॑र्","उँ॑छृ॑दिँ॒॑र्","त॑ञ्चूँ॑","उँ॑तृ॑दिँ॒॑र्","तृ॑हँ॑","पि॒षॢँ॑","पृ॑चीँ॑","भ॒ञ्जोँ॑","भि॒दिँ॒॑र्","भु॒जँ॑","यु॒जिँ॒॑र्","रि॒चिँ॒॑र्","रु॒धिँ॒॑र्","वि॒चिँ॒॑र्","ओँ॑वि॑जीँ॑","वि॒दँ॒","वृ॑जीँ॑","शि॒षॢँ॑","हि॑सिँ॑");
$tanAdi1=array("ऋ॑णुँ॒॑","डुकृ॒ञ्","क्ष॑णुँ॒॑","क्षि॑णुँ॒॑","घृ॑णुँ॒॑","त॑नुँ॒॑","तृ॑णुँ॒॑","म॑नुँ॒","व॑नुँ॒","ष॑नुँ॒॑");
$kryAdi1=array("अ॑शँ॑","इ॑षँ॑","ॠ","कु॑न्थँ॑","कु॑षँ॑","कॄ॑ञ्","कॄ॑","क्नू॑ञ्","डुक्री॒ञ्","क्लि॑शूँ॑","क्षी॒ष्","क्षु॑भँ॑","ख॑चँ॑","ख॑वँ॑","गु॑धँ॑","गॄ॑","ग्र॑न्थँ॑","ग्र॑हँ॒॑","जॄ॑","ज्ञा॒","ज्या॒","झॄ॑","तु॑भँ॑","दॄ॑","द्रू॑ञ्","धू॑ञ्","धॄ॑","उँ॑ध्र॒सँ॑","ण॑भँ॑","नॄ॑","पु॑षँ॑","पू॑ञ्","पॄ॑","प्री॒ञ्","प्रु॑षँ॑","प्ली॒","प्लु॑षँ॑","ब॒न्धँ॑","ब्ली॒","भॄ॑","भ्री॒","म॑न्थँ॑","मी॒ञ्","मु॑षँ॑","मू॑ञ्","मृ॑डँ॑","मृ॑दँ॑","मॄ॑","यु॒ञ्","री॒","ली॒","लू॑ञ्","वि॒षँ॑","वृ॑ङ्","वॄ॑ञ्","वॄ॑","व्री॒","व्ली॒","शॄ॑","श्र॑न्थँ॑","श्र॑न्थँ॑","श्री॒ञ्","षि॒ञ्","स्क॒म्भुँ॑","स्कु॒ञ्","स्कु॒म्भुँ॑","स्त॒म्भुँ॑","स्तु॒म्भुँ॑","स्तॄ॑ञ्","हे॑ठँ॑","हे॑ढँ॑");
// list of parasmai, Atmane and ubhayapadi.
$anudAttetverbs=array("ahi!","aki!","aGi!","awwa!","aRa!","aWi!","anuruDa!","ana!","abi!","aBi!","aya!","arTa!","aSU!","Asa!","Ikza!","Iji!","Iqa!","Ira!","ISa!","Iza!","Iha!","uWa!","urda!","UyI!","Uha!","fja!","fji!","ejf!","eWa!","eDa!","ezf!","ezf!","kasi!","kaka!","kaki!","kaca!","kaci!","kaWi!","kaqi!","katTa!","kada!","kadi!","kapa!","kabf!","kamu!","kapi!","kala!","kalla!","kaSa!","kasa!","kAci!","kASf!","kASf!","kAsf!","kuka!","kuwa!","kuwwa!","kuqi!","kutsa!","kusma!","kuha!","kUwa!","kURa!","kfpa!","kfpU!","kfpU!","kepf!","kevf!","knUyI!","krada!","kradi!","krapa!","klada!","kladi!","klidi!","kliSa!","klIbf!","kleSa!","kzaji!","kzamU!z","kzIbf!","kzIvf!","kzuBa!","kzmAyI!","Kaqi!","Kida!","Kida!","Kevf!","ganDa!","garva!","garha!","gala!","galBa!","galha!","gADf!","gAhU!","guda!","gupa!","gurI!","gUra!","gUrI!","gfhU!","gfha!","gepf!","gevf!","gezf!","gozwa!","graTi!","grasu!","glasu!","glaha!","glepf!","glepf!","glevf!","Gawa!","Gawwa!","Gaza!","GiRi!","Guzi!","Guwa!","GuRa!","GuRi!","GUrRa!","GfRi!","DrAGf!","caka!","cakzi!N","caqi!","caya!","cita!","cIBf!","cUrI!","cezwa!","janI!","jaBI!","ji!","jutf!","juzI!","jUrI!","jfBi!","jezf!","jehf!","wikf!","wIkf!","qapa!","qipa!","QOkf!","taqi!","tatri!","tapa!","taya!","tarja!","tAyf!","tikf!","tija!","tipf!","tIkf!","tuqi!","tuBa!","tURa!","tUrI!","tepf!","tevf!","traki!","trapU!z","truwa!","trOkf!","YitvarA!","daSi!","dasi!","dakza!","dakza!","dada!","daDa!","daya!","dasa!","divu!","dIkza!","dIpI!","devf!","dyuta!","drAGf!","drAqf!","drAhf!","drekf!","Dikza!","Dukza!","Depf!","DrAqf!","Drekf!","DvaMsu!","RaBa!","Raya!","Rasa!","nATf!","nADf!","RAsf!","Risi!","Riji!","nizka!","Rezf!","paci!","paRa!","paqi!","pada!","pada!","pana!","paya!","parda!","piji!","piqi!","pUyI!","pUrI!","pfcI!","pfji!","pevf!","pezf!","o!pyAyI!","praTa!","prasa!","prezf!","pliha!","plevf!","bahi!","baDa!","barha!","balha!","basta!","bADf!","bAhf!","bIBf!","buDa!","vehf!","Baqi!","Badi!","Bartsa!","Bala!","Bala!","Balla!","BAma!","BAza!","BAsf!","Bikza!","YimidA!","BfjI!","Byasa!","BraMsu!","wuBrAjf!","BrAjf!","wuBrASf!","BrURa!","Brejf!","wuBlASf!","mahi!","maki!","maGi!","maca!","maci!","maWi!","maqi!","mada!","manu!","mana!","mAna!","matri!","madi!","maya!","mala!","malla!","maska!","maska!","mana!","mAna!","muWi!","muqi!","muda!","mfga!","mepf!","mevf!","mrada!","mlevf!","yakza!","yatI!","yuja!","yutf!","yuDa!","yezf!","raGi!","raBa!","ramu!","rabi!","raBi!","raya!","rAGf!","rAsf!","ruca!","ruwa!","rekf!","rejf!","repf!","reBf!","revf!","rezf!","lakza!","laGi!","o!lajI!","o!lasjI!","qulaBa!z","labi!","labi!","laBi!","laya!","lala!","o!lasjI!","lAGf!","liSa!","luwa!","luWa!","lepf!","lokf!","locf!","lozwa!","vaki!","vaki!","vaGi!","vaYcu!","vaWi!","vaqi!","vanu!","vadi!","vaya!","varca!","varza!","varha!","valBa!","valla!","valha!","vaska!","vasa!","vaska!","vasta!","vAvftu!","vASf!","bAhf!","o!vijI!","viTf!","vida!","vida!","vida!","vizka!","vIja!","vIra!","vfka!","vfkza!","vfjI!","vfji!","vftu!","vftu!","vfDu!","vfza!","veTf!","vezwa!","vehf!","vyaTa!","Saki!","Saca!","SaWa!","Saqi!","Sama!","Sala!","SalBa!","SAqf!","Sikza!","Siji!","SIkf!","SIBf!","SuBa!","SUra!","SUrI!","SfDu!","Sevf!","syandU!","sraMsu!","sraMsu!","Sraki!","SraTi!","SramBu!","Slaki!","SlAGf!","Slokf!","Svaki!","Svaca!","Svaci!","Svidi!","zvaska!","zvaska!","saNgrAma!","zaca!","satra!","satra!","zaha!","sIkf!","zUda!","sfja!","sekf!","zevf!","skaBi!","skudi!","sKada!","zwaBi!","zwiGa!","zwipf!","zwuca!","zwuBu!","zwepf!","sTUla!","spadi!","sparDa!","spaSa!","sPAyI!","sPuwa!","sPuqi!","syama!","sraMsu!","sraki!","sramBu!","sramBu!","srekf!","srokf!","zvaki!","zvaYja!","zvada!","svarda!","zvaska!","zvaska!","svAda!","YizvidA!","hada!","hasta!","hiqi!","hizka!","huqi!","huqi!","heWa!","heqf!","hepf!","hezf!","hoqf!","hrAda!","hrezf!","hlAdI!");
$svaritetverbs=array("kranda!","fRu!","kfpeSca","kfza!","kzaRu!","kzapayaSca","kziRu!","kzipa!","kzudi!r","Kanu!","guhU!","graha!","GfRu!","cate!","cade!","caza!","cAyf!","cIbf!","cIvf!","Caza!","Cidi!r","u!Cfdi!r","Jaza!","tanu!","tuda!","tfRu!","u!tfdi!r","tviza!","dAna!","dASf!","dAsf!","diSa!","diha!","duha!","dviza!","DAvu!","Raha!","Riji!r","Ridf!","Ruda!","Redf!","qupaca!z","proTf!","plakza!","buDi!r","u!bundi!r","Bakza!","Baja!","Bidi!r","Bezf!","Brakza!","Brasja!","Brasja!","Brezf!","Blakza!","Blezf!","mAhf!","miTf!","midf!","miDf!","mila!","mucx!","mfDu!","mfza!","mfza!","meTf!","medf!","meDf!","yaja!","wuyAcf!","yuji!r","raYja!","raYja!","rAjf!","rici!r","ruDi!r","rewf!","laza!","lipa!","liha!","lupx!","vada!","quvapa!","vaha!","vici!r","viji!r","vidx!","vizx!","veRf!","venf!","vyaya!","Saka!","Sapa!","Sapa!","SAna!","I!Suci!r","SfDu!","zaca!","zanu!","zica!","spaSa!","hikka!");
$Gitverbs=array("iN","iN","IN","uN","kuN","kuN","kUN","kluN","KuN","gAN","guN","guN","GuN","NuN","cakzi!N","juN","jyuN","qIN","qIN","trEN","dIN","dIDIN","dUN","dfN","deN","DIN","DfN","DfN","pIN","pUN","pfN","pyEN","prIN","pruN","pluN","mAN","mAN","mIN","mUN","mfN","meN","rIN","ruN","lIN","vfN","vevIN","vrIN","SIN","cyuN","SyEN","zUN","zUN","zmiN","zmiN","o!hAN","hnuN");
$Jitverbs=array("UrRuY","qukfY","kfY","kfY","kFY","knUY","qukrIY","ciY","ciY","qudAY","drUY","quDAY","DuY","DUY","DUY","DUY","DfY","RIY","pUY","prIY","prIY","brUY","quBfY","BfY","qumiY","mIY","mUY","yuY","lUY","vfY","vfY","vFY","veY","vyeY","SiY","SriY","SrIY","ziY","ziY","zuY","skuY","zwuY","stfY","stFY","hfY","hveY");
$parasmai=array("aka!","akzU!","aga!","agi!","aja!","aYcu!","aYjU!","awa!","aqa!","aqqa!","aRa!","ata!","ada!","aqqa!","iN","ik","ana!","ati!","adi!","aBra!","ama!","arGa!","arca!","arja!","arda!","arba!","arva!","arha!","ala!","ava!","aSa!","asu!","asa!","aha!","ACi!","Apx!","iR","ik","iKa!","iKi!","igi!","iwa!","idi!","ivi!","ila!","iza!","iza!","iza!","IKi!","IKi!","Irkzya!","Irzya!","Iza!","ukza!","uKa!","uKi!","uca!","uCI!","uCI!","ujJa!","uCi!","uCi!","uWa!","ujJa!","undI!","ubja!","uBa!","umBa!","urvI!","uza!","uhi!r","UWa!","Uza!","f","f","f","fca!","fCa!","fDu!","fDu!","fPa!","fmPa!","fzI!","F","ejf!","oKf!","oRf!","kaKa!","kaKe!","kage!","kaja!","kawI!","kawe!","kaWa!","kaqa!","kaqa!","kaqqa!","kaRa!","kaRa!","kaqi!","kaqqa!","kanI!","kadi!","karja!","karda!","karba!","karva!","kaza!","kasa!","kAkzi!","ki","kiwa!","kiwa!","kita!","kita!","kila!","kIla!","ku","kuMSa!","kuMsa!","kuca!","kuca!","kuca!","kuju!","kuYca!","kuji!","kuwa!","kuqa!","kuRa!","kuwi!","kuWi!","kuqi!","kuTa!","kuTi!","kunTa!","kupa!","kubi!","kura!","kula!","kuSa!","kuza!","kusa!","kUja!","kUla!","kfqa!","kfvi!","kftI!","kftI!","kfSa!","kfza!","kF","kF","kelf!","kE","knaTa!","knasu!","kmara!","kraTa!","kradi!","kramu!","krIqf!","kruYca!","kruqa!","kruDa!","kruSa!","klaTa!","kladi!","klamu!","klidU!","klidi!","kliSU!","kvaRa!","kvaTe!","kzapayaSca","kzamU!","kzara!","kzi","kzi","kzi","kzipa!","kzivu!","kzI","kzIja!","kzIz","wukzu","kzuDa!","kzuBa!","kzuBa!","kzura!","kzura!","kzevu!","kzE","kzRu","kzmIla!","YikzvidA!","YikzvidA!","kzvelf!","Kaca!","Kaja!","Kaji!","Kawa!","Kada!","Karja!","Karda!","Karba!","Karva!","Kala!","Kava!","Kaza!","KAdf!","Kiwa!","Kida!","Kuju!","Kuqa!","Kura!","Kelf!","KE","Korf!","Kolf!","KyA","gaja!","gaji!","gaqa!","gaqi!","gaqi!","gada!","gamx!","garja!","garda!","garba!","garva!","gala!","gA","gu","guja!","guja!","guji!","guqa!","guDa!","guDa!","gupU!","gupa!","guPa!","gumPa!","gurvI!","gf","gfja!","gfji!","gfDu!","gF","gF","gE","granTa!","grucu!","glucu!","gluYca!","glE","GagGa!","GaGa!","Gasx!","Guwa!","GuRa!","Gura!","Guzi!r","GUrRa!","Gf","Gf","Gfzu!","GrA","cakAsf!","caka!","caYcu!","cawe!","caRa!","cana!","cadi!","capa!","camu!","camu!","cara!","carca!","carca!","carba!","carva!","cala!","cala!","caha!","ciwa!","citI!","ciri","cila!","cilla!","cucya!","cuwa!","cuqa!","cuqqa!","cuqi!","cuqqa!","cupa!","cubi!","culla!","cUza!","cftI!","celf!","cyuti!r","Camu!","Cuwa!","Cuqa!","Cupa!","Cura!","Co","jakza!","jaja!","jaji!","jawa!","jana!","japa!","jamu!","jartsa!","jartsa!","jarja!","jartsa!","jala!","jalpa!","jaza!","jasu!","jAgf","ji","ji!","jivi!","jimu!","jiri","jizu!","jIva!","ju","jugi!","juwa!","juqa!","juqa!","juna!","jUza!","jFz","jF","jE","jYA","jyA","jyuti!r","jri","jvara!","jvala!","jvala!","Jawa!","Jamu!","Jartsa!","Jartsa!","JarJa!","Jartsa!","Jaza!","JF","JFz","wala!","wvala!","qipa!","qipa!","tasi!","taka!","takzU!","takza!","taki!","tagi!","taYcu!","taYcU!","tawa!","tapa!","tamu!","tarja!","tarda!","tasu!","tika!","tiga!","tima!","tila!","tila!","tilla!","tIma!","tIva!","tu","tuja!","tuji!","tuwa!","tuqa!","tuqf!","tuRa!","tupa!","tupa!","tuPa!","tuPa!","tuBa!","tuBa!","tumpa!","tumpa!","tumPa!","tumPa!","tubi!","tura!","turvI","tuza!","tusa!","tuhi!r","tUqf!","tUla!","tUza!","tfMhU!","tfkza!","tfpa!","tfpa!","tfpa!","tfPa!","tfmpa!","tfmPa!","Yitfza!","tfhU!","tfha!","tF","teja!","tyaja!","trakza!","traKa!","tragi!","tradi!","trasI!","triKi!","truwa!","trupa!","truPa!","trumpa!","trumPa!","tvakzU!","tvagi!","tvaca!","tvaYcu!","tsara!","Taki!","Tuqa!","TurvI","daMSa!","daGa!","daGi!","damu!","damBu!","daridrA","dala!","dASa!","dasu!","daha!","dAR","dAp","divi!","divu!","du","wudu","durvI!","duza!","duhi!r","dfhi!","dfpa!","dfpa!","dfPa!","dfBI!","dfmpa!","dfmPa!","dfha!","dF","dF","dF","dEp","dfSi!r","do","dyu","dyE","drama!","drA","drAKf!","drAkzi!","dru","druRa!","druha!","drE","dvf","DaRa!","Dana!","Davi!","Di","Divi!","Diza!","DU","DurvI!","DU","DUpa!","Dfja!","Dfji!","YiDfzA!","DF","Dew","Dorf!","DmA","DmAkzi!","DyE","Draja!","Draji!","DraRa!","u!Drasa!","DrAKf!","DrAkzi!","Drija!","Dru","Dru","DrE","Dvaja!","Dvaji!","DvaRa!","Dvana!","Dvana!","DvAkzi!","Dvf","Rakza!","RaKa!","RaKi!","Rawa!","Rawa!","Rada!","wunadi!","RaBa!","RaBa!","Rama!","narda!","Rala!","RaSa!","Rikza!","Ridi!","Rivi!","Rila!","RiSa!","Rizu!","RIla!","RIva!","RU","Ru","Ruda!","RU","nftI!","nF","nF","pakza!","pawa!","paWa!","patx!","paTe!","parpa!","parba!","parva!","pala!","pelf!","pA","pA","pi","piwa!","piWa!","pivi!","piSa!","pizx!","pisf!","pIla!","pIva!","puwa!","puwa!","puqa!","puqa!","puRa!","puqi!","puTa!","puTi!","pura!","purva!","pula!","puza!","puza!","puza!","puza!","puzpa!","purva!","pUla!","pUza!","pf","pf","pfcI!","pfqa!","pfRa!","pfzu!","pF","pF","pelf!","pesf!","pE","pERf!","pyuza!","pyusa!","praCa!","prA","pruzu!","pruza!","prERf!","plI","pluza!","pluza!","pluzu!","pluza!","psA","Pakka!","PaRa!","Pala!","YiPalA!","Pulla!","Pelf!","baWa!","baRa!","bawi!","bada!","banDa!","vaBra!","barba!","bala!","basu!","biwa!","bidi!","bila!","bisa!","visa!","bukka!","bugi!","buDa!","busa!","busa!","bfhi!","bfha!","bfhU!","besa!","byusa!","vraRa!","blI","BaYjo!","Bawa!","Bawa!","BaRa!","Barba!","BarBa!","Barva!","Baza!","Basu!","Basa!","BA","Bidi!","YiBI","Bujo!","Buja!","BU","BUza!","BfMSu!","Bfqa!","BfSu!","BF","BraMSu!","BraRa!","Bramu!","Bramu!","BrI","maKa!","maKi!","magi!","maGi!","wumasjo!","maWa!","maRa!","maqi!","maTe!","madI!","manTa!","manTa!","maTi!","maBra!","marba!","marva!","mava!","mavya!","maSa!","maza!","masI!","wumasjo!","maha!","mA","mAkzi!","miCa!","YimidA!","mivi!","mila!","miSa!","mizu!","miza!","miha!","mImf!","mIla!","mIva!","muKi!","muja!","muji!","muwa!","muwa!","muqa!","muRa!","muqi!","mura!","murCA!","murvI!","muza!","musa!","muha!","mUla!","mUza!","mfkza!","mfjU!","mfqa!","mfqa!","mfRa!","mfda!","mfSa!","mfzu!","mF","mnA","mrakza!","mrucu!","mruYcu!","mrewf!","mreqf!","mlucu!","mluYcu!","mleCa!","mlewf!","mlE","yaBa!","yama!","yasu!","yA","yu","yugi!","yuCa!","yupa!","yUza!","yOwf!","rahi!","rakza!","raKa!","rage!","raKi!","ragi!","rawa!","rawa!","raWa!","raRa!","raRa!","ravi!","rada!","raDa!","rapa!","raPa!","raPi!","rasa!","raha!","rA","rAKf!","rADa!","rADaH","ri","ri","riKa!","riKi!","rigi!","rivi!","riPa!","riSa!","riza!","riza!","riha!","rI","ru","rujo!","ruWa!","ruwi!","ruWi!","ruWi!","ruqi!","rudi!r","rupa!","ruSa!","ruza!","ruza!","ruha!","rUza!","rE","roqf!","rOqf!","laKa!","lage!","laKi!","lagi!","laGi!","laCa!","laja!","laji!","lawa!","laqa!","lapa!","larba!","lala!","lasa!","lA","lAKf!","lAja!","lACi!","lAji!","liKa!","liKa!","liKi!","ligi!","liSa!","lI","luYca!","luwa!","luwa!","luwa!","luWa!","luWa!","luWa!","luqa!","luqa!","luwi!","luWi!","luWi!","luWi!","luqi!","luTi!","lupa!","luBa!","luBa!","lubi!","lUza!","loqf!","vakza!","vaKa!","vaKi!","vagi!","vaca!","vaja!","vaYcu!","vawa!","vawa!","vaWa!","vaRa!","vawi!","vada!","vana!","vanu!","vana!","vaBra!","wuvama!","valga!","vaSa!","vaza!","vasa!","vasu!","vA","vAkzi!","vACi!","viCa!","o!vijI!","viwa!","vida!","viDa!","vila!","viSa!","vizu!","viza!","visa!","bisa!","vI","vugi!","vusa!","bfhi!","vfjI!","vfRa!","vfSa!","vfzu!","bfha!","vfhU!","vF","velf!","vella!","vesa!","vella!","o!vE","vyaca!","vyaDa!","vyuza!","vyuza!","vyusa!","vraja!","vraja!","vraji!","vraRa!","o!vraScU!","vrI","vrIqa!","vruqa!","vlI","SaMsu!","Sakx!","Sawa!","SaWa!","SaRa!","Sadx!","Sadx!","Samu!","Sarba!","Sarva!","Sala!","Sava!","SaSa!","Saza!","Sasu!","SAKf!","SAsu!","SiKi!","SiGi!","Siwa!","Sila!","Siza!","Sizx!","SIla!","Suka!","Suca!","Sucya!","SuWa!","SuWi!","SuWi!","SuDa!","Suna!","SunDa!","SuBa!","SuBa!","SumBa!","SumBa!","Suza!","SUla!","SUza!","SF","Self!","SE","So","SoRf!","SOwf!","Scuti!r","Scyuti!r","SnaTa!","SmIla!","Sragi!","SraRa!","SraTa!","SranTa!","SranTa!","Sramu!","SrA","SrA","Srizu!","Sru","SrE","SroRf!","Slagi!","SlaTa!","SlAKf!","Slizu!","Sliza!","SloRf!","Sragi!","Svala!","Svalla!","Svasa!","wuo!Svi","zwyE","zWivu!","zWivu!","zasti!","zage!","zasja!","zaYja!","zawa!","zadx!","zadx!","zaGa!","zana!","zapa!","zama!","samI!","zarkza!","zarja!","zarba!","zarva!","zala!","zasa!","zasja!","zaha!","sADa!","ziwa!","ziDa!","ziDU!","ziDu!","zivi!","ziBu!","zimBu!","zila!","zivu!","zu","zu","zura!","zuha!","zU","sUrkza!","zUrkzya!","sUza!","sf","sf","sfja!","sfpx!","zfBu!","zfmBu!","zelf!","zE","zo","skandi!r","skamBu!","skumBu!","sKala!","zwaka!","zwana!","zwama!","stamBu!","zWala!","zwima!","zwIma!","zwupa!","stumBu!","zwUpa!","zwfkza!","stfhU!","zwE","styE","zwrakza!","zWage!","zWA","sTuqa!","zRasu!","zRA","zRiha!","zRu","zRusu!","zRuha!","zRE","spf","spfSa!","sPara!","sPala!","sPuwa!","sPuwi!r","sPuqa!","sPuwi!","sPura!","sPurCA!","sPula!","wuo!sPUrjA!","smIla!","smf","smf","smf","syamu!","srivu!","sru","srE","Sragi!","svana!","svana!","Yizvapa!","zvidA!","svf","hawa!","haWa!","hana!","hamma!","harya!","haya!","hala!","hase!","o!hAk","hi","hisi!","hiwa!","hivi!","hila!","hu","huqf!","huqa!","hurCA!","hula!","hula!","hUqf!","hf","hfzu!","hfza!","hrasa!","heWa!","heWa!","heqa!","heQa!","hoqf!","hmala!","hrage!","hrasa!","hrI","hrICa!","hlage!","hlasa!","hvala!","hvf","hvf");
$Atmane=array("ahi!","aki!","aGi!","awwa!","aRa!","aWi!","anuruDa!","ana!","abi!","aBi!","aya!","arTa!","aSU!","ASasi","ASAsu!","Asa!","iN","YiinDI!","IN","Ikza!","Ija","Iji!","Iqa!","Ira!","ISa!","Iza!","Iha!","uN","uWa!","urda!","UyI!","Uha!","fja!","fji!","ejf!","eWa!","eDa!","ezf!","ezf!","kasi!","kaka!","kaki!","kaca!","kaci!","kaWi!","kaqi!","katTa!","kada!","kadi!","kapa!","kabf!","kamu!","kapi!","kala!","kalla!","kaSa!","kasa!","kAci!","kASf!","kASf!","kAsf!","kuN","kuN","kuka!","kuwa!","kuwwa!","kuqi!","kutsa!","kurda","kusma!","kuha!","kUN","kUwa!","kURa!","kfpa!","kfpU!","kfpU!","kepf!","kevf!","knUyI!","krada!","kradi!","krapa!","klada!","kladi!","klidi!","kliSa!","klIbf!","kluN","kleSa!","kzaji!","kzamU!z","kzIbf!","kzIvf!","kzuBa!","kzmAyI!","YikzvidA!","Kaqi!","Kida!","Kida!","KuN","Kurda","Kevf!","ganDa!","garva!","garha!","gala!","galBa!","galha!","gAN","gADf!","gAhU!","guN","guN","guda!","gupa!","gurI!","gurda","gUra!","gUrI!","gfhU!","gfha!","gF","gepf!","gevf!","gezf!","gozwa!","graTi!","grasu!","glasu!","glaha!","glepf!","glepf!","glevf!","glezf!","Gawa!","Gawwa!","Gaza!","GiRi!","GuN","Guzi!","Guwa!","GuRa!","GuRi!","GUrI","GUrRa!","GfRi!","DrAGf!","NuN","caka!","cakzi!N","caqi!","caya!","cita!","cIBf!","cUrI!","cezwa!","janI!","jaBI!","juN","jutf!","juzI!","jUrI!","jfBi!","jezf!","jehf!","jyuN","wikf!","wIkf!","qapa!","qipa!","qIN","qIN","QOkf!","taqi!","tatri!","tapa!","taya!","tarja!","tAyf!","tikf!","tija!","tipf!","tIkf!","tuqi!","tuBa!","tURa!","tUrI!","tepf!","tevf!","traki!","trapU!z","truwa!","trEN","trOkf!","YitvarA!","daSi!","dasi!","dakza!","dakza!","dada!","daDa!","daya!","dasa!","divu!","dIN","dIkza!","dIDIN","dIpI!","dUN","dfN","deN","devf!","dyuta!","drAGf!","drAqf!","drAhf!","drekf!","Dikza!","DIN","Dukza!","DUrI","DfN","DfN","Depf!","DrAqf!","Drekf!","DvaMsu!","RaBa!","Raya!","Rasa!","nATf!","nADf!","RAsf!","Risi!","Riji!","nizka!","Rezf!","paci!","paRa!","paqi!","pada!","pada!","pana!","paya!","parda!","piji!","piqi!","pIN","pUN","pUyI!","pUrI!","pfN","pfcI!","pfji!","pevf!","pezf!","o!pyAyI!","pyEN","praTa!","prasa!","prIN","pruN","prezf!","pliha!","pluN","plevf!","bahi!","baDa!","barha!","balha!","basta!","bAqf","bADf!","bAhf!","bIBf!","buDa!","vehf!","Baqi!","Badi!","Bartsa!","Bala!","Bala!","Balla!","BAma!","BAza!","BAsf!","Bikza!","YimidA!","BfjI!","Byasa!","BraMSu!","BraMsu!","wuBrAjf!","BrAjf!","wuBrASf!","BrURa!","Brejf!","wuBlASf!","mahi!","maki!","maGi!","maca!","maci!","maWi!","maqi!","mada!","manu!","mana!","mAna!","matri!","madi!","maya!","mala!","malla!","maska!","maska!","mAN","mAN","mana!","mAna!","mIN","muci","muWi!","muqi!","muda!","mUN","mfN","mfga!","meN","mepf!","mevf!","mrada!","mlevf!","yakza!","yatI!","yu","yuja!","yutf!","yuDa!","yezf!","raGi!","raBa!","ramu!","rabi!","raBi!","raya!","rAGf!","rAsf!","rIN","ruN","ruca!","ruwa!","rekf!","rejf!","repf!","reBf!","revf!","rezf!","lakza!","laGi!","o!lajI!","o!lasjI!","qulaBa!z","labi!","labi!","laBi!","laya!","lala!","o!lasjI!","lAGf!","liSa!","lIN","luwa!","luWa!","lepf!","lokf!","locf!","lozwa!","vaki!","vaki!","vaGi!","vaYcu!","vaWi!","vaqi!","vanu!","vadi!","vaya!","varca!","varza!","varha!","vala","valBa!","valla!","valha!","vaska!","vasa!","vaska!","vasta!","vAqf","vAvftu!","vASf!","bAhf!","o!vijI!","viTf!","vida!","vida!","vida!","vizka!","vIja!","vIra!","vfN","vfka!","vfkza!","vfjI!","vfji!","vftu!","vftu!","vfDu!","vfza!","veTf!","wuvepf","vevIN","vezwa!","vehf!","vyaTa!","vrIN","Saki!","Saca!","SaWa!","Saqi!","Sama!","Sala!","SalBa!","SAqf!","Sikza!","Siji!","SIN","SIkf!","SIBf!","SuBa!","SUra!","SUrI!","SfDu!","Sevf!","syandU!","cyuN","SyEN","sraMsu!","sraMsu!","Sraki!","SraTi!","SramBu!","Slaki!","SlAGf!","Slokf!","Svaki!","Svaca!","Svaci!","SvitA!","Svidi!","zvaska!","zvaska!","saNgrAma!","zaca!","satra!","satra!","zaha!","sIkf!","zUN","zUN","zUda!","sfja!","sekf!","zevf!","skaBi!","skudi!","sKada!","zwaBi!","zwiGa!","zwipf!","zwuca!","zwuBu!","zwepf!","sTUla!","spadi!","sparDa!","spaSa!","sPAyI!","sPuwa!","sPuqi!","zmiN","syama!","sraMsu!","sraki!","sramBu!","sramBu!","srekf!","srokf!","zvaki!","zvaYja!","zvada!","svarda!","zvaska!","zvaska!","svAda!","YizvidA!","hada!","hasta!","o!hAN","hiqi!","hizka!","huqi!","huqi!","heWa!","heqf!","hepf!","hezf!","hoqf!","hnuN","hrAda!","hrezf!","hlAdI!");
$ubhaya=array("aMsa!","ahi!","aNka!","aNga!","acu!","aci!","aYcu!","aYcu!","aji!","awwa!","anDa!","ama!","aya!","arka!","arca!","arja!","arda!","arha!","arha!","aza!","asa!","Akranda!","Apx!","Asada!","ila!","Iqa!","Ira!","kaWi!","uGrasa!","Una!","Urja!","UrRuY","fRu!","o!laqi!","kaRa!","kaWi!","kaqi!","katra!","katra!","kaTa!","karRa!","karta!","kala!","kala!","kAla!","kIwa!","kuSi!","kusi!","kuwwa!","kuRa!","kuWi!","kuqi!","kuqi!","kudf!","kudri!","kupa!","kumAra!","kubi!","kuBi!","kUwa!","kURa!","qukfY","kfY","kfY","kfpa!","kfpeSca","kfza!","kFY","kFta!","keta!","knUY","qukrIY","klapa!","kzaji!","kzaRu!","kzapa!","kzapi!","kzala!","kziRu!","kzipa!","kzudi!r","kzowa!","Kawwa!","Kaqa!","Kaqi!","Kanu!","Kuqi!","Kewa!","Keqa!","Kowa!","gaja!","gaRa!","gadI!","garja!","garda!","garDa!","garha!","gaveza!","guRa!","guWi!","guqi!","gupa!","gurda!","guhU!","goma!","granTa!","granTa!","grasa!","graha!","grAma!","Gawa!","Gawa!","Gawwa!","Gawi!","Guzi!r","Gf","GfRu!","cakka!","cawa!","caqi!","cate!","cade!","cana!","capa!","capi!","cara!","carca!","cala!","caza!","caha!","caha!","cAyf!","ci","ciY","ciY","citra!","citi!","cIka!","cIva!","cIbf!","cIva!","cIvf!","cukka!","cuwa!","cuwwa!","cuwi!","cuda!","cubi!","cura!","cula!","cUrRa!","cUrRa!","cfpa!","cyu","Caji!","Cada!","Cada!","Cada!","Cadi!","Carda","Caza!","Cidi!r","Cidra!","u!Cfdi!r","CfdI!","Cfpa!","Ceda!","jasi!","jaBi!","jala!","jasu!","jasu!","ji","ci","ci","juqa!","juza!","jF","jYapa!","jri","Jaza!","waki!","qipa!","tasi!","taqa!","taqa!","tanu!","tanu!","tapa!","tarka!","tala!","tija!","tila!","tIra!","tuja!","tuji!","tuji!","tuqi!","tutTa!","tuda!","tubi!","tula!","tfRu!","u!tfdi!r","tfpa!","tfpa!","trasi!","trasa!","tviza!","daSi!","dasi!","daRqa!","dala!","qudAY","dAna!","dASf!","dAsf!","divu!","diSa!","diha!","duHKa!","dula!","duha!","dfpa!","dfBI!","dfBa!","drUY","dviza!","Dakka!","quDAY","DAvu!","DuY","DUpa!","DUY","DUY","DUY","DUpa!","DUSa!","DUza!","DUsa!","DfY","Dfza!","u!Drasa!","Dvana!","nakka!","nawa!","nawa!","Raqa!","nala!","Raha!","Riji!r","Ridf!","nivAsa!","RIY","Ruda!","Redf!","pasi!","pasi!","pakza!","qupaca!z","paci!","pawa!","pawa!","paqi!","pata!","paTa!","paTi!","parRa!","pala!","palyUla!","paSa!","paza!","pAra!","pAla!","pisi!","piCa!","pija!","piji!","piji!","piWi!","piqi!","piSa!","pisa!","pIqa!","puMsa!","puwa!","puwa!","puwwa!","puRa!","puwi!","puTa!","pula!","puza!","pusta!","pUY","pUja!","pUrI!","pUrRa!","pUrva!","pUla!","pfca!","pfTa!","pF","praTa!","prIY","prIY","proTf!","plakza!","baDa!","banDa!","barha!","barha!","bala!","balha!","bazka!","bila!","bukka!","buDi!r","u!bundi!r","busta!","bfhi!","brUY","brUsa!","Bakza!","Bakza!","Baja!","Baja!","Baji!","Baqi!","BAja!","BAma!","Bidi!r","BU","BU","BUza!","quBfY","BfY","BfSi!","Bezf!","Brakza!","Brasja!","Brasja!","Brezf!","Blakza!","Blezf!","mahi!","maqi!","marca!","maha!","mAna!","mArga!","mArja!","mAhf!","qumiY","miji!","miTf!","midf!","mida!","miDf!","midi!","mila!","miSra!","mI","mIY","muca!","mucx!","muwa!","muda!","musta!","mUY","mUtra!","mUla!","mfjU!","mfqi!","mfDu!","mfza!","mfza!","meTf!","medf!","meDf!","mokza!","mrakza!","mrakza!","mraCa!","mleCa!","yaja!","yata!","yatri!","yama!","wuyAcf!","yuY","yuja!","yuji!r","rahi!","raka!","raga!","raGa!","raNga!","raGi!","raca!","raYja!","raYja!","rawa!","rasa!","raha!","raha!","rAjf!","rica!","rici!r","ruSi!","rusi!","ruja!","ruwa!","ruwa!","ruDi!r","ruza!","rUkza!","rUpa!","rewf!","lakza!","laga!","laGi!","laGi!","laja!","laja!","laji!","laji!","laji!","laqa!","laqi!","o!laqi!","laza!","lasa!","lABa!","ligi!","liji!","lipa!","liha!","lI","luji!","luji!","luwa!","luRwa!","luRWa!","lupx!","lubi!","lUY","lUza!","lokf!","locf!","vaca!","vawa!","vawa!","vawi!","vawi!","vaqi!","vada!","quvapa!","vara!","varRa!","varRa!","varDa!","barha!","varha!","valka!","balha!","vasa!","vasa!","vaha!","vAta!","vAsa!","vici!r","viCa!","viji!r","vidx!","vipa!","vila!","vizx!","vizka!","vfY","vfY","bfhi!","vfjI!","vftu!","vfDu!","vFY","veY","veRf!","venf!","vela!","vyapa!","vyaya!","vyaya!","vyaya!","vyusa!","vyeY","vraja!","vraRa!","vrUza!","vrUsa!","Saka!","SaWa!","SaWa!","Sapa!","Sapa!","Sabda!","Samba!","SAna!","SAntva!","SiY","Siza!","SIka!","SIka!","SIla!","I!Suci!r","SuWa!","SuWi!","SunDa!","Sulka!","Sulba!","SUrpa!","SfDu!","SfDu!","SraRa!","SraTa!","SraTa!","SraTa!","SranTa!","SriY","SrIY","Sliza!","SvaWa!","SvaWa!","SvaWi!","SvaBra!","Svarta!","Svalka!","saNketa!","zaca!","zawwa!","zanu!","saBAja!","zamba!","sAra!","zaha!","zAntva!","sAma!","sAmba!","sAra!","ziY","ziY","zica!","zuY","suKa!","zuwwa!","sUca!","sUtra!","zUda!","skuY","stana!","zwuY","zwupa!","zwUpa!","stfY","stFY","stena!","stoma!","zRiha!","spaSa!","spfha!","sPiwa!","sPiwwa!","sPuwa!","sPuwi!","sPuqi!","zmiN","smiwa!","zvada!","svara!","svarta!","svAda!","hisi!","hikka!","hfY","hrapa!","hlapa!","hveY");
/* pratyayas as per sahajabodha text */
// 1st set
$sArvadhAtuka_tiG_set1_laT_parasmai=array("ti","tas","anti","si","Tas","Ta","mi","vas","mas");
$sArvadhAtuka_tiG_set1_loT_parasmai=array("tu","tAt","tAm","antu","tAt","","tam","ta","Ani","Ava","Ama","");
$sArvadhAtuka_tiG_set1_laG_parasmai=array("t","tAm","an","s","tam","t","am","va","ma");
$sArvadhAtuka_tiG_set1_vidhiliG_parasmai=array("it","itAm","iyus","is","itam","ita","iyam","iva","ima");
$sArvadhAtuka_tiG_set1_laT_Atmane=array("te","ite","ante","se","iTe","Dve","e","vahe","mahe");
$sArvadhAtuka_tiG_set1_loT_Atmane=array("tAm","itAm","antAm","sva","iTAm","Dvam","E","AvahE","AmahE");
$sArvadhAtuka_tiG_set1_laG_Atmane=array("ta","itAm","anta","TAs","iTAm","Dvam","i","vahi","mahi");
$sArvadhAtuka_tiG_set1_vidhiliG_Atmane=array("Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi");
// merging the members of first set sArvadhAtuka
$sArvadhAtuka_tiG_set1=array_merge($sArvadhAtuka_tiG_set1_laG_Atmane,$sArvadhAtuka_tiG_set1_laG_parasmai,$sArvadhAtuka_tiG_set1_laT_Atmane,$sArvadhAtuka_tiG_set1_laT_parasmai,$sArvadhAtuka_tiG_set1_loT_Atmane,$sArvadhAtuka_tiG_set1_loT_parasmai,$sArvadhAtuka_tiG_set1_vidhiliG_Atmane,$sArvadhAtuka_tiG_set1_vidhiliG_parasmai);
// 2nd set
$sArvadhAtuka_tiG_set2_laT_parasmai=array("ti","tas","anti","si","Tas","Ta","mi","vas","mas");
$sArvadhAtuka_tiG_set2_loT_parasmai=array("tu","tAt","tAm","antu","hi","tAt","tam","ta","Ani","Ava","Ama");
$sArvadhAtuka_tiG_set2_laG_parasmai=array("t","tAm","an","s","tam","ta","am","va","ma");
$sArvadhAtuka_tiG_set2_vidhiliG_parasmai=array("yAt","yAtAm","yus","yAH","yAtam","yAt","yAm","yAva","yAma");
$sArvadhAtuka_tiG_set2_laT_Atmane=array("te","Ate","ate","se","ATe","Dve","e","vahe","mahe");
$sArvadhAtuka_tiG_set2_loT_Atmane=array("tAm","AtAm","atAm","sva","ATAm","Dvam","E","AvahE","AmahE");
$sArvadhAtuka_tiG_set2_laG_Atmane=array("ta","AtAm","ata","TAs","ATAm","Dvam","i","vahi","mahi");
$sArvadhAtuka_tiG_set2_vidhiliG_Atmane=array("Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi");
// merging the members of second set sArvadhAtuka
$sArvadhAtuka_tiG_set2=array_merge($sArvadhAtuka_tiG_set2_laG_Atmane,$sArvadhAtuka_tiG_set2_laG_parasmai,$sArvadhAtuka_tiG_set2_laT_Atmane,$sArvadhAtuka_tiG_set2_laT_parasmai,$sArvadhAtuka_tiG_set2_loT_Atmane,$sArvadhAtuka_tiG_set2_loT_parasmai,$sArvadhAtuka_tiG_set2_vidhiliG_Atmane,$sArvadhAtuka_tiG_set2_vidhiliG_parasmai,array("ati","atu","us"));
// sArvadhAtuka leT
$sArvadhAtuka_tiG_sArvadhAtukaleT_aDAgama_parasmai=array("ati","at","ad","atas","anti","an","asi","as","aTas","aTa","ami","am","avas","ava","amas","ama");
$sArvadhAtuka_tiG_sArvadhAtukaleT_ADAgama_parasmai=array("Ati","At","Ad","Atas","Anti","An","Asi","As","ATas","ATa","Ami","Am","Avas","Ava","Amas","Ama");
$sArvadhAtuka_tiG_sArvadhAtukaleT_aDAgama_Atmane=array("ate","atE","Ete","ante","antE","ase","asE","ETe","aDve","aDvE","e","E","avahe","avahE","amahe","amahE");
$sArvadhAtuka_tiG_sArvadhAtukaleT_ADAgama_Atmane=array("Ate","AtE","Ete","Ante","AntE","Ase","AsE","ETe","ADve","ADvE","e","E","Avahe","AvahE","Amahe","AmahE");
$sArvadhAtuka_tiG_sArvadhAtukaleT=array_merge($sArvadhAtuka_tiG_sArvadhAtukaleT_ADAgama_Atmane,$sArvadhAtuka_tiG_sArvadhAtukaleT_ADAgama_parasmai,$sArvadhAtuka_tiG_sArvadhAtukaleT_aDAgama_Atmane,$sArvadhAtuka_tiG_sArvadhAtukaleT_aDAgama_parasmai);
// Total sArvadhAtuka tiG pratyayas.
$sArvadhAtuka_tiG_pratyayas=array_merge($sArvadhAtuka_tiG_sArvadhAtukaleT,$sArvadhAtuka_tiG_set1,$sArvadhAtuka_tiG_set2);
// sArvadhAtuka kRt pratyayas.
$sArvadhAtuka_kRt_pratyayas=array("Satf!","SAnac","SAnan","cAnaS","KaS","Sa","eS","SaDyE","SaDyEn");
// sArvadhAtuka vikaraNa pratyayas.
$sArvadhAtuka_vikaraNa_pratyayas=array("Sap","Syan","Snu","Sa","Snam","SnA","SAyac","SAnac");
// Total sArvadhAtuka pratyayas.
$sArvadhAtuka_pratyayas=array_merge($sArvadhAtuka_tiG_pratyayas,$sArvadhAtuka_kRt_pratyayas,$sArvadhAtuka_vikaraNa_pratyayas);
// pit and apit sArvadhAtuka tiG pratyayas
$halAdi_pit_sArvadhAtuka_tiG_pratyayas=array("ti","si","mi","tu","t","s");
$ajAdi_pit_sArvadhAtuka_tiG_pratyayas=array_merge(array("Ani","Ava","Ama","E","AvahE","AmahE","am"),$sArvadhAtuka_tiG_sArvadhAtukaleT);
$halAdi_apit_sArvadhAtuka_tiG_pratyayas=array("tas","Tas","Ta","vas","mas","te","se","Dve","vahe","mahe","tAt","tAm","hi","tAt","tam","ta","tAm","sva","Dvam","tAm","tam","ta","va","ma","ta","TAs","Dvam","vahi","mahi","yAt","yAtAm","yus","yAs","yAtam","yAta","yAm","yAva","yAma",);
$ajAdi_apit_sArvadhAtuka_tiG_pratyayas=array("anti","Ate","ate","ATe","e","ati","antu","AtAm","atAm","ATAm","atu","an","AtAm","ata","ATAm","i","us","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi",);
// pit and apit sArvadhAtuka kRt pratyayas
$ajAdi_apit_sArvadhAtuka_kRt_pratyayas=$sArvadhAtuka_kRt_pratyayas;
// pit and apit sArvadhAtuka vikaraNa pratyayas
$ajAdi_pit_sArvadhAtuka_vikaraNa_pratyayas=array("Sap");
$halAdi_apit_sArvadhAtuka_vikaraNa_pratyayas=array("Syan","Snu","Snam","SnA","SAyac","SAnac");
$ajAdi_apit_sArvadhAtuka_vikaraNa_pratyayas=array("Sa","SAyac","SAnac");
// pit pratyayas
$pit_sArvadhAtuka_pratyayas=array_merge($ajAdi_pit_sArvadhAtuka_vikaraNa_pratyayas,$ajAdi_pit_sArvadhAtuka_tiG_pratyayas,$halAdi_pit_sArvadhAtuka_tiG_pratyayas);
// apit pratyayas
$apit_sArvadhAtuka_pratyayas=array_merge($ajAdi_apit_sArvadhAtuka_kRt_pratyayas,$ajAdi_apit_sArvadhAtuka_tiG_pratyayas,$ajAdi_apit_sArvadhAtuka_vikaraNa_pratyayas,$halAdi_apit_sArvadhAtuka_tiG_pratyayas,$halAdi_apit_sArvadhAtuka_vikaraNa_pratyayas);
/* Preprocessing of verbs */
$sanubandhaverb=array("zage!","zaGa!","za॒ca॑!","zaca॑!","zaca॒!","zawa!","zaRu॑!","zaRa!","zaRa!","zatwa॑!","zatwa!","za॒dx!","zadx!","za॒dx!","zadx!","za॒dx!","zadx!","za॒dx!","za॒dx!","za॒dx!","za॒nja!","zanba॑!","zanba!","zapa!","zama!","zama!","zarja!","zarba!","zarva!","zala!","zasa!","zasa!","zasja!","zasti!","zasti!","za॒ha॒!","zaha॒!","zaha!","zaha॑!","zaha!","zA॒Da!","zAntva॑!","zAntva!","zi॒ca॑!","zi॒Y","zi॒Y","ziwa!","ziDu!","zi॒Du!","ziDU!","ziDU!","zila!","zivu!","zu॒","zu॒","zu॒","zu॒","zu॒","zu॒Y","zutwa॑!","zutwa!","zura!","zura!","zuha!","zuha!","zU","zUN","zUN","zU॒N","zUN","zUda॒!","zUda!","zUda॑!","zUda!","zUrkza!","zUrkzya!","zUza!","zfDf॑!","zfnBu!","zfBu!","zebf॒!","zevf॒!","zevf॒!","zE॒","zo॒","zo","zkaBi॒!","zwIma!","zwuca॒!","zwuBu॒!","zwfkza!","zwyE॒","zwyE॒","zWA॒","zWivu!","zWivu!","zRE॒","ztaka!","ztana!","ztaBi॒!","ztama!","ztama!","ztiGa॒!","ztipf॒!","ztima!","ztIma!","ztuca॒!","ztu॒Y","ztuBu॒!","ztUpa॑!","ztUpa!","ztepf॒!","ztE॒","zTage!","zTala!","zTA॒","zTuqa!","znasu!","znA॒","zni॒ha!","zniha॑!","zniha!","znu","znu","znusa","znusu!","znu॒ha!","znE॒","zmi॒N","zvakka॒!","zvakva॒!","zvada॒!","zvada!","zvada!","zva॒nja॒!","zvazka॒!","zvi॒dA","Ra॑kza!॑","Ra॑Ka!॑","Ra॑Ki!॑","Ra॑wa!॑","Ra॑qa!॑","Ra॑da!॑","wuna॑di!॑","Ra॑Ba!॑","Ra॑Ba!॒","Ra॒ma!॑","Ra॑ya!॒","Ra॑la!॑","Ra॒Sa!॑","Ra॑sa!॒","Ra॒ha!॒॑","RA॑sf!॒","Ri॑si!॒","Ri॑kza!॑","Ri॒ji!॒॑r","Ri॑ji!॒","Ri॑df!॒॑","Ri॑di!॑","Ri॑vi!॑","Ri॑la!॑","Ri॑Sa!॑","Ri॑zu!॑","RI॒Y","RI॑la!॑","RI॑va!॑","RU॑","Ru॑","Ru॒da!॑","Ru॒da!॒॑","RU॑","a॑hi!॑","a॑hi!॒","a॑ki!॒","a॑gi!॑","a॑Gi!॒","a॑ci!॑","a॑ji!॑","a॑Wi!॒","a॑ti!॑","a॑di!॑","a॑bi!॒","a॑Bi!॒","A॑Ci!॑","i॑Ki!॑","i॑gi!॑","i॑di!॑","i॑vi!॑","I॑Ki!॑","I॑Ki!॑","I॑ji!॒","u॑Ki!॑","u॑Ci!॑","u॑Ci!॑","ka॑Wi!॑","u॑hi!॑r","f॑ji!॒","o!॑la॑qi!॑","ka॑si!॒","ka॑ki!॒","ka॑ci!॒","ka॑Wi!॒","ka॑Wi!॑","ka॑qi!॑","ka॑qi!॑","ka॑qi!॒","ka॑di!॑","ka॑di!॒","ka॑pi!॒","kA॑kzi!॑","kA॑ci!॒","ku॑Si!॑","ku॑si!॑","ku॑ji!॑","ku॑wi!॑","ku॑Wi!॑","ku॑Wi!॑","ku॑qi!॑","ku॑qi!॒","ku॑qi!॑","ku॑qi!॑","ku॑Ti!॑","ku॑dri!॑","ku॑bi!॑","ku॑bi!॑","ku॑Bi!॑","kf॑vi!॑","kra॑di!॑","kra॑di!॒","kla॑di!॑","kla॑di!॒","kli॑di!॒","kli॑di!॑","kza॑ji!॑","kza॑ji!॒","kza॑pi!॑","kzu॒di!॒॑r","Ka॑ji!॑","Ka॑qi!॑","Ka॑qi!॒","Ku॑qi!॑","ga॑ji!॑","ga॑qi!॑","ga॑qi!॑","gu॑ji!॑","gu॑Wi!॑","gu॑qi!॑","gf॑ji!॑","gra॑Ti!॒","Ga॑wi!॑","Gi॑Ri!॒","Gu॑zi!॒","Gu॑Ri!॒","Gu॑zi!॑r","Gu॑zi!॑r","Gf॑Ri!॒","ca॒kzi!॒N","ca॑qi!॒","ca॑qi!॑","ca॑di!॑","ca॑pi!॑","ci॑ti!॑","cu॑wi!॑","cu॑qi!॑","cu॑bi!॑","cu॑bi!॑","cyu॑ti!॑r","Ca॑ji!॑","Ca॑di!॑","Ci॒di!॒॑r","u!॑Cf॑di!॒॑r","ja॑si!॑","ja॑ji!॑","ja॑Bi!॑","ji!॒","ji॑vi!॑","ju॑gi!॑","jf॑Bi!॒","jyu॑ti!॑r","wa॑ki!॑","ta॑si!॑","ta॑si!॑","ta॑ki!॑","ta॑gi!॑","ta॑qi!॒","ta॑tri!॒","tu॑ji!॑","tu॑ji!॑","tu॑ji!॑","tu॑qi!॑","tu॑qi!॒","tu॑bi!॑","tu॑bi!॑","tu॑hi!॑r","u!॑tf॑di!॒॑r","tra॑si!॑","tra॑ki!॒","tra॑gi!॑","tra॑di!॑","tri॑Ki!॑","tva॑gi!॑","Ta॑ki!॑","da॑Si!॑","da॑Si!॒","da॑si!॑","da॑si!॒","da॑Gi!॑","di॑vi!॑","du॑hi!॑r","df॑hi!॑","df॒Si!॑r","drA॑kzi!॑","Da॑vi!॑","Di॑vi!॑","Df॑ji!॑","DmA॑kzi!॑","Dra॑ji!॑","DrA॑kzi!॑","Dva॑ji!॑","DvA॑kzi!॑","Ra॑Ki!॑","wuna॑di!॑","Ri॑si!॒","Ri॒ji!॒॑r","Ri॑ji!॒","Ri॑di!॑","Ri॑vi!॑","pa॑si!॑","pa॑si!॑","pa॑ci!॑","pa॑ci!॒","pa॑qi!॑","pa॑qi!॒","pa॑Ti!॑","pi॑si!॑","pi॑ji!॑","pi॑ji!॑","pi॑ji!॒","pi॑Wi!॑","pi॑qi!॑","pi॑qi!॒","pi॑vi!॑","pu॑wi!॑","pu॑qi!॑","pu॑Ti!॑","pf॑ji!॒","ba॑hi!॒","ba॑wi!॑","bi॑di!॑","bu॑gi!॑","bu॑Di!॒॑r","u!॑bu॑ndi!॒॑r","bf॑hi!॑","bf॑hi!॑","Ba॑ji!॑","Ba॑qi!॑","Ba॑qi!॒","Ba॑di!॒","Bi॒di!॒॑r","Bi॑di!॑","Bf॑Si!॑","ma॑hi!॑","ma॑hi!॒","ma॑ki!॒","ma॑Ki!॑","ma॑gi!॑","ma॑Gi!॒","ma॑Gi!॑","ma॑ci!॒","ma॑Wi!॒","ma॑qi!॒","ma॑qi!॑","ma॑qi!॑","ma॑tri!॒","ma॑Ti!॑","ma॑di!॒","mA॑kzi!॑","mi॑ji!॑","mi॑di!॑","mi॑vi!॑","mu॑Ki!॑","mu॑ji!॑","mu॑Wi!॒","mu॑qi!॑","mu॑qi!॒","mf॑qi!॑","ya॑tri!॑","yu॑gi!॑","yu॒ji!॒॑r","ra॑hi!॑","ra॑hi!॑","ra॑Ki!॑","ra॑gi!॑","ra॑Gi!॑","ra॑Gi!॒","ra॑vi!॑","ra॑Pi!॑","ra॑bi!॒","ra॑Bi!॒","ri॑Ki!॑","ri॑gi!॑","ri॒ci!॒॑r","ri॑vi!॑","ru॑Si!॑","ru॑si!॑","ru॑wi!॑","ru॑Wi!॑","ru॑Wi!॑","ru॑qi!॑","ru॑di!॑r","ru॒Di!॒॑r","la॑Ki!॑","la॑gi!॑","la॑Gi!॑","la॑Gi!॑","la॑Gi!॒","la॑Gi!॑","la॑ji!॑","la॑ji!॑","la॑ji!॑","la॑ji!॑","la॑qi!॑","o!॑la॑qi!॑","la॑bi!॒","la॑bi!॒","la॑Bi!॒","lA॑Ci!॑","lA॑ji!॑","li॑Ki!॑","li॑gi!॑","li॑gi!॑","li॑ji!॑","lu॑ji!॑","lu॑ji!॑","lu॑wi!॑","lu॑Wi!॑","lu॑Wi!॑","lu॑Wi!॑","lu॑qi!॑","lu॑Ti!॑","lu॑bi!॑","lu॑bi!॑","va॑ki!॒","va॑ki!॒","va॑Ki!॑","va॑gi!॑","va॑Gi!॒","va॑wi!॑","va॑wi!॑","va॑wi!॑","va॑Wi!॒","va॑qi!॑","va॑qi!॒","va॑di!॒","vA॑kzi!॑","vA॑Ci!॑","vi॒ci!॒॑r","vi॒ji!॒॑r","vu॑gi!॑","bf॑hi!॑","bf॑hi!॑","vf॑ji!॒","vra॑ji!॑","Sa॑ki!॒","Sa॑qi!॒","Si॑Ki!॑","Si॑Gi!॑","Si॑ji!॒","I!॑Su॑ci!॒॑r","Su॑Wi!॑","Su॑Wi!॑","Su॑Wi!॑","Scu॑ti!॑r","Scyu॑ti!॑r","Sra॑ki!॒","Sra॑gi!॑","Sra॑Ti!॒","Sla॑ki!॒","Sla॑gi!॑","Sva॑ki!॒","Sra॑gi!॑","Sva॑ci!॒","Sva॑Wi!॑","Svi॑di!॒","za॑sti!॑","zi॑vi!॑","ska॒ndi!॑r","ska॑Bi!॒","sku॑di!॒","zwa॑Bi!॒","spa॑di!॒","sPu॑wi!॑r","sPu॑wi!॑","sPu॑wi!॑","sPu॑qi!॑","sPu॑qi!॒","sra॑ki!॒","zva॑ki!॒","Sra॑gi!॑","hi॑si!॑","hi॑si!॑","hi॑qi!॒","hi॑vi!॑","hu॑qi!॒","hu॑qi!॒","u॑rda!॒","u॑rvI!॑","ku॑rda!","gu॑rda!॑","gu॑rvI!॑","du॑rvI!॑","Du॑rvI!॑","pu॑rva!॑","pu॑rva!॑","mu॑rCA!॑","mu॑rvI!॑","sPu॑rCA!॑","hu॑rCA!॑");
$sanubandhaverb=  array_unique($sanubandhaverb);
$sanubandhaverb=  array_values($sanubandhaverb);
$sanubandhaverb=array_map('trim',$sanubandhaverb);
$noaccentsanubandha=array_map('removeaccent',$sanubandhaverb);
$noaccentsanubandhaslp=array_map('trim',$noaccentsanubandha);
$noaccentwithoutanusvar=array_map('removeanusvar',$noaccentsanubandhaslp);
$noaccentniranubandhaslp=array_map('verbprocess',$noaccentsanubandhaslp);
/* changing the pada of verb in case of upasargas */
$toatmane=array("niviSa!","parikrIY","vikrIY","avakrIY","viji","parAji","AkrIqf!","anukrIqf!","saMkrIqf!","parikrIqf!","saMsTA","avasTA","prasTA","visTA","uttapa!","vitapa!","Ayama!","Ahana!","saMgamlx!","saMfcCa!","saMpracCa!","saMsvf","saMf","saMzru","saMvidx!","nihveY","saMhveY","upahveY","vihveY","avagf","jijYA","SuSru","susmf","didfSir",);
$sutraenglish=array("nerviSaH (1.3.17)","parivyavebhyaH kriyaH (1.3.18)","parivyavebhyaH kriyaH (1.3.18)","parivyavebhyaH kriyaH (1.3.18)","viparAbhyAM jeH (1.3.19)","viparAbhyAM jeH (1.3.19)","krIDo'nusaMparibhyazca (1.3.21)","krIDo'nusaMparibhyazca (1.3.21)","krIDo'nusaMparibhyazca (1.3.21)","krIDo'nusaMparibhyazca (1.3.21)","samavaparivibhyaH sthaH (1.3.22)","samavaparivibhyaH sthaH (1.3.22)","samavaparivibhyaH sthaH (1.3.22)","samavaparivibhyaH sthaH (1.3.22)","udvibhyAM tapaH (1.3.27)","udvibhyAM tapaH (1.3.27)","AGo yamahanaH (1.3.28)","AGo yamahanaH (1.3.28)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","nisamupavibhyo hvaH (1.3.30)","nisamupavibhyo hvaH (1.3.30)","nisamupavibhyo hvaH (1.3.30)","nisamupavibhyo hvaH (1.3.30)","avAdgraH (1.3.51)","jJAzrusmRdRzAM sanaH (1.3.57)","jJAzrusmRdRzAM sanaH (1.3.57)","jJAzrusmRdRzAM sanaH (1.3.57)","jJAzrusmRdRzAM sanaH (1.3.57)",);
$sutradeva=array("नेर्विशः (१.३.१७)","परिव्यवेभ्यः क्रियः (१.३.१८)","परिव्यवेभ्यः क्रियः (१.३.१८)","परिव्यवेभ्यः क्रियः (१.३.१८)","विपराभ्यां जेः (१.३.१९)","विपराभ्यां जेः (१.३.१९)","क्रीडोऽनुसंपरिभ्यश्च (१.३.२०)","क्रीडोऽनुसंपरिभ्यश्च (१.३.२०)","क्रीडोऽनुसंपरिभ्यश्च (१.३.२०)","क्रीडोऽनुसंपरिभ्यश्च (१.३.२०)","समवप्रविभ्यः स्थः (१.३.२२)","समवप्रविभ्यः स्थः (१.३.२२)","समवप्रविभ्यः स्थः (१.३.२२)","समवप्रविभ्यः स्थः (१.३.२२)","उद्विभ्यां तपः (१.३.२७)","उद्विभ्यां तपः (१.३.२७)","आङो यमहनः (१.३.२८)","आङो यमहनः (१.३.२८)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","निसमुपविभ्यो ह्वः (१.३.३०)","निसमुपविभ्यो ह्वः (१.३.३०)","निसमुपविभ्यो ह्वः (१.३.३०)","निसमुपविभ्यो ह्वः (१.३.३०)","अवाद्ग्रः (१.३.५१)","ज्ञाश्रुस्मृदृशां सनः (१.३.५७)","ज्ञाश्रुस्मृदृशां सनः (१.३.५७)","ज्ञाश्रुस्मृदृशां सनः (१.३.५७)","ज्ञाश्रुस्मृदृशां सनः (१.३.५७)",);
/* Function to find pratyAhAra from given two letters */ 
// Enter your letters in the arguments like prat('Jl') will mean pratyAhAra jhal.
function prat($text)  // prat for pratyAhAra
{
global $shiv; // incorporating $shiv from arrays.
if ($text === "ra") // for circumventing the imaginary ra pratyAhAra
{
$text = array("r","l"); 
} 
elseif ($text === "yR") // for circumventing the yaN pratyAhAra because of problem of double N
{
$text = array("y","y","v","v","r","r","l","l");
}
else
{
$a = str_split($text); // separating starting letter and ending letter.
$a[1] = str_replace($a[1],"-".$a[1],$a[1]);  // adding a dash.
$text = array_slice($shiv,array_search($a[0],$shiv),array_search($a[1],$shiv)-array_search($a[0],$shiv)+1);    // taking the necessary pratyAhAra from $shiv.
$b = implode(" ",$text); // creating a single string of pratyAhAra.
$b = str_replace(" -R","",$b); // removing the end markers of pratyAhAras in between.
$b = str_replace(" -k","",$b);
$b = str_replace(" -N","",$b);
$b = str_replace(" -c","",$b);
$b = str_replace(" -w","",$b);
$b = str_replace(" -m","",$b);
$b = str_replace(" -Y","",$b);
$b = str_replace(" -z","",$b);
$b = str_replace(" -S","",$b);
$b = str_replace(" -v","",$b);
$b = str_replace(" -y","",$b);
$b = str_replace(" -r","",$b);
$b = str_replace(" -l","",$b);
$b = str_replace("a","a A",$b); // Adding the dIrgha of vowels.
$b = str_replace("i","i I",$b);
$b = str_replace("u","u U",$b);
$b = str_replace("f","f F",$b);
$b = str_replace("x","x X",$b);
$b = str_replace("y","y y",$b);
$b = str_replace("v","v V",$b);
$b = str_replace("r","r r",$b);
$b = str_replace("l","l l",$b);
$text = explode(" ",$b); // creating the array of pratyAhAra back.
}
return $text; // returning the result of function to user.
}
/* function pratyAhAra check is for checking in regular expressions. 
 * In regular expressions we don't treat arrays. usually it is 'aAiIuU'. 
 * so this function converts the pratyAhAra to this flat format. */
function pc($text) // pratyAhAra check
{
$text = "'".implode("",prat($text))."'"; // e.g. converting array("a","A") to 'aA'.
return $text; // returning the result to the user.
}
/* Function one is for replacing one letter in the whole array of $text with another letter */
// There are three arguments.
// $a is the array which you want to change. 
// $b is the array which will be put in place of the replaced one.
// $merge can take two values. 0 will mean that the whole $text will be replaced with the new replaced values. Used in case of mandatory Adezas.
// 1 will mean that $text will not be replaced, but the replaced values will be added to it. Used in case of optional Adezas.
function one($a,$b,$merge)
{
    global $text; // taking $text from the subanta.php or sandhi.php and using it here.
    for($z=0;$z<count($text);$z++)
    {
        $p = $text[$z]; // $p is a word from the array $text.
        for($i=0;$i<count($a);$i++)
        {
            $p =  str_replace($a[$i],$b[$i],$p);    // Doing replace in $p.
        }
        $text1[$z] = $p; // storing $p in array $text1.
    }
    if ($merge === 0) // if the Adeza is mandatory.
    {
        $text = $text1; // replaced $text with $text1 (replace one)
        $text = array_unique($text); // keeping only unique values.
        $text = array_values($text); // giving new serial number to the values.
    }
    if ($merge === 1) // if the Adeza is optional.
    {
        $text = array_merge($text,$text1); // merging $text, and the replaced $text1.
        $text = array_unique($text);
        $text = array_values($text);
    }
return $text;  // giving the result to the user.
}
/* Function two is for replacing one letter in the whole array of $text with another letter */
// There are five arguments, $a,$b are the arrays which you want to change, $c,$d are the arrays which will be put in place of the replaced one.
// $merge can take five values. 
// 0 will mean that the whole $text will be replaced with the new replaced values. Used in case of mandatory Adezas.
// 1 will mean that $text will not be replaced, but the replaced values will be added to it. Used in case of optional Adezas.
// 2 = without + sign, mandatory (apadAnta etc)
// 3 = without + sign, optional
// 4 = with + sign only, mandatory (padAnta etc)
// 5 = with + sign only, optional.
function two($a,$b,$c,$d,$merge) // the comments are the same as one function.
{
    global $text;
    for ($z=0;$z<count($text);$z++)
    {$p = $text[$z];
          for($i=0;$i<count($a);$i++)
          {
           for($j=0;$j<count($b);$j++)
                {
                    if($merge<2)
                    {
                    $p =  str_replace($a[$i].$b[$j],$c[$i].$d[$j],$p);   // replacement without "+" sign.
                    $p =  str_replace($a[$i]."+".$b[$j],$c[$i]."+".$d[$j],$p); // replacement for "+" sign.
                    }
                    elseif ($merge<4)
                    {
                    $p =  str_replace($a[$i].$b[$j],$c[$i].$d[$j],$p);  // replacement without "+" sign.                     
                    }
                    else
                    {
                    $p =  str_replace($a[$i]."+".$b[$j],$c[$i]."+".$d[$j],$p); // replacement with "+" sign.                                          
                    }
                }
          }
     $text1[$z]  = $p;      
    }
if (($merge === 0) || ($merge === 2) ||($merge === 4) ) // mandatory Adezas
    {
        $text2 = $text1;
        $text2 = array_unique($text2);
        $text2 = array_values($text2);
    }
if (($merge === 1) || ($merge === 3) ||($merge === 5) ) // optional Adezas.
    {
        $text2 = array_merge($text,$text1);
        $text2 = array_unique($text2);
        $text2 = array_values($text2);
    }
    return $text2;
}

/* Function three is for replacing one letter in the whole array of $text with another letter */
// There are seven arguments, $a,$b,$c are the arrays which you want to change, $d,$e,$f are the arrays which will be put in place of the replaced one.
// $merge can take two values. 
// 0 will mean that the whole $text will be replaced with the new replaced values. Used in case of mandatory Adezas.
// 1 will mean that $text will not be replaced, but the replaced values will be added to it. Used in case of optional Adezas.
function three($a,$b,$c,$d,$e,$f,$merge) // comments are the same as one function.
{global $text;
   for ($z=0;$z<count($text);$z++)
    {$p = $text[$z]; 
     for($i=0;$i<count($a);$i++)
    {
    for($j=0;$j<count($b);$j++)
        {
        for($k=0;$k<count($c);$k++)
            {
            $p =  str_replace($a[$i].$b[$j].$c[$k],$d[$i].$e[$j].$f[$k],$p);       
           $p =  str_replace($a[$i]."+".$b[$j].$c[$k],$d[$i]."+".$e[$j].$f[$k],$p);       
           $p =  str_replace($a[$i].$b[$j]."+".$c[$k],$d[$i].$e[$j]."+".$f[$k],$p);       
           $p =  str_replace($a[$i]."+".$b[$j]."+".$c[$k],$d[$i]."+".$e[$j]."+".$f[$k],$p);       
            }
        }
    }
    $text1[$z] = $p;
    }
    if ($merge === 0)
    {
        $text = $text1;
        $text = array_unique($text);
        $text = array_values($text);
    }
    if ($merge === 1)
    {
        $text = array_merge($text,$text1);
        $text = array_unique($text);
        $text = array_values($text);
    }
    return $text;
}
/* function flatten is a function to flatten a multidimentional array */
// I have borrowed this function from examples in php.net site.
// e.g. array([0]=> a [1]=> array([0] => b [1] => c)) this is flattened in array([0]=>a [1]=>b [2]=>c).
/*function flatten(array $array) // $array is the multidimentional array which you want to flatten.
{
    $return = array();
    array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
    return $return;
}*/ // This code is immeculate. But unfortunately the servers don't support PHP5.4.
function flatten($array) {
    if (!is_array($array)) {
        // nothing to do if it's not an array
        return array($array);
    }

    $result = array();
    foreach ($array as $value) {
        // explode the sub-array, and add the parts
        $result = array_merge($result, flatten($value));
    }

    return $result;
}
/* function savarna is to find out savarNa of a character from the given pratyAhAra */
// $inarray is the array for which you are looking for savarNa.
// $array is the array in which you are looking for savarNa.
// e.g. savarNa(array("a"),prat('ac')) will give  savarNa of letter 'a' from the pratyAhAra 'ac'.
// Known issue - words having two Asyas are not treated properly.
function savarna($inarray,$array)
{
for($z=0;$z<count($inarray);$z++)
{
$text = $inarray[$z];    
    global $kantha,$talu,$murdha,$danta,$oshtha,$nasika,$kanthatalu,$kanthoshtha,$dantoshtha,$sprushta,$ishatsprushta,$vivruta,$samvruta,$aghosha,$alpaprana,$ghosha,$mahaprana,$ac,$udatta,$anudatta,$svarita,$shvasa,$nada,$vivara,$samvara,$hl,$ru,$e; // bringing the arrays in function
    // defining an array for sthAna
$i=0;
if (in_array($text,$kantha)) { $sthana[$i] = $kantha; $i++; } 
if (in_array($text,$talu)) { $sthana[$i] =  $talu; $i++; }
if (in_array($text,$murdha)) { $sthana[$i] = $murdha; $i++; }
if (in_array($text,$danta)) { $sthana[$i] = $danta; $i++; }
if (in_array($text,$oshtha)) { $sthana[$i] = $oshtha; $i++; }
if (in_array($text,$nasika)) { $sthana[$i] = $nasika; $i++; }
if (in_array($text,$kanthatalu)) { $sthana[$i] = $kanthatalu; $i++; }
if (in_array($text,$kanthoshtha)) { $sthana[$i] = $kanthoshtha; $i++;}
if (in_array($text,$dantoshtha)) { $sthana[$i] = $dantoshtha; $i++; }
// defining an array for Abhyantara prayatna for consonants
$j=0;
if (in_array($text,$sprushta)) { $abhyantara[$j] = $sprushta; $j++; }
if (in_array($text,$ishatsprushta)) { $abhyantara[$j] = $ishatsprushta; $j++; }
if (in_array($text,$vivruta)) { $abhyantara[$j] = $vivruta; $j++; }
if (in_array($text,$samvruta)) { $abhyantara[$j] = $samvruta; $j++; }
// defining an array for bAhya prayatna for consonants and prANa
$k=0;
if (in_array($text,$aghosha)) { $ghosh[$k] = $aghosha; $k++; }
if (in_array($text,$alpaprana)) { $prana[$k] = $alpaprana; $k++; }
if (in_array($text,$ghosha)) { $ghosh[$k] = $ghosha; $k++; }
if (in_array($text,$mahaprana)) { $prana[$k] = $mahaprana; $k++; }
// defining an array for bAhya prayatna of vowels
$u=0;
if (in_array($text,$ac)) { $svar[$u] = $udatta; $u++; }
// Finding out intersections of sthAna, Abhyantara prayatna and bAhya prayatnas of the given letter and the given array. 
if(empty($sthana)===FALSE)
{
$sthanasamya = array_intersect(flatten($sthana),$array);  // finding the intersection of sthAna
}
if(empty($abhyantara)===false)
{
$abhyantarasamya = array_intersect(flatten($abhyantara),$array); // finding the intersection of Abhyantara prayatna
}
if(empty($ghosh)===FALSE)
{
$ghoshasamya = array_intersect(flatten($ghosh),$array); // finding the intersection of bAhya prayatna
}
if(empty($prana)===FALSE)
{
$pranasamya = array_intersect(flatten($prana),$array); // finding the intersection of prANa.
}
if(empty($svar)===false)
{
if(in_array($text,$ac)) { $svarasamya = array_intersect(flatten($svar),$array,$ac); // finding the svarasAmya
}    
}
$l = array_intersect($sthanasamya,$abhyantarasamya,$ghoshasamya,$pranasamya); // $l is the case in which sthAna, Abhyantaraprayatna, ghoSa and prANa all are matching. The best match.
$m = array_intersect($sthanasamya,$abhyantarasamya,$ghoshasamya); // $m is the case in which sthAna, Abhyantaraprayatna and ghoSa are matching. The second best match.
$n = array_intersect($sthanasamya,$abhyantarasamya); // $n is the case in which sthAna and Abhyantaraprayatna are matching. The third best match.
$o = array_intersect($sthanasamya,$abhyantarasamya,$pranasamya); // $o is the case in which sthAna, Abhyantaraprayatna and prANa are matching. The second best match.
$p = array_intersect($sthanasamya,$ghoshasamya); // $p is the case in which sthAna and ghoSa are matching. The third best match.
$q = array_intersect($sthanasamya,$pranasamya); // $q is the case in which sthAna and prANa are matching. The third best match.
// Defining savarNas for consonants
if(in_array($text,$hl))
{
    if(empty($sthanasamya)===false&&empty($abhyantarasamya)===false&&empty($ghoshasamya)===false&&empty($pranasamya)===FALSE&&empty($l)===false)  // four match
    {
            $savarna = implode(", ",$l);     
    }
    elseif (empty($sthanasamya)===false&&empty($abhyantarasamya)===false&&empty($ghoshasamya)===false&&empty($m)===false) // three match
    {
            $savarna = implode(", ",$m);     
    }
    elseif (empty($sthanasamya)===false&&empty($abhyantarasamya)===false&&empty($pranasamya)===false&&empty($o)===false) // three match
    {
            $savarna = implode(", ",$o);     
    }
    elseif (empty($sthanasamya)===false&&empty($abhyantarasamya)===false&&empty($n)===false) // two match
    {
            $savarna = implode(", ",$n);     
    }
     elseif (empty($sthanasamya)===false&&empty($ghoshasamya)===false&&empty($p)===false) // two match
    {
            $savarna = implode(", ",$p);     
    } elseif (empty($sthanasamya)===false&&empty($pranasamya)===false&&empty($q)===false) // two match
    {
            $savarna = implode(", ",$q);     
    }
    else // no match
    {
    $savarna = implode(", ",$sthanasamya);    
    }
} 
// defining savarNas for vowels
else
{  
    if (in_array($text,$ru)||in_array($text,$e))
    {// patch for $ru
        for($i=0;$i<4;$i++)
        {
        if ($text === $ru[$i])
        {
            if (in_array($text,$array))
            { $savarna = "f, F, x, X"; }
            else
            { $savarna = ""; }
        }
        // patch for non sAvarNya of e,E,o,O
        elseif ($text === $e[$i])
        {
            if (in_array($text,$array))
            { $savarna = $text; }
            else
            { $savarna = ""; }
        }
        }
    }
  else 
    {// In case of other vowels.
        $savarna = implode(", ",$sthanasamya);
    }
}
// stores that savarNa letter in memory.
$arr[$z] =  $savarna; // We got the savarNa for the first letter of the array. The loop is repeated for all members of the array.
}
return $arr; // returning the desired savarNa array.
}
/* function display will show the text on screen. */
// There are three arguments. 0 will simply display the message. 
// 1 will show an additional message in dvitva. 
// 2 is not used in the code. Useful where there were two optional forms.
// 3 is for aGgAdhikAra.
// 4 is for yaNaH pratiSedho vAcyaH in case of yaN.
// 5 is for sarvAdeza.
// 6 is for bhasya adhikAra.
// 7 is for padasya, padAt, anudAttaM sarvamapAdAdau adhikAra.
// 8 is for anupasarjanAt adhikAra.
// new messages can be added if the message is of repeated nature.
function display($n)
{
    global $text;  // bringing $text from subanta.php
    /* removal of two ++ signs */
    $text = one(array("++"),array("+"),0);

    if ($n === 1) // sending special messages.
        {
        echo "<p class = hn>Please note: Wherever there is dvitva, it is optionally negated by sarvatra zAkalyasya. (8.4.51)</p>";
        echo "<p class = hn>द्वित्व का सर्वत्र सर्वत्र शाकल्यस्य (८.४.५१) से पाक्षिक निषेध होता है ।</p>";
        }
    if ($n === 2) 
        { 
        global $text1; $text2 = $text; $text = $text1; 
        }
    if ($n === 3) 
        {
        echo "<p class = pa>yasmAtpratyayavidhistadAdi pratyaye'Ggam (2.4.13) and aGgasya (6.4.1) </p>";
        echo "<p class = pa>यस्मात्प्रत्ययविधिस्तदादि प्रत्ययेऽङ्गम्‌ (२.४.१३) तथा अङ्गस्य (६.४.१) </p>";
        }
    if ($n === 4) 
        {
        echo "<p class = hn>N.B.: yaNaH pratiSedho vAcyaH (vA 4806) prevents application of saMyogAntasya lopaH (8.2.23) </p>";
        echo "<p class = hn>यणः प्रतिषेधो वाच्यः (वा ४८०६) से संयोगान्तस्य लोपः (८.२.२३) का निषेध होता है ।</p>";
        }
    if ($n === 5) 
        {
        echo "<p class = hn>N.B.: anekAlzitsarvasya (1.1.55) mandates sarvAdeza.  </p>";
        echo "<p class = hn>अनेकाल्शित्सर्वस्य (१.१.५५) से सर्वादेश होता है ।</p>";
        }
    if ($n === 6) 
        {
        echo "<p class = pa>yasmAtpratyayavidhistadAdi pratyaye'Ggam (2.4.13) aGgasya (6.4.1) and bhasya (6.4.129) :</p>";
        echo "<p class = pa>यस्मात्प्रत्ययविधिस्तदादि प्रत्ययेऽङ्गम्‌ (२.४.१३), अङ्गस्य (६.४.१) तथा भस्य (६.४.१२९) :</p>";
        }
    if ($n === 7) 
        {
        echo "<p class = pa>padasya (8.1.16), padAt (8.1.17) and anudAttaM sarvamapAdAdau (8.1.18) :</p>";
        echo "<p class = pa>पदस्य (८.१.१६), पदात्‌ (८.१.१७) तथा अनुदात्तं सर्वमपादादौ (८.१.१८) :</p>";
        }
    if ($n === 8) 
        {
        echo "<p class = pa>anupasarjanAt (4.1.14) :</p>";
        echo "<p class = pa>अनुपसर्जनात्‌ (४.१.१४) :</p>";
        }
    for($i=1;$i<count($text)+1;$i++) // for all members of the $text array
    {
        echo "<p class = form>$i - ".convert($text[$i-1])."</p>"; // showing the output to the browser. e.g. 1. rAmaH. $i is for numbering. function convert converts the output into devanAgarI.
    }
    echo "<hr>"; // drawing a line after all the words are displayed. Thus two sUtras are separated by a separator line.
    if ($n === 2) { $text1 = $text; $text = $text2; } // not useful because the display(2) is not used in the code. If it is used, this will work.
}
/* function dvitva will be used to duplicate a letter */
// It has six arguments, first four arguments are the arrays which need to be replaced. 
// $location is to specify which of these 4 consecutive arrays is to be duplicated. e.g. 2 will mean that the second member will be duplicated.
// $merge is to specify whether to replace (0) or add (1) to the existing array. 0 is used for mandatory dvitva and 1 is used for optional dvitva.
// I am not able to elucidate this code much, because it is a borrowed code. I have kept it as the lender gave.
function dvitva ($kantha,$talu,$murdha,$oshtha,$location,$merge)
{ 
 global $text;   
// this is an array of the input values to use below 
 // get all possible combianations of $kantha+$talu+$murdha
   $combinations = array(); 
     foreach($kantha as $k) // "a","k","g","n","h"
     { 
        foreach($talu as $t) // "i","c","j","y","s"
        { 
            foreach($murdha as $m) // "f","w","q","r","z"
            {
                foreach ($oshtha as $o)
                {
                 $combinations[] = $k.$t.$m.$o;    
                }
            } 
        } 
     } 

$values1 = array();
foreach ($text as $stti => $string)  // 'aifkcwh', 'aifkcwhsz', 'kim', 'aif'
{
    $values = array($string);  
       reset($values); 
  // loop through $values using an array pointer 
    // while the current array pointer position is not null/false
    while(current($values)!==false)
    {
        // on the first iteration, $values will be the inputted string 
        // from $strings_to_test... our example is "aifkcwh"
        $value = current($values); 
        if ($merge === 1)
        {
        $values1[] = current($values);
        }
        // for each possible combination of $kantha.$talu.$murdha
        // let's say our first combination is "aif"
        foreach($combinations as $ci => $combination)
        {  
            // look and see if the current value we are looking
            // at ("aifkcwh") contains this combination string  
            if (strpos($value,$combination)!==false)
            { 
                // if it does... we perform the string mutation
                // "aif" does exist in the string "aifkcwh"

                // get the second letter in the combination string
               // echo $combination. "These are combinations </br>";
                $single = $combination[$location-1];   // i 

                // double that second letter
                $post = substr($combination,$location-1);
                // echo $post. "These are posts </br>";
                $pre = chop($combination,$post);
                // echo $pre. "These are pres </br>";
                // create a new string that is the combination with the 
                // second letter doubled... 
                $newcom = $pre.$combination[$location-1].$post;
               // echo $newcom."These are newcoms </br> ";
                // replace that string in $values so that
                // aifkcwh becomes aiifkcwh
                $newval = str_replace($combination, $newcom, $value); // aiifkcwh

                // does the new value ("aiifkcwh") exist in $values?  
                // have we already recorded this mutation?  
                if (!in_array($newval,$values1)) 
                { 
                    // if not... append it to the array $values
                    $values1[] = $newval; 
                    // now, values would go from being = array([0]=>'aifkcwh'); 
                    // to array ([ 0] => 'aifkcwh', [1] => 'aiifkcwh' ); 
                }
                else 
                {
                }
            } 
        } // <-- end of the foreach statement, this will go through all combinations 
          //     in our combinations array for this particular value which is currently aifkcwh


        // next($values) increments the array pointer so that we move to the next
        // value in the $values array.  since we just added a value, 
        // $values now contains array ([ 0] => 'aifkcwh', [1] => 'aiifkcwh' ); 

        // before this statement index 0, current($values) == 'aifkcwh'
        next($values);  
        // after this statement index 1, current($values) == 'aiifkcwh'
        // for the next loop, we will test this string for all the combinations
        // if there is no next value, the `while` loop will end 
    }  

    // after we have gone through every possible combination for "aifkcwh",
    // we will have something like this: 
    /*
        Array
          (
                [0] => aifkcwh
                [1] => aiifkcwh
                [2] => aifkccwh
                [3] => aiifkccwh
          )
    */
    // and we add that to the $output array that contains an index for 
    // each input string, which contains all possible mutations of that string 
    $output[$string] = $values1; 
}
$output = flatten($output);
$output = array_unique($output);
$output = array_values($output);
return $output;
}
/* function flat is used to make an array useful for regular expressions */
 function flat($array)
 {
     $array = "'".implode("",$array)."'";
     return $array;
 }
/* function blank will return an array having n blank members. blank(2) === array("",""); */
 function blank($n)
 {
     $array = array();
     while(count($array)< $n+1)
     {
        array_push($array,""); // adding blank ""s in the array.
     }
     return $array;
 }
/* function checkarray is used to see whether the sequence of $a,$b,$c,$d is found in any of the members of $text */ 
 function checkarray($a,$b,$c,$d) // usually sub function serves the purpose. Only once or twice this function is used where we have to test 4 consecutive letters to satisfy the demand of the rule.
 {
     global $text;
     $array = $text;
    $combinations = array();
     foreach ($a as $aa)
     {
         foreach ($b as $bb)
         {
             foreach ($c as $cc)
             {
                 foreach ($d as $dd)
                 {
                     $combinations[] = $aa.$bb.$cc.$dd; //  creating all permutations and combinations of given 4 arrays and storing it.
                 }
             }
         }
     }
     $counter = array();
     for ($i=0;$i<count($array);$i++)
     {
         for($j=0;$j<count($combinations);$j++)
         {
             if(strpos($array[$i],$combinations[$j]) !== false)
             {
                 $counter = 1; // if the occurence is found in any of the $text members, $counter is made 1. Otherwise it will remain 0.
                 break;
             }
             else
             {
                 $counter = 0;
             }  
         }
           if ($counter === 1)
           {
               break;
           }
           else 
           {
               $counter = 0;
           }
        
     }
     return $counter; // returns 1 for match found. 0 for no match found.
 }
/* function sub is a modified version of checkarray. It searches for the consecutive occurences of $a,$b,$c in the members of array $text. 
 * $repeat 0 will mean that the sequence doesnt matter. 1 will mean that the sequence has to be the same.
 */ 
 function sub($a,$b,$c,$repeat)
{   
     global $text;
     $needle = array();
    // for different length and all combinations
    if($repeat !== 1)
    {
        foreach ($a as $aa)
        {
         foreach ($b as $bb)
         {
             foreach ($c as $cc)
             {
                 $needle[]=$aa.$bb.$cc; // creating all permutations and combinations.
                 $needle[]=$aa."+".$bb.$cc; // adding "+" at all possible locations.
                 $needle[]=$aa.$bb."+".$cc;
                 $needle[]=$aa."+".$bb."+".$cc;
             }
         }
        }
    }
    // for similar length arrays and ordered combinations.
    if ($repeat === 1)
    {
        for($i=0;$i<count($a);$i++)
        {
            $needle[] = $a[$i].$b[$i].$c[$i]; // creating linear patterns.
            $needle[] = $a[$i]."+".$b[$i].$c[$i]; // adding "+" at all possible locations.
            $needle[] = $a[$i].$b[$i]."+".$c[$i];
            $needle[] = $a[$i]."+".$b[$i]."+".$c[$i];
        }
    }
    /*** map with preg_quote ***/
    $needle = array_map('preg_quote', $needle); 
    /*** loop of the array to get the search pattern ***/
    global $first;
    foreach ($needle as $pattern)
    {
        if (($repeat <2 && count(preg_grep("/$pattern/", $text)) >0) || ($repeat ===2 && strpos(strrev($first), strrev($pattern)) === 0) || ($repeat ===3 && strpos($first,$pattern) === 0) || ($repeat ===4 && strpos(strrev($second), strrev($pattern)) === 0) || ($repeat ===5 && strpos($second,$pattern) === 0))
        {
        $can = 1; // match found
        break;
        }  
        else
        {
            $can = 0; // match not found
        }
    }
if ($can === 1)
{
    return true;
}
else
{
    return false;
}

}
/* function to search the occurence of a pattern in any of the member of an array */
// $text - the array to search for the occurence of pattern
// $a - pattern in regular expression.
function arr($text,$a)
{
    foreach ($text as $value)
    {
        if (preg_match($a,$value)) // if the regular expression matches the value of array member.
        {
            $count[] = 1; // match found
            break;
        }
        else 
        {
            $count[] = 0; // match not found
        }
    }
    if (in_array(1,$count))
    {
        return true; // if match found
    }
    else
    {
        return false; // if match not found
    }
}
/* function to remove the last n letters from a word in the $text array and replace them with another word */
function last($a,$b,$merge)
{
    global $text; // bringing $text from subanta.php.
    foreach ($text as $value)
    {
        for($i=0;$i<count($a);$i++)
        { $c = str_replace("\\","",$a[$i]);
            if (preg_match('/('.$a[$i].')$/',$value) || preg_match('/('.$c.')$/',$value))
            {
                $value1[] = substr($value,0,-strlen($a[$i])).$b[$i]; // removing the last letter and substituting it with the corresponding letter of $b.
                if ($merge === 1)
                {
                    $value1[] = $value;
                }
            }
            else
            {
                $value1[] = $value;
            }
        }
        if (array_unique($value1)===array($value))
        {
            $value2[] = array_unique($value1); // in case there is no change.
        }
        elseif ($merge === 1)
        {
            $value2[] = array_unique($value1); // in case there is optional Adeza.
        }
        else
        {
            $value2[] = array_diff($value1,array($value)); // in case there is mandatory Adeza.
        }
        $value1 = array(); // reseting the $value1 for future use.
    }
    $text = flatten($value2); // storing the result of $value2 in $text.
    $text = array_unique($text); // keeping only unique members
    $text = array_values($text); // reserialize the numbers.
    return $text; // return to the user.
}
/* function to remove the first n letters from a word in the $text array and replace them with another word */
function first($a,$b,$merge)
{
    global $text;
    foreach ($text as $value)
    {
        for($i=0;$i<count($a);$i++)
        {
            if (preg_match('/('.$a[$i].')$/',$value))
            {
                $value1[] = $b[$i].substr($value,strlen($a[$i])); // This function is the same as last function, except that the replacement here is preceded by the member of $b, unlike followed by member of $b in last function.
                if ($merge === 1)
                {
                    $value1[] = $value;
                }
            }
            else
            {
                $value1[] = $value;
            }
        }
        if (array_unique($value1)===array($value))
        {
            $value2[] = array_unique($value1);
        }
        elseif ($merge === 1)
        {
            $value2[] = array_unique($value1);
        }
        else
        {
            $value2[] = array_diff($value1,array($value));
        }
        $value1 = array();
    }
    $text = flatten($value2);
    $text = array_unique($text);
    $text = array_values($text);
    return $text;
}
/* vriddhi function */
function vriddhi($a)
{ $ac = array("a","A","i","I","u","U","f","F","x","X","e","o","E","O",);
  $acreplace = array("A","A","E","E","O","O","Ar","Ar","Al","Al","E","O","E","O",);
    foreach ($a as $value)
    {
        $out[] = str_replace($ac,$acreplace,$value); // replacing the vowels with their corresponding vRddhi letters.
    }
    return $out;
}
/* guna function */
function guna($a)
{ $ac = array("a","A","i","I","u","U","f","F","x","X","e","o","E","O",);
  $acreplace = array("a","a","e","e","o","o","ar","ar","al","al","e","o","e","o",);
    foreach ($a as $value)
    {
        $out[] = str_replace($ac,$acreplace,$value); // replacing the vowels with their corresponding guNa letters.
    }
    return $out;
}
/* dirgha function */
function dirgha($a)
{ $ac = array("a","A","i","I","u","U","f","F","x","X","e","o","E","O",);
  $acreplace = array("A","A","I","I","U","U","F","F","F","F","e","o","E","O",);
    foreach ($a as $value)
    {
        $out[] = str_replace($ac,$acreplace,$value); // replacing the vowels with their corresponding dIrgha letters.
    }
    return $out;
}

/* anekAca function */
// function to test whether the word is ekAc or anekAc i.e. whether there is only one vowel in it or more than one vowel in it.
function anekAca($a)
{
    $ac = array("a","A","i","I","u","U","f","F","x","X","e","o","E","O",); // vowel list.
    $b = preg_split('/['.flat($ac).']/',$a); // splitting the word by vowels.
    if (count($b)>2) // if there are more than 2 pieces, that means there are more than one vowel mandatorily.
    {
        return true; // returns true to the user.
    }
    else
    {
        return false;  // returns false to the user.
    }
}
/* ends function */
// to find if there is any member of array which end in a particular member of another array.
// 0 -> doesn't start with but ends with it. 1 -> ends with it or is equal to it. 2 -> is equal to it., 3 -> starts with it but doesn't end with it. 4 -> ends in verb (upasargas don't bother)
function ends($a,$b,$n)
{
    $upasarga = array("pra","prati","api","parA","apa","upa","pari","anu","ava","vi","saM","su","ati","ni","nir","ut","aDi","dur","aBi","A"); 
    $pattern=array("pra","prA","pro","prati","praty","api","apy","parA","paro","apa","apA","apo","upa","upA","upo","pari","pary","anu","anU","anv","ava","avA","avo","vi","vy","saM","sam","san","su","sU","sv","ati","aty","ni","ny","nir","niH","nis","niz","ut","ud","uc","ul","aDi","aDy","dur","duH","dus","duz","aBi","aBy","A",);
    
    foreach ($a as $aa)
    {
        foreach ($b as $bb)
        {
            if ($n===0) 
            {
                if (strpos($aa,$bb)>0 && strpos(strrev($aa),strrev($bb)) ===0) // strpos($aa,$bb)>0 means that it doesn't start with it. the next means that it ends with it.
                {
                    $can[] = 1;
                }
                else
                {
                    $can[] = 0;
                }                
            }
            if ($n===1)
            {
                if (strpos($aa,$bb) >= 0 && strpos(strrev($aa),strrev($bb)) ===0) // strpos($aa,$bb) >= 0 means that it starts with it or is included in it. the next means that it ends with it.
                {
                    
		    $can[] = 1;
                }
                else
                {
                    $can[] = 0;
                }                
            }
            if ($n===2)
            {
                if ($aa===$bb) // they are the same.
                {
                    
		    $can[] = 1;
                }
                else
                {
                    $can[] = 0;
                }                
            }
            if ($n===3) 
            {
                if (strpos($aa,$bb)===0 && strpos(strrev($aa),strrev($bb)) !==0) 
                {
                    $can[] = 1;
                }
                else
                {
                    $can[] = 0;
                }                
            }
            if ($n===4) 
            {
                    foreach ($pattern as $one)
                    {
                        if (strpos($aa,$one)!==false)
                        {
                            $prat[]=1;
                        }
                    }
                if ( (strpos($aa,$bb)>0 && in_array(1,$prat)) || $aa===$bb) 
                {
                    $can[] = 1;
                }
                else
                {
                    $can[] = 0;
                }                
            }

        }
    }
    if (in_array(1,$can))
    {
        return true; // if any time $can becomes 1, it means that match is found.
    }
    else
    {
        return false; // match not found.
    }
}
/* function Ti to remove the Ti */
// $merge 0 - mandatory Adezas, 1 - optional Adezas.
function Ti($merge)
{   
    global $text;
    $te1 = '/(['.pc('ac').'])(['.pc('hl').']*)([+])/'; // vowel - unlimited combinations of consonants - '+' combination.
    $te2 = '$3'; // keep only "+" and remove the first two members.
        foreach ($text as $value)
        {
            $val[] = preg_replace($te1,$te2,$value); // removing the first two members.
        }
        if ($merge===0) // mandatory Adezas
        {
            $text = $val;
        }
        if ($merge === 1) // optional Adezas
        {
            $text = array_merge($text,$val);
        }        
    $val=array();
    $text = array_unique($text);
    $text = array_values($text);
    return $text; // giving the result to the user.
}
/* function mit */
// $pattern is the pattern to search in the word to add mit pratyaya.
// $b is the addition to upadha
// $merge 0 is replacement, 1 is optional.
function mit($pattern,$b,$merge)
{   global $text;
    $te1 = '/(['.pc('ac').'])(['.pc('hl').']*)([+])/';
    $te2 = '$1'.$b.'$2$3'; // Adding the mit Agama after the last vowel. 'midaco'ntyAtparaH'.
        foreach ($text as $value)
        {
            if (preg_match($pattern,$value))
            {
//                $val[] = preg_replace($te1,'$1n$2$3',$value); // executing mit Agama.
                  $val[] = preg_replace($te1,$te2,$value); // executing mit Agama.
            }
            else
            {
                $val[] = $value;
            }
        }        
        if ($merge===0)
        {
            $text = $val;
        }
        if ($merge === 1)
        {
            $text = array_merge($text,$val);
        }        
    $val=array();
    $text = array_unique($text);
    $text = array_values($text);
    return $text;
}
/* function samprasarana */
function samprasarana($a,$merge)
{
    $yan = array("y","v","r","l");
    $yanik = array("i","u","f","x"); // list of samprasAraNa for yaN.
    foreach ($a as $value)
    {
    $b[] = str_replace($yan,$yanik,$a);        // doing samprasARaNa.
    }    
    return $b;
}
/* function itcheck */
// $a to contain the array of it markers to check.
// $b. 0 for it. 1 for itprakriti. 2 for itpratyaya
function itcheck($a,$b)
{
    global $text; global $it; global $itprakriti; global $itpratyaya;
    if ($b===0)
    {
        if(count(array_intersect($it,$a))>0) // finds in $it.
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    if ($b===1)
    {
        if(count(array_intersect($itprakriti,$a))>0) // finds in $itprakriti
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    if ($b===2)
    {
        if(count(array_intersect($itpratyaya,$a))>0) // finds in $itpratyaya
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}
/* function it (to find an it marker). The function adds the marker to its arrays. */
// $pattern is the pattern to look for
// $a 0 for finding it in the whole word. 1 for it in prakriti. 2 for it in pratyaya.
function it($pattern)
{
    global $text; global $it; global $itprakriti; global $itpratyaya;
        foreach ($text as $value)
        {
            $b = preg_split($pattern,$value,null,PREG_SPLIT_DELIM_CAPTURE); // spliting the string by the pattern.
            for($i=1;$i<((count($b)+1)/2);$i++)
            {
                $b[$i*2-1]= str_replace("!","",$b[$i*2-1]); // removing !
                $b[$i*2-1]= str_replace("+","",$b[$i*2-1]); // removing +
                $it = array_merge($it,array($b[$i*2-1])); // adding the it marker to the array $it.
                $it = array_unique($it);
                $it = array_values($it);                
            }                   
        }
       foreach ($text as $value)
        {
            $c = explode("+",$value);
            $b = preg_split($pattern,$c[0],null,PREG_SPLIT_DELIM_CAPTURE);
            for($i=1;$i<((count($b)+1)/2);$i++)
            {
                $b[$i*2-1]= str_replace("!","",$b[$i*2-1]);
                $b[$i*2-1]= str_replace("+","",$b[$i*2-1]);
                $itprakriti = array_merge($itprakriti,array($b[$i*2-1])); // adding it to array $itprakriti
                $itprakriti = array_unique($itprakriti);
                $itprakriti = array_values($itprakriti);         
            }                   
        }
       foreach ($text as $value)
        {
            $c = explode("+",$value);
            $pattern = str_replace("[+]","^",$pattern); 
            $b = preg_split($pattern,$c[1],null,PREG_SPLIT_DELIM_CAPTURE); 
            for($i=1;$i<((count($b)+1)/2);$i++)
            {
                $b[$i*2-1]= str_replace("!","",$b[$i*2-1]);
                $b[$i*2-1]= str_replace("+","",$b[$i*2-1]);
                $itpratyaya = array_merge($itpratyaya,array($b[$i*2-1])); // adding it to array $itpratyaya
                $itpratyaya = array_unique($itpratyaya);
                $itpratyaya = array_values($itpratyaya);         
            }                   
        }
}
/* function to find out it markers when they can occur only in the pratayayas. */
function itprat($pattern)
{
    global $text; global $it; global $itprakriti; global $itpratyaya; 
       foreach ($text as $value)
        {
            $c = explode("+",$value);
            $b = preg_split($pattern,$c[1],null,PREG_SPLIT_DELIM_CAPTURE);
            for($i=1;$i<((count($b)+1)/2);$i++)
            {
                $b[$i*2-1]= str_replace("!","",$b[$i*2-1]);
                $b[$i*2-1]= str_replace("+","",$b[$i*2-1]);
                $itpratyaya = array_merge($itpratyaya,array($b[$i*2-1])); // adding it to array $itpratyaya
                $itpratyaya = array_unique($itpratyaya);
                $itpratyaya = array_values($itpratyaya);         
            }                   
        }
}
/* function antya to do antyAdeza */
// $a - array where we want to do antyAdeza. $rep - replacement in place of the last letter.
function antya($a,$rep)
{
    foreach ($a as $value)
    {
        $value1[] = substr($value,0,-1).$rep;
    }
    return $value1;
}
/* adding a specific letter/word at the end of all members of array */
function addlast($a,$b,$merge)
{
    foreach($a as $value)
    {
        $value1[] = $value.$b;
    }
    if ($merge===0)
    {
        $text = $value1;
    }
    if ($merge === 1)
    {
        $text = array_merge($a,$value1);
    }
    $output = flatten($text);
    $output = array_unique($output);
    $output = array_values($output);
return $output;    
}
/* function anubandha to remove it markers */
function anubandha()
{ 
    global $text; global $first; global $pada; global $itprakriti; global $wa1; global $sarva2; global $purva; global $taddhita; global $sarva; global $sup; global $so; global $al; global $hl;
    /* AdirGiTuDavaH (1.3.5) */
    if ((substr($first,0,2) === "Yi" || substr($first,0,2) === "wu" || substr($first,0,2) === "qu") && $pada=== "pratyaya")
    {
        if(substr($first,0,2) === "Yi") { $itprakriti = array_merge($itprakriti,array("Yi")); }
        if(substr($first,0,2) === "wu") { $itprakriti = array_merge($itprakriti,array("wu")); }
        if(substr($first,0,2) === "qu") { $itprakriti = array_merge($itprakriti,array("qu")); }
        echo "<p class = pa >By AdirGiTuDavaH (1.3.5) :</p>";
        echo "<p class = pa >आदिर्ञिटुडवः (१.३.५) :</p>";
        display(0);
        $text = first(array("Yi","wu","qu"),array("","",""),0); // function first removes and replaces specific strings from the words. For details see function.php.
        echo "<p class = sa >tasya lopaH (1.3.9) :</p>";
        echo "<p class = sa >तस्य लोपः (१.३.९) :</p>";
        display(0);
    }
    /* cuTU (1.3.7) */ 
    if (arr($text,'/[+][cCjJYwWqQR]/') )
    {
        echo "<p class = pa >By cuTU (1.3.7) :</p>";
        echo "<p class = pa >चुटू (१.३.७) :</p>";
        display(0);
        $text = two(array("+"),array("c","C","j","J","Y","w","W","q","Q","R"),array("+"),blank(10),0);
        $text = last(array("jas","wA"),array("as","A"),0);
        echo "<p class = sa >tasya lopaH (1.3.9) :</p>";
        echo "<p class = sa >तस्य लोपः (१.३.९) :</p>";
        display(0);
    }
    /* SaH pratyayasya (1.3.6) */
    if (arr($text,'/[+][z]/') && $pada=== "pratyaya")
    {
        it('/([+][z])/');
        echo "<p class = pa >By SaH pratyayasya (1.3.6) :</p>";
        echo "<p class = pa >षः प्रत्ययस्य (१.३.६) :</p>";
        display(0);
        $text = two(array("+"),array("z"),array("+"),array(""),0);
        echo "<p class = sa >By tasya lopaH (1.3.9) :</p>";
        echo "<p class = sa >तस्य लोपः (१.३.९) :</p>";
        display(0);
    }
    /* lazakvataddhite (1.3.8) */
    if (((arr($text,'/[+][lSkKgGN]/'))||$sarva2===1||$purva===1) && $taddhita === 0 )
    {
        it('/([+][lSkKgGN])/');
        echo "<p class = pa >By lazakvataddhite (1.3.8) :</p>";
        echo "<p class = pa >लशक्वतद्धिते (१.३.८) :</p>";
        display(0);
        $text = two(array("+"),array("l","S","k","K","g","G","N"),array("+"),array("","","","","","",""),0);
        echo "<p class = sa >By tasya lopaH (1.3.9) :</p>";
        echo "<p class = sa >तस्य लोपः (१.३.९) :</p>";
        display(0);
    }
    if (arr($text,'/['.flat($ac).'][!]/')  )
    {
        it('/(['.flat($ac).'][!])/');
        echo "<p class = pa >By upadeze'janunAsika it (1.3.2) :</p>";
        echo "<p class = pa >उपदेशेऽजनुनासिक इत्‌ (१.३.२) :</p>";
        display(0);
        $text = two($ac,array("!"),blank(count($ac)),array(""),0);
        echo "<p class = sa >By tasya lopaH (1.3.9) :</p>";
        echo "<p class = sa >तस्य लोपः (१.३.९) :</p>";
        display(0);    
    }

return $text;

}
/* function AdivRddhi to find AdivRddhi */
function AdivRddhi($a)
{
    foreach ($a as $value)
    {
        $b=preg_split('/([aAiIuUfFxXeEoO])/',$value,null,PREG_SPLIT_DELIM_CAPTURE);
        if(in_array($b[1],array("A","E","O")))
        {
            $can[]=1;
        }
        else
        {
            $can[]=0;
        }
    }
    if (in_array(1,$can))
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}
/* function dvigu to find whether ther is dvigu */
function dvigu($a)
{
    if (ends($a,array("eka","ekA","eke","dvi","dvI","dvy","tri","trI","try","catur","catuH","catuz","paYc","zaq","zaw","sapt","azw","nav","daS","Sat"),3) && !ends($a,array("ekaka","dvika","trika","catuzka","paYcaka","zawka","saptaka","azwaka","navaka","daSaka","Sataka"),2))
    {
        return true;
    }
    else
    {
        return false;
    }
}
function removeaccent($text)
{
$text = stripslashes($text);
    $a=array("\\","/","^","-","°","*","(",")","[","]","-","?","॑","॒",);
    $b=array("","","","","","","","","","","","","","");
$text = str_replace($a,$b,$text);
return $text;
}
function removeanusvar($text)
{
    $a=array("a!","A!","i!","I!","u!","U!","f!","F!","x!","X!","e!","o!","E!","O!",);
    $b=array("","","","","","","","","","","","","","");
    $text = str_replace($a,$b,$text);
    return $text;
}
function verbprocess($text)
{
    if(arr(array($text),'/^[Ywq][iu]/'))
    {
        $text=preg_replace('/^([Ywq][iu])/',"",$text);
    }
    if(arr(array($text),'/(^[z])/') && !in_array($text,array("zvazk","zWiv")))
    {
        $text=preg_replace('/^([z])/',"s",$text);
        $text=str_replace(array("sw","sW","sq","sQ","sR",),array("st","sT","sd","sd","sn",),$text);
    }
    if(arr(array($text),'/(^[R])/') )
    {
        $text=preg_replace('/^([R])/',"n",$text);
    }
    if(arr(array($text),'/[iu][r]['.pc('hl').']/') )
    {
        $text=str_replace(array("ir","ur"),array("Ir","Ur"),$text);              
    }
    return $text;
}


/* Functions which are not used in the code */
/* Function f to find the nth letter in the word */
function f($text,$n) // Not used in code.
{
$p = str_split($text); // splits the word in its letters.
$text = $p[$n-1]; // finds the nth letter. 1st letter is $p[0], 2nd $p[1]... nth is $p[$n-1]
return $text; // returning the result to the user.
}
/* find string after removing 'n' letters from beginning of the word (sa for string after) */
function sa($text,$n)        // Not used in code.
{
$p = str_split($text); 
$a = "";
for ($q=0;$q<$n;$q++)
{ $text = ltrim($text,$p[$q]); }
return $text;
}
/* find 'n'th letter from the end in a word (r for reverse direction) */
function r($text,$n)                 // Not used in code
{
$p = str_split($text);
$text = $p[count($p)-$n];
return $text;
}
/* find the string remaining after removing n characters from the end (sb for string before) */
function sb($text, $n)        // Not used in code.
{
$p = str_split($text);
$a= "";
for ($q=0;$q<$n;$q++)
{$text = chop($text,$p[count($p)-$q-1]);} 
return $text;
}
/* function lopa is not used in the code because it is not stable */
function lopa ($kantha,$talu,$murdha,$oshtha,$location,$merge)
{ 
 global $text;   
// this is an array of the input values to use below 
 // get all possible combianations of $kantha+$talu+$murdha
//$combinations = get_string_combinations(); 
   $combinations = array(); 

     foreach($kantha as $k) // "a","k","g","n","h"
     { 
        foreach($talu as $t) // "i","c","j","y","s"
        { 
            foreach($murdha as $m) // "f","w","q","r","z"
            {
                foreach ($oshtha as $o)
                {
                 $combinations[] = $k.$t.$m.$o;    
                }
            } 
        } 
     } 
//print_r($combinations);
$values1 = array();
foreach ($text as $stti => $string)  // 'aifkcwh', 'aifkcwhsz', 'kim', 'aif'
{

    $values = array($string);  
    
    reset($values); 


    // loop through $values using an array pointer 
    // while the current array pointer position is not null/false
    while(current($values)!==false)
    {
        // on the first iteration, $values will be the inputted string 
        // from $strings_to_test... our example is "aifkcwh"
        $value = current($values); 
        
       if ($merge === 1)
        {
        $values1[] = current($values);
        } 
        // for each possible combination of $kantha.$talu.$murdha
        // let's say our first combination is "aif"
        foreach($combinations as $ci => $combination)
        {  
            // look and see if the current value we are looking
            // at ("aifkcwh") contains this combination string  
            if (strpos($value,$combination)!==false)
            {   $posterior = substr($value,strpos($value,$combination)+$location+2);
                $previous = chop($value,$posterior);
                $previous = substr($previous,0,strlen($previous)); 
                $newval = $previous.$posterior; 
               // echo $value."<br>".$combination."</br>".$previous."</br>".$posterior."</br>";
                // have we already recorded this mutation?  
                if (!in_array($newval,$values1)) 
                { 
                    // if not... append it to the array $values
                    $values1[] = $newval; 
                    // now, values would go from being = array([0]=>'aifkcwh'); 
                    // to array ([ 0] => 'aifkcwh', [1] => 'aiifkcwh' ); 
                }
                else 
                {
                }
            } 
        } // <-- end of the foreach statement, this will go through all combinations 
          //     in our combinations array for this particular value which is currently aifkcwh
        next($values);  
    }  

    $output[$string] = $values1;
}
// print_r($output);
$output = flatten($output);
$output = array_unique($output);
$output = array_values($output);

return $output;
}
/* function nosavarna is not used in the code. It is for finding the array of savarNas without the letter itself. */
function nosavarna($c)
{
    global $ac;
     $i = array("i","I");$u = array("u","U");$f = array("f","F","x","X");
    
    if ( $c === $i[0] ) {$non = array_diff($ac, $i);}
    if ( $c === $i[1] ) {$non = array_diff($ac, $i);}
    if ( $c === $u[0] ) {$non = array_diff($ac, $u);}
    if ( $c === $u[1] ) {$non = array_diff($ac, $u);}
    if ( $c === $f[0] ) {$non = array_diff($ac, $f);}
    if ( $c === $f[1] ) {$non = array_diff($ac, $f);}
    if ( $c === $f[2] ) {$non = array_diff($ac, $f);}
    if ( $c === $f[3] ) {$non = array_diff($ac, $f);}
       return $non;
}
/* function get_string_combinations is a subset of the function dvitva and lopa. In modified version, this code segment is redundant. */
 function get_string_combinations()
 {
     $kantha = array("a","k","g","n","h");
     $talu   = array("i","c","j","y","s");
     $murdha = array("f","w","q","r","z");

     $combinations = array(); 

     foreach($kantha as $k) // "a","k","g","n","h"
     { 
        foreach($talu as $t) // "i","c","j","y","s"
        { 
            foreach($murdha as $m) // "f","w","q","r","z"
            {
                $combinations[] = $k.$t.$m; 
            } 
        } 
     } 
     // this gives us an array if 125 items 
     /*
     $combinations = 
        Array
        (
             [0] => aif
             [1] => aiw
             [2] => aiq
             [3] => air
             [4] => aiz
             .... 
             [121] => hsw
             [122] => hsq
             [123] => hsr
             [124] => hsz
        ) 
     */
     return $combinations;
 }
 /* function merge is not used in the code */
 function merge($text,$text1)
 {
     $text = array_merge($text,$text1);
    $text = array_unique($text);
    $text = array_values($text);
    return $text;
 }
/* function blank1 will return an array having n members of $a. blank("a",2) === array("a","a"); Not used in code. */
 function blank1($a,$n)
 {
     $array = array();
     while(count($array)< $n+1)
     {
        array_push($array,$a);
     }
     return $array;
 }
/* Function to find savarna of a given letter from the given array. Not used in code. */
function sl($text,$array) // Known issue - words having two Asyas.
{
    global $kantha,$talu,$murdha,$danta,$oshtha,$nasika,$kanthatalu,$kanthoshtha,$dantoshtha,$sprushta,$ishatsprushta,$vivruta,$samvruta,$aghosha,$alpaprana,$ghosha,$mahaprana,$ac,$udatta,$anudatta,$svarita,$shvasa,$nada,$vivara,$samvara,$hl,$ru,$e;
    // defining an array for sthAna
$i=0;
if (in_array($text,$kantha)) { $sthana[$i] = $kantha; $i++; }
if (in_array($text,$talu)) { $sthana[$i] =  $talu; $i++; }
if (in_array($text,$murdha)) { $sthana[$i] = $murdha; $i++; }
if (in_array($text,$danta)) { $sthana[$i] = $danta; $i++; }
if (in_array($text,$oshtha)) { $sthana[$i] = $oshtha; $i++; }
if (in_array($text,$nasika)) { $sthana[$i] = $nasika; $i++; }
if (in_array($text,$kanthatalu)) { $sthana[$i] = $kanthatalu; $i++; }
if (in_array($text,$kanthoshtha)) { $sthana[$i] = $kanthoshtha; $i++;}
if (in_array($text,$dantoshtha)) { $sthana[$i] = $dantoshtha; $i++; }
// defining an array for Abhyantara prayatna for consonants
$j=0;
if (in_array($text,$sprushta)) { $abhyantara[$j] = $sprushta; $j++; }
if (in_array($text,$ishatsprushta)) { $abhyantara[$j] = $ishatsprushta; $j++; }
if (in_array($text,$vivruta)) { $abhyantara[$j] = $vivruta; $j++; }
if (in_array($text,$samvruta)) { $abhyantara[$j] = $samvruta; $j++; }
// defining an array for bAhya prayatna for consonants
$k=0;
if (in_array($text,$aghosha)) { $ghosh[$k] = $aghosha; $k++; }
if (in_array($text,$alpaprana)) { $prana[$k] = $alpaprana; $k++; }
if (in_array($text,$ghosha)) { $ghosh[$k] = $ghosha; $k++; }
if (in_array($text,$mahaprana)) { $prana[$k] = $mahaprana; $k++; }
// defining an array for bAhya prayatna of vowels
$u=0;
if (in_array($text,$ac)) { $svar[$u] = $udatta; $u++; }

// Finding out intersections of sthAna, Abhyantara prayatna and bAhya prayatnas of the given letter and the given array. 
if(empty($sthana)===FALSE)
{
$sthanasamya = array_intersect(flatten($sthana),$array); 
//echo "The letters in the pratyAhAra with same sthAna (Asya) as the letter input are: ".implode(",",$sthanasamya)."</br>";    
}
if(empty($abhyantara)===false)
{
$abhyantarasamya = array_intersect(flatten($abhyantara),$array);
//echo "The letters in the pratyAhAra with the same Abhyantara prayatna as the letter input are: ".implode(",",$abhyantarasamya)."</br>";    
}
if(empty($ghosh)===FALSE)
{
$ghoshasamya = array_intersect(flatten($ghosh),$array);
//echo "The letters in the pratyAhAra with the same ghoSa as the letter input are: ".implode(",",$ghoshasamya)."</br>";    
}
if(empty($prana)===FALSE)
{
$pranasamya = array_intersect(flatten($prana),$array);
//echo "The letters in the pratyAhAra with the same prANa as the letter input are: ".implode(",",$pranasamya)."</br>";    
}
if(empty($svar)===false)
{
if(in_array($text,$ac)) 
        { $svarasamya = array_intersect(flatten($svar),$array,$ac); 
//echo "The letters in the pratyAhAra with the same udAtta/anudAtta/svarita as the letter input are: ".implode(",",$svarasamya)."</br>";
        }    
}
if(empty($sthanasamya)===false && empty($abhyantarasamya)===false && empty($ghoshasamya)===false && empty($pranasamya)===false)
{ $l = array_intersect($sthanasamya,$abhyantarasamya,$ghoshasamya,$pranasamya); }
if(empty($sthanasamya)===false && empty($abhyantarasamya)===false && empty($ghoshasamya)===false)
{ $m = array_intersect($sthanasamya,$abhyantarasamya,$ghoshasamya); }
if(empty($sthanasamya)===false && empty($abhyantarasamya)===false)
{ $n = array_intersect($sthanasamya,$abhyantarasamya); }
if(empty($sthanasamya)===false && empty($abhyantarasamya)===false && empty($pranasamya)===false)
{ $o = array_intersect($sthanasamya,$abhyantarasamya,$pranasamya); }
if(empty($sthanasamya)===false && empty($ghoshasamya)===false)
{ $p = array_intersect($sthanasamya,$ghoshasamya); }
if(empty($sthanasamya)===false && empty($pranasamya)===false)
{ $q = array_intersect($sthanasamya,$pranasamya); }
// Defining savarNas for consonants
if(in_array($text,$hl))
{
    if(empty($sthanasamya)===false&&empty($abhyantarasamya)===false&&empty($ghoshasamya)===false&&empty($pranasamya)===FALSE&&empty($l)===false) 
    {//echo "four match";
            $savarna = implode(", ",$l);     
    }
    elseif (empty($sthanasamya)===false&&empty($abhyantarasamya)===false&&empty($ghoshasamya)===false&&empty($m)===false)
    {//echo "three match";
            $savarna = implode(", ",$m);     
    }
    elseif (empty($sthanasamya)===false&&empty($abhyantarasamya)===false&&empty($pranasamya)===false&&empty($o)===false)
    {//echo "three match";
            $savarna = implode(", ",$o);     
    }
    elseif (empty($sthanasamya)===false&&empty($abhyantarasamya)===false&&empty($n)===false)
    {//echo "Two match";
            $savarna = implode(", ",$n);     
    }
     elseif (empty($sthanasamya)===false&&empty($ghoshasamya)===false&&empty($p)===false)
    {//echo "Two match";
            $savarna = implode(", ",$p);     
    } elseif (empty($sthanasamya)===false&&empty($pranasamya)===false&&empty($q)===false)
    {//echo "Two match";
            $savarna = implode(", ",$q);     
    }
    else
    {//echo "no match";
    $savarna = implode(", ",$sthanasamya);    
    }
} 
// defining savarNas for vowels
else
{  
    if (in_array($text,$ru)||in_array($text,$e))
    {// patch for $ru
        for($i=0;$i<4;$i++)
        {
        if ($text === $ru[$i])
        {
            if (in_array($text,$array))
            { $savarna = "f, F, x, X"; }
            else
            { $savarna = ""; }
        }
        // patch for non sAvarNya of e,E,o,O
        elseif ($text === $e[$i])
        {
            if (in_array($text,$array))
            { $savarna = $text; }
            else
            { $savarna = ""; }
        }
        }
    }
    
    
    else 
    {// In case of other vowels.
        $savarna = implode(", ",$sthanasamya);
    }
    
    if (in_array($text,$array))
    {
        $savarna = $text;
    }
}
// giving output to the browser for savarNa letter
//echo "The savarna letter of '".$text."' among the given pratyAhAra is: ".$savarna;    
// stores that savarNa letter in memory.
return $savarna;
}
/* Function one1 is for replacing one letter in the whole array of $text with another letter. Not used in code */
// There are three arguments, $a is the array which you want to change, $b is the array which will be put in place of the replaced one.
// $merge can take two values. 0 will mean that the whole $text will be replaced with the new replaced values. Used in case of mandatory Adezas.
// 1 will mean that $text will not be replaced, but the replaced values will be added to it. Used in case of optional Adezas.
function one1($text,$a,$b,$merge)
{
        for($i=0;$i<count($a);$i++)
        {
            $text =  str_replace($a[$i],$b[$i],$text);    
        }
return $text;  
}
/* Function two is for replacing one letter in the whole array of $text with another letter. Not used in code */
// There are five arguments, $a,$b are the arrays which you want to change, $c,$d are the arrays which will be put in place of the replaced one.
// $merge can take two values. 0 will mean that the whole $text will be replaced with the new replaced values. Used in case of mandatory Adezas.
// 1 will mean that $text will not be replaced, but the replaced values will be added to it. Used in case of optional Adezas.
function two1($text,$a,$b,$c,$d,$merge)
{
    for($i=0;$i<count($a);$i++)
          {
    for($j=0;$j<count($b);$j++)
            {
      $text =  str_replace($a[$i].$b[$j],$c[$i].$d[$j],$text);   
            }
          }
    return $text;
}

/* Function three1 is for replacing one letter in the whole array of $text with another letter. Not used in code */
// There are seven arguments, $a,$b,$c are the arrays which you want to change, $d,$e,$f are the arrays which will be put in place of the replaced one.
// $merge can take two values. 0 will mean that the whole $text will be replaced with the new replaced values. Used in case of mandatory Adezas.
// 1 will mean that $text will not be replaced, but the replaced values will be added to it. Used in case of optional Adezas.
function three1($text,$a,$b,$c,$d,$e,$f,$merge)
{
     for($i=0;$i<count($a);$i++)
    {
    for($j=0;$j<count($b);$j++)
        {
        for($k=0;$k<count($c);$k++)
            {
         $text =  str_replace($a[$i].$b[$j].$c[$k],$d[$i].$e[$j].$f[$k],$text);       
            }
        }
    }
    return $text;
}

/* An attempt to create an all encompassing function 
 * name is panini
 * three arrays for checking,
 * one for adding additional checking in addition to sub function
 * one for adding whether pratyaya / pada
 *  one for the 0/1/2/3/4 etc of sub function, 
 * three for the substituted, 
 * three for substitution, 
 * one for 0/1 of one/two/three function,
 * one for english sutra name,
 * one for english sutra number
 * one for hindi sutra name,
 * one for hindi sutra number
 * 
 */
?>