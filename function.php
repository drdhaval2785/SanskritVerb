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
$shitpratyaya=array("Sap","Syan","Snu","Sa","Snam","SnA");
$navibhaktau=array("jas","am","Sas","ByAm","Bis","Byas","os","Am","Ni","tas","Tas","vas","mas","AtAm","TAs","ATAm","Dvam",);
$inbetweenpratyaya=array("ap");
$inbetweeenreplace=array("a");
// list of parasmai, Atmane and ubhayapadi.
$anudAttetverbs=array("ahi!","aki!","aGi!","awwa!","aRa!","aWi!","anuruDa!","ana!","abi!","aBi!","aya!","arTa!","aSU!","Asa!","Ikza!","Iji!","Iqa!","Ira!","ISa!","Iza!","Iha!","uWa!","urda!","UyI!","Uha!","fja!","fji!","ejf!","eWa!","eDa!","ezf!","ezf!","kasi!","kaka!","kaki!","kaca!","kaci!","kaWi!","kaqi!","katTa!","kada!","kadi!","kapa!","kabf!","kamu!","kapi!","kala!","kalla!","kaSa!","kasa!","kAci!","kASf!","kASf!","kAsf!","kuka!","kuwa!","kuwwa!","kuqi!","kutsa!","kusma!","kuha!","kUwa!","kURa!","kfpa!","kfpU!","kfpU!","kepf!","kevf!","knUyI!","krada!","kradi!","krapa!","klada!","kladi!","klidi!","kliSa!","klIbf!","kleSa!","kzaji!","kzamU!z","kzIbf!","kzIvf!","kzuBa!","kzmAyI!","Kaqi!","Kida!","Kida!","Kevf!","ganDa!","garva!","garha!","gala!","galBa!","galha!","gADf!","gAhU!","guda!","gupa!","gurI!","gUra!","gUrI!","gfhU!","gfha!","gepf!","gevf!","gezf!","gozwa!","graTi!","grasu!","glasu!","glaha!","glepf!","glepf!","glevf!","Gawa!","Gawwa!","Gaza!","GiRi!","Guzi!","Guwa!","GuRa!","GuRi!","GUrRa!","GfRi!","DrAGf!","caka!","cakzi!N","caqi!","caya!","cita!","cIBf!","cUrI!","cezwa!","janI!","jaBI!","ji!","jutf!","juzI!","jUrI!","jfBi!","jezf!","jehf!","wikf!","wIkf!","qapa!","qipa!","QOkf!","taqi!","tatri!","tapa!","taya!","tarja!","tAyf!","tikf!","tija!","tipf!","tIkf!","tuqi!","tuBa!","tURa!","tUrI!","tepf!","tevf!","traki!","trapU!z","truwa!","trOkf!","YitvarA!","daSi!","dasi!","dakza!","dakza!","dada!","daDa!","daya!","dasa!","divu!","dIkza!","dIpI!","devf!","dyuta!","drAGf!","drAqf!","drAhf!","drekf!","Dikza!","Dukza!","Depf!","DrAqf!","Drekf!","DvaMsu!","RaBa!","Raya!","Rasa!","nATf!","nADf!","RAsf!","Risi!","Riji!","nizka!","Rezf!","paci!","paRa!","paqi!","pada!","pada!","pana!","paya!","parda!","piji!","piqi!","pUyI!","pUrI!","pfcI!","pfji!","pevf!","pezf!","o!pyAyI!","praTa!","prasa!","prezf!","pliha!","plevf!","bahi!","baDa!","barha!","balha!","basta!","bADf!","bAhf!","bIBf!","buDa!","vehf!","Baqi!","Badi!","Bartsa!","Bala!","Bala!","Balla!","BAma!","BAza!","BAsf!","Bikza!","YimidA!","BfjI!","Byasa!","BraMsu!","wuBrAjf!","BrAjf!","wuBrASf!","BrURa!","Brejf!","wuBlASf!","mahi!","maki!","maGi!","maca!","maci!","maWi!","maqi!","mada!","manu!","mana!","mAna!","matri!","madi!","maya!","mala!","malla!","maska!","maska!","mana!","mAna!","muWi!","muqi!","muda!","mfga!","mepf!","mevf!","mrada!","mlevf!","yakza!","yatI!","yuja!","yutf!","yuDa!","yezf!","raGi!","raBa!","ramu!","rabi!","raBi!","raya!","rAGf!","rAsf!","ruca!","ruwa!","rekf!","rejf!","repf!","reBf!","revf!","rezf!","lakza!","laGi!","o!lajI!","o!lasjI!","qulaBa!z","labi!","labi!","laBi!","laya!","lala!","o!lasjI!","lAGf!","liSa!","luwa!","luWa!","lepf!","lokf!","locf!","lozwa!","vaki!","vaki!","vaGi!","vaYcu!","vaWi!","vaqi!","vanu!","vadi!","vaya!","varca!","varza!","varha!","valBa!","valla!","valha!","vaska!","vasa!","vaska!","vasta!","vAvftu!","vASf!","bAhf!","o!vijI!","viTf!","vida!","vida!","vida!","vizka!","vIja!","vIra!","vfka!","vfkza!","vfjI!","vfji!","vftu!","vftu!","vfDu!","vfza!","veTf!","vezwa!","vehf!","vyaTa!","Saki!","Saca!","SaWa!","Saqi!","Sama!","Sala!","SalBa!","SAqf!","Sikza!","Siji!","SIkf!","SIBf!","SuBa!","SUra!","SUrI!","SfDu!","Sevf!","syandU!","sraMsu!","sraMsu!","Sraki!","SraTi!","SramBu!","Slaki!","SlAGf!","Slokf!","Svaki!","Svaca!","Svaci!","Svidi!","zvaska!","zvaska!","saNgrAma!","zaca!","satra!","satra!","zaha!","sIkf!","zUda!","sfja!","sekf!","zevf!","skaBi!","skudi!","sKada!","zwaBi!","zwiGa!","zwipf!","zwuca!","zwuBu!","zwepf!","sTUla!","spadi!","sparDa!","spaSa!","sPAyI!","sPuwa!","sPuqi!","syama!","sraMsu!","sraki!","sramBu!","sramBu!","srekf!","srokf!","zvaki!","zvaYja!","zvada!","svarda!","zvaska!","zvaska!","svAda!","YizvidA!","hada!","hasta!","hiqi!","hizka!","huqi!","huqi!","heWa!","heqf!","hepf!","hezf!","hoqf!","hrAda!","hrezf!","hlAdI!");
$Gitverbs=array("iN","iN","IN","uN","kuN","kuN","kUN","kluN","KuN","gAN","guN","guN","GuN","NuN","cakzi!N","juN","jyuN","qIN","qIN","trEN","dIN","dIDIN","dUN","dfN","deN","DIN","DfN","DfN","pIN","pUN","pfN","pyEN","prIN","pruN","pluN","mAN","mAN","mIN","mUN","mfN","meN","rIN","ruN","lIN","vfN","vevIN","vrIN","SIN","cyuN","SyEN","zUN","zUN","zmiN","zmiN","o!hAN","hnuN");
$parasmai=array("aka!","akzU!","aga!","agi!","aja!","aYcu!","aYjU!","awa!","aqa!","aqqa!","aRa!","ata!","ada!","aqqa!","iN","ik","ana!","ati!","adi!","aBra!","ama!","arGa!","arca!","arja!","arda!","arba!","arva!","arha!","ala!","ava!","aSa!","asu!","asa!","aha!","ACi!","Apx!","iR","ik","iKa!","iKi!","igi!","iwa!","idi!","ivi!","ila!","iza!","iza!","iza!","IKi!","IKi!","Irkzya!","Irzya!","Iza!","ukza!","uKa!","uKi!","uca!","uCI!","uCI!","ujJa!","uCi!","uCi!","uWa!","ujJa!","undI!","ubja!","uBa!","umBa!","urvI!","uza!","uhi!r","UWa!","Uza!","f","f","f","fca!","fCa!","fDu!","fDu!","fPa!","fmPa!","fzI!","F","ejf!","oKf!","oRf!","kaKa!","kaKe!","kage!","kaja!","kawI!","kawe!","kaWa!","kaqa!","kaqa!","kaqqa!","kaRa!","kaRa!","kaqi!","kaqqa!","kanI!","kadi!","karja!","karda!","karba!","karva!","kaza!","kasa!","kAkzi!","ki","kiwa!","kiwa!","kita!","kita!","kila!","kIla!","ku","kuMSa!","kuMsa!","kuca!","kuca!","kuca!","kuju!","kuYca!","kuji!","kuwa!","kuqa!","kuRa!","kuwi!","kuWi!","kuqi!","kuTa!","kuTi!","kunTa!","kupa!","kubi!","kura!","kula!","kuSa!","kuza!","kusa!","kUja!","kUla!","kfqa!","kfvi!","kftI!","kftI!","kfSa!","kfza!","kF","kF","kelf!","kE","knaTa!","knasu!","kmara!","kraTa!","kradi!","kramu!","krIqf!","kruYca!","kruqa!","kruDa!","kruSa!","klaTa!","kladi!","klamu!","klidU!","klidi!","kliSU!","kvaRa!","kvaTe!","kzapayaSca","kzamU!","kzara!","kzi","kzi","kzi","kzipa!","kzivu!","kzI","kzIja!","kzIz","wukzu","kzuDa!","kzuBa!","kzuBa!","kzura!","kzura!","kzevu!","kzE","kzRu","kzmIla!","YikzvidA!","YikzvidA!","kzvelf!","Kaca!","Kaja!","Kaji!","Kawa!","Kada!","Karja!","Karda!","Karba!","Karva!","Kala!","Kava!","Kaza!","KAdf!","Kiwa!","Kida!","Kuju!","Kuqa!","Kura!","Kelf!","KE","Korf!","Kolf!","KyA","gaja!","gaji!","gaqa!","gaqi!","gaqi!","gada!","gamx!","garja!","garda!","garba!","garva!","gala!","gA","gu","guja!","guja!","guji!","guqa!","guDa!","guDa!","gupU!","gupa!","guPa!","gumPa!","gurvI!","gf","gfja!","gfji!","gfDu!","gF","gF","gE","granTa!","grucu!","glucu!","gluYca!","glE","GagGa!","GaGa!","Gasx!","Guwa!","GuRa!","Gura!","Guzi!r","GUrRa!","Gf","Gf","Gfzu!","GrA","cakAsf!","caka!","caYcu!","cawe!","caRa!","cana!","cadi!","capa!","camu!","camu!","cara!","carca!","carca!","carba!","carva!","cala!","cala!","caha!","ciwa!","citI!","ciri","cila!","cilla!","cucya!","cuwa!","cuqa!","cuqqa!","cuqi!","cuqqa!","cupa!","cubi!","culla!","cUza!","cftI!","celf!","cyuti!r","Camu!","Cuwa!","Cuqa!","Cupa!","Cura!","Co","jakza!","jaja!","jaji!","jawa!","jana!","japa!","jamu!","jartsa!","jartsa!","jarja!","jartsa!","jala!","jalpa!","jaza!","jasu!","jAgf","ji","ji!","jivi!","jimu!","jiri","jizu!","jIva!","ju","jugi!","juwa!","juqa!","juqa!","juna!","jUza!","jFz","jF","jE","jYA","jyA","jyuti!r","jri","jvara!","jvala!","jvala!","Jawa!","Jamu!","Jartsa!","Jartsa!","JarJa!","Jartsa!","Jaza!","JF","JFz","wala!","wvala!","qipa!","qipa!","tasi!","taka!","takzU!","takza!","taki!","tagi!","taYcu!","taYcU!","tawa!","tapa!","tamu!","tarja!","tarda!","tasu!","tika!","tiga!","tima!","tila!","tila!","tilla!","tIma!","tIva!","tu","tuja!","tuji!","tuwa!","tuqa!","tuqf!","tuRa!","tupa!","tupa!","tuPa!","tuPa!","tuBa!","tuBa!","tumpa!","tumpa!","tumPa!","tumPa!","tubi!","tura!","turvI","tuza!","tusa!","tuhi!r","tUqf!","tUla!","tUza!","tfMhU!","tfkza!","tfpa!","tfpa!","tfpa!","tfPa!","tfmpa!","tfmPa!","Yitfza!","tfhU!","tfha!","tF","teja!","tyaja!","trakza!","traKa!","tragi!","tradi!","trasI!","triKi!","truwa!","trupa!","truPa!","trumpa!","trumPa!","tvakzU!","tvagi!","tvaca!","tvaYcu!","tsara!","Taki!","Tuqa!","TurvI","daMSa!","daGa!","daGi!","damu!","damBu!","daridrA","dala!","dASa!","dasu!","daha!","dAR","dAp","divi!","divu!","du","wudu","durvI!","duza!","duhi!r","dfhi!","dfpa!","dfpa!","dfPa!","dfBI!","dfmpa!","dfmPa!","dfha!","dF","dF","dF","dEp","dfSi!r","do","dyu","dyE","drama!","drA","drAKf!","drAkzi!","dru","druRa!","druha!","drE","dvf","DaRa!","Dana!","Davi!","Di","Divi!","Diza!","DU","DurvI!","DU","DUpa!","Dfja!","Dfji!","YiDfzA!","DF","Dew","Dorf!","DmA","DmAkzi!","DyE","Draja!","Draji!","DraRa!","u!Drasa!","DrAKf!","DrAkzi!","Drija!","Dru","Dru","DrE","Dvaja!","Dvaji!","DvaRa!","Dvana!","Dvana!","DvAkzi!","Dvf","Rakza!","RaKa!","RaKi!","Rawa!","Rawa!","Rada!","wunadi!","RaBa!","RaBa!","Rama!","narda!","Rala!","RaSa!","Rikza!","Ridi!","Rivi!","Rila!","RiSa!","Rizu!","RIla!","RIva!","RU","Ru","Ruda!","RU","nftI!","nF","nF","pakza!","pawa!","paWa!","patx!","paTe!","parpa!","parba!","parva!","pala!","pelf!","pA","pA","pi","piwa!","piWa!","pivi!","piSa!","pizx!","pisf!","pIla!","pIva!","puwa!","puwa!","puqa!","puqa!","puRa!","puqi!","puTa!","puTi!","pura!","purva!","pula!","puza!","puza!","puza!","puza!","puzpa!","purva!","pUla!","pUza!","pf","pf","pfcI!","pfqa!","pfRa!","pfzu!","pF","pF","pelf!","pesf!","pE","pERf!","pyuza!","pyusa!","praCa!","prA","pruzu!","pruza!","prERf!","plI","pluza!","pluza!","pluzu!","pluza!","psA","Pakka!","PaRa!","Pala!","YiPalA!","Pulla!","Pelf!","baWa!","baRa!","bawi!","bada!","banDa!","vaBra!","barba!","bala!","basu!","biwa!","bidi!","bila!","bisa!","visa!","bukka!","bugi!","buDa!","busa!","busa!","bfhi!","bfha!","bfhU!","besa!","byusa!","vraRa!","blI","BaYjo!","Bawa!","Bawa!","BaRa!","Barba!","BarBa!","Barva!","Baza!","Basu!","Basa!","BA","Bidi!","YiBI","Bujo!","Buja!","BU","BUza!","BfMSu!","Bfqa!","BfSu!","BF","BraMSu!","BraRa!","Bramu!","Bramu!","BrI","maKa!","maKi!","magi!","maGi!","wumasjo!","maWa!","maRa!","maqi!","maTe!","madI!","manTa!","manTa!","maTi!","maBra!","marba!","marva!","mava!","mavya!","maSa!","maza!","masI!","wumasjo!","maha!","mA","mAkzi!","miCa!","YimidA!","mivi!","mila!","miSa!","mizu!","miza!","miha!","mImf!","mIla!","mIva!","muKi!","muja!","muji!","muwa!","muwa!","muqa!","muRa!","muqi!","mura!","murCA!","murvI!","muza!","musa!","muha!","mUla!","mUza!","mfkza!","mfjU!","mfqa!","mfqa!","mfRa!","mfda!","mfSa!","mfzu!","mF","mnA","mrakza!","mrucu!","mruYcu!","mrewf!","mreqf!","mlucu!","mluYcu!","mleCa!","mlewf!","mlE","yaBa!","yama!","yasu!","yA","yu","yugi!","yuCa!","yupa!","yUza!","yOwf!","rahi!","rakza!","raKa!","rage!","raKi!","ragi!","rawa!","rawa!","raWa!","raRa!","raRa!","ravi!","rada!","raDa!","rapa!","raPa!","raPi!","rasa!","raha!","rA","rAKf!","rADa!","rADaH","ri","ri","riKa!","riKi!","rigi!","rivi!","riPa!","riSa!","riza!","riza!","riha!","rI","ru","rujo!","ruWa!","ruwi!","ruWi!","ruWi!","ruqi!","rudi!r","rupa!","ruSa!","ruza!","ruza!","ruha!","rUza!","rE","roqf!","rOqf!","laKa!","lage!","laKi!","lagi!","laGi!","laCa!","laja!","laji!","lawa!","laqa!","lapa!","larba!","lala!","lasa!","lA","lAKf!","lAja!","lACi!","lAji!","liKa!","liKa!","liKi!","ligi!","liSa!","lI","luYca!","luwa!","luwa!","luwa!","luWa!","luWa!","luWa!","luqa!","luqa!","luwi!","luWi!","luWi!","luWi!","luqi!","luTi!","lupa!","luBa!","luBa!","lubi!","lUza!","loqf!","vakza!","vaKa!","vaKi!","vagi!","vaca!","vaja!","vaYcu!","vawa!","vawa!","vaWa!","vaRa!","vawi!","vada!","vana!","vanu!","vana!","vaBra!","wuvama!","valga!","vaSa!","vaza!","vasa!","vasu!","vA","vAkzi!","vACi!","viCa!","o!vijI!","viwa!","vida!","viDa!","vila!","viSa!","vizu!","viza!","visa!","bisa!","vI","vugi!","vusa!","bfhi!","vfjI!","vfRa!","vfSa!","vfzu!","bfha!","vfhU!","vF","velf!","vella!","vesa!","vella!","o!vE","vyaca!","vyaDa!","vyuza!","vyuza!","vyusa!","vraja!","vraja!","vraji!","vraRa!","o!vraScU!","vrI","vrIqa!","vruqa!","vlI","SaMsu!","Sakx!","Sawa!","SaWa!","SaRa!","Sadx!","Sadx!","Samu!","Sarba!","Sarva!","Sala!","Sava!","SaSa!","Saza!","Sasu!","SAKf!","SAsu!","SiKi!","SiGi!","Siwa!","Sila!","Siza!","Sizx!","SIla!","Suka!","Suca!","Sucya!","SuWa!","SuWi!","SuWi!","SuDa!","Suna!","SunDa!","SuBa!","SuBa!","SumBa!","SumBa!","Suza!","SUla!","SUza!","SF","Self!","SE","So","SoRf!","SOwf!","Scuti!r","Scyuti!r","SnaTa!","SmIla!","Sragi!","SraRa!","SraTa!","SranTa!","SranTa!","Sramu!","SrA","SrA","Srizu!","Sru","SrE","SroRf!","Slagi!","SlaTa!","SlAKf!","Slizu!","Sliza!","SloRf!","Sragi!","Svala!","Svalla!","Svasa!","wuo!Svi","zwyE","zWivu!","zWivu!","zasti!","zage!","zasja!","zaYja!","zawa!","zadx!","zadx!","zaGa!","zana!","zapa!","zama!","samI!","zarkza!","zarja!","zarba!","zarva!","zala!","zasa!","zasja!","zaha!","sADa!","ziwa!","ziDa!","ziDU!","ziDu!","zivi!","ziBu!","zimBu!","zila!","zivu!","zu","zu","zura!","zuha!","zU","sUrkza!","zUrkzya!","sUza!","sf","sf","sfja!","sfpx!","zfBu!","zfmBu!","zelf!","zE","zo","skandi!r","skamBu!","skumBu!","sKala!","zwaka!","zwana!","zwama!","stamBu!","zWala!","zwima!","zwIma!","zwupa!","stumBu!","zwUpa!","zwfkza!","stfhU!","zwE","styE","zwrakza!","zWage!","zWA","sTuqa!","zRasu!","zRA","zRiha!","zRu","zRusu!","zRuha!","zRE","spf","spfSa!","sPara!","sPala!","sPuwa!","sPuwi!r","sPuqa!","sPuwi!","sPura!","sPurCA!","sPula!","wuo!sPUrjA!","smIla!","smf","smf","smf","syamu!","srivu!","sru","srE","Sragi!","svana!","svana!","Yizvapa!","zvidA!","svf","hawa!","haWa!","hana!","hamma!","harya!","haya!","hala!","hase!","o!hAk","hi","hisi!","hiwa!","hivi!","hila!","hu","huqf!","huqa!","hurCA!","hula!","hula!","hUqf!","hf","hfzu!","hfza!","hrasa!","heWa!","heWa!","heqa!","heQa!","hoqf!","hmala!","hrage!","hrasa!","hrI","hrICa!","hlage!","hlasa!","hvala!","hvf","hvf");
$Atmane=array("ahi!","aki!","aGi!","awwa!","aRa!","aWi!","anuruDa!","ana!","abi!","aBi!","aya!","arTa!","aSU!","ASasi","ASAsu!","Asa!","iN","YiinDI!","IN","Ikza!","Ija","Iji!","Iqa!","Ira!","ISa!","Iza!","Iha!","uN","uWa!","urda!","UyI!","Uha!","fja!","fji!","ejf!","eWa!","eDa!","ezf!","ezf!","kasi!","kaka!","kaki!","kaca!","kaci!","kaWi!","kaqi!","katTa!","kada!","kadi!","kapa!","kabf!","kamu!","kapi!","kala!","kalla!","kaSa!","kasa!","kAci!","kASf!","kASf!","kAsf!","kuN","kuN","kuka!","kuwa!","kuwwa!","kuqi!","kutsa!","kurda","kusma!","kuha!","kUN","kUwa!","kURa!","kfpa!","kfpU!","kfpU!","kepf!","kevf!","knUyI!","krada!","kradi!","krapa!","klada!","kladi!","klidi!","kliSa!","klIbf!","kluN","kleSa!","kzaji!","kzamU!z","kzIbf!","kzIvf!","kzuBa!","kzmAyI!","YikzvidA!","Kaqi!","Kida!","Kida!","KuN","Kurda","Kevf!","ganDa!","garva!","garha!","gala!","galBa!","galha!","gAN","gADf!","gAhU!","guN","guN","guda!","gupa!","gurI!","gurda","gUra!","gUrI!","gfhU!","gfha!","gF","gepf!","gevf!","gezf!","gozwa!","graTi!","grasu!","glasu!","glaha!","glepf!","glepf!","glevf!","glezf!","Gawa!","Gawwa!","Gaza!","GiRi!","GuN","Guzi!","Guwa!","GuRa!","GuRi!","GUrI","GUrRa!","GfRi!","DrAGf!","NuN","caka!","cakzi!N","caqi!","caya!","cita!","cIBf!","cUrI!","cezwa!","janI!","jaBI!","juN","jutf!","juzI!","jUrI!","jfBi!","jezf!","jehf!","jyuN","wikf!","wIkf!","qapa!","qipa!","qIN","qIN","QOkf!","taqi!","tatri!","tapa!","taya!","tarja!","tAyf!","tikf!","tija!","tipf!","tIkf!","tuqi!","tuBa!","tURa!","tUrI!","tepf!","tevf!","traki!","trapU!z","truwa!","trEN","trOkf!","YitvarA!","daSi!","dasi!","dakza!","dakza!","dada!","daDa!","daya!","dasa!","divu!","dIN","dIkza!","dIDIN","dIpI!","dUN","dfN","deN","devf!","dyuta!","drAGf!","drAqf!","drAhf!","drekf!","Dikza!","DIN","Dukza!","DUrI","DfN","DfN","Depf!","DrAqf!","Drekf!","DvaMsu!","RaBa!","Raya!","Rasa!","nATf!","nADf!","RAsf!","Risi!","Riji!","nizka!","Rezf!","paci!","paRa!","paqi!","pada!","pada!","pana!","paya!","parda!","piji!","piqi!","pIN","pUN","pUyI!","pUrI!","pfN","pfcI!","pfji!","pevf!","pezf!","o!pyAyI!","pyEN","praTa!","prasa!","prIN","pruN","prezf!","pliha!","pluN","plevf!","bahi!","baDa!","barha!","balha!","basta!","bAqf","bADf!","bAhf!","bIBf!","buDa!","vehf!","Baqi!","Badi!","Bartsa!","Bala!","Bala!","Balla!","BAma!","BAza!","BAsf!","Bikza!","YimidA!","BfjI!","Byasa!","BraMSu!","BraMsu!","wuBrAjf!","BrAjf!","wuBrASf!","BrURa!","Brejf!","wuBlASf!","mahi!","maki!","maGi!","maca!","maci!","maWi!","maqi!","mada!","manu!","mana!","mAna!","matri!","madi!","maya!","mala!","malla!","maska!","maska!","mAN","mAN","mana!","mAna!","mIN","muci","muWi!","muqi!","muda!","mUN","mfN","mfga!","meN","mepf!","mevf!","mrada!","mlevf!","yakza!","yatI!","yu","yuja!","yutf!","yuDa!","yezf!","raGi!","raBa!","ramu!","rabi!","raBi!","raya!","rAGf!","rAsf!","rIN","ruN","ruca!","ruwa!","rekf!","rejf!","repf!","reBf!","revf!","rezf!","lakza!","laGi!","o!lajI!","o!lasjI!","qulaBa!z","labi!","labi!","laBi!","laya!","lala!","o!lasjI!","lAGf!","liSa!","lIN","luwa!","luWa!","lepf!","lokf!","locf!","lozwa!","vaki!","vaki!","vaGi!","vaYcu!","vaWi!","vaqi!","vanu!","vadi!","vaya!","varca!","varza!","varha!","vala","valBa!","valla!","valha!","vaska!","vasa!","vaska!","vasta!","vAqf","vAvftu!","vASf!","bAhf!","o!vijI!","viTf!","vida!","vida!","vida!","vizka!","vIja!","vIra!","vfN","vfka!","vfkza!","vfjI!","vfji!","vftu!","vftu!","vfDu!","vfza!","veTf!","wuvepf","vevIN","vezwa!","vehf!","vyaTa!","vrIN","Saki!","Saca!","SaWa!","Saqi!","Sama!","Sala!","SalBa!","SAqf!","Sikza!","Siji!","SIN","SIkf!","SIBf!","SuBa!","SUra!","SUrI!","SfDu!","Sevf!","syandU!","cyuN","SyEN","sraMsu!","sraMsu!","Sraki!","SraTi!","SramBu!","Slaki!","SlAGf!","Slokf!","Svaki!","Svaca!","Svaci!","SvitA!","Svidi!","zvaska!","zvaska!","saNgrAma!","zaca!","satra!","satra!","zaha!","sIkf!","zUN","zUN","zUda!","sfja!","sekf!","zevf!","skaBi!","skudi!","sKada!","zwaBi!","zwiGa!","zwipf!","zwuca!","zwuBu!","zwepf!","sTUla!","spadi!","sparDa!","spaSa!","sPAyI!","sPuwa!","sPuqi!","zmiN","syama!","sraMsu!","sraki!","sramBu!","sramBu!","srekf!","srokf!","zvaki!","zvaYja!","zvada!","svarda!","zvaska!","zvaska!","svAda!","YizvidA!","hada!","hasta!","o!hAN","hiqi!","hizka!","huqi!","huqi!","heWa!","heqf!","hepf!","hezf!","hoqf!","hnuN","hrAda!","hrezf!","hlAdI!");
$ubhaya=array("aMsa!","ahi!","aNka!","aNga!","acu!","aci!","aYcu!","aYcu!","aji!","awwa!","anDa!","ama!","aya!","arka!","arca!","arja!","arda!","arha!","arha!","aza!","asa!","Akranda!","Apx!","Asada!","ila!","Iqa!","Ira!","kaWi!","uGrasa!","Una!","Urja!","UrRuY","fRu!","o!laqi!","kaRa!","kaWi!","kaqi!","katra!","katra!","kaTa!","karRa!","karta!","kala!","kala!","kAla!","kIwa!","kuSi!","kusi!","kuwwa!","kuRa!","kuWi!","kuqi!","kuqi!","kudf!","kudri!","kupa!","kumAra!","kubi!","kuBi!","kUwa!","kURa!","qukfY","kfY","kfY","kfpa!","kfpeSca","kfza!","kFY","kFta!","keta!","knUY","qukrIY","klapa!","kzaji!","kzaRu!","kzapa!","kzapi!","kzala!","kziRu!","kzipa!","kzudi!r","kzowa!","Kawwa!","Kaqa!","Kaqi!","Kanu!","Kuqi!","Kewa!","Keqa!","Kowa!","gaja!","gaRa!","gadI!","garja!","garda!","garDa!","garha!","gaveza!","guRa!","guWi!","guqi!","gupa!","gurda!","guhU!","goma!","granTa!","granTa!","grasa!","graha!","grAma!","Gawa!","Gawa!","Gawwa!","Gawi!","Guzi!r","Gf","GfRu!","cakka!","cawa!","caqi!","cate!","cade!","cana!","capa!","capi!","cara!","carca!","cala!","caza!","caha!","caha!","cAyf!","ci","ciY","ciY","citra!","citi!","cIka!","cIva!","cIbf!","cIva!","cIvf!","cukka!","cuwa!","cuwwa!","cuwi!","cuda!","cubi!","cura!","cula!","cUrRa!","cUrRa!","cfpa!","cyu","Caji!","Cada!","Cada!","Cada!","Cadi!","Carda","Caza!","Cidi!r","Cidra!","u!Cfdi!r","CfdI!","Cfpa!","Ceda!","jasi!","jaBi!","jala!","jasu!","jasu!","ji","ci","ci","juqa!","juza!","jF","jYapa!","jYA","jri","Jaza!","waki!","qipa!","tasi!","taqa!","taqa!","tanu!","tanu!","tapa!","tarka!","tala!","tija!","tila!","tIra!","tuja!","tuji!","tuji!","tuqi!","tutTa!","tuda!","tubi!","tula!","tfRu!","u!tfdi!r","tfpa!","tfpa!","trasi!","trasa!","tviza!","daSi!","dasi!","daRqa!","dala!","qudAY","dAna!","dASf!","dAsf!","divu!","diSa!","diha!","duHKa!","dula!","duha!","dfpa!","dfBI!","dfBa!","drUY","dviza!","Dakka!","quDAY","DAvu!","DuY","DUpa!","DUY","DUY","DUY","DUpa!","DUSa!","DUza!","DUsa!","DfY","Dfza!","u!Drasa!","Dvana!","nakka!","nawa!","nawa!","Raqa!","nala!","Raha!","Riji!r","Ridf!","nivAsa!","RIY","Ruda!","Redf!","pasi!","pasi!","pakza!","qupaca!z","paci!","pawa!","pawa!","paqi!","pata!","paTa!","paTi!","parRa!","pala!","palyUla!","paSa!","paza!","pAra!","pAla!","pisi!","piCa!","pija!","piji!","piji!","piWi!","piqi!","piSa!","pisa!","pIqa!","puMsa!","puwa!","puwa!","puwwa!","puRa!","puwi!","puTa!","pula!","puza!","pusta!","pUY","pUja!","pUrI!","pUrRa!","pUrva!","pUla!","pfca!","pfTa!","pF","praTa!","prIY","prIY","proTf!","plakza!","baDa!","banDa!","barha!","barha!","bala!","balha!","bazka!","bila!","bukka!","buDi!r","u!bundi!r","busta!","bfhi!","brUY","brUsa!","Bakza!","Bakza!","Baja!","Baja!","Baji!","Baqi!","BAja!","BAma!","Bidi!r","BU","BU","BUza!","quBfY","BfY","BfSi!","Bezf!","Brakza!","Brasja!","Brasja!","Brezf!","Blakza!","Blezf!","mahi!","maqi!","marca!","maha!","mAna!","mArga!","mArja!","mAhf!","qumiY","miji!","miTf!","midf!","mida!","miDf!","midi!","mila!","miSra!","mI","mIY","muca!","mucx!","muwa!","muda!","musta!","mUY","mUtra!","mUla!","mfjU!","mfqi!","mfDu!","mfza!","mfza!","meTf!","medf!","meDf!","mokza!","mrakza!","mrakza!","mraCa!","mleCa!","yaja!","yata!","yatri!","yama!","wuyAcf!","yuY","yuja!","yuji!r","rahi!","raka!","raga!","raGa!","raNga!","raGi!","raca!","raYja!","raYja!","rawa!","rasa!","raha!","raha!","rAjf!","rica!","rici!r","ruSi!","rusi!","ruja!","ruwa!","ruwa!","ruDi!r","ruza!","rUkza!","rUpa!","rewf!","lakza!","laga!","laGi!","laGi!","laja!","laja!","laji!","laji!","laji!","laqa!","laqi!","o!laqi!","laza!","lasa!","lABa!","ligi!","liji!","lipa!","liha!","lI","luji!","luji!","luwa!","luRwa!","luRWa!","lupx!","lubi!","lUY","lUza!","lokf!","locf!","vaca!","vawa!","vawa!","vawi!","vawi!","vaqi!","vada!","quvapa!","vara!","varRa!","varRa!","varDa!","barha!","varha!","valka!","balha!","vasa!","vasa!","vaha!","vAta!","vAsa!","vici!r","viCa!","viji!r","vidx!","vipa!","vila!","vizx!","vizka!","vfY","vfY","bfhi!","vfjI!","vftu!","vfDu!","vFY","veY","veRf!","venf!","vela!","vyapa!","vyaya!","vyaya!","vyaya!","vyusa!","vyeY","vraja!","vraRa!","vrUza!","vrUsa!","Saka!","SaWa!","SaWa!","Sapa!","Sapa!","Sabda!","Samba!","SAna!","SAntva!","SiY","Siza!","SIka!","SIka!","SIla!","I!Suci!r","SuWa!","SuWi!","SunDa!","Sulka!","Sulba!","SUrpa!","SfDu!","SfDu!","SraRa!","SraTa!","SraTa!","SraTa!","SranTa!","SriY","SrIY","Sliza!","SvaWa!","SvaWa!","SvaWi!","SvaBra!","Svarta!","Svalka!","saNketa!","zaca!","zawwa!","zanu!","saBAja!","zamba!","sAra!","zaha!","zAntva!","sAma!","sAmba!","sAra!","ziY","ziY","zica!","zuY","suKa!","zuwwa!","sUca!","sUtra!","zUda!","skuY","stana!","zwuY","zwupa!","zwUpa!","stfY","stFY","stena!","stoma!","zRiha!","spaSa!","spfha!","sPiwa!","sPiwwa!","sPuwa!","sPuwi!","sPuqi!","zmiN","smiwa!","zvada!","svara!","svarta!","svAda!","hisi!","hikka!","hfY","hrapa!","hlapa!","hveY");
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
$toatmane=array("niviSa!","parikrIY","vikrIY","avakrIY","viji","parAji","AkrIqf!","anukrIqf!","saMkrIqf!","parikrIqf!","saMsTA","avasTA","prasTA","visTA","uttapa!","vitapa!","Ayama!","Ahana!","saMgamlx!","saMfcCa!","saMpracCa!","saMsvf","saMf","saMzru","saMvidx!","nihveY","saMhveY","upahveY","vihveY","avagf");
$sutraenglish=array("nerviSaH (1.3.17)","parivyavebhyaH kriyaH (1.3.18)","parivyavebhyaH kriyaH (1.3.18)","parivyavebhyaH kriyaH (1.3.18)","viparAbhyAM jeH (1.3.19)","viparAbhyAM jeH (1.3.19)","krIDo'nusaMparibhyazca (1.3.21)","krIDo'nusaMparibhyazca (1.3.21)","krIDo'nusaMparibhyazca (1.3.21)","krIDo'nusaMparibhyazca (1.3.21)","samavaparivibhyaH sthaH (1.3.22)","samavaparivibhyaH sthaH (1.3.22)","samavaparivibhyaH sthaH (1.3.22)","samavaparivibhyaH sthaH (1.3.22)","udvibhyAM tapaH (1.3.27)","udvibhyAM tapaH (1.3.27)","AGo yamahanaH (1.3.28)","AGo yamahanaH (1.3.28)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","nisamupavibhyo hvaH (1.3.30)","nisamupavibhyo hvaH (1.3.30)","nisamupavibhyo hvaH (1.3.30)","nisamupavibhyo hvaH (1.3.30)","avAdgraH (1.3.51)");
$sutradeva=array("नेर्विशः (१.३.१७)","परिव्यवेभ्यः क्रियः (१.३.१८)","परिव्यवेभ्यः क्रियः (१.३.१८)","परिव्यवेभ्यः क्रियः (१.३.१८)","विपराभ्यां जेः (१.३.१९)","विपराभ्यां जेः (१.३.१९)","क्रीडोऽनुसंपरिभ्यश्च (१.३.२०)","क्रीडोऽनुसंपरिभ्यश्च (१.३.२०)","क्रीडोऽनुसंपरिभ्यश्च (१.३.२०)","क्रीडोऽनुसंपरिभ्यश्च (१.३.२०)","समवप्रविभ्यः स्थः (१.३.२२)","समवप्रविभ्यः स्थः (१.३.२२)","समवप्रविभ्यः स्थः (१.३.२२)","समवप्रविभ्यः स्थः (१.३.२२)","उद्विभ्यां तपः (१.३.२७)","उद्विभ्यां तपः (१.३.२७)","आङो यमहनः (१.३.२८)","आङो यमहनः (१.३.२८)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","निसमुपविभ्यो ह्वः (१.३.३०)","निसमुपविभ्यो ह्वः (१.३.३०)","निसमुपविभ्यो ह्वः (१.३.३०)","निसमुपविभ्यो ह्वः (१.३.३०)","अवाद्ग्रः (१.३.५१)");
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
    $pattern=array("pra","prA","pro","prati","praty","api","apy","parA","paro","apa","apA","apo","upa","upA","upo","pari","pary","anu","anU","anv","ava","avA","avo","vi","vy","saM","sam","san","su","sU","sv","ati","aty","ni","ny","nir","niH","nis","niz","ut","ud","aDi","aDy","dur","duH","dus","duz","aBi","aBy","A",);
    
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
                if (strpos($aa,$bb)>0 && in_array(1,$prat)) 
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